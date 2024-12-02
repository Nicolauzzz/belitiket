@extends('layout.layout')
@section('title', $event->nama_acara)
@section('content')

    <div class="buy-ticket-page">
        <div class="ticket-category">
            <h2>Kategori Tiket</h2>
            @foreach ($ticketOptions as $ticket)
                <div class="ticket-option" data-ticket-id="{{ $ticket->id }}" data-ticket-price="{{ $ticket->harga }}">
                    <div class="ticket-type">{{ $ticket->tipe_tiket }}</div>
                    <div class="ticket-price">Rp. {{ number_format($ticket->harga, 0, ',', '.') }}</div>
                    <div class="ticket-quantity">
                        <button class="quantity-btn minus-btn">-</button>
                        <span class="quantity-value">0</span>
                        <button class="quantity-btn plus-btn">+</button>
                    </div>
                </div>

            @endforeach
        </div>

        <div class="order-summary">
            <h3>Detail Pesanan</h3>
            <div class="event-detail">
                <img src="{{ asset('images/' . $event->gambar) }}" alt="{{ $event->nama_acara }}">
                <div class="event-text">
                    <p>{{ $event->nama_acara }}</p>
                    <p>{{ \Carbon\Carbon::parse($event->tanggal)->translatedFormat('d F Y') }}</p>
                    <p>{{ $event->lokasi }}</p>
                </div>
            </div>
            <div class="order-total">
                <p><span id="total-tickets">0</span> Tiket Dipesan</p>
                <p>Total: Rp. <span id="total-price">0</span></p>
            </div>
            <a href="{{ route('checkout', $event->id) }}" class="checkout-btn">Check Out</a>
        </div>
    </div>

    {{--script buat order total--}}
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const ticketOptions = document.querySelectorAll('.ticket-option');
            const totalTicketsElem = document.getElementById('total-tickets');
            const totalPriceElem = document.getElementById('total-price');

            ticketOptions.forEach(option => {
                const minusBtn = option.querySelector('.minus-btn');
                const plusBtn = option.querySelector('.plus-btn');
                const quantityElem = option.querySelector('.quantity-value');
                const ticketPrice = parseFloat(option.dataset.ticketPrice);

                minusBtn.addEventListener('click', () => {
                    let currentQuantity = parseInt(quantityElem.textContent);
                    if (currentQuantity > 0) {
                        currentQuantity -= 1;
                        quantityElem.textContent = currentQuantity;
                        updateSummary();
                    }
                });

                plusBtn.addEventListener('click', () => {
                    let currentQuantity = parseInt(quantityElem.textContent);
                    currentQuantity += 1;
                    quantityElem.textContent = currentQuantity;
                    updateSummary();
                });
            });

            function updateSummary() {
                let totalTickets = 0;
                let totalPrice = 0;

                ticketOptions.forEach(option => {
                    const quantity = parseInt(option.querySelector('.quantity-value').textContent);
                    const price = parseFloat(option.dataset.ticketPrice);

                    totalTickets += quantity;
                    totalPrice += quantity * price;
                });

                totalTicketsElem.textContent = totalTickets;
                totalPriceElem.textContent = totalPrice.toLocaleString('id-ID');
            }
        });

    </script>

    {{--script buat menarik data ke page checkout--}}
    <script>
        document.querySelector('.checkout-btn').addEventListener('click', function (e) {
            const ticketOptions = document.querySelectorAll('.ticket-option');
            const orderSummary = [];

            ticketOptions.forEach(option => {
                const quantity = parseInt(option.querySelector('.quantity-value').textContent);
                if (quantity > 0) {
                    orderSummary.push({
                        ticketType: option.querySelector('.ticket-type').textContent,
                        quantity: quantity,
                        price: parseFloat(option.dataset.ticketPrice)
                    });
                }
            });

            document.getElementById('order-summary-input').value = JSON.stringify(orderSummary);
        });
    </script>
@endsection
