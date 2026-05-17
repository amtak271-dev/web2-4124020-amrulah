<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SantriPay</title>

   <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>

    <header class="navbar">
        <div class="logo">
            <h2>SantriPay</h2>
        </div>

        <nav>
            <ul class="menu">
                <li><a href="/">Beranda</a></li>
                <li><a href="/tabungan">Tabungan</a></li>
                <li><a href="/koperasi">Koperasi</a></li>
                <li><a href="/laporan">Laporan</a></li>
                <li><a href="/tentang">Tentang</a></li>
            </ul>
        </nav>
    </header>

    <main class="content">
        @yield('content')
    </main>

    <footer class="footer">
        <p>© 2026 SantriPay</p>
    </footer>

</body>
</html>