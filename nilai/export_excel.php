<?php
session_start();

if (!isset($_SESSION['status']) || $_SESSION['status'] != "sukses") {
    header("location:../login.php");
    exit();
}

include "koneksi.php";

// Header supaya browser mengunduh sebagai file Excel
header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=Data_Nilai_" . date('Y-m-d') . ".xls");
header("Pragma: no-cache");
header("Expires: 0");

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
AND nilai.id_mapel=mapel.id_mapel"
);
?>
<table border="1">
<thead>
<tr>
<th>No</th>
<th>Nama Siswa</th>
<th>Nama Guru</th>
<th>Nama Mapel</th>
<th>Nilai</th>
</tr>
</thead>
<tbody>
<?php
$no = 1;
while ($data = mysqli_fetch_array($query)) {
?>
<tr>
<td><?php echo $no++; ?></td>
<td><?php echo $data['namasiswa']; ?></td>
<td><?php echo $data['namaguru']; ?></td>
<td><?php echo $data['namamapel']; ?></td>
<td><?php echo $data['nilai']; ?></td>
</tr>
<?php
}
?>
</tbody>
</table>
