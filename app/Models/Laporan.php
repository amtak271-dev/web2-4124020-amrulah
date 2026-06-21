<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    protected $fillable = [
    'santri_id',
    'judul',
    'isi',
    'status',
    'balasan'
];
public function santri()
{
    return $this->belongsTo(
        Santri::class
    );
}
}