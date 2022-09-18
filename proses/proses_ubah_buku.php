<?php
include '../conn.php';

$kodeBuku = $_POST['kode_buku'];
$namaBuku = $_POST['nama_buku'];
$namaPenulis = $_POST['penulis'];
$namapenerbit = $_POST['penerbit'];

if (isset($_POST['kode_buku'])) {
    $idBuku = $_POST['kode_buku'];

    $prepare = $conn->prepare("UPDATE buku SET `nama_buku` 
    = '$namaBuku', `penulis` = '$namaPenulis', `penerbit` = '$namapenerbit'
     WHERE `buku`.`kode_buku` = '$kodeBuku'");
    // mengeksekusi query
    try {
        $prepare->execute();
        $idPeminjam = $conn->lastInsertId();
        echo "<script>alert('Data Berhasil Diedit!');
        window.location = '../view/data_buku.php';</script>";
    } catch (PDOException $e) {
        echo "<script>alert('Data Gagal Diedit!');
        window.location = '../view/ubah_buku.php';</script>";
    }
} else {

    echo "<script>window.location = '../view/data_buku.php'</script>";
}