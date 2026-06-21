<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\TabunganController;
use App\Http\Controllers\KoperasiController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\TentangController;
use App\Http\Controllers\SantriController;
use App\Http\Controllers\PesananController;

use App\Models\Santri;
use App\Models\Pesanan;
use App\Models\Tabungan;


/*
|--------------------------------------------------------------------------
| HALAMAN AWAL
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return redirect('/login');
});

/*
|--------------------------------------------------------------------------
| LOGIN
|--------------------------------------------------------------------------
*/

Route::get('/login', [AuthController::class, 'showLogin'])
    ->name('login');

Route::post('/login', [AuthController::class, 'login']);

Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth');

/*
|--------------------------------------------------------------------------
| HALAMAN SETELAH LOGIN
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    /*
    |--------------------------------------------------------------------------
    | BERANDA
    |--------------------------------------------------------------------------
    */

    Route::get('/beranda', [BerandaController::class, 'index'])
        ->name('beranda');

    /*
    |--------------------------------------------------------------------------
    | TABUNGAN
    |--------------------------------------------------------------------------
    */

    Route::resource('tabungan', TabunganController::class);

    /*
    |--------------------------------------------------------------------------
    | KOPERASI
    |--------------------------------------------------------------------------
    */

    Route::resource('koperasi', KoperasiController::class);

    /*
    |--------------------------------------------------------------------------
    | LAPORAN
    |--------------------------------------------------------------------------
    */

        Route::get(
            '/laporan-santri',
            [LaporanController::class, 'indexSantri']
        );

        Route::get(
            '/laporan-admin',
            [LaporanController::class, 'indexAdmin']
        );

        Route::post(
            '/laporan-santri',
            [LaporanController::class, 'store']
        )->name('laporan.store');

        Route::post(
            '/laporan/{id}/update',
            [LaporanController::class, 'updateLaporan']
        );


    /*
    |--------------------------------------------------------------------------
    | TENTANG
    |--------------------------------------------------------------------------
    */

    Route::get('/tentang', [TentangController::class, 'index']);

    /*
    |--------------------------------------------------------------------------
    | DATA SANTRI
    |--------------------------------------------------------------------------
    */

    Route::resource('santri', SantriController::class);

    /*
    |--------------------------------------------------------------------------
    | ADMIN DASHBOARD
    |--------------------------------------------------------------------------
    */

    Route::get('/admin', function () {

        if (Auth::user()->role != 'admin') {
            abort(403);
        }

        // Total santri
        $totalSantri = Santri::count();

        // Total transaksi
        $totalTransaksi = Tabungan::count();

        // Total saldo
        $totalSaldo =
            Tabungan::where('tipe', 'setor')->sum('jumlah')
            -
            Tabungan::where('tipe', 'tarik')->sum('jumlah');

        // Setoran hari ini
        $setoranHariIni =
            Tabungan::where('tipe', 'setor')
                ->whereDate('created_at', today())
                ->sum('jumlah');

        // Pesanan koperasi
        $pesanan = Pesanan::latest()->get();

        return view('admin.dashboard', compact(
            'totalSantri',
            'totalTransaksi',
            'totalSaldo',
            'setoranHariIni',
            'pesanan'
        ));
    });

    /*
    |--------------------------------------------------------------------------
    | DASHBOARD SANTRI
    |--------------------------------------------------------------------------
    */

    Route::get('/dashboard-santri', function () {

        $santri = Santri::where(
            'user_id',
            Auth::id()
        )->first();

        if (!$santri) {
            return redirect('/login');
        }

        // Total setor
        $totalSetor = Tabungan::where(
            'santri_id',
            $santri->id
        )
        ->where('tipe', 'setor')
        ->sum('jumlah');

        // Total tarik
        $totalTarik = Tabungan::where(
            'santri_id',
            $santri->id
        )
        ->where('tipe', 'tarik')
        ->sum('jumlah');

        // Saldo akhir
        $saldo = $totalSetor - $totalTarik;
        // Status tabungan
if ($saldo > 0) {

    $statusTabungan = 'aktif';
    $pesanStatus = 'Saldo tersedia';

} elseif ($saldo < 0) {

    $statusTabungan = 'minus';
    $pesanStatus = 'Saldo minus, silakan setor';

} else {

    $statusTabungan = 'kosong';
    $pesanStatus = 'Belum ada tabungan';

}


// Statistik aktivitas tabungan
$hari = [
    'Senin',
    'Selasa',
    'Rabu',
    'Kamis',
    'Jumat',
    'Sabtu',
    'Minggu'
];

$hariMysql = [
    'Monday',
    'Tuesday',
    'Wednesday',
    'Thursday',
    'Friday',
    'Saturday',
    'Sunday'
];

$dataSetor = [];
$dataTarik = [];

foreach ($hariMysql as $index => $day) {

    $jumlahSetor = Tabungan::where(
        'santri_id',
        $santri->id
    )
    ->where('tipe', 'setor')
    ->whereRaw(
        'DAYNAME(created_at) = ?',
        [$day]
    )
    ->count();

    $jumlahTarik = Tabungan::where(
        'santri_id',
        $santri->id
    )
    ->where('tipe', 'tarik')
    ->whereRaw(
        'DAYNAME(created_at) = ?',
        [$day]
    )
    ->count();

    $dataSetor[] = $jumlahSetor;
    $dataTarik[] = $jumlahTarik;
}


        // Transaksi terakhir
        $transaksiTerakhir = Tabungan::where(
            'santri_id',
            $santri->id
        )->latest()->first();

        return view('santri.dashboard', compact(
            'santri',
            'saldo',
            'transaksiTerakhir',
            'statusTabungan',
            'pesanStatus',
            'dataSetor',
            'dataTarik',
            'hari'
        ));
    });

    /*
    |--------------------------------------------------------------------------
    | MENU SANTRI
    |--------------------------------------------------------------------------
    */

    // Saldo Saya
    Route::get('/saldo-santri', function () {

    $santri = Santri::where(
        'user_id',
        Auth::id()
    )->first();

    if (!$santri) {
        return redirect('/dashboard-santri');
    }

    // total setor
    $totalSetor = Tabungan::where(
        'santri_id',
        $santri->id
    )
    ->where('tipe', 'setor')
    ->sum('jumlah');

    // total tarik
    $totalTarik = Tabungan::where(
        'santri_id',
        $santri->id
    )
    ->where('tipe', 'tarik')
    ->sum('jumlah');

    // saldo akhir
    $saldo = $totalSetor - $totalTarik;

    // total transaksi
    $totalTransaksi = Tabungan::where(
        'santri_id',
        $santri->id
    )->count();

    // transaksi terakhir
    $transaksiTerakhir = Tabungan::where(
        'santri_id',
        $santri->id
    )->latest()->first();

    // 3 riwayat terakhir
    $riwayatTerakhir = Tabungan::where(
        'santri_id',
        $santri->id
    )->latest()->take(3)->get();

    return view('santri.saldo', compact(
        'santri',
        'saldo',
        'totalSetor',
        'totalTarik',
        'totalTransaksi',
        'transaksiTerakhir',
        'riwayatTerakhir'
    ));
});

    // Riwayat Tabungan
    Route::get('/riwayat-santri', function () {

        $santri = Santri::where(
            'user_id',
            Auth::id()
        )->first();

        if (!$santri) {
            return redirect('/dashboard-santri');
        }

        $tabungans = Tabungan::where(
            'santri_id',
            $santri->id
        )->latest()->get();

        return view('santri.riwayat', compact(
            'santri',
            'tabungans'
        ));
    });

    // Profil
    // Upload Foto Profil

// Profil
Route::get('/profil-santri', function () {

    $santri = Santri::where(
        'user_id',
        Auth::id()
    )->first();

    if (!$santri) {
        return redirect('/dashboard-santri');
    }

    return view('santri.profil', compact(
        'santri'
    ));

});

// Upload Foto Profil
Route::post('/upload-foto', function (\Illuminate\Http\Request $request) {

    $santri = Santri::where(
        'user_id',
        Auth::id()
    )->first();

    if (!$santri) {
        return back();
    }

    // validasi gambar
    $request->validate([
        'foto' => 'required|image|mimes:jpg,jpeg,png|max:2048'
    ]);

    // simpan foto
    $foto = $request->file('foto')
        ->store('santri', 'public');

    // update database
    $santri->update([
        'foto' => $foto
    ]);

    return back()->with(
        'success',
        'Foto berhasil diperbarui'
    );

});


    /*
    |--------------------------------------------------------------------------
    | KOPERASI SANTRI
    |--------------------------------------------------------------------------
    */

    Route::get('/koperasi-santri', [
        KoperasiController::class,
        'koperasiSantri'
    ]);

    Route::post('/pesanan', [
        PesananController::class,
        'store'
    ])->name('pesanan.store');
});

