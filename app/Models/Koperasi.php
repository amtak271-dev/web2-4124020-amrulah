<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Koperasi extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_barang',
        'harga',
        'stok',
        'gambar',
    ];
}