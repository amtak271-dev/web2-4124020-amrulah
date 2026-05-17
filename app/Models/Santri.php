<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Santri extends Model
{
    protected $fillable = [
        'nama',
        'nis',
        'kelas',
        'alamat'
    ];

    // Relasi ke tabungan
    public function tabungans()
    {
        return $this->hasMany(Tabungan::class);
    }
}