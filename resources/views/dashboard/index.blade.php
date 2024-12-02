@extends('layout.layout')

@section('title', 'Dashboard-belitiket.com')

@section('content')

    <h1 class="text-center text-orange">Hottest Event This Month</h1>

    <!-- Carousel Container -->
    <div class="carousel-container">
        <!-- Navigation Arrows -->
        <button class="prev" onclick="scrollCarousel(-1)">&#10094;</button>

        <div class="carousel">
            @foreach($events as $event)
                <a href="{{ route('event.show', ['id' => $event->id]) }}" class="card-link">
                <div class="card">
                    <img src="{{ asset('images/' . $event->gambar) }}" alt="No Images">
                    <h3>{{ $event->nama_acara }}</h3>
                    <p>{{ $event->detail }}</p>
                    <p>{{ $event->lokasi }}</p>
                </div>
                </a>
            @endforeach
        </div>

        <button class="next" onclick="scrollCarousel(1)">&#10095;</button>
    </div>

    <script>
        function scrollCarousel(direction) {
            const carousel = document.querySelector('.carousel');
            const cardWidth = document.querySelector('.card').offsetWidth;
            carousel.scrollBy({ left: cardWidth * direction, behavior: 'smooth' });
        }
    </script>



@endsection
