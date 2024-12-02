@extends('layout.layout')
@section('title', $event->nama_acara)
@section('content')

    <div class="event-container">
        <!-- Event Image -->
        <div class="event-image">
            <img src="{{ asset('images/' . $event->gambar) }}" alt="{{ $event->nama_acara }}">
        </div>

        <!-- Event and Ticket Information Section -->
        <div class="event-info-ticket">
            <!-- Event Information -->
            <div class="event-info">
                <h3>{{ $event->nama_acara }}</h3>
                <div class="event-details">
                    <p><i class="fa fa-map-marker"></i> {{ $event->lokasi }}</p>
                    <p><i class="fa fa-calendar"></i> {{ $event->detail }}</p>
                </div>
            </div>

            <!-- Ticket Information -->
            <div class="ticket-info">
                <p>Tickets starting at</p>
                <h3>Rp. {{ number_format($event->tickets->min('harga'), 0, ',', '.') }}</h3>
                <a href="{{ route('buy-ticket', $event->id) }}" class="buy-ticket-button">Buy Tickets</a>
            </div>
        </div>
    </div>

    <!-- Event Description -->
    <h3>Deskripsi</h3>
    <p class="event-description">{{ $event->deskripsi }}</p>

@endsection
