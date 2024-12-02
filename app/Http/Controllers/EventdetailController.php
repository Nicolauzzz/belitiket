<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class EventdetailController extends Controller
{
    public function show($id)
    {
        // Mengambil event berdasarkan ID dengan relasi 'ticketOptions'
        $event = Event::with('tickets')->findOrFail($id);

        // Menampilkan view 'eventdetail' dengan data event
        return view('dashboard.eventdetail', compact('event'));
    }
}
