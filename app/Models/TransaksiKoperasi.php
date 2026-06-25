<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TransaksiKoperasi extends Model
{
    use HasFactory;

    protected $table = 'transaksi_koperasi';

    protected $fillable = [
        'user_id',
        'koperasi_id',
        'jumlah',
        'total_harga',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function koperasi()
    {
        return $this->belongsTo(Koperasi::class);
    }
}