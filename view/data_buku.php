<?php
include '../conn.php';

// mengambil data dari database (mempersiapkan)
if (isset($_GET['q'])) {
    $prepare = $conn->prepare("SELECT * FROM buku WHERE nama_buku like '%" . $_GET['q'] . "%' OR penulis like '%" . $_GET['q'] . "%' 
    OR kode_buku like '%" . $_GET['q'] . "%'
    OR penerbit like '%" . $_GET['q'] . "%'");
} else {
    $prepare = $conn->prepare("SELECT * FROM buku");
}

// mengeksekusi query
$prepare->execute();
$result = $prepare->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/navbar.css">
    <link rel="stylesheet" href="../css/table.css">
    <style>
    body {
        margin: 0;
    }
    </style>
</head>

<body>

    <!-- tab -->
    <ul>
        <li><a href="tambah_buku.php">Tambah Buku</a></li>
        <li><a href="tambah_anggota.php">Tambah Anggota</a></li>
        <li><a href="pinjam_buku.php">Pinjam Buku</a></li>
        <li><a class="active" href="data_buku.php">Daftar Buku</a></li>
        <li><a href="data_anggota.php">Daftar Anggota</a></li>
        <li><a href="data_pinjam.php">Data Pinjam</a></li>
    </ul>

    <div class="judul">
        <h1 style="text-align: left; margin-left: 13%;">DAFTAR BUKU</h1>
        <form action="" method="get" style="text-align: right; margin-left: 13%;">
            <input type="text" name="q" placeholder="Search Here">
        </form>
    </div>
    <table border=" 1">
        <thead>
            <th style="width: 5%;">No</th>
            <th style="width: 35%;">Judul Buku</th>
            <th style="width: 10%;">Kode</th>
            <th style="width: 15%;">Penulis</th>
            <th style="width: 15%;">Penerbit</th>
            <th style="text-align:center;width: 20%;">Action</th>
        </thead>
        <?php
        $no = 1;
        foreach ($result as $row) { ?>
        <tbody>
            <!-- menampilkan data kedalam bentuk baris tabe -->
            <td><?php echo $no; ?></td>
            <td><?php echo $row['nama_buku']; ?></td>
            <td><?php echo $row['kode_buku']; ?></td>
            <td><?php echo $row['penulis']; ?></td>
            <td><?php echo $row['penerbit']; ?></td>
            <td style="text-align:center;">
                <a href=" data_anggota.php?kode_buku=<?php echo $row['kode_buku']; ?>" class="pinjam">Pinjam</a>
                <a href=" ubah_buku.php?kode_buku=<?php echo $row['kode_buku']; ?>" class="pinjam">Ubah</a>
                <a href=" ../proses/hapus_buku.php?kode_buku=<?php echo $row['kode_buku']; ?>" class="pinjam">Hapus</a>
            </td>
        </tbody>
        <?php $no++;
        }  ?>
    </table>
</body>

</html>