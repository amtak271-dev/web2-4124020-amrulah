<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login SantriPay</title>

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:Arial, sans-serif;
}

body{

    height:100vh;

    background:
    linear-gradient(
        rgba(0,0,0,0.5),
        rgba(0,0,0,0.5)
    ),
    url('/images/santri.jpg');

    background-size:cover;
    background-position:center;
    background-repeat:no-repeat;

    display:flex;
    justify-content:center;
    align-items:center;
}
.title{

    text-align:center;

    margin-bottom:25px;

    color:white;

    font-size:35px;

    font-weight:bold;

    letter-spacing:2px;
}
/* LOGIN BOX */

.login-box{

    width:400px;

    padding:40px;

    background:rgba(255,255,255,0.15);

    backdrop-filter:blur(10px);

    -webkit-backdrop-filter:blur(10px);

    border:1px solid rgba(255,255,255,0.2);

    border-radius:20px;

    box-shadow:0 8px 32px rgba(0,0,0,0.3);

    color:white;
}

.logo{

    width:90px;

    display:block;

    margin:auto;

    margin-bottom:15px;
}

.login-box h1{

    text-align:center;

    color:#22c55e;

    margin-bottom:10px;
}

.desc{

    text-align:center;

    margin-bottom:25px;

    color:#f1f5f9;
}

label{

    display:block;

    margin-bottom:8px;

    font-size:14px;
}

select,
input{

    width:100%;

    padding:13px;

    margin-bottom:18px;

    border:none;

    border-radius:10px;

    background:rgba(255,255,255,0.2);

    color:white;

    outline:none;
}

input::placeholder{

    color:#eee;
}

select option{

    color:black;
}

.forgot{

    text-align:right;

    margin-bottom:20px;
}

.forgot a{

    color:white;

    text-decoration:none;

    font-size:13px;
}

.btn-login{

    width:100%;

    padding:13px;

    border:none;

    border-radius:10px;

    background:#16a34a;

    color:white;

    font-size:16px;

    cursor:pointer;
}

.btn-login:hover{

    background:#15803d;
}

.error{

    color:#fecaca;

    margin-bottom:15px;

    text-align:center;
}

</style>

</head>

<body>

<div class="login-box">

    <img src="/images/logo.png" class="logo">

    <h1>SantriPay</h1>

    <p class="desc">
        Sistem Tabungan Santri Pondok Pesantren
    </p>

    @if(session('error'))

        <p class="error">

            {{ session('error') }}

        </p>
        

    @endif

    <form method="POST" action="/login">

        @csrf
        <h1 class="title">SANTRI PAY</h1>

        <label>Pilih Peran</label>

        <select name="role">

            <option>
                -- Pilih Peran --
            </option>

            <option>
                Admin
            </option>

            <option>
                Santri
            </option>

            <option>
                Wali Santri
            </option>

        </select>

        <label>Email</label>

        <input
            type="email"
            name="email"
            placeholder="Masukkan email"
        >

        <label>Password</label>

        <input
            type="password"
            name="password"
            placeholder="Masukkan password"
        >

        <div class="forgot">

            <a href="#">
                Lupa password?
            </a>

        </div>

        <button
            type="submit"
            class="btn-login"
        >

            Login

        </button>

    </form>

</div>

</body>
</html>