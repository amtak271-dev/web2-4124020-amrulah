<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Santri extends Model
{
    protected $fillable = [
    'user_id',
    'nama',
    'nis',
    'kelas',
    'alamat',
    'foto'
];

    // Relasi ke tabungan
    public function tabungans()
    {
        return $this->hasMany(Tabungan::class);
    }
}