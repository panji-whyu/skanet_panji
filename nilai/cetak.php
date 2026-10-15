<?php
session_start();

if (!isset($_SESSION['status']) || $_SESSION['status'] != "sukses") {
    header("location:../login.php");
    exit();
}

include "koneksi.php";

$id_nilai = $_GET['id_nilai'];

$query = mysqli_query($koneksi,
"SELECT
nilai.id_nilai,
siswa.nama AS namasiswa,
guru.nama AS namaguru,
mapel.mapel AS namamapel,
nilai.nilai

FROM siswa,guru,mapel,nilai

WHERE nilai.nis=siswa.nis
AND nilai.nip=guru.nip
AND nilai.id_mapel=mapel.id_mapel
AND nilai.id_nilai='$id_nilai'"
);

$data = mysqli_fetch_array($query);

if (!$data) {
    die("Data nilai tidak ditemukan.");
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Cetak Nilai - <?php echo htmlspecialchars($data['namasiswa']); ?></title>

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

    max-width:900px;

    margin:auto;

    padding:35px;

    background:rgba(255,255,255,.18);

    backdrop-filter:blur(15px);

    border-radius:25px;

    border:1px solid rgba(255,255,255,.3);

    box-shadow:0 15px 35px rgba(0,0,0,.25);

}

h1{

    text-align:center;

    color:white;

    font-size:34px;

    margin-bottom:25px;

}

.btn-print{

    display:block;

    margin:0 auto 25px;

    padding:12px 20px;

    background:linear-gradient(90deg,#0066ff,#00c6ff);

    color:#fff;

    border:none;

    border-radius:12px;

    font-size:15px;

    font-weight:600;

    cursor:pointer;

    transition:.3s;

}

.btn-print:hover{
    transform:translateY(-2px);
    box-shadow:0 10px 20px rgba(0,0,0,.25);
}

.top-actions{
    display:flex;
    justify-content:center;
    gap:12px;
    margin-bottom:25px;
}

.btn-print,
.btn-kembali{
    margin:0;
}

.btn-kembali{

    padding:12px 20px;

    background:#607d8b;

    color:#fff;

    text-decoration:none;

    border-radius:12px;

    font-size:15px;

    font-weight:600;

    transition:.3s;

    display:inline-block;

}

.btn-kembali:hover{
    transform:translateY(-2px);
    box-shadow:0 10px 20px rgba(0,0,0,.25);
}

.data-card{

    width:100%;

    background:white;

    border-radius:15px;

    overflow:hidden;

    box-shadow:0 5px 15px rgba(0,0,0,.15);

}

.data-card-header{

    background:#1976d2;

    color:white;

    padding:15px 20px;

    font-size:16px;

    font-weight:600;

}

.data-row{

    display:flex;

    justify-content:space-between;

    align-items:center;

    padding:16px 20px;

    border-bottom:1px solid #eee;

}

.data-row:last-child{
    border-bottom:none;
}

.data-row .label{

    color:#607d8b;

    font-weight:600;

    font-size:14px;

}

.data-row .value{

    color:#222;

    font-weight:500;

    font-size:16px;

    text-align:right;
}

.footer{

    margin-top:25px;

    text-align:center;

    color:white;

    font-size:13px;

}

@media print{
    .no-print{
        display:none !important;
    }
    body{
        background:white !important;
        padding:0;
    }
    .container{
        box-shadow:none !important;
        border:none !important;
        background:transparent !important;
        width:100% !important;
        max-width:100% !important;
        padding:0 !important;
    }
    h1{
        color:#333 !important;
    }
    .footer{
        color:#555 !important;
    }
}

</style>

</head>

<body>

<div class="container">

<div class="top-actions no-print">
    <a href="index.php" class="btn-kembali">⬅ Kembali</a>
    <button class="btn-print" onclick="window.print()">🖨 Cetak Halaman Ini</button>
</div>

<h1>📊 Cetak Data Nilai</h1>

<div class="data-card">

    <div class="data-card-header">Detail Nilai Siswa</div>

    <div class="data-row">
        <span class="label">No</span>
        <span class="value"><?php echo htmlspecialchars($data['id_nilai']); ?></span>
    </div>

    <div class="data-row">
        <span class="label">Nama Siswa</span>
        <span class="value"><?php echo htmlspecialchars($data['namasiswa']); ?></span>
    </div>

    <div class="data-row">
        <span class="label">Nama Guru</span>
        <span class="value"><?php echo htmlspecialchars($data['namaguru']); ?></span>
    </div>

    <div class="data-row">
        <span class="label">Nama Mapel</span>
        <span class="value"><?php echo htmlspecialchars($data['namamapel']); ?></span>
    </div>

    <div class="data-row">
        <span class="label">Nilai</span>
        <span class="value"><?php echo htmlspecialchars($data['nilai']); ?></span>
    </div>

</div>

<div class="footer">
    © 2026 Sistem Informasi Sekolah
</div>

</div>

</body>
</html>
