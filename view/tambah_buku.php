<?php
include '../conn.php';

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
        <li><a class="active" href="tambah_buku.php">Tambah Buku</a></li>
        <li><a href="tambah_anggota.php">Tambah Anggota</a></li>
        <li><a href="pinjam_buku.php">Pinjam Buku</a></li>
        <li><a href="data_buku.php">Daftar Buku</a></li>
        <li><a href="data_anggota.php">Daftar Anggota</a></li>
        <li><a href="data_pinjam.php">Data Pinjam</a></li>
    </ul>
    <div class="container">
        <div>
            <h1>Tambah Buku</h1>
        </div>
        <form action="../proses/proses_tambah_buku.php" method="post">
            <!-- nama Buku -->
            <div class="row">
                <div class="col-25">
                    <label for="nama_buku">Nama Buku</label>
                </div>
                <div class="col-75">
                    <input type="text" id="nama_buku" name="nama_buku" placeholder="Nama Buku" required><br>
                </div>
            </div>
            <!-- kode  -->
            <div class="row">
                <div class="col-25">
                    <label for="kode_buku">Kode Buku</label>
                </div>
                <div class="col-75">
                    <input type="text" id="kode_buku" name="kode_buku" placeholder="Kode Buku" required><br>
                </div>
            </div>
            <!-- penulis -->
            <div class="row">
                <div class="col-25">
                    <label for="penulis">Penulis Buku</label>
                </div>
                <div class="col-75">
                    <input type="text" id="penulis" name="penulis" placeholder="Penulis" required><br>
                </div>
            </div>

            <!-- penerbit -->
            <div class="row">
                <div class="col-25">
                    <label for="penerbit">Penerbit Buku</label>
                </div>
                <div class="col-75">
                    <input type="text" id="penerbit" name="penerbit" placeholder="Penerbit" required><br>
                </div>
            </div>

            <input type="submit" class="submit">
        </form>
    </div>
</body>

</html>