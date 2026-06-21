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
            'jumlah' => 'required|numeric',
            'tipe' => 'required',
        ]);

        Tabungan::create([
            'santri_id' => $request->santri_id,
            'jumlah' => $request->jumlah,
            'tipe' => $request->tipe,
            'keterangan' => $request->keterangan,
        ]);

        return redirect('/tabungan')
                ->with('success', 'Transaksi berhasil ditambahkan');
    }
}