@extends('layout.layout')
@section('title', 'Riwayat Pembelian')
@section('content')

    <h1>Riwayat Pembelian</h1>
    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <ul>
        @foreach ($historyData as $order)
            <li>
                <p><strong>Pembelian ID:</strong> {{ $order->id }}</p>
                <p><strong>Nama Event:</strong> {{ $order->event->nama_acara }}</p>
                <p><strong>Nama Tiket:</strong> {{ $order->ticket->name }}</p>
                <p><strong>Jumlah Tiket:</strong> {{ $order->quantity }}</p>
                <p><strong>Harga:</strong> Rp. {{ number_format($order->harga, 0, ',', '.') }}</p>
                <p><strong>Waktu Pembelian:</strong> {{ $order->waktu_pembelian }}</p>
                <p><strong>Status:</strong> {{ $order->status }}</p>
            </li>
        @endforeach
    </ul>
@endsection
