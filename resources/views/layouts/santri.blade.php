<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SantriPay</title>

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/santri.css') }}">

    <!-- Font Awesome -->
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

</head>

<body>

<div class="layout">

    <!-- SIDEBAR -->
    <div class="sidebar">

        <h2>SantriPay</h2>

        <div class="menu">

            <a href="/dashboard-santri">
                <i class="fa-solid fa-house"></i>
                Dashboard
            </a>

            <a href="/saldo-santri">
                <i class="fa-solid fa-wallet"></i>
                Saldo Saya
            </a>

            <a href="/riwayat-santri">
                <i class="fa-solid fa-clock-rotate-left"></i>
                Riwayat Tabungan
            </a>

            <a href="/profil-santri">
                <i class="fa-solid fa-user"></i>
                Profil
            </a>

            <a href="/laporan-santri">
                <i class="fa-solid fa-triangle-exclamation"></i>
                Laporan
            </a>

            <a href="/koperasi-santri">
                <i class="fa-solid fa-cart-shopping"></i>
                Koperasi
            </a>

        </div>

        <form action="/logout" method="POST">
            @csrf
            <button class="logout-btn" type="submit">
                <i class="fa-solid fa-right-from-bracket"></i>
                Logout
            </button>
        </form>

    </div>

    <!-- CONTENT -->
    <div class="content">
        @yield('content')
    </div>

</div>

</body>
</html>