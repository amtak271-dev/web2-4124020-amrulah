@extends('layouts.santri')

@section('content')

<div class="header">

    <h1>Laporan Santri</h1>

    <p>
        Sampaikan keluhan, saran, atau laporan kepada admin.
    </p>

</div>

<!-- FORM LAPORAN -->
<div class="stat-card" style="width:100%;">

    @if(session('success'))

        <div
            style="
                background:#d1fae5;
                color:#065f46;
                padding:12px;
                border-radius:10px;
                margin-bottom:20px;
            "
        >
            {{ session('success') }}
        </div>

    @endif

    <form action="{{ route('laporan.store') }}" method="POST">

        @csrf

        <label>Judul Laporan</label>

        <input
            type="text"
            name="judul"
            required
            placeholder="Masukkan judul laporan"
            style="
                width:100%;
                padding:12px;
                margin-top:10px;
                margin-bottom:20px;
                border:1px solid #ddd;
                border-radius:10px;
            "
        >

        <label>Isi Laporan</label>

        <textarea
            name="isi"
            rows="8"
            required
            placeholder="Tuliskan laporan Anda..."
            style="
                width:100%;
                padding:12px;
                margin-top:10px;
                border:1px solid #ddd;
                border-radius:10px;
            "
        ></textarea>

        <br><br>

        <button
            type="submit"
            class="logout-btn"
        >
            Kirim Laporan
        </button>

    </form>

</div>

<br>

<!-- RIWAYAT LAPORAN -->
<div class="stat-card" style="width:100%;">

    <h2>Riwayat Laporan</h2>

    <br>

    @if($laporans->count())

        <table
            width="100%"
            border="1"
            cellpadding="10"
            cellspacing="0"
        >

            <tr>
                <th>Judul</th>
                <th>Status</th>
                <th>Balasan Admin</th>
            </tr>

            @foreach($laporans as $laporan)

            <tr>

                <td>
                    {{ $laporan->judul }}
                </td>

                <td>

                    @if($laporan->status == 'baru')

                        🟡 Baru

                    @elseif($laporan->status == 'diproses')

                        🔵 Diproses

                    @elseif($laporan->status == 'selesai')

                        🟢 Selesai

                    @endif

                </td>

                <td>

                    {{ $laporan->balasan ?? '-' }}

                </td>

            </tr>

            @endforeach

        </table>

    @else

        <p>
            Belum ada laporan.
        </p>

    @endif

</div>

@endsection

