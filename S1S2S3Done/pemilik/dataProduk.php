<?php

require_once "../functions.php";

session_start();

if (!isset($_SESSION['login'])) {
    header("Location: ./login.php");
    exit;
}


$produk = query("SELECT * FROM produk")

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

    <title>Data Produk</title>
</head>

<body>

    <?php include 'navbar.php'; ?>

    <div class="container">

        <h2 class="my-5">Data Produk</h2>


        <div class="row">
            <div class="col">
                <?php if ($_SESSION['user']['jabatan'] == 'karyawan') : ?>
                    <a href="./tambahProduk.php" class="btn btn-primary mb-4 btn-sm">Tambah Produk</a>
                <?php endif; ?>
            </div>
            <div class="col-md-3">
                <select class="form-select" aria-label="Default select example" id="sort">
                    <option value="">Sort Stock</option>
                    <option value="ASC">Ascending</option>
                    <option value="DESC">Descending</option>
                </select>
            </div>
        </div>
        <div id="content">
            <table class="table table-striped table-hover align-middle">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Gambar</th>
                        <th>Nama Produk</th>
                        <th>Harga</th>
                        <th>Stock</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    <?php foreach ($produk as $perproduk) : ?>
                        <tr>
                            <td><?= $no; ?></td>
                            <td>
                                <img src="../assets/img/foto_produk/<?= $perproduk['gambar_produk']; ?>" width="100px" alt="">
                            </td>
                            <td><?= $perproduk['nama_produk']; ?></td>
                            <td><?= $perproduk['harga_produk']; ?></td>
                            <td><?= $perproduk['stock_produk']; ?></td>
                            <td>
                                <a href="./detailProduk.php?id=<?= $perproduk['id_produk']; ?>" class="btn btn-primary btn-sm">Detail</a>
                                <?php /* if ($_SESSION['user']['jabatan'] == 'karyawan') : ?>
                                    <a href="./hapusProduk.php?id=<?= $perproduk['id_produk']; ?>" class="btn btn-danger btn-sm">Hapus</a>
                                <?php endif; */ ?> 
                            </td>
                        </tr>
                        <?php $no++ ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>


    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="./script.js"></script>
</body>

</html>