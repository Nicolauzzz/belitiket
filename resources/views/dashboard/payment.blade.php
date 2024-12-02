@extends('layout.layout')
@section('title', 'Payment')

@section('content')
    <div class="payment-page">
        <div class="payment-header">
            <h2>Payment Method</h2>
        </div>

        <div class="payment-details">
            <div class="event-details">
                <h3>Event Details</h3>
                <img src="{{ asset('images/' . $event->gambar) }}" alt="{{ $event->nama_acara }}">
                <p><strong>Event:</strong> {{ $event->nama_acara }}</p>
                <p><strong>Date:</strong> {{ \Carbon\Carbon::parse($event->tanggal)->translatedFormat('d F Y') }}</p>
                <p><strong>Location:</strong> {{ $event->lokasi }}</p>
            </div>

            <div class="order-summary">
                <h3>Order Summary</h3>
                <p><strong>Ticket Type:</strong> {{ implode(', ', $orderSummary['ticket_type']) }}</p>
                <p><strong>Ticket Price:</strong> Rp. {{ number_format($orderSummary['ticket_price'], 0, ',', '.') }}</p>
                <p><strong>Service & Handling:</strong> Rp. {{ number_format($orderSummary['service_handling'], 0, ',', '.') }}</p>
                <p><strong>Admin Fee:</strong> Rp. {{ number_format($orderSummary['admin_fee'], 0, ',', '.') }}</p>
                <p><strong>Total:</strong> Rp. {{ number_format($orderSummary['total'], 0, ',', '.') }}</p>
            </div>
        </div>

        <div class="payment-options">
            <h4>Choose Payment Method</h4>
            <!-- Your payment method options here -->
            <form action="{{ route('process-payment') }}" method="POST">
                @csrf
                <button type="submit" class="pay-now-btn">Pay Now</button>
            </form>
        </div>
    </div>
@endsection
