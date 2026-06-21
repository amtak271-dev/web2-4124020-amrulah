<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SantriPay Admin</title>

    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>
<body>

<div class="layout">

    <div class="sidebar">

        <h2>SantriPay</h2>

        <div class="menu">
            <a href="/admin">🏠 Dashboard</a>
            <a href="/santri">👨‍🎓 Data Santri</a>
            <a href="/tabungan">💰 Tabungan</a>
            <a href="/koperasi">🛒 Koperasi</a>
           <a href="{{ url('/laporan-admin') }}">📄 Laporan</a>
        </div>

    </div>

    <div class="content">
        @yield('content')
    </div>

</div>

</body>
</html>