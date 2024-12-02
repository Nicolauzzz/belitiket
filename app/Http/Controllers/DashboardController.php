<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class DashboardController extends Controller
{
    public function index()
    {
        //ngambil semua event beserta tiketnya
        $events = Event::with('tickets')->get(); // Mengambil semua event

        //Mengirim data event ke view 'index'
        return view('dashboard.index', compact('events'));
    }
}
