<!DOCTYPE html>
<html>
<head>
    <title>Katalog Produk</title>
</head>
<body>

<h1>Daftar Produk</h1>

<ul>
@foreach ($produk as $p)
    <li>
        {{ $p['nama'] }} - Rp {{ $p['harga'] }}
        <a href="{{ route('katalog.show', $p['id']) }}">Detail</a>
    </li>
@endforeach
</ul>

</body>
</html>