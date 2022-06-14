<?php

require_once "../functions.php";

session_start();

if (!isset($_SESSION['login'])) {
    header("Location: ./login.php");
    exit;
}

if ($_SESSION['user']['jabatan'] !== 'karyawan') {
    header("Location: ../index.php");
    exit;
}


// cek apakah tombol submit sudah ditekan atau belum
if (isset($_POST["tambah"])) {
    // echo '<script> alert("post ubah"); </script>';
    // cek apakah data berhasil di ubah atau tidak
    if (tambahProduk($_POST) > 0) {
        echo "
            <script> 
                alert('Data produk berhasil ditambah');
                document.location.href = './dataProduk.php';
            </script>
            ";
    } else {
        echo "
        <script> 
        alert('Data Produk gagal ditambah');
        document.location.href = './tambahProduk.php';
        </script>
        ";
    }
    // $success = false;
};

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

    <title>Tambah Produk</title>
</head>

<body>

    <?php include 'navbar.php'; ?>

    <div class="container mt-5">

        <section id="produk">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="row justify-content-center">
                    <div class="row justify-content-center">
                        <div class="col-md-6">
                            <div class="text-center">
                                <h2>Tambah Produk</h2>
                            </div>
                            <hr class="mb-3">
                            <div class="col mb-3">
                                <div class="form-group">
                                    <label for="gambar_produk" class="form-label">Upload Gambar Produk</label>
                                    <input class="form-control" type="file" name="gambar_produk" id="gambar_produk" required>
                                </div>
                            </div>
                            <div class="col mb-3">
                                <div class="form-group">
                                    <label for="nama_produk">Nama Produk</label>
                                    <input type="text" class="form-control mt-2" name="nama_produk" id="nama_produk" required>
                                </div>
                            </div>
                            <div class="col mb-3">
                                <div class="form-group">
                                    <label for="deskripsi_produk">Deskripsi</label>
                                    <textarea class="form-control" name="deskripsi_produk" id="deskripsi_produk" cols="30" rows="5" required></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        <label for="harga_produk">Harga</label>
                                        <input type="number" class="form-control mt-2" min="0" name="harga_produk" id="harga_produk" required>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        <label for="stock_produk">Stock</label>
                                        <input type="number" class="form-control mt-2" min="0" name="stock_produk" id="stock_produk" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col mb-5">
                                <div class="d-flex justify-content-between">
                                    <a href="dataProduk.php" class="btn btn-secondary"><strong>Kembali</strong></a>
                                    <button type="submit" class="btn btn-primary" name="tambah">Tambah</button>
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