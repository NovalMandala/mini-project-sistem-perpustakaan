<?php
include '../conn.php';

if (isset($_GET['id_peminjam'])) {
    $idPeminjam = $_GET['id_peminjam'];

    $prepare = $conn->prepare("DELETE FROM `peminjam` WHERE `peminjam`.`id_peminjam` = '$idPeminjam'");
    // mengeksekusi query
    try {
        $prepare->execute();
        $idPeminjam = $conn->lastInsertId();
        echo "<script>alert('Data Berhasil Dihapus!');
    window.location = '../view/data_anggota.php'</script>";
    } catch (PDOException $e) {
        echo  "<script>alert('Data Tidak Bisa Dihapus!');
        window.location = '../view/data_anggota.php'</script>";
    }
} else {
    echo "<script>window.location = '../view/data_anggota.php'</script>";
}