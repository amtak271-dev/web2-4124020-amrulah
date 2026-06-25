<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SantriPay Admin</title>

    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">

    <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>
<body>

<div class="layout">

    <aside class="sidebar">

        <h2>SantriPay</h2>

        <div class="menu">

            <a href="/admin">
                <i class="fas fa-house"></i>
                Dashboard
            </a>

            <a href="/santri">
                <i class="fas fa-users"></i>
                Data Santri
            </a>

            <a href="/tabungan">
                <i class="fas fa-wallet"></i>
                Tabungan
            </a>

            <a href="/koperasi">
                <i class="fas fa-store"></i>
                Koperasi
            </a>

            <a href="{{ url('/laporan-admin') }}">
                <i class="fas fa-file-lines"></i>
                Laporan
            </a>

            <form action="/logout" method="POST" style="margin-top:20px;">
                @csrf

                <button
                    type="submit"
                    class="btn"
                    style="width:100%;background:#dc2626;color:white;">
                    Logout
                </button>

            </form>

        </div>

    </aside>

    <main class="content">
        @yield('content')
    </main>

</div>

</body>
</html>