<?php
include '../conn.php';

// untuk membuat input readonly
$readable = '';

if (isset($_GET['kode_buku']) && isset($_GET['id_peminjam'])) {
    $kodeBuku = $_GET['kode_buku'];
    if (isset($_GET['id_peminjam'])) {
        echo "<script>console.log('berhasil');</script>";
        $idPeminjam = $_GET['id_peminjam'];
        $prepare = $conn->prepare("SELECT * FROM buku, peminjam WHERE kode_buku = $kodeBuku AND id_peminjam = $idPeminjam");
        $readable = 'readonly';
    } else {
        $prepare = $conn->prepare("SELECT * FROM buku WHERE kode_buku = $kodeBuku");
    }
} else {
    echo "<script>alert('Buku Belum Dipilih');
    window.location='data_buku.php';</script>";
}

$prepare->execute();
$result = $prepare->fetchAll(PDO::FETCH_ASSOC);

foreach ($result as $row) {
    $judulBuku = $row['nama_buku'];
    $kodeBuku = $row['kode_buku'];
    $penulis = $row['penulis'];
    $penerbit = $row['penerbit'];
    $nama = $row['id_peminjam'];
    $nama = $row['nama_peminjam'];
    $kelas = $row['kelas'];
    $noHp = $row['no_hp'];
    $email = $row['email'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pinjam Buku</title>
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
        <li><a class="active" href="pinjam_buku.php">Pinjam Buku</a></li>
        <li><a href="data_buku.php">Daftar Buku</a></li>
        <li><a href="data_anggota.php">Daftar Anggota</a></li>
        <li><a href="data_pinjam.php">Data Pinjam</a></li>
    </ul>
    <div class="container">
        <h1>PINJAM BUKU</h1>

        <form action="../proses/proses_pinjam_buku.php" method="post">
            <!-- id peminjam -->
            <div class="row">
                <div class="col-25">
                    <label for="id_peminjam">ID Peminjam</label>
                </div>
                <div class="col-75">
                    <input type="text" name="id_peminjam" value="<?php echo $idPeminjam; ?>" <?php echo $readable; ?>>
                </div>
            </div>
            <!-- nama peminjam -->
            <div class="row">
                <div class="col-25">
                    <label for="nama_peminjam">Nama Peminjam</label>
                </div>
                <div class="col-75">
                    <input type="text" id="nama_peminjam" name="nama_peminjam" value="<?php echo $nama; ?>"
                        <?php echo $readable; ?> required><br><br>
                </div>
            </div>
            <!-- kelas -->
            <div class=" row">
                <div class="col-25">
                    <label for="kelas">Kelas</label>
                </div>
                <div class="col-75">
                    <input type="text" id="kelas" name="kelas" value="<?php echo $kelas; ?>" <?php echo $readable; ?>
                        required><br><br>
                </div>
            </div>
            <!-- no hp -->
            <div class="row">
                <div class="col-25">
                    <label for="no_hp">No HP</label>
                </div>
                <div class="col-75">
                    <input type="tel" id="no_hp" name="no_hp" placeholder="xxxx-xxxx-xxxx"
                        pattern="[0-9]{4}-[0-9]{4}-[0-9]{4}" style="width: 100%; height: 40px;"
                        value="<?php echo $noHp; ?>" <?php echo $readable; ?> required><br><br>
                </div>
            </div>
            <!-- email -->
            <div class="row">
                <div class="col-25">
                    <label for="email">Email</label>
                </div>
                <div class="col-75">
                    <input type="text" id="email" name="email" value="<?php echo $email; ?>" <?php echo $readable; ?>
                        required><br><br>
                </div>
            </div>
            <!-- nama buku -->
            <div class="row">
                <div class="col-25">
                    <label for="nama_buku">Nama Buku</label>
                </div>
                <div class="col-75">
                    <input type="text" id="nama_buku" name="nama_buku" value="<?php echo $judulBuku; ?>" readonly>
                </div>
            </div>
            <!-- kode buku -->
            <div class="row">
                <div class="col-25">
                    <label for="kode_buku">Kode Buku</label>
                </div>
                <div class="col-75">
                    <input type="text" id="kode_buku" name="kode_buku" value="<?php echo $kodeBuku; ?>" readonly
                        required><br><br>
                </div>
            </div>
            <!-- penulis  -->
            <div class="row">
                <div class="col-25">
                    <label for="penulis">Penulis</label>
                </div>
                <div class="col-75">
                    <input type="text" id="penulis" name="penulis" value="<?php echo $penulis; ?>" readonly
                        required><br><br>
                </div>
            </div>
            <!-- penerbit  -->
            <div class="row">
                <div class="col-25">
                    <label for="penerbit">Penerbit</label>
                </div>
                <div class="col-75">
                    <input type="text" id="penerbit" name="penerbit" value="<?php echo $penerbit; ?>" readonly
                        required><br><br>
                </div>
            </div>
            <!-- tanggal pinjam -->
            <div class="row">
                <div class="col-25">
                    <label for="tanggal_pinjam">Tanggal Pinjam</label>
                </div>
                <div class="col-75">
                    <input type="date" id="tanggal_pinjam" name="tanggal_pinjam" required><br><br>
                </div>
            </div>
            <!-- tanggal kembali -->
            <div class="row">
                <div class="col-25">
                    <label for="tanggal_kembali">Tanggal Kembali</label>
                </div>
                <div class="col-75">
                    <input type="date" id="tanggal_kembali" name="tanggal_kembali" required><br><br>
                </div>
            </div>
            <input type="submit" value="Pinjam">
        </form>
    </div>
</body>

</html>