<?php
include "koneksi.php";
session_start();

if (!isset($_SESSION['status']) || $_SESSION['status'] != "sukses") {
    header("Location: ../logout.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Data Siswa</title>

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
    background:linear-gradient(-45deg,#007BFF,#00C6FF,#4FACFE,#6A5AF9);
    background-size:400% 400%;
    animation:gradient 10s ease infinite;
    padding:40px;
}

@keyframes gradient{
    0%{background-position:0% 50%;}
    50%{background-position:100% 50%;}
    100%{background-position:0% 50%;}
}

.container{
    max-width:1000px;
    margin:auto;
    background:rgba(255,255,255,.18);
    backdrop-filter:blur(15px);
    border-radius:20px;
    padding:30px;
    box-shadow:0 15px 35px rgba(0,0,0,.25);
}

h1{
    color:#fff;
    text-align:center;
    margin-bottom:25px;
}

.top-menu{
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-bottom:20px;
}

.btn{
    text-decoration:none;
    color:#fff;
    padding:10px 18px;
    border-radius:10px;
    font-weight:600;
    transition:.3s;
}

.btn-tambah{
    background:#00c853;
}

.btn-kembali{
    background:#1565c0;
}

.btn:hover{
    transform:translateY(-2px);
    opacity:.9;
}

table{
    width:100%;
    border-collapse:collapse;
    overflow:hidden;
    border-radius:15px;
    background:#fff;
}

th{
    background:#1976d2;
    color:white;
    padding:15px;
}

td{
    padding:12px;
    text-align:center;
    border-bottom:1px solid #ddd;
}

tr:hover{
    background:#e3f2fd;
}

.edit{
    background:#2196f3;
    color:white;
    text-decoration:none;
    padding:6px 12px;
    border-radius:8px;
    margin-right:5px;
}

.hapus{
    background:#e53935;
    color:white;
    text-decoration:none;
    padding:6px 12px;
    border-radius:8px;
}

.edit:hover,
.hapus:hover{
    opacity:.85;
}

.footer{
    text-align:center;
    color:white;
    margin-top:20px;
    font-size:14px;
}
</style>

</head>
<body>

<div class="container">

<h1>🎓 Data Siswa</h1>

<div class="top-menu">
    <a href="../index.php" class="btn btn-kembali">🏠 Menu Utama</a>
    <a href="tambah.php" class="btn btn-tambah">➕ Tambah Data</a>
</div>

<table>
    <tr>
        <th>NIS</th>
        <th>Nama</th>
        <th>Alamat</th>
        <th>Aksi</th>
    </tr>

<?php
$query = mysqli_query($koneksi,"SELECT * FROM siswa");

while($data = mysqli_fetch_array($query)){
?>

<tr>
    <td><?php echo $data['nis']; ?></td>
    <td><?php echo $data['nama']; ?></td>
    <td><?php echo $data['alamat']; ?></td>
    <td>
        <a class="edit" href="edit.php?nis=<?php echo $data['nis']; ?>">✏ Edit</a>

        <a class="hapus"
        href="hapus.php?nis=<?php echo $data['nis']; ?>"
        onclick="return confirm('Yakin ingin menghapus data ini?')">
        🗑 Hapus
        </a>
    </td>
</tr>

<?php
}
?>

</table>

<div class="footer">
    © 2026 Sistem Informasi Sekolah
</div>

</div>

</body>
</html>