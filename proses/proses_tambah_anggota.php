<?php
include '../conn.php';

$nama = $_POST['nama'];
$kelas = $_POST['kelas'];
$noHP = $_POST['no_hp'];
$email = $_POST['email'];

$prepare = $conn->prepare("INSERT INTO `peminjam` (`id_peminjam`, `nama_peminjam`, `kelas`, `no_hp`, `email`)
 VALUES (NULL, '$nama', '$kelas', '$noHP', '$email
')");
// mengeksekusi query
try {
    $prepare->execute();
    // redirect ke halaman pertama
    echo "<script>alert('Data Berhasil Di input');
    window.location='../view/data_anggota.php';</script>";
} catch (PDOException $e) {
    echo "<script>alert('Data Gagal Di input');
    window.location='../view/tambah_anggota.php';</script>";
}
$conn = null;