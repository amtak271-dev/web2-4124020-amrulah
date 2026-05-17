<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tabungan extends Model
{
    protected $fillable = [
        'santri_id',
        'jumlah',
        'tipe',
        'keterangan',
        'status'
    ];

    public function santri()
    {
        return $this->belongsTo(Santri::class);
    }
}