@extends('layouts.santri')

@section('content')

<div class="header">
    <h1>Riwayat Tabungan</h1>
    <p>Riwayat transaksi {{ $santri->nama }}</p>
</div>

<div class="stat-card" style="width:100%;">

    <table width="100%" cellpadding="15">

        <thead>
            <tr>
                <th>Tanggal</th>
                <th>Tipe</th>
                <th>Jumlah</th>
                <th>Keterangan</th>
            </tr>
        </thead>

        <tbody>

            @forelse($tabungans as $tabungan)

                <tr>
                    <td>
                        {{ $tabungan->created_at->format('d-m-Y') }}
                    </td>

                    <td>
                        {{ ucfirst($tabungan->tipe) }}
                    </td>

                    <td>
                        Rp {{ number_format($tabungan->jumlah,0,',','.') }}
                    </td>

                    <td>
                        {{ $tabungan->keterangan }}
                    </td>
                </tr>

            @empty

                <tr>
                    <td colspan="4">
                        Belum ada transaksi
                    </td>
                </tr>

            @endforelse

        </tbody>

    </table>

</div>

@endsection