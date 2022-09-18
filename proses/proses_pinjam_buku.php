<?php
include "../conn.php";

// variabel id
$kodeBuku = $_POST['kode_buku'];
$idPeminjam = $_POST['id_peminjam'];

// variabel peminjaman
$tanggalPinjam = $_POST['tanggal_pinjam'];
$tanggalKembali = $_POST['tanggal_kembali'];

// lanjut insert ke tabel peminjaman
$prepare = $conn->prepare("INSERT INTO peminjaman_buku 
(`id_peminjaman_buku`, `id_peminjam`, `id_buku`, `tanggal_peminjaman`, `tanggal_pengembalian`) VALUES 
(NULL, '$idPeminjam', '$kodeBuku', '$tanggalPinjam', '$tanggalKembali')");
// mengeksekusi query
try {
    $prepare->execute();
    // redirect ke halaman pertama
    echo "<script>alert('Data Berhasil Di input');
    window.location='../view/data_pinjam.php';</script>";
} catch (PDOException $e) {
    echo "<script>alert('Data Gagal Di input silahkan pilih ulang'!);
    window.location='../view/data_buku.php';</script>";
}

$conn = null;