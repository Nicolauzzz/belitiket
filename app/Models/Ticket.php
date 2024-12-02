<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = [
        'event_id',        // ID dari event terkait
        'class_ticket',    // Jenis kelas tiket, misalnya 'VIP', 'Reguler'
        'harga',           // Harga tiket
        'kuota'            // Kuota tiket yang tersedia
    ];

    // Relasi ke model Event
    public function event()
    {
        return $this->belongsTo(Event::class, 'event_id');
    }
}
