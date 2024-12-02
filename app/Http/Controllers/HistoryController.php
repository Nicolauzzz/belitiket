<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Orders;
use illuminate\Http\Request;


class HistoryController extends Controller
{
    public function index()
    {
        //AMBIL DATA riwayat dengan relasi user dan tiker
        $historyData = Orders::with('user','ticket')->get();
        return view('history.history', compact('historyData'));
    }
}
