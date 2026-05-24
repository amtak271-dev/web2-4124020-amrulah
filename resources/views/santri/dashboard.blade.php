<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Santri</title>

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

        .navbar{
            background:#14532d;
            padding:15px 30px;
            display:flex;
            justify-content:space-between;
            align-items:center;
            color:white;
        }

        .menu a{
            color:white;
            text-decoration:none;
            margin-left:20px;
        }

        .container{
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

    <div class="navbar">

        <h2>SantriPay</h2>

        <div class="menu">
            <a href="/dashboard-santri">Dashboard</a>
            <a href="">Saldo Saya</a>
            <a href="">Riwayat Tabungan</a>
            <a href="">Profil</a>
        </div>

    </div>

    <div class="container">

        <div class="card">
            <h1>Dashboard Santri</h1>
            <p>Selamat datang Santri</p>
        </div>

        <div class="card">
            <h3>Saldo Tabungan</h3>
            <p>Rp 500.000</p>
        </div>

        <div class="card">
            <h3>Transaksi Terakhir</h3>
            <p>Setoran Rp 50.000</p>
        </div>

        <form action="/logout" method="POST">
            @csrf
            <button type="submit">Logout</button>
        </form>

    </div>

</body>
</html>