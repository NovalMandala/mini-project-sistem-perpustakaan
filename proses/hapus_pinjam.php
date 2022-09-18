<?php
include '../conn.php';

if (isset($_GET['id_peminjaman'])) {
    $idPeminjaman = $_GET['id_peminjaman'];

    $prepare = $conn->prepare("DELETE FROM peminjaman_buku WHERE `peminjaman_buku`.`id_peminjaman_buku` = $idPeminjaman");
    // mengeksekusi query
    try {
        $prepare->execute();
        $idPeminjam = $conn->lastInsertId();
        echo "<script>alert('Data Berhasil Dihapus!');
        window.location = '../view/data_pinjam.php'</script>";
    } catch (PDOException $e) {
        echo "<script>alert('Data Gaga; Dihapus!');
        window.location = '../view/data_pinjam.php'</script>";
    }
} else {
    echo "<script>window.location = '../view/data_pinjam.php'</script>";
}