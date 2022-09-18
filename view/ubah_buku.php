    <?php
include '../conn.php';

if (isset($_GET['kode_buku'])) {
    $kodeBuku = $_GET['kode_buku'];
    $prepare = $conn->prepare("SELECT * FROM buku WHERE kode_buku = '$kodeBuku'");
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
            <h1>UBAH BUKU</h1>
        </div>
        <form action="../proses/proses_ubah_buku.php" method="post">
            <!-- nama Buku -->
            <div class="row">
                <div class="col-25">
                    <label for="nama_buku">Nama Buku</label>
                </div>
                <div class="col-75">
                    <input type="text" id="nama_buku" name="nama_buku" placeholder="Nama Buku"
                        value="<?php echo $judulBuku ?>" required><br>
                </div>
            </div>
            <!-- kode  -->
            <div class="row">
                <div class="col-25">
                    <label for="kode_buku">Kode Buku</label>
                </div>
                <div class="col-75">
                    <input type="text" id="kode_buku" name="kode_buku" placeholder="Kode Buku"
                        value="<?php echo $kodeBuku; ?>" required readonly><br>
                </div>
            </div>
            <!-- penulis -->
            <div class=" row">
                <div class="col-25">
                    <label for="penulis">Penulis Buku</label>
                </div>
                <div class="col-75">
                    <input type="text" id="penulis" name="penulis" placeholder="Penulis" value="<?php echo $penulis; ?>"
                        required><br>
                </div>
            </div>

            <!-- penerbit -->
            <div class="row">
                <div class="col-25">
                    <label for="penerbit">Penerbit Buku</label>
                </div>
                <div class="col-75">
                    <input type="text" id="penerbit" name="penerbit" placeholder="Penerbit"
                        value="<?php echo $penerbit; ?>" required><br>
                </div>
            </div>

            <input type="submit" class="submit" value="Ubah">
        </form>
    </div>
</body>

</html>