@extends('layouts.admin')

@section('content')

<div class="header">
    <h1>Data Tabungan</h1>
    <p>Riwayat transaksi tabungan santri</p>
</div>

<div style="margin-bottom:25px;">
    <a href="{{ url('/tabungan/create') }}" class="btn btn-gold">
        + Tambah Transaksi
    </a>
</div>

<div class="table-card">

    <table>

        <thead>
            <tr>
                <th>No</th>
                <th>Nama Santri</th>
                <th>Tipe</th>
                <th>Jumlah</th>
                <th>Keterangan</th>
            </tr>
        </thead>

        <tbody>

            @foreach($tabungans as $tabungan)

            <tr>

                <td>{{ $loop->iteration }}</td>

                <td>
                    <strong>{{ $tabungan->santri->nama }}</strong>
                </td>

                <td>

                    @if($tabungan->tipe == 'setor')
                        <span class="badge-setor">
                            Setor
                        </span>
                    @else
                        <span class="badge-tarik">
                            Tarik
                        </span>
                    @endif

                </td>

                <td>
                    Rp {{ number_format($tabungan->jumlah,0,',','.') }}
                </td>

                <td>
                    {{ $tabungan->keterangan }}
                </td>

            </tr>

            @endforeach

        </tbody>

    </table>

</div>

@endsection