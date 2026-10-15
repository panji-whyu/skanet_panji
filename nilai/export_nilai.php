<?php
// Hubungkan dengan file koneksi Anda
include "../koneksi.php"; // Sesuaikan path jika file ini berada di dalam folder 'nilai'

// Mengatur header HTTP agar file dikenali sebagai file Excel dan otomatis diunduh
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Data_Nilai_Siswa.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>

<!-- Buat tabel sederhana yang akan dikonversi menjadi format baris/kolom di Excel -->
<table border="1">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Siswa (NIS)</th>
            <th>Nama Guru (NIP)</th>
            <th>Mata Pelajaran</th>
            <th>Nilai</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1;
        // Menggunakan LEFT JOIN agar data tetap tampil meskipun ada ID yang terhapus/tidak sinkron
        $query = mysqli_query($koneksi, "
            SELECT 
                nilai.id_nilai, 
                nilai.nis,
                nilai.nip,
                nilai.nilai,
                siswa.nama AS nama_siswa, 
                guru.nama AS nama_guru, 
                mapel.mapel 
            FROM nilai 
            LEFT JOIN siswa ON nilai.nis = siswa.nis 
            LEFT JOIN guru ON nilai.nip = guru.nip 
            LEFT JOIN mapel ON nilai.id_mapel = mapel.id_mapel
            ORDER BY nilai.id_nilai DESC
        ");

        while($data = mysqli_fetch_array($query)){
        ?>
        <tr>
            <td><?php echo $no++; ?></td>
            <td>
                <?php 
                // Menampilkan nama siswa jika ada, jika tidak tampilkan NIS-nya saja
                echo $data['nama_siswa'] ? $data['nama_siswa'] . " (" . $data['nis'] . ")" : "Siswa Tidak Ditemukan (" . $data['nis'] . ")"; 
                ?>
            </td>
            <td>
                <?php 
                echo $data['nama_guru'] ? $data['nama_guru'] . " (" . $data['nip'] . ")" : "Guru Tidak Ditemukan (" . $data['nip'] . ")"; 
                ?>
            </td>
            <td>
                <?php 
                echo $data['mapel'] ? $data['mapel'] : "Mapel Tidak Ditemukan"; 
                ?>
            </td>
            <td><?php echo $data['nilai']; ?></td>
        </tr>
        <?php 
        } 
        ?>
    </tbody>
</table>