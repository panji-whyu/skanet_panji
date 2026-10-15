<?php
session_start();

if (!isset($_SESSION['status']) || $_SESSION['status'] != "sukses") {
    header("location:../login.php");
    exit();
}

include "../koneksi.php";

$id_nilai = $_GET['id_nilai'];

$data = mysqli_query($koneksi, "SELECT * FROM nilai WHERE id_nilai='$id_nilai'");
$d = mysqli_fetch_array($data);
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Edit Data Nilai</title>

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
width:450px;
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
margin-bottom:30px;
}

.input-group{
margin-bottom:20px;
}

label{
display:block;
color:white;
font-weight:600;
margin-bottom:8px;
}

select,input{
width:100%;
padding:14px;
border:none;
border-radius:14px;
outline:none;
}

.button-group{
display:flex;
gap:10px;
margin-top:20px;
}

button,.kembali{
flex:1;
padding:14px;
border:none;
border-radius:14px;
color:white;
text-decoration:none;
text-align:center;
cursor:pointer;
font-weight:bold;
}

button{
background:#0099ff;
}

.kembali{
background:#666;
}
</style>

</head>
<body>

<div class="container">

<h1>📊 Edit Data Nilai</h1>

<form action="update.php" method="POST">

<input type="hidden" name="id_nilai" value="<?php echo $d['id_nilai']; ?>">

<div class="input-group">
<label>Nama Siswa</label>
<select name="nis">

<?php
$siswa = mysqli_query($koneksi,"SELECT * FROM siswa");

while($s=mysqli_fetch_array($siswa)){
?>
<option value="<?php echo $s['nis']; ?>"
<?php if($d['nis']==$s['nis']) echo "selected"; ?>>
<?php echo $s['nama']; ?>
</option>
<?php } ?>

</select>
</div>

<div class="input-group">
<label>Nama Guru</label>
<select name="nip">

<?php
$guru = mysqli_query($koneksi,"SELECT * FROM guru");

while($g=mysqli_fetch_array($guru)){
?>
<option value="<?php echo $g['nip']; ?>"
<?php if($d['nip']==$g['nip']) echo "selected"; ?>>
<?php echo $g['nama']; ?>
</option>
<?php } ?>

</select>
</div>

<div class="input-group">
<label>Mata Pelajaran</label>
<select name="id_mapel">

<?php
$mapel = mysqli_query($koneksi,"SELECT * FROM mapel");

while($m=mysqli_fetch_array($mapel)){
?>
<option value="<?php echo $m['id_mapel']; ?>"
<?php if($d['id_mapel']==$m['id_mapel']) echo "selected"; ?>>
<?php echo $m['mapel']; ?>
</option>
<?php } ?>

</select>
</div>

<div class="input-group">
<label>Nilai</label>
<input type="number" name="nilai" value="<?php echo $d['nilai']; ?>" required>
</div>

<div class="button-group">
<a href="index.php" class="kembali">⬅ Kembali</a>
<button type="submit">💾 Simpan</button>
</div>

</form>

</div>

</body>
</html>