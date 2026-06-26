@extends('layouts.santri')

@section('content')

<!-- HEADER -->
<div class="header dashboard-header">

    <div>

        <h1>
            Halo, {{ $santri->nama }} 
        </h1>

        <p>
            Selamat datang di SantriPay.
            Kelola tabunganmu dengan mudah.
        </p>

    </div>

    <div>

        @if($santri->foto)

            <img
                src="{{ asset('storage/' . $santri->foto) }}"
                class="dashboard-photo"
            >

        @else

            <div class="dashboard-avatar">
                <i class="fa-solid fa-user"></i>
            </div>

        @endif

    </div>

</div>

<!-- STATUS TABUNGAN -->
<div class="status-card">

    <h3>Status Tabungan</h3>

    <br>

    @if($statusTabungan == 'aktif')

        <h2>🟢 Aktif</h2>
        <p>{{ $pesanStatus }}</p>

    @elseif($statusTabungan == 'minus')

        <h2>🔴 Minus</h2>
        <p>{{ $pesanStatus }}</p>

    @else

        <h2>🟡 Belum Aktif</h2>
        <p>{{ $pesanStatus }}</p>

    @endif

</div>

<!-- GRID -->
<div class="dashboard-grid">

    <!-- STATISTIK -->
    <div class="status-card statistik-card">

        <h3>
            📊 Statistik Aktivitas Tabungan
        </h3>

        <p class="subtitle">
            Aktivitas setor dan tarik per hari
        </p>

        <canvas id="chartAktivitas"></canvas>

    </div>

    <!-- PENGUMUMAN -->
    <div class="status-card">

        <h3>📢 Pengumuman</h3>

        <div class="pengumuman-item">

            <h4>💰 Jadwal Layanan Tabungan</h4>

            <p>
                Senin - Jumat<br>
                08.00 - 15.00 WIB
            </p>

        </div>

        <div class="pengumuman-item">

            <h4>🛒 Jam Operasional Koperasi</h4>

            <p>
                Setiap Hari<br>
                07.00 - 17.00 WIB
            </p>

        </div>

        <div class="pengumuman-item">

            <h4>📌 Informasi Admin</h4>

            <p>
                Jika mengalami kendala pada tabungan,
                koperasi, atau akun SantriPay,
                silakan menghubungi admin pesantren.
            </p>

        </div>

    </div>

</div>

<!-- CHART JS -->

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>

var hari =
JSON.parse(
'@json($hari)'
);

var dataSetor =
JSON.parse(
'@json($dataSetor)'
);

var dataTarik =
JSON.parse(
'@json($dataTarik)'
);

var ctx =
document.getElementById(
    'chartAktivitas'
);

new Chart(ctx, {

    type: 'bar',

    data: {

        labels: hari,

        datasets: [

            {
                label: 'Setor',
                data: dataSetor,
                borderWidth: 1,
                backgroundColor:'#d4af37'
            },

            {
                label: 'Tarik',
                data: dataTarik,
                borderWidth: 1,
                backgroundColor:'#1e293b'
            }

        ]

    },

    options: {

        responsive: true,

        plugins: {

            legend: {
                position: 'top'
            }

        },

        scales: {

            y: {
                beginAtZero: true
            }

        }

    }

});

</script>

@endsection