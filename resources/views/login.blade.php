<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Login SantriPay</title>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

<style>

@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Poppins', sans-serif;
}

body{
    height:100vh;

    background:
    linear-gradient(
        rgba(0,0,0,0.65),
        rgba(0,0,0,0.65)
    ),
    url('/images/santri.jpg');

    background-size:cover;
    background-position:center;
    background-repeat:no-repeat;

    display:flex;
    justify-content:center;
    align-items:center;
    overflow:hidden;
}

/* EFFECT BULAT */

.circle1{
    position:absolute;
    width:250px;
    height:250px;
    background:rgba(34,197,94,0.3);
    border-radius:50%;
    top:-80px;
    left:-80px;
    filter:blur(20px);
}

.circle2{
    position:absolute;
    width:250px;
    height:250px;
    background:rgba(255,255,255,0.15);
    border-radius:50%;
    bottom:-100px;
    right:-80px;
    filter:blur(20px);
}

/* LOGIN BOX */

.login-box{
    position:relative;

    width:420px;

    padding:45px;

    background:rgba(255,255,255,0.12);

    backdrop-filter:blur(12px);

    -webkit-backdrop-filter:blur(12px);

    border:1px solid rgba(255,255,255,0.2);

    border-radius:25px;

    box-shadow:
    0 8px 32px rgba(0,0,0,0.4);

    color:white;

    animation:fadeIn 1s ease;
}

/* ANIMASI */

@keyframes fadeIn{
    from{
        opacity:0;
        transform:translateY(30px);
    }

    to{
        opacity:1;
        transform:translateY(0);
    }
}

/* LOGO */

.logo{
    width:100px;
    height:100px;

    object-fit:cover;

    display:block;

    margin:auto;

    margin-bottom:18px;

    border-radius:50%;

    background:white;

    padding:8px;

    border:3px solid rgba(255,255,255,0.3);

    box-shadow:
    0 0 20px rgba(34,197,94,0.5);

    transition:0.3s;
}

.logo:hover{
    transform:scale(1.05);

    box-shadow:
    0 0 30px rgba(34,197,94,0.8);
}
/* TITLE */

.title{
    text-align:center;

    color:#22c55e;

    font-size:38px;

    font-weight:700;

    letter-spacing:2px;

    margin-bottom:8px;

    text-shadow:0 0 10px rgba(34,197,94,0.5);
}

.desc{
    text-align:center;

    margin-bottom:30px;

    color:#e2e8f0;

    font-size:14px;

    line-height:22px;
}

/* LABEL */

label{
    display:block;

    margin-bottom:8px;

    font-size:14px;

    font-weight:500;
}

/* INPUT */

select,
input{
    width:100%;

    padding:14px 15px;

    margin-bottom:18px;

    border:none;

    border-radius:12px;

    background:rgba(255,255,255,0.15);

    color:white;

    outline:none;

    transition:0.3s;
}

select:focus,
input:focus{
    background:rgba(255,255,255,0.22);

    border:1px solid #22c55e;

    box-shadow:0 0 10px rgba(34,197,94,0.4);
}

input::placeholder{
    color:#e2e8f0;
}

select option{
    color:black;
}

/* FORGOT */

.forgot{
    text-align:right;

    margin-bottom:22px;
}

.forgot a{
    color:#bbf7d0;

    text-decoration:none;

    font-size:13px;

    transition:0.3s;
}

.forgot a:hover{
    color:white;
}

/* BUTTON */

.btn-login{
    width:100%;

    padding:14px;

    border:none;

    border-radius:14px;

    background:linear-gradient(
        135deg,
        #22c55e,
        #15803d
    );

    color:white;

    font-size:16px;

    font-weight:600;

    cursor:pointer;

    transition:0.3s;
}

.btn-login:hover{
    transform:translateY(-2px);

    box-shadow:
    0 8px 20px rgba(34,197,94,0.4);
}

/* ERROR */

.error{
    background:rgba(239,68,68,0.2);

    border:1px solid rgba(239,68,68,0.4);

    color:#fecaca;

    padding:12px;

    border-radius:10px;

    margin-bottom:18px;

    text-align:center;

    font-size:14px;
}

/* FOOTER */

.footer{
    text-align:center;

    margin-top:25px;

    font-size:12px;

    color:#cbd5e1;
}

</style>

</head>

<body>

<div class="circle1"></div>
<div class="circle2"></div>

<div class="login-box">

    <img src="/images/logo.jpg" class="logo">

    <h1 class="title">
        SantriPay
    </h1>

    <p class="desc">
        Sistem Tabungan Santri Modern <br>
        Pondok Pesantren
    </p>

    @if(session('error'))

        <p class="error">

            {{ session('error') }}

        </p>

    @endif

    <form method="POST" action="/login">

        @csrf

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
            Login Sekarang
        </button>

    </form>

    <div class="footer">
        © 2026 SantriPay • All Rights Reserved
    </div>

</div>

</body>
</html>