<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Koperasi;
use App\Models\Pesanan;

class KoperasiController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | HALAMAN KOPERASI ADMIN
    |--------------------------------------------------------------------------
    */

    public function index()
    {
        $koperasis = Koperasi::all();

        $pesanans = Pesanan::with([
            'user',
            'koperasi'
        ])
        ->latest()
        ->get();

        return view(
            'koperasi.index',
            compact(
                'koperasis',
                'pesanans'
            )
        );
    }

    /*
    |--------------------------------------------------------------------------
    | FORM TAMBAH BARANG
    |--------------------------------------------------------------------------
    */

    public function create()
    {
        return view('koperasi.create');
    }

    /*
    |--------------------------------------------------------------------------
    | SIMPAN BARANG
    |--------------------------------------------------------------------------
    */

    public function store(Request $request)
    {
        $namaFile = null;

        if ($request->hasFile('gambar')) {

            $file = $request->file('gambar');

            $namaFile = time().'.'.$file->getClientOriginalExtension();

            $file->move(
                public_path('images/Koperasi'),
                $namaFile
            );
        }

        Koperasi::create([

            'nama_barang' => $request->nama_barang,

            'harga' => $request->harga,

            'stok' => $request->stok,

            'gambar' => $namaFile

        ]);

        return redirect('/koperasi')
            ->with(
                'success',
                'Barang berhasil ditambahkan'
            );
    }

    /*
    |--------------------------------------------------------------------------
    | FORM EDIT
    |--------------------------------------------------------------------------
    */

    public function edit($id)
    {
        $koperasi = Koperasi::findOrFail($id);

        return view(
            'koperasi.edit',
            compact('koperasi')
        );
    }

    /*
    |--------------------------------------------------------------------------
    | UPDATE BARANG
    |--------------------------------------------------------------------------
    */

    public function update(Request $request, $id)
    {
        $koperasi = Koperasi::findOrFail($id);

        $namaFile = $koperasi->gambar;

        if ($request->hasFile('gambar')) {

            $file = $request->file('gambar');

            $namaFile = time().'.'.$file->getClientOriginalExtension();

            $file->move(
                public_path('images/Koperasi'),
                $namaFile
            );
        }

        $koperasi->update([

            'nama_barang' => $request->nama_barang,

            'harga' => $request->harga,

            'stok' => $request->stok,

            'gambar' => $namaFile

        ]);

        return redirect('/koperasi')
            ->with(
                'success',
                'Barang berhasil diupdate'
            );
    }

    /*
    |--------------------------------------------------------------------------
    | HAPUS BARANG
    |--------------------------------------------------------------------------
    */

    public function destroy($id)
    {
        $koperasi = Koperasi::findOrFail($id);

        $koperasi->delete();

        return redirect('/koperasi')
            ->with(
                'success',
                'Barang berhasil dihapus'
            );
    }

    /*
    |--------------------------------------------------------------------------
    | HALAMAN KOPERASI SANTRI
    |--------------------------------------------------------------------------
    */

    public function koperasiSantri()
    {
        $koperasis = Koperasi::all();

        $pesanans = Pesanan::with('koperasi')
            ->where('user_id', Auth::id())
            ->latest()
            ->get();

        return view(
            'santri.koperasi',
            compact(
                'koperasis',
                'pesanans'
            )
        );
    }
}