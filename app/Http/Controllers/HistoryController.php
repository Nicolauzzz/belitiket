<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Orders;
use illuminate\Http\Request;


class HistoryController extends Controller
{
    public function index()
    {
        // Ambil data riwayat pembelian user yang login
        $historyData = Orders::with('user', 'ticket')
            ->where('user_id', auth()->id()) // Filter berdasarkan user login
            ->get();

        return view('history.history', compact('historyData'));
    }

}
