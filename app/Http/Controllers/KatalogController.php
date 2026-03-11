<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KatalogController extends Controller
{
    public function index()
    {
        $produk = [
            ['id'=>1,'nama'=>'Nasi Goreng','harga'=>15000],
            ['id'=>2,'nama'=>'Mie Ayam','harga'=>12000],
            ['id'=>3,'nama'=>'Bakso','harga'=>13000],
            ['id'=>4,'nama'=>'Sate Ayam','harga'=>20000],
            ['id'=>5,'nama'=>'Es Teh','harga'=>5000],
        ];

        return view('katalog.index', compact('produk'));
    }

    public function show($id)
    {
        $produk = [
            ['id'=>1,'nama'=>'Nasi Goreng','harga'=>15000],
            ['id'=>2,'nama'=>'Mie Ayam','harga'=>12000],
            ['id'=>3,'nama'=>'Bakso','harga'=>13000],
            ['id'=>4,'nama'=>'Sate Ayam','harga'=>20000],
            ['id'=>5,'nama'=>'Es Teh','harga'=>5000],
        ];

        foreach ($produk as $p) {
            if ($p['id'] == $id) {
                return view('katalog.show', compact('p'));
            }
        }
    }
}