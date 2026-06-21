@extends('layouts.santri')

@section('content')

<!-- HEADER -->
<div class="header dashboard-header">

    <div>

        <h1>
            Halo, {{ $santri->nama }} 👋
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

<!-- STATISTIK TABUNGAN -->
<div class="status-card statistik-card">

    <h3>
        📊 Statistik Aktivitas Tabungan
    </h3>

    <p class="subtitle">
        Aktivitas setor dan tarik per hari
    </p>

    <canvas id="chartAktivitas"></canvas>

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
                borderWidth: 1
            },

            {
                label: 'Tarik',
                data: dataTarik,
                borderWidth: 1
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
