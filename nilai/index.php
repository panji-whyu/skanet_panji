<?php
include "koneksi.php";

session_start();

if(!isset($_SESSION['status']) || $_SESSION['status'] != "sukses"){
    header('location:../logout.php');
    exit;
}

?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Table Nilai</title>

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

    0%{
        background-position:0% 50%;
    }

    50%{
        background-position:100% 50%;
    }

    100%{
        background-position:0% 50%;
    }

}



.container{

    max-width:1200px;

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

    font-size:38px;

    margin-bottom:25px;

}



.menu{

    display:flex;

    justify-content:space-between;

    margin-bottom:25px;

}



.btn{

    text-decoration:none;

    color:white;

    padding:12px 20px;

    border-radius:12px;

    font-weight:600;

    transition:.3s;

}



.tambah{

    background:linear-gradient(90deg,#00c853,#00e676);

}



.kembali{

    background:#1565c0;

}



.btn:hover{

    transform:translateY(-3px);

    box-shadow:0 10px 20px rgba(0,0,0,.25);

}



table{

    width:100%;

    border-collapse:collapse;

    background:white;

    border-radius:15px;

    overflow:hidden;

}



th{

    background:#1976d2;

    color:white;

    padding:15px;

}



td{

    padding:13px;

    text-align:center;

    border-bottom:1px solid #ddd;

}



tr:hover{

    background:#e3f2fd;

}



.edit{

    background:#2196f3;

    color:white;

    padding:7px 14px;

    border-radius:8px;

    text-decoration:none;

    margin-right:5px;

}

.cetak{

    background:#00897b;

    color:white;

    padding:7px 14px;

    border-radius:8px;

    text-decoration:none;

    margin-right:5px;

}

.hapus{

    background:#e53935;

    color:white;

    padding:7px 14px;

    border-radius:8px;

    text-decoration:none;

}



.edit:hover,
.cetak:hover,
.hapus:hover{

    opacity:.85;

}



.footer{

    margin-top:25px;

    text-align:center;

    color:white;

    font-size:13px;

}

.btn-excel {
    background: linear-gradient(90deg, #1d6f42, #43a047);
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 8px;
    font-weight: bold;
    cursor: pointer;
    margin-bottom: 20px;
    margin-left: 10px;
    transition: 0.3s;
    text-decoration: none;
    display: inline-block;
}

.btn-excel:hover {
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(67, 160, 71, 0.4);
}

/* =========================================
   PENGATURAN KHUSUS UNTUK PRINT / PDF
   ========================================= */
@media print {
    /* 1. Sembunyikan elemen yang tidak perlu dicetak */
    .btn-excel,
    .tombol-tambah, 
    .kolom-aksi, 
    td:last-child, /* Menyembunyikan kolom tombol edit/cetak/hapus (asumsi ada di kolom terakhir) */
    th:last-child {
        display: none !important;
    }

    /* 2. Ubah background body menjadi putih polos agar hemat tinta/rapi di PDF */
    body {
        background: white !important;
        color: black !important;
    }
    
    /* 3. Hilangkan efek bayangan (shadow) dan blur pada kontainer */
    .container {
        box-shadow: none !important;
        border: none !important;
        background: transparent !important;
        width: 100% !important;
        padding: 0 !important;
    }

    /* 4. Pastikan tabel memiliki garis pinggir (border) hitam yang tegas */
    table {
        width: 100%;
        border-collapse: collapse;
    }
    table th, table td {
        border: 1px solid black !important;
        padding: 8px;
        color: black !important;
    }
}

</style>

</head>


<body>


<div class="container">


<h1>📊 Table Nilai</h1>


<div class="menu">

<a href="../index.php" class="btn kembali">
🏠 Menu Utama
</a>

<!-- 👇 INI TOMBOL EKSPOR EXCEL 👇 -->
<a href="export_excel.php" class="btn-excel">
📥 Ekspor Excel
</a>
<!-- 👆 ======================== 👆 -->

<a href="tambah.php" class="btn tambah">
➕ Tambah Data Nilai
</a>

</div>



<table>


<tr>

<th>No</th>

<th>Nama Siswa</th>

<th>Nama Guru</th>

<th>Nama Mapel</th>

<th>Nilai</th>

<th>Aksi</th>

</tr>



<?php

$query=mysqli_query($koneksi,

"SELECT 
nilai.id_nilai,
siswa.nama AS namasiswa,
guru.nama AS namaguru,
mapel.mapel AS namamapel,
nilai.nilai

FROM siswa,guru,mapel,nilai

WHERE nilai.nis=siswa.nis

AND nilai.nip=guru.nip

AND nilai.id_mapel=mapel.id_mapel"

);



while($data=mysqli_fetch_array($query)){

?>


<tr>

<td>
<?php echo $data['id_nilai']; ?>
</td>


<td>
<?php echo $data['namasiswa']; ?>
</td>


<td>
<?php echo $data['namaguru']; ?>
</td>


<td>
<?php echo $data['namamapel']; ?>
</td>


<td>
<?php echo $data['nilai']; ?>
</td>



<td>


<a class="edit" 
href="edit.php?id_nilai=<?php echo $data['id_nilai']; ?>">
✏ Edit
</a>


<a class="cetak"
href="cetak.php?id_nilai=<?php echo $data['id_nilai']; ?>"
target="_blank">
🖨 Cetak
</a>


<a class="hapus"

href="hapus.php?id_nilai=<?php echo $data['id_nilai']; ?>"

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
