<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Koperasi;

class KoperasiController extends Controller
{
    public function index()
    {
        $koperasis = Koperasi::all();

        return view('koperasi.index', compact('koperasis'));
    }

    public function create()
    {
        return view('koperasi.create');
    }

    public function store(Request $request)
    {
        Koperasi::create([
            'nama_barang' => $request->nama_barang,
            'harga' => $request->harga,
            'stok' => $request->stok,
            'gambar' => $request->gambar
        ]);

        return redirect('/koperasi')
            ->with('success', 'Barang berhasil ditambahkan');
    }

    public function edit($id)
    {
        $koperasi = Koperasi::findOrFail($id);

        return view('koperasi.edit', compact('koperasi'));
    }

    public function update(Request $request, $id)
    {
        $koperasi = Koperasi::findOrFail($id);

        $koperasi->update([
            'nama_barang' => $request->nama_barang,
            'harga' => $request->harga,
            'stok' => $request->stok,
            'gambar' => $request->gambar
        ]);

        return redirect('/koperasi')
            ->with('success', 'Barang berhasil diupdate');
    }

    public function destroy($id)
    {
        $koperasi = Koperasi::findOrFail($id);

        $koperasi->delete();

        return redirect('/koperasi')
            ->with('success', 'Barang berhasil dihapus');
    }
}