<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buyer extends Model
{
    use HasFactory;

    /**
     * Table name (opsional jika nama tabel berbeda dari plural model)
     */
    protected $table = 'buyers';

    /**
     * Mass assignable attributes.
     * Daftar kolom yang diizinkan untuk diisi melalui metode mass assignment.
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone_number',
    ];

    /**
     * Relationship to tickets (opsional jika buyer berhubungan dengan ticket)
     * Contoh relasi one-to-many dengan model Ticket.
     */
    public function ticket()
    {
        return $this->hasMany(Ticket::class);
    }
}
