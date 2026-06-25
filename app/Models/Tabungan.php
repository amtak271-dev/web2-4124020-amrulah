<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Santri;

class Tabungan extends Model
{
    protected $fillable = [
        'santri_id',
        'jumlah',
        'tipe',
        'keterangan'
    ];

    public function santri()
    {
        return $this->belongsTo(Santri::class);
    }
}