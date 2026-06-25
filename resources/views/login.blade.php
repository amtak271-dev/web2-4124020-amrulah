<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login SantriPay</title>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Poppins',sans-serif;
}

body{
    min-height:100vh;
    background:
    linear-gradient(rgba(0,0,0,.65),rgba(0,0,0,.65)),
    url('/images/santri.jpg') center/cover no-repeat;
    display:flex;
    justify-content:center;
    align-items:center;
    padding:20px;
}

.container{
    width:1200px;
    max-width:95%;
    display:grid;
    grid-template-columns:450px 1fr;
    gap:50px;
    align-items:center;
}

.login-box{
    background:rgba(255,255,255,.08);
    backdrop-filter:blur(20px);
    -webkit-backdrop-filter:blur(20px);
    border:1px solid rgba(255,255,255,.15);
    border-radius:30px;
    padding:35px;
    color:white;
    box-shadow:0 20px 40px rgba(0,0,0,.35);

    display:flex;
    flex-direction:column;
    justify-content:center;
}

.logo{
    width:100px;
    height:100px;
    border-radius:50%;
    background:white;
    padding:10px;
    margin:0 auto 15px;
    display:block;
    object-fit:cover;
}

.title{
    text-align:center;
    font-size:38px;
    font-weight:700;
    color:#22c55e;
}

.desc{
    text-align:center;
    color:#ddd;
    margin-top:8px;
    margin-bottom:30px;
}

.input-group{
    position:relative;
    margin-bottom:18px;
}

.input-group i{
    position:absolute;
    left:16px;
    top:17px;
    color:#bbf7d0;
}

input,
select{
    width:100%;
    padding:15px 15px 15px 48px;
    border:none;
    border-radius:14px;
    background:rgba(255,255,255,.12);
    color:white;
    font-size:14px;
    border:1px solid rgba(255,255,255,.1);
}

input::placeholder{
    color:#ddd;
}

option{
    color:black;
}

input:focus,
select:focus{
    outline:none;
    border-color:#22c55e;
    box-shadow:0 0 15px rgba(34,197,94,.3);
}

button{
    width:100%;
    padding:15px;
    border:none;
    border-radius:14px;
    background:linear-gradient(135deg,#22c55e,#15803d);
    color:white;
    font-size:16px;
    font-weight:600;
    cursor:pointer;
    transition:.3s;
}

button:hover{
    transform:translateY(-2px);
    box-shadow:0 10px 20px rgba(34,197,94,.35);
}

.footer{
    text-align:center;
    margin-top:20px;
    color:#ddd;
    font-size:13px;
}

.right{
    color:white;
}

.right h4{
    color:#86efac;
    font-size:18px;
    margin-bottom:10px;
}

.right h1{
    font-size:42px;
    line-height:1.3;
    margin-bottom:20px;
    font-weight:700;
}

.right p{
    color:#f1f5f9;
    line-height:1.9;
    margin-bottom:20px;
    font-size:16px;
}

.feature{
    display:flex;
    gap:15px;
    margin-top:20px;
}

.icon{
    width:55px;
    height:55px;
    border-radius:50%;
    background:rgba(34,197,94,.15);
    color:#22c55e;
    display:flex;
    align-items:center;
    justify-content:center;
    font-size:22px;
    flex-shrink:0;
}

.feature h3{
    margin-bottom:5px;
}

.quote{
    margin-top:30px;
    padding:18px;
    border-left:4px solid #22c55e;
    background:rgba(255,255,255,.08);
    border-radius:12px;
    font-style:italic;
}

@media(max-width:900px){

    .container{
        grid-template-columns:1fr;
    }

    .right{
        display:none;
    }

}

</style>
</head>
<body>

<div class="container">

    <div class="login-box">

        <img src="/images/logo.jpg" class="logo">

        <h2 class="title">SantriPay</h2>

        <p class="desc">
            Sistem Tabungan Santri Berbasis Digital
        </p>

        <form method="POST" action="/login">
            @csrf

            <div class="input-group">
                <i class="fa-solid fa-user"></i>
                <select name="role">
                    <option value="">-- Pilih Peran --</option>
                    <option value="admin">Admin</option>
                    <option value="santri">Santri</option>
                </select>
            </div>

            <div class="input-group">
                <i class="fa-solid fa-envelope"></i>
                <input
                    type="email"
                    name="email"
                    placeholder="Masukkan Email"
                    required>
            </div>

            <div class="input-group">
                <i class="fa-solid fa-lock"></i>
                <input
                    type="password"
                    name="password"
                    placeholder="Masukkan Password"
                    required>
            </div>

            <button type="submit">
                <i class="fa-solid fa-right-to-bracket"></i>
                Login Sekarang
            </button>

        </form>

        <div class="footer">
            © 2026 SantriPay • All Rights Reserved
        </div>

    </div>

    <div class="right">

        <h4>Selamat Datang di</h4>

        <h1>
            SantriPay<br>
            Solusi Tabungan Santri Masa Kini
        </h1>

        <p>
            SantriPay membantu pengelolaan tabungan santri menjadi lebih aman,
            cepat, transparan, dan terintegrasi. Seluruh transaksi setoran,
            penarikan, dan laporan keuangan dapat dilakukan dalam satu sistem.
        </p>

        <p>
            Dengan teknologi digital, pengurus pondok pesantren dan wali santri
            dapat memantau perkembangan tabungan kapan saja dan di mana saja.
        </p>

        <div class="feature">
            <div class="icon">
                <i class="fa-solid fa-shield-halved"></i>
            </div>
            <div>
                <h3>Aman</h3>
                <p>Data transaksi tersimpan secara otomatis dan terstruktur.</p>
            </div>
        </div>

        <div class="feature">
            <div class="icon">
                <i class="fa-solid fa-chart-line"></i>
            </div>
            <div>
                <h3>Transparan</h3>
                <p>Riwayat tabungan dapat dipantau dengan mudah setiap saat.</p>
            </div>
        </div>

        <div class="feature">
            <div class="icon">
                <i class="fa-solid fa-bolt"></i>
            </div>
            <div>
                <h3>Mudah Digunakan</h3>
                <p>Tampilan sederhana dan modern untuk semua pengguna.</p>
            </div>
        </div>

        <div class="quote">
            "Mengelola Tabungan Santri dengan Teknologi, Transparansi, dan Kepercayaan."
        </div>

    </div>

</div>

</body>
</html>