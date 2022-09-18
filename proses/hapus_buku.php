<?php
include '../conn.php';

if (isset($_GET['kode_buku'])) {
    $idBuku = $_GET['kode_buku'];

    $prepare = $conn->prepare("DELETE FROM `buku` WHERE `buku`.`kode_buku` = '$idBuku'");
    // mengeksekusi query
    try {
        $prepare->execute();
        $idPeminjam = $conn->lastInsertId();
        echo "<script>alert('Data Berhasil Dihapus!');
    window.location = '../view/data_buku.php'</script>";
    } catch (PDOException $e) {
        echo  "<script>alert('Data Tidak Bisa Dihapus!');
        window.location = '../view/data_buku.php'</script>";
    }
} else {
    echo "<script>window.location = '../view/data_buku.php'</script>";
}