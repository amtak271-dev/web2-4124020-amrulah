<?php

namespace App\Http\Controllers;

use App\Models\Tabungan;
use App\Models\Santri;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $totalUser = User::count();
        $totalSantri = Santri::count();
        $totalTabungan = Tabungan::sum('jumlah');

        $tabungans = Tabungan::with('santri')
            ->latest()
            ->take(5)
            ->get();

        return view('admin.dashboard', compact(
            'totalUser',
            'totalSantri',
            'totalTabungan',
            'tabungans'
        ));
    }
}