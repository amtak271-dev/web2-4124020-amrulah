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
        $namaFile = null;

        if ($request->hasFile('gambar')) {

            $file = $request->file('gambar');

            $namaFile = time() . '.' . $file->getClientOriginalExtension();

            $file->move(public_path('images/Koperasi'), $namaFile);
        }

        Koperasi::create([
            'nama_barang' => $request->nama_barang,
            'harga' => $request->harga,
            'stok' => $request->stok,
            'gambar' => $namaFile
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

        $namaFile = $koperasi->gambar;

        if ($request->hasFile('gambar')) {

            $file = $request->file('gambar');

            $namaFile = time() . '.' . $file->getClientOriginalExtension();

            $file->move(public_path('images/Koperasi'), $namaFile);
        }

        $koperasi->update([
            'nama_barang' => $request->nama_barang,
            'harga' => $request->harga,
            'stok' => $request->stok,
            'gambar' => $namaFile
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

    public function koperasiSantri()
    {
        $koperasis = Koperasi::all();

        return view('santri.koperasi', compact('koperasis'));
    }
}