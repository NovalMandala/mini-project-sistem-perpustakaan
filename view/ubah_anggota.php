<?php
include '../conn.php';

if (isset($_GET['id_peminjam'])) {
    $idPeminjam = $_GET['id_peminjam'];
    $prepare = $conn->prepare("SELECT * FROM peminjam WHERE id_peminjam = '$idPeminjam'");
} else {
    echo "<script>alert('Anggota Belum Dipilih');
    window.location='data_anggota.php';</script>";
}

$prepare->execute();
$result = $prepare->fetchAll(PDO::FETCH_ASSOC);

foreach ($result as $row) {
    $nama = $row['nama_peminjam'];
    $kelas = $row['kelas'];
    $noHP = $row['no_hp'];
    $email = $row['email'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Buku</title>
    <link rel="stylesheet" href="../css/navbar.css">
    <link rel="stylesheet" href="../css/form.css">
    <style>
    .submit {
        width: 50%;
        margin-top: 2%;
        margin-right: 10%;
    }

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    .container {
        height: 100%;
        overflow: auto;
        position: absolute;
        width: 100%;
        padding-right: 20%;
    }
    </style>

</head>

<body>
    <ul>
        <li><a href="tambah_buku.php">Tambah Buku</a></li>
        <li><a href="tambah_anggota.php">Tambah Anggota</a></li>
        <li><a href="pinjam_buku.php">Pinjam Buku</a></li>
        <li><a href="data_buku.php">Daftar Buku</a></li>
        <li><a href="data_anggota.php">Daftar Anggota</a></li>
        <li><a href="data_pinjam.php">Data Pinjam</a></li>
    </ul>
    <div class="container">
        <div>
            <h1>UBAH ANGGOTA</h1>
        </div>
        <form action="../proses/proses_ubah_anggota.php" method="post">
            <div class="row">
                <div class="col-25">
                    <label for="id_peminjam">ID Peminjam</label>
                </div>
                <div class="col-75">
                    <input type="text" name="id_peminjam" value="<?php echo $idPeminjam; ?>" readonly>
                </div>
            </div>
            <!-- nama Buku -->
            <div class="row">
                <div class="col-25">
                    <label for="nama">Nama</label>
                </div>
                <div class="col-75">
                    <input type="text" id="nama" name="nama" placeholder="Nama" value="<?php echo $nama ?>"
                        required><br>
                </div>
            </div>
            <!-- kode  -->
            <div class="row">
                <div class="col-25">
                    <label for="kelas">Kelas</label>
                </div>
                <div class="col-75">
                    <input type="text" id="kelas" name="kelas" placeholder="Kelas" value="<?php echo $kelas; ?>"
                        required><br>
                </div>
            </div>
            <!-- penulis -->
            <div class=" row">
                <div class="col-25">
                    <label for="no_hp">No. HP</label>
                </div>
                <div class="col-75">
                    <input type="text" id="no_hp" name="no_hp" placeholder="No. HP" value="<?php echo $noHP; ?>"
                        required><br>
                </div>
            </div>

            <!-- penerbit -->
            <div class="row">
                <div class="col-25">
                    <label for="email">Email</label>
                </div>
                <div class="col-75">
                    <input type="text" id="email" name="email" placeholder="emal" value="<?php echo $email; ?>"
                        required><br>
                </div>
            </div>

            <input type="submit" class="submit" value="Ubah">
        </form>
    </div>
</body>

</html>