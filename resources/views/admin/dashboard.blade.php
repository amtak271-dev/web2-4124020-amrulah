<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>

    <style>
        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family:Arial;
        }

        body{
            background:#f5f5f5;
        }

        /* LAYOUT */
        .layout{
            display:flex;
            min-height:100vh;
        }

        /* SIDEBAR */
        .sidebar{
            width:250px;
            background:#14532d;
            color:white;
            padding:20px;
        }

        .sidebar h2{
            margin-bottom:30px;
        }

        .menu{
            display:flex;
            flex-direction:column;
        }

        .menu a{
            color:white;
            text-decoration:none;
            padding:12px;
            border-radius:6px;
            margin-bottom:10px;
        }

        .menu a:hover{
            background:#166534;
        }

        /* CONTENT */
        .content{
            flex:1;
            padding:30px;
        }

        .card{
            background:white;
            padding:20px;
            border-radius:10px;
            margin-bottom:20px;
            box-shadow:0 2px 5px rgba(0,0,0,0.1);
        }

        button{
            background:red;
            color:white;
            border:none;
            padding:10px 15px;
            border-radius:5px;
            cursor:pointer;
        }

    </style>

</head>

<body>

<div class="layout">

    <!-- SIDEBAR -->
    <div class="sidebar">
        <h2>SantriPay Admin</h2>

        <div class="menu">
            <a href="/beranda">Beranda</a>
            <a href="/santri">Data Santri</a>
            <a href="/tabungan">Tabungan</a>
            <a href="/koperasi">Koperasi</a>
            <a href="/laporan">Laporan</a>
        </div>
    </div>

    <!-- CONTENT -->
    <div class="content">

        <div class="card">
            <h1>Dashboard Admin</h1>
            <p>Selamat datang Admin</p>
        </div>

        <div class="card">
            <h3>Total Santri</h3>
            <p>120 Santri</p>
        </div>

        <div class="card">
            <h3>Total Saldo</h3>
            <p>Rp 2.500.000</p>
        </div>

        <form action="/logout" method="POST">
            @csrf
            <button type="submit">Logout</button>
        </form>

    </div>

</div>

</body>
</html>