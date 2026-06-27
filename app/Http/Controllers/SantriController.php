<?php

namespace App\Http\Controllers;

use App\Models\Santri;
use Illuminate\Http\Request;

class SantriController extends Controller
{
    public function index()
    {
        $santris = Santri::all();
        return view('santri.index', compact('santris'));
    }

    public function create()
    {
        return view('santri.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'nis' => 'required',
            'kelas' => 'required',
            'alamat' => 'required',
        ]);

        Santri::create([
            'nama' => $request->nama,
            'nis' => $request->nis,
            'kelas' => $request->kelas,
            'alamat' => $request->alamat,
        ]);

        return redirect()->route('santri.index')
                         ->with('success', 'Data santri berhasil ditambahkan');
    }

    public function show(Santri $santri)
    {
        //
    }

    public function edit(Santri $santri)
    {
        return view('santri.edit', compact('santri'));
    }

    public function update(Request $request, Santri $santri)
    {
        $request->validate([
            'nama' => 'required',
            'nis' => 'required',
            'kelas' => 'required',
            'alamat' => 'required',
        ]);

        $santri->update([
            'nama' => $request->nama,
            'nis' => $request->nis,
            'kelas' => $request->kelas,
            'alamat' => $request->alamat,
        ]);

        return redirect()->route('santri.index')
                         ->with('success', 'Data santri berhasil diubah');
    }

    public function destroy(Santri $santri)
    {
        $santri->delete();

        return redirect()->route('santri.index')
                         ->with('success', 'Data santri berhasil dihapus');
    }
}