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
                <p><strong>Total:</strong> Rp. {{ number_format($orderSummary['total'], 0, ',', '.') }}</p>
            </div>
        </div>

        <div class="payment-options">
            <h4>Choose Payment Method</h4>

            <!-- Virtual Account Options -->
            <h5>Virtual Account</h5>
            <div class="payment-option">
                <label for="bca-virtual-account">
                    <input type="radio" id="bca-virtual-account" name="payment_method" value="bca" />
                    BCA Virtual Account
                </label>
            </div>
            <div class="payment-option">
                <label for="bni-virtual-account">
                    <input type="radio" id="bni-virtual-account" name="payment_method" value="bni" />
                    BNI Virtual Account
                </label>
            </div>
            <div class="payment-option">
                <label for="mandiri-virtual-account">
                    <input type="radio" id="mandiri-virtual-account" name="payment_method" value="mandiri" />
                    Mandiri Virtual Account
                </label>
            </div>
            <div class="payment-option">
                <label for="other-bank">
                    <input type="radio" id="other-bank" name="payment_method" value="other_bank" />
                    Other Bank
                </label>
            </div>

            <!-- Electronic Money Options -->
            <h5>Electronic Money</h5>
            <div class="payment-option">
                <label for="gopay">
                    <input type="radio" id="gopay" name="payment_method" value="gopay" />
                    GoPay
                </label>
            </div>
            <div class="payment-option">
                <label for="shopeepay">
                    <input type="radio" id="shopeepay" name="payment_method" value="shopeepay" />
                    ShopeePay
                </label>
            </div>
            <div class="payment-option">
                <label for="dana">
                    <input type="radio" id="dana" name="payment_method" value="dana" />
                    DANA
                </label>
            </div>
            <div class="payment-option">
                <label for="linkaja">
                    <input type="radio" id="linkaja" name="payment_method" value="linkaja" />
                    LinkAja
                </label>
            </div>

            <!-- Submit Button -->
            <form action="{{ route('process-payment') }}" method="POST">
                @csrf
                <button type="submit" class="pay-now-btn">Pay Now</button>
            </form>
        </div>
    </div>
@endsection
