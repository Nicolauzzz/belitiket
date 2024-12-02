<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PHPUnit\Framework\Attributes\Ticket;


class Orders extends Model
{

    use HasFactory;

    protected $table = 'orders';

    // Kolom yang dapat diisi
    protected $fillable = [   // Menyebutkan kolom yang bisa diisi (mass assignable)
        'user_id',
        'ticket_id',
        'quantity',
        'harga',
        'waktu_pembelian',
    ];


    // Relasi dengan model User (FK: user_id)
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Relasi dengan model Ticket (FK: ticket_id)
    public function ticket()
    {
        return $this->belongsTo(Ticket::class, 'ticket_id');
    }

}
