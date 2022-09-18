<?php
include '../conn.php';

$kodeBuku = $_POST['kode_buku'];
$namaBuku = $_POST['nama_buku'];
$namaPenulis = $_POST['penulis'];
$namapenerbit = $_POST['penerbit'];

$prepare = $conn->prepare("INSERT INTO buku (`kode_buku`, `nama_buku`, `penulis`, `penerbit`) VALUES ('$kodeBuku', '$namaBuku', '$namaPenulis', '$namapenerbit')");
// mengeksekusi query
try {
    $prepare->execute();
    // redirect ke halaman pertama
    echo "<script>alert('Data Berhasil Di input');
    window.location='..view/data_buku.php';</script>";
} catch (PDOException $e) {
    echo "<script>alert('Data Gagal Di input');
    window.location='..view/data_buku.php';</script>";
}
$conn = null;