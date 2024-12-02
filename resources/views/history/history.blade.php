@extends('layout.layout')
@section('title', 'Riwayat Pembelian')
@section('content')


    <h1>Riwayat Pembelian</h1>
    <ul>
        @foreach ($historyData as $order)
            <li>
                Pembelian ID: {{ $order->id }} <br>
                User: {{ $order->user->name }} <br>
                Tiket: {{ $order->ticket->name }} <br>
                Jumlah: {{ $order->quantity }} <br>
                Harga: {{ $order->harga }} <br>
                Waktu Pembelian: {{ $order->waktu_pembelian }}
            </li>
        @endforeach
    </ul>
@endsection
