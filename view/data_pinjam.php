<?php
include '../conn.php';

// mengambil data dari database (mempersiapkan)
if (isset($_GET['q'])) {
    $prepare = $conn->prepare("SELECT id_peminjaman_buku ,nama_peminjam, kelas,no_hp, email, nama_buku, kode_buku, penulis, penerbit, tanggal_peminjaman, tanggal_pengembalian FROM peminjaman_buku 
    INNER JOIN peminjam ON peminjaman_buku.id_peminjam = peminjam.id_peminjam 
    INNER JOIN buku ON peminjaman_buku.id_buku = buku.kode_buku
     WHERE nama_peminjam like '%" . $_GET['q'] . "%' OR kelas like '%" . $_GET['q'] . "%' 
    OR no_hp like '%" . $_GET['q'] . "%'
    OR nama_buku like '%" . $_GET['q'] . "%'
    OR kode_buku like '%" . $_GET['q'] . "%'
    OR penulis like '%" . $_GET['q'] . "%'
    OR penerbit like '%" . $_GET['q'] . "%'
    OR tanggal_peminjaman like '%" . $_GET['q'] . "%'
    OR tanggal_pengembalian like '%" . $_GET['q'] . "%'
    ");
} else {
    $prepare = $conn->prepare("SELECT id_peminjaman_buku,nama_peminjam, kelas,no_hp, email, nama_buku, kode_buku, penulis, penerbit, tanggal_peminjaman, tanggal_pengembalian FROM peminjaman_buku 
    INNER JOIN peminjam ON peminjaman_buku.id_peminjam = peminjam.id_peminjam 
    INNER JOIN buku ON peminjaman_buku.id_buku = buku.kode_buku");
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
    </style>
</head>

<body>

    <div class="navbar">
        <ul>
            <li><a href="tambah_buku.php">Tambah Buku</a></li>
            <li><a href="tambah_anggota.php">Tambah Anggota</a></li>
            <li><a href="pinjam_buku.php">Pinjam Buku</a></li>
            <li><a href="data_buku.php">Daftar Buku</a></li>
            <li><a href="data_anggota.php">Daftar Anggota</a></li>
            <li><a class="active" href="data_pinjam.php">Data Pinjam</a></li>
        </ul>
    </div>

    <div class="container">
        <div class="judul">
            <h1 style="text-align: left; margin-left: 13%;">DATA PINJAM BUKU</h1>
            <form action="" method="get" style="text-align: right; margin-left: 13%;">
                <input type="text" name="q" placeholder="Search Here">
            </form>
        </div>
        <table border=" 1">
            <thead>
                <th>No</th>
                <th>Nama Peminjam</th>
                <th>Kelas</th>
                <th>No HP</th>
                <th>Email</th>
                <th>Judul Buku</th>
                <th>Kode Buku</th>
                <th>Penulis</th>
                <th>Penerbit</th>
                <th>Tanggal Pinjam</th>
                <th>Tanggal Kembali</th>
                <th>Action</th>
            </thead>
            <?php
            $no = 1;
            foreach ($result as $row) { ?>
            <tbody>
                <!-- menampilkan data kedalam bentuk baris tabe -->
                <td><?php echo $no; ?></td>
                <td><?php echo $row['nama_peminjam']; ?></td>
                <td><?php echo $row['kelas']; ?></td>
                <td><?php echo $row['no_hp']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['nama_buku']; ?></td>
                <td><?php echo $row['kode_buku']; ?></td>
                <td><?php echo $row['penulis']; ?></td>
                <td><?php echo $row['penerbit']; ?></td>
                <td><?php echo $row['tanggal_peminjaman']; ?></td>
                <td><?php echo $row['tanggal_pengembalian']; ?></td>
                <td style="text-align:center;">
                    <a href="../proses/hapus_pinjam.php?id_peminjaman=<?php echo $row['id_peminjaman_buku']; ?>"
                        class="pinjam">Hapus</a>
                </td>
            </tbody>
            <?php $no++;
            }  ?>
        </table>
    </div>
</body>

</html>