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
        <li><a href="tambah_buku.php">Tambah Buku</a></li>
        <li><a class="active" href="tambah_anggota.php">Tambah Anggota</a></li>
        <li><a href="pinjam_buku.php">Pinjam Buku</a></li>
        <li><a href="data_buku.php">Daftar Buku</a></li>
        <li><a href="data_anggota.php">Daftar Anggota</a></li>
        <li><a href="data_pinjam.php">Data Pinjam</a></li>
    </ul>
    <div class="container">
        <div>
            <h1>TAMBAH ANGGOTA</h1>
        </div>
        <form action="../proses/proses_tambah_anggota.php" method="post">
            <!-- nama Buku -->
            <div class="row">
                <div class="col-25">
                    <label for="nama">Nama</label>
                </div>
                <div class="col-75">
                    <input type="text" id="nama" name="nama" placeholder="Nama" required><br>
                </div>
            </div>
            <!-- kode  -->
            <div class=" row">
                <div class="col-25">
                    <label for="kelas">Kelas</label>
                </div>
                <div class="col-75">
                    <input type="text" id="kelas" name="kelas" placeholder="Kelas" required><br>
                </div>
            </div>
            <!-- penulis -->
            <div class="row">
                <div class="col-25">
                    <label for="no_hp">No. HP</label>
                </div>
                <div class="col-75">
                    <input type="text" id="no_hp" name="no_hp" placeholder="XXXX-XXXX-XXXX"
                        pattern="[0-9]{4}-[0-9]{4}-[0-9]{4}" required><br>
                </div>
            </div>

            <!-- penerbit -->
            <div class="row">
                <div class="col-25">
                    <label for="email">Email</label>
                </div>
                <div class="col-75">
                    <input type="text" id="email" name="email" placeholder="Email" required><br>
                </div>
            </div>

            <input type="submit" class="submit" value="Tambah">
        </form>
    </div>
</body>

</html>