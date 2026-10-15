<?php
ob_start();
session_start();
require_once "koneksi.php";

$error = "";

if (isset($_POST['login'])) {

    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    $stmt = $koneksi->prepare("SELECT * FROM users WHERE username=? AND password=?");
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $_SESSION['status'] = "sukses";
        $_SESSION['username'] = $username;

        header("Location: index.php");
        exit;
    } else {
        $error = "❌ Username atau Password salah!";
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>WELCOME LOGIN</title>

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
    filter:blur(80px);
    z-index:-1;
}

body::before{
    width:350px;
    height:350px;
    background:#00d4ff;
    top:-100px;
    left:-100px;
}

body::after{
    width:400px;
    height:400px;
    background:#005eff;
    bottom:-150px;
    right:-100px;
}

.login-box{
    width:400px;
    padding:45px;
    border-radius:30px;
    background:rgba(255,255,255,0.15);
    backdrop-filter:blur(20px);
    border:1px solid rgba(255,255,255,.3);
    box-shadow:0 25px 50px rgba(0,0,0,.35),
               inset 0 0 30px rgba(255,255,255,.1);
}

.login-box h1{
    text-align:center;
    color:white;
    font-size:38px;
    font-weight:800;
    text-shadow:0 0 15px #00d9ff;
}

.subtitle{
    text-align:center;
    color:#dff7ff;
    margin:10px 0 35px;
}

.input-group{
    margin-bottom:20px;
}

.input-group label{
    display:block;
    color:white;
    font-weight:600;
    margin-bottom:8px;
}

.input-group input{
    width:100%;
    padding:15px;
    border:none;
    border-radius:18px;
    outline:none;
    font-size:15px;
}

button{
    width:100%;
    padding:15px;
    border:none;
    border-radius:20px;
    background:linear-gradient(90deg,#00c6ff,#0072ff);
    color:white;
    font-size:17px;
    font-weight:bold;
    cursor:pointer;
    transition:.3s;
}

button:hover{
    transform:scale(1.03);
}

.error{
    margin-top:20px;
    padding:12px;
    border-radius:15px;
    text-align:center;
    color:white;
    background:rgba(255,0,0,.3);
}

.footer{
    margin-top:30px;
    text-align:center;
    color:#d8f8ff;
    font-size:13px;
}

@media(max-width:450px){
.login-box{
    width:90%;
    padding:30px;
}
}
</style>

</head>
<body>

<div class="login-box">

<h1>LOGIN</h1>
<p class="subtitle">✨ Welcome Back, User ✨</p>

<form method="POST">

<div class="input-group">
<label>Username</label>
<input type="text" name="username" placeholder="Masukkan username" required>
</div>

<div class="input-group">
<label>Password</label>
<input type="password" name="password" placeholder="Masukkan password" required>
</div>

<button type="submit" name="login">🚀 Login Sekarang</button>

</form>

<?php
if($error != ""){
    echo "<div class='error'>$error</div>";
}
?>

<div class="footer">
© 2026 Sistem Informasi Sekolah 💙
</div>

</div>

</body>
</html>

<?php
ob_end_flush();