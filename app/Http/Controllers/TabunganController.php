<?php

namespace App\Http\Controllers;

use App\Models\Tabungan;
use App\Models\Santri;
use Illuminate\Http\Request;

class TabunganController extends Controller
{
    public function index()
    {
        $tabungans = Tabungan::with('santri')->latest()->get();

        return view('tabungan.index', compact('tabungans'));
    }

    public function create()
    {
        $santris = Santri::all();

        return view('tabungan.create', compact('santris'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'santri_id' => 'required',
            'tipe' => 'required',
            'jumlah' => 'required',
        ]);

        Tabungan::create([
            'santri_id' => $request->santri_id,
            'tipe' => $request->tipe,

            // 🔥 FIX PENTING: hapus titik ribuan
            'jumlah' => (int) str_replace('.', '', $request->jumlah),

            'keterangan' => $request->keterangan,
        ]);

        return redirect('/tabungan')
                ->with('success', 'Transaksi berhasil ditambahkan');
    }
}