@extends('layouts.admin')

@section('content')

<div class="header">
    <h1>Data Santri</h1>
    <p>Daftar seluruh santri</p>
</div>

<a href="{{ route('santri.create') }}" class="btn">
    + Tambah Santri
</a>

<br><br>

<div class="table-card">

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>NIS</th>
                <th>Kelas</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
            @foreach($santris as $santri)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $santri->nama }}</td>
                <td>{{ $santri->nis }}</td>
                <td>{{ $santri->kelas }}</td>

                <td>
                    <a href="{{ route('santri.edit',$santri->id) }}" class="btn">
                        Edit
                    </a>

                    <form action="{{ route('santri.destroy',$santri->id) }}"
                          method="POST"
                          style="display:inline;">
                        @csrf
                        @method('DELETE')

                        <button type="submit"
                                class="btn"
                                onclick="return confirm('Hapus data santri?')">
                            Hapus
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>

    </table>

</div>

@endsection