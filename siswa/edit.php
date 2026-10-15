<?php
include "koneksi.php";

$nis = $_GET['nis'];
$query = mysqli_query($koneksi, "SELECT * FROM siswa WHERE nis='$nis'");
$data = mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Edit Data Siswa</title>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

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
    background:linear-gradient(-45deg,#007BFF,#00C6FF,#4FACFE,#6A5AF9);
    background-size:400% 400%;
    animation:gradient 10s ease infinite;
}

@keyframes gradient{
    0%{background-position:0% 50%;}
    50%{background-position:100% 50%;}
    100%{background-position:0% 50%;}
}

.container{
    width:430px;
    background:rgba(255,255,255,.18);
    backdrop-filter:blur(15px);
    border-radius:25px;
    padding:35px;
    box-shadow:0 15px 35px rgba(0,0,0,.25);
    border:1px solid rgba(255,255,255,.3);
}

h1{
    text-align:center;
    color:#fff;
    margin-bottom:25px;
    font-size:32px;
}

.input-group{
    margin-bottom:18px;
}

label{
    display:block;
    color:#fff;
    margin-bottom:8px;
    font-weight:600;
}

input{
    width:100%;
    padding:14px;
    border:none;
    border-radius:12px;
    outline:none;
    font-size:15px;
    background:rgba(255,255,255,.9);
    transition:.3s;
}

input:focus{
    transform:scale(1.02);
    box-shadow:0 0 12px rgba(255,255,255,.8);
}

.button-group{
    display:flex;
    justify-content:space-between;
    gap:10px;
    margin-top:25px;
}

.btn{
    flex:1;
    padding:14px;
    text-align:center;
    text-decoration:none;
    color:#fff;
    border:none;
    border-radius:12px;
    font-size:16px;
    font-weight:600;
    cursor:pointer;
    transition:.3s;
}

.btn-update{
    background:linear-gradient(90deg,#0066ff,#00c6ff);
}

.btn-kembali{
    background:#607d8b;
}

.btn:hover{
    transform:translateY(-3px);
    box-shadow:0 10px 20px rgba(0,0,0,.25);
}

.footer{
    text-align:center;
    color:#fff;
    margin-top:25px;
    font-size:13px;
}
</style>

</head>
<body>

<div class="container">

<h1>✏ Edit Data Siswa</h1>

<form action="update.php" method="POST">

    <div class="input-group">
        <label>NIS</label>
        <input type="text" name="nis" value="<?php echo $data['nis']; ?>" readonly>
    </div>

    <div class="input-group">
        <label>Nama</label>
        <input type="text" name="nama" value="<?php echo $data['nama']; ?>" required>
    </div>

    <div class="input-group">
        <label>Alamat</label>
        <input type="text" name="alamat" value="<?php echo $data['alamat']; ?>" required>
    </div>

    <div class="button-group">
        <a href="index.php" class="btn btn-kembali">⬅ Kembali</a>
        <button type="submit" class="btn btn-update">💾 Update</button>
    </div>

</form>

<div class="footer">
    © 2026 Sistem Informasi Sekolah
</div>

</div>

</body>
</html>