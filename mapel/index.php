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
<title>Data Mapel</title>

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



.hapus{

    background:#e53935;

    color:white;

    padding:7px 14px;

    border-radius:8px;

    text-decoration:none;

}



.edit:hover,
.hapus:hover{

    opacity:.8;

}



.footer{

    text-align:center;

    color:white;

    margin-top:25px;

    font-size:13px;

}

</style>

</head>


<body>


<div class="container">


<h1>📚 Table Mapel</h1>


<div class="menu">

<a href="../index.php" class="btn kembali">
🏠 Menu Utama
</a>


<a href="tambah.php" class="btn tambah">
➕ Tambah Data
</a>

</div>



<table>


<tr>

<th>No</th>

<th>Nama Mapel</th>

<th>Aksi</th>

</tr>



<?php

$query=mysqli_query($koneksi,"SELECT * FROM mapel");

while($data=mysqli_fetch_array($query)){

?>


<tr>

<td>
<?php echo $data['id_mapel']; ?>
</td>


<td>
<?php echo $data['mapel']; ?>
</td>


<td>

<a class="edit" href="edit.php?id_mapel=<?php echo $data['id_mapel']; ?>">
✏ Edit
</a>


<a class="hapus" 
href="hapus.php?id_mapel=<?php echo $data['id_mapel']; ?>" 
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