<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Pesanan;
use App\Models\Koperasi;

class PesananController extends Controller
{
    public function store(Request $request)
    {
        $koperasi = Koperasi::findOrFail($request->koperasi_id);

        $total = $koperasi->harga * $request->jumlah;

        Pesanan::create([
            'user_id' => Auth::id(),
            'koperasi_id' => $koperasi->id,
            'jumlah' => $request->jumlah,
            'total_harga' => $total,
            'status' => 'Menunggu'
        ]);

        return redirect()->back()->with(
            'success',
            'Pesanan berhasil dibuat'
        );
    }
}