<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Pesanan;
use App\Models\Koperasi;
use App\Models\Santri;
use App\Models\Tabungan;

class PesananController extends Controller
{
    // SANTRI MEMESAN
    public function store(Request $request)
    {
        $request->validate([
            'koperasi_id'=>'required',
            'jumlah'=>'required|integer|min:1'
        ]);

        $koperasi = Koperasi::findOrFail($request->koperasi_id);

        if($request->jumlah > $koperasi->stok){
            return back()->with('error','Stok tidak mencukupi');
        }

        // stok langsung berkurang
        $koperasi->stok -= $request->jumlah;
        $koperasi->save();

        Pesanan::create([
            'user_id'=>Auth::id(),
            'koperasi_id'=>$koperasi->id,
            'jumlah'=>$request->jumlah,
            'total_harga'=>$koperasi->harga * $request->jumlah,
            'status'=>'Menunggu'
        ]);

        return back()->with('success','Pesanan berhasil dikirim');
    }

    // ADMIN
    public function index()
    {
        $pesanans = Pesanan::with(['user','koperasi'])
                    ->latest()
                    ->get();

        return view('admin.pesanan',compact('pesanans'));
    }

    public function acc($id)
{
    $pesanan = Pesanan::findOrFail($id);

    // Jangan ACC dua kali
    if ($pesanan->status != 'Menunggu') {
        return back();
    }

    // Cari data santri berdasarkan user yang memesan
    $santri = Santri::where('user_id', $pesanan->user_id)->first();

    if (!$santri) {
        return back()->with('error', 'Data santri tidak ditemukan.');
    }

    // Hitung saldo santri
    $totalSetor = Tabungan::where('santri_id', $santri->id)
        ->where('tipe', 'setor')
        ->sum('jumlah');

    $totalTarik = Tabungan::where('santri_id', $santri->id)
        ->where('tipe', 'tarik')
        ->sum('jumlah');

    $saldo = $totalSetor - $totalTarik;

    // Cek apakah saldo cukup
    if ($saldo < $pesanan->total_harga) {

        // kembalikan stok
        $barang = $pesanan->koperasi;
        $barang->stok += $pesanan->jumlah;
        $barang->save();

        $pesanan->status = 'Ditolak';
        $pesanan->save();

        return back()->with('error', 'Saldo santri tidak mencukupi.');
    }

    // Simpan transaksi tarik
    Tabungan::create([
        'santri_id' => $santri->id,
        'tipe' => 'tarik',
        'jumlah' => $pesanan->total_harga,
        'keterangan' => 'Pembelian Koperasi - '.$pesanan->koperasi->nama_barang,
    ]);

    // Ubah status pesanan
    $pesanan->status = 'Disetujui';
    $pesanan->save();

    return back()->with('success', 'Pesanan berhasil disetujui.');
}

    public function tolak($id)
    {
        $pesanan = Pesanan::findOrFail($id);

        // stok dikembalikan
        $barang = $pesanan->koperasi;

        $barang->stok += $pesanan->jumlah;
        $barang->save();

        $pesanan->status = 'Ditolak';
        $pesanan->save();

        return back();
    }
}