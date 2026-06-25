<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaksi extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'jumlah',
        'total_harga',
        'keterangan',
        'tanggal_transaksi',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}