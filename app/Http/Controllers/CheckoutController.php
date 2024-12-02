<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Ticket;

class CheckoutController extends Controller
{
    public function index($event_id)
    {
        // Ambil data event berdasarkan ID
        $event = Event::findOrFail($event_id);

        // Ambil pilihan tiket berdasarkan event_id
        $ticketOptions = Ticket::where('event_id', $event_id)->get();

        $orderSummary = session('order_summary', []);

        return view('dashboard.checkout', compact('event', 'ticketOptions', 'orderSummary'));
    }

    public function processCheckout(Request $request, $event_id)
    {
        // Validate form data
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
        ]);

        // Get the event and ticket options
        $event = Event::findOrFail($event_id);
        $ticketOptions = Ticket::where('event_id', $event_id)->get();

        // Build the order summary. hanya perumpaan karena belum bisa narik order summary dari buytickets.blade
        $orderSummary = [
            'event' => $event, // Store event data
            'ticket_type' => [], // Store ticket types selected
            'ticket_price' => 0, // Store total ticket price
            'total' => 0, // Store total price
        ];

        // Calculate ticket type and total price
        foreach ($ticketOptions as $ticket) {
            // Add ticket selection logic
            // For now, we assume the user has selected all ticket types (for demonstration purposes)
            $orderSummary['ticket_type'][] = $ticket->tipe_tiket;
            $orderSummary['ticket_price'] += $ticket->harga; // Add ticket price
        }

        // Calculate total (including service and admin fee)
        $orderSummary['total'] = $orderSummary['ticket_price'] ;

        // Store the order summary in the session
        session(['order_summary' => $orderSummary]);

        // Redirect to the payment page
        return redirect()->route('payment');
    }

    public function payment()
    {
        // Get the order summary from the session
        $orderSummary = session('order_summary');

        // Ensure that the session contains the order summary
        if (!$orderSummary) {
            // If no order summary found, you can redirect or show an error
            return redirect()->route('buy-ticket', ['event_id' => $event_id])->with('error', 'Order summary not found.');
        }

        $event = $orderSummary['event']; // Access event from the session

        return view('dashboard.payment', compact('event', 'orderSummary'));
    }

    public function processPayment(Request $request)
    {
        // Validasi input
        $request->validate([
            'payment_method' => 'required',
            'event_id' => 'required|exists:events,id',
        ]);

        // Ambil data event dari database
        $event = Event::findOrFail($request->event_id);

        // Simpan data pembayaran ke tabel orders
        $order = Orders::create([
            'event_id' => $event->id,
            'user_id' => auth()->id(), // ID pengguna yang login
            'ticket_id' => 1, // Ganti sesuai pilihan tiket
            'quantity' => 1, // Ganti sesuai jumlah tiket
            'harga' => 100000, // Ganti dengan harga tiket
            'waktu_pembelian' => now(),
            'status' => 'Menunggu Dibayar',
        ]);

        // Redirect ke halaman riwayat pembelian
        return redirect()->route('history.index')->with('success', 'Pembelian berhasil, menunggu pembayaran.');
    }

}
