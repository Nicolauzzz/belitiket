@extends('layout.layout')
@section('title', 'Checkout')

@section('content')
    <div class="checkout-page">
        <h2>Buyer Contact Information</h2>

        <form action="{{ route('process-checkout', $event->id) }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="first_name">First Name</label>
                <input type="text" name="first_name" id="first_name" required>
            </div>

            <div class="form-group">
                <label for="last_name">Last Name</label>
                <input type="text" name="last_name" id="last_name" required>
            </div>

            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" name="email" id="email" required>
            </div>

            <div class="form-group">
                <label for="phone">Phone Number</label>
                <input type="text" name="phone" id="phone" required>
            </div>

            <div class="order-summary">
                <h3>Order Summary</h3>
                <p><strong>Event:</strong> {{ $event->nama_acara }}</p>
                <p><strong>Date:</strong> {{ \Carbon\Carbon::parse($event->tanggal)->translatedFormat('d F Y') }}</p>
                <p><strong>Location:</strong> {{ $event->lokasi }}</p>

                <h4>Ticket Options</h4>
                @foreach ($ticketOptions as $ticket)
                    <p>{{ $ticket->tipe_tiket }} - Rp. {{ number_format($ticket->harga, 0, ',', '.') }}</p>
                @endforeach

                <button type="submit">Continue to Payment</button>
            </div>
        </form>
    </div>
@endsection
