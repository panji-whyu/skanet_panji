<?php
session_start();

if (!isset($_SESSION['status']) || $_SESSION['status'] != "sukses") {
    header("Location: logout.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Dashboard</title>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Poppins',sans-serif;
}

body{
    min-height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
    background:
    radial-gradient(circle at top left,#00eaff,transparent 30%),
    radial-gradient(circle at bottom right,#005bea,transparent 35%),
    linear-gradient(135deg,#001f54,#003f88,#0077ff);
    overflow:hidden;
}

body::before,
body::after{
    content:"";
    position:absolute;
    border-radius:50%;
    filter:blur(90px);
    z-index:-1;
}

body::before{
    width:320px;
    height:320px;
    background:#00d4ff;
    top:-120px;
    left:-120px;
}

body::after{
    width:380px;
    height:380px;
    background:#005eff;
    bottom:-150px;
    right:-120px;
}

.container{
    width:600px;
    padding:30px;
    border-radius:25px;
    background:rgba(255,255,255,.15);
    backdrop-filter:blur(20px);
    border:1px solid rgba(255,255,255,.25);
    box-shadow:0 20px 45px rgba(0,0,0,.35);
}

h1{
    text-align:center;
    color:white;
    font-size:34px;
    font-weight:800;
    text-shadow:0 0 15px #00d9ff;
}

.welcome{
    text-align:center;
    color:#dff7ff;
    margin:10px 0 25px;
    font-size:16px;
}

.menu{
    display:grid;
    grid-template-columns:repeat(2,1fr);
    gap:15px;
}

.menu a{
    text-decoration:none;
    background:rgba(255,255,255,.15);
    border:1px solid rgba(255,255,255,.25);
    border-radius:18px;
    padding:18px;
    text-align:center;
    color:white;
    transition:.3s;
}

.menu a:hover{
    transform:translateY(-5px);
    background:white;
    color:#0077ff;
    box-shadow:0 12px 25px rgba(0,0,0,.2);
}

.icon{
    font-size:36px;
    margin-bottom:8px;
}

.title{
    font-size:19px;
    font-weight:700;
}

.desc{
    margin-top:5px;
    font-size:12px;
    color:inherit;
}

.logout{
    grid-column:1 / 3;
    background:linear-gradient(90deg,#ff416c,#ff4b2b)!important;
}

.logout:hover{
    background:white!important;
    color:#ff416c!important;
}

.footer{
    margin-top:25px;
    text-align:center;
    color:#dff7ff;
    font-size:13px;
}

@media(max-width:650px){

.container{
    width:92%;
    padding:25px;
}

.menu{
    grid-template-columns:1fr;
}

.logout{
    grid-column:auto;
}

}

</style>

</head>

<body>

<div class="container">

<h1>📚 DASHBOARD</h1>

<div class="welcome">
Selamat Datang,
<b><?php echo $_SESSION['username']; ?></b> 👋
</div>

<div class="menu">

<a href="siswa">
<div class="icon">🎓</div>
<div class="title">Data Siswa</div>
<div class="desc">Kelola data siswa</div>
</a>

<a href="guru">
<div class="icon">👨‍🏫</div>
<div class="title">Data Guru</div>
<div class="desc">Kelola data guru</div>
</a>

<a href="mapel">
<div class="icon">📖</div>
<div class="title">Mata Pelajaran</div>
<div class="desc">Kelola mata pelajaran</div>
</a>

<a href="nilai">
<div class="icon">📊</div>
<div class="title">Data Nilai</div>
<div class="desc">Input & lihat nilai</div>
</a>

<a href="logout.php" class="logout">
<div class="icon">🚪</div>
<div class="title">Logout</div>
<div class="desc">Keluar dari sistem</div>
</a>

</div>

<div class="footer">
© 2026 Sistem Informasi Sekolah 💙
</div>

</div>

</body>
</html>