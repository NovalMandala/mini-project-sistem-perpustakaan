<?php
include '../conn.php';

$idPeminjam = $_POST['id_peminjam'];
$nama = $_POST['nama'];
$kelas = $_POST['kelas'];
$noHP = $_POST['no_hp'];
$email = $_POST['email'];

if (isset($_POST['id_peminjam'])) {
    $idBuku = $_POST['id_peminjam'];

    $prepare = $conn->prepare("UPDATE peminjam SET `nama_peminjam` 
    = '$nama', `kelas` = '$kelas', `no_hp` = '$noHP', `email` = '$email'
     WHERE `peminjam`.`id_peminjam` = '$idPeminjam'");
    // mengeksekusi query
    try {
        $prepare->execute();
        $idPeminjam = $conn->lastInsertId();
        echo "<script>alert('Data Berhasil Diedit!');
        window.location = '../view/data_anggota.php';</script>";
    } catch (PDOException $e) {
        echo "<script>alert('Data Berhasil Diedit!');
        window.location = '../view/ubah_anggota.php';</script>";
    }
} else {
    echo "<script>window.location = 'daftar_anggota.php'</script>";
}