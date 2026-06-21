<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Santri;
use App\Models\Laporan;

class LaporanController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | HALAMAN LAPORAN SANTRI
    |--------------------------------------------------------------------------
    */

    public function indexSantri()
    {
        $santri = Santri::where(
            'user_id',
            Auth::id()
        )->first();

        $laporans = Laporan::where(
            'santri_id',
            $santri->id
        )
        ->latest()
        ->get();

        return view(
            'santri.laporan',
            compact(
                'santri',
                'laporans'
            )
        );
    }

    /*
    |--------------------------------------------------------------------------
    | SIMPAN LAPORAN
    |--------------------------------------------------------------------------
    */

    public function store(Request $request)
    {
        $santri = Santri::where(
            'user_id',
            Auth::id()
        )->first();

        $request->validate([
            'judul' => 'required',
            'isi' => 'required'
        ]);

        Laporan::create([
            'santri_id' => $santri->id,
            'judul' => $request->judul,
            'isi' => $request->isi,
            'status' => 'baru'
        ]);

        return back()->with(
            'success',
            'Laporan berhasil dikirim'
        );
    }

    /*
    |--------------------------------------------------------------------------
    | HALAMAN LAPORAN ADMIN
    |--------------------------------------------------------------------------
    */

    public function indexAdmin()
    {
        $laporans = Laporan::latest()->get();

        return view(
            'admin.laporan',
            compact('laporans')
        );
    }

    /*
    |--------------------------------------------------------------------------
    | UPDATE STATUS & BALASAN
    |--------------------------------------------------------------------------
    */

    public function updateLaporan(
        Request $request,
        $id
    )
    {
        $laporan = Laporan::findOrFail($id);

        $laporan->update([
            'status' => $request->status,
            'balasan' => $request->balasan
        ]);

        return back()->with(
            'success',
            'Laporan berhasil diperbarui'
        );
    }
}

