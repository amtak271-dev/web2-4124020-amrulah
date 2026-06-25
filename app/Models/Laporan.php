<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Laporan extends Model
{
    use HasFactory;

    protected $fillable = [
        'santri_id',
        'judul',
        'isi',
        'balasan',
        'status',
    ];

    public function santri()
    {
        return $this->belongsTo(Santri::class);
    }
}