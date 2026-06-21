<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    protected $fillable = [
        'user_id',
        'koperasi_id',
        'jumlah',
        'total_harga',
        'status'
    ];
}