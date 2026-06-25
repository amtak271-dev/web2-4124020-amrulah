@extends('layouts.admin')

@section('content')

<div class="header">
    <h1>Data Laporan</h1>
    <p>Laporan dan pengaduan dari santri</p>
</div>

@if($laporans->count())

<div class="table-card">

    <table>

        <thead>
            <tr>
                <th>No</th>
                <th>Santri</th>
                <th>Judul</th>
                <th>Isi Laporan</th>
                <th>Status</th>
                <th>Balasan Admin</th>
                <th width="300">Aksi</th>
            </tr>
        </thead>

        <tbody>

            @foreach($laporans as $laporan)

            <tr>

                <td>{{ $loop->iteration }}</td>

                <td>
                    <strong>
                        {{ $laporan->santri->nama ?? '-' }}
                    </strong>
                </td>

                <td>
                    {{ $laporan->judul }}
                </td>

                <td>
                    {{ $laporan->isi }}
                </td>

                <td>

                    @if($laporan->status == 'baru')

                        <span class="badge-baru">
                            Baru
                        </span>

                    @elseif($laporan->status == 'diproses')

                        <span class="badge-proses">
                            Diproses
                        </span>

                    @else

                        <span class="badge-selesai">
                            Selesai
                        </span>

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

                            <option value="baru"
                                {{ $laporan->status == 'baru' ? 'selected' : '' }}>
                                Baru
                            </option>

                            <option value="diproses"
                                {{ $laporan->status == 'diproses' ? 'selected' : '' }}>
                                Diproses
                            </option>

                            <option value="selesai"
                                {{ $laporan->status == 'selesai' ? 'selected' : '' }}>
                                Selesai
                            </option>

                        </select>

                        <br><br>

                        <textarea
                            name="balasan"
                            rows="3"
                            placeholder="Tulis balasan admin..."
                        >{{ $laporan->balasan }}</textarea>

                        <br><br>

                        <button
                            type="submit"
                            class="btn btn-gold">
                            Simpan
                        </button>

                    </form>

                </td>

            </tr>

            @endforeach

        </tbody>

    </table>

</div>

@else

<div class="table-card">
    <p>Belum ada laporan masuk.</p>
</div>

@endif

@endsection