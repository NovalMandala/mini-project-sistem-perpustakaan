<?php
include '../conn.php';

// mengambil data dari database (mempersiapkan)
if (isset($_GET['q'])) {
    $prepare = $conn->prepare("SELECT * FROM peminjam WHERE nama_peminjam like '%" . $_GET['q'] . "%' OR kelas LIKE '%" . $_GET['q'] . "%' 
    OR no_hp LIKE '%" . $_GET['q'] . "%'
    OR email like '%" . $_GET['q'] . "%'");
} else {
    $prepare = $conn->prepare("SELECT * FROM peminjam");
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
        <li><a href="data_buku.php">Daftar Buku</a></li>
        <li><a class="active" href="data_anggota.php">Daftar Anggota</a></li>
        <li><a href="data_pinjam.php">Data Pinjam</a></li>
    </ul>

    <div class="judul">
        <h1 style="text-align: left; margin-left: 13%;">DAFTAR ANGGOTA</h1>
        <form action="" method="get" style="text-align: right; margin-left: 13%;">
            <input type="text" name="q" placeholder="Search Here">
        </form>
    </div>

    <!-- table -->
    <table border=" 1">
        <thead>
            <th style="width: 5%;">No</th>
            <th style="width: 35%;">Nama</th>
            <th style="width: 10%;">kelas</th>
            <th style="width: 15%;">no_hp</th>
            <th style="width: 15%;">email</th>
            <th style="text-align:center;width: 20%;">Action</th>
        </thead>
        <!-- iteration -->
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
            <td style="text-align:center;">
                <!-- action -->
                <a href="pinjam_buku.php?<?php if (isset($_GET['kode_buku'])) {
                                                    echo 'kode_buku=' . $_GET['kode_buku'];
                                                } ?>&id_peminjam=<?php echo $row['id_peminjam']; ?>"
                    class="pinjam">Pilih</a>
                <a href=" ubah_anggota.php?id_peminjam=<?php echo $row['id_peminjam']; ?>" class="pinjam">Ubah</a>
                <a href="../proses/hapus_anggota.php?id_peminjam=<?php echo $row['id_peminjam']; ?>"
                    class="pinjam">Hapus</a>
            </td>
        </tbody>
        <?php $no++;
        }  ?>
    </table>
</body>

</html>