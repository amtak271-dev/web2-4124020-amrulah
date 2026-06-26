@extends('layouts.admin')

@section('content')

<div class="header">
    <h1>Koperasi SantriPay</h1>
    <p>Daftar Barang Koperasi</p>
</div>

<div style="margin-bottom:25px;">
    <a href="{{ route('koperasi.create') }}" class="btn btn-gold">
        + Tambah Barang
    </a>
</div>

<div class="product-grid">

    @foreach($koperasis as $koperasi)

    <div class="product-card">

        <img
            src="{{ asset('images/Koperasi/' . $koperasi->gambar) }}"
            alt="{{ $koperasi->nama_barang }}"
        >

        <div class="product-body">

            <h3>{{ $koperasi->nama_barang }}</h3>

            <div class="product-info">
                <span>Harga</span>
                <strong>
                    Rp {{ number_format($koperasi->harga,0,',','.') }}
                </strong>
            </div>

            <div class="product-info">
                <span>Stok</span>
                <strong>{{ $koperasi->stok }}</strong>
            </div>

            <div class="action">

                <a
                    href="{{ route('koperasi.edit',$koperasi->id) }}"
                    class="btn btn-edit"
                >
                    Edit
                </a>

                <form
                    action="{{ route('koperasi.destroy',$koperasi->id) }}"
                    method="POST"
                    style="display:inline;"
                >
                    @csrf
                    @method('DELETE')

                    <button
                        type="submit"
                        class="btn btn-delete"
                        onclick="return confirm('Hapus barang ini?')"
                    >
                        Hapus
                    </button>

                </form>

            </div>

        </div>

    </div>

    @endforeach

</div>

<hr style="margin:50px 0;">

<hr style="margin:50px 0;">

<div class="header">
    <h1>Pesanan Santri</h1>
    <p>Daftar pesanan yang masuk</p>
</div>

<div class="table-card">

<table>

    <thead>
        <tr>
            <th>Santri</th>
            <th>Barang</th>
            <th>Jumlah</th>
            <th>Total</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
    </thead>

    <tbody>

    @forelse($pesanans as $item)

        <tr>

            <td>{{ $item->user->name }}</td>

            <td>{{ $item->koperasi->nama_barang }}</td>

            <td>{{ $item->jumlah }}</td>

            <td>
                Rp {{ number_format($item->total_harga,0,',','.') }}
            </td>

            <td>

                @if($item->status == 'Menunggu')

                    <span class="badge badge-warning">
                        Menunggu
                    </span>

                @elseif($item->status == 'Disetujui')

                    <span class="badge badge-success">
                        Disetujui
                    </span>

                @elseif($item->status == 'Ditolak')

                    <span class="badge badge-danger">
                        Ditolak
                    </span>

                @endif

            </td>

            <td>

                @if($item->status == 'Menunggu')

                    <a
                        href="{{ route('pesanan.acc',$item->id) }}"
                        class="btn btn-edit"
                        onclick="return confirm('ACC pesanan ini?')"
                    >
                        ACC
                    </a>

                    <a
                        href="{{ route('pesanan.tolak',$item->id) }}"
                        class="btn btn-delete"
                        onclick="return confirm('Tolak pesanan ini?')"
                    >
                        Tolak
                    </a>

                @else

                    -

                @endif

            </td>

        </tr>

    @empty

        <tr>

            <td colspan="6" style="text-align:center;">
                Belum ada pesanan masuk.
            </td>

        </tr>

    @endforelse

    </tbody>

</table>

</div>

@endsection