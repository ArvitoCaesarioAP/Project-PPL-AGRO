<?php

require_once "../functions.php";

session_start();

if (!isset($_SESSION['login'])) {
    header("Location: ./login.php");
    exit;
}

$id_produk = $_GET['id'];
$produk = query("SELECT * FROM produk WHERE id_produk = '$id_produk'")[0];


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

    <title>Detail Produk</title>
</head>

<body>

    <?php include 'navbar.php'; ?>

    <div class="container mt-5">

        <section id="produk">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="row justify-content-center">
                    <div class="row justify-content-center">
                        <div class="col-md-3 mb-3">
                            <div class="col">
                                <img src="../assets/img/foto_produk/<?= $produk['gambar_produk']; ?>" height="150px" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-6">
                            <hr class="mb-3">
                            <div class="col mb-3">
                                <div class="form-group">
                                    <label for="nama_produk">Nama Produk</label>
                                    <input type="text" class="form-control mt-2" name="nama_produk" id="nama_produk" value="<?= $produk['nama_produk']; ?>" readonly>
                                </div>
                            </div>
                            <div class="col mb-3">
                                <div class="form-group">
                                    <label for="deskripsi_produk" class="mb-3">Deskripsi : </label>
                                    <p id="deskripsi_produk"><?= $produk['deskripsi_produk']; ?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        <label for="harga_produk">Harga</label>
                                        <input type="number" class="form-control mt-2" name="harga_produk" id="harga_produk" value="<?= $produk['harga_produk']; ?>" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        <label for="stock_produk">Stock</label>
                                        <input type="number" class="form-control mt-2" name="stock_produk" id="stock_produk" value="<?= $produk['stock_produk']; ?>" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col mb-5">
                                <div class="d-flex justify-content-between">
                                    <a href="./dataProduk.php" class="btn btn-secondary"><strong>Kembali</strong></a>
                                    <?php if ($_SESSION['user']['jabatan'] == 'karyawan') : ?>
                                        <a href="./ubahProduk.php?id=<?= $produk['id_produk']; ?>" class="btn btn-primary"><strong>Ubah</strong></a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </section>


    </div>


    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>

</html>