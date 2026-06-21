@extends('layouts.admin')

@section('content')

<h1>Daftar Laporan Santri</h1>

<br>

@if($laporans->count())

<table border="1" cellpadding="10" cellspacing="0" width="100%">

    <tr>
        <th>No</th>
        <th>Santri</th>
        <th>Judul</th>
        <th>Isi</th>
        <th>Status</th>
        <th>Balasan Admin</th>
        <th>Aksi</th>
    </tr>

    @foreach($laporans as $laporan)

    <tr>

        <td>
            {{ $loop->iteration }}
        </td>

        <td>
            {{ $laporan->santri->nama ?? '-' }}
        </td>

        <td>
            {{ $laporan->judul }}
        </td>

        <td>
            {{ $laporan->isi }}
        </td>

        <td>

            @if($laporan->status == 'baru')
                🟡 Baru
            @elseif($laporan->status == 'diproses')
                🔵 Diproses
            @else
                🟢 Selesai
            @endif

        </td>

        <td>
            {{ $laporan->balasan ?? '-' }}
        </td>

        <td>

            <form
                action="{{ url('/laporan/'.$laporan->id.'/update') }}"
                method="POST"
            >

                @csrf

                <select name="status">

                    <option value="baru">
                        Baru
                    </option>

                    <option value="diproses">
                        Diproses
                    </option>

                    <option value="selesai">
                        Selesai
                    </option>

                </select>

                <br><br>

                <textarea
                    name="balasan"
                    rows="3"
                    cols="25"
                    placeholder="Tulis balasan admin..."
                >{{ $laporan->balasan }}</textarea>

                <br><br>

                <button type="submit">

                    Simpan

                </button>

            </form>

        </td>

    </tr>

    @endforeach

</table>

@else

<p>Belum ada laporan masuk.</p>

@endif

@endsection

