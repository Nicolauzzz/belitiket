<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Ticket;

class BuyTicketsController extends Controller
{

    public function index($event_id)
    {
        //manggil file models buat masalah database
        $event = Event::findOrFail($event_id);

        //pilihan tiket berdasarkan event_id
        $ticketOptions = Ticket::where('event_id', $event_id)->get();

        return view('dashboard.buytickets', compact('event', 'ticketOptions'));
    }
}
