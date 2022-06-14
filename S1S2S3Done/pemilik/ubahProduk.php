<?php

require_once "../functions.php";

session_start();

if (!isset($_SESSION['login'])) {
    header("Location: ./login.php");
    exit;
}


$id_produk = $_GET['id'];
$produk = query("SELECT * FROM produk WHERE id_produk = '$id_produk'")[0];

// cek apakah tombol submit sudah ditekan atau belum
if (isset($_POST["ubah"])) {
    // echo '<script> alert("post ubah"); </script>';
    // cek apakah data berhasil di ubah atau tidak
    if (ubahProduk($_POST, $id_produk) > 0) {
        echo "
            <script> 
                alert('Data produk berhasil diubah');
                document.location.href = './detailProduk.php?id=$id_produk';
            </script>
            ";
    } else {
        echo "
        <script> 
        alert('Data Produk gagal diubah');
        document.location.href = './ubahProduk.php?id=$id_produk';
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

    <title>Ubah Produk</title>
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
                                    <label for="gambar_produk" class="form-label">Upload Gambar Produk</label>
                                    <input class="form-control" type="file" name="gambar_produk" id="gambar_produk">
                                </div>
                            </div>
                            <div class="col mb-3">
                                <div class="form-group">
                                    <label for="nama_produk">Nama Produk</label>
                                    <input type="text" class="form-control mt-2" name="nama_produk" id="nama_produk" value="<?= $produk['nama_produk']; ?>" required>
                                </div>
                            </div>
                            <div class="col mb-3">
                                <div class="form-group">
                                    <label for="deskripsi_produk">Deskripsi</label>
                                    <textarea class="form-control" name="deskripsi_produk" id="deskripsi_produk" cols="30" rows="5" required><?= $produk['deskripsi_produk']; ?></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        <label for="harga_produk">Harga</label>
                                        <input type="number" class="form-control mt-2" name="harga_produk" min="0" id="harga_produk" value="<?= $produk['harga_produk']; ?>" required>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        <label for="stock_produk">Stock</label>
                                        <input type="number" class="form-control mt-2" name="stock_produk" min="0" id="stock_produk" value="<?= $produk['stock_produk']; ?>" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col mb-5">
                                <div class="d-flex justify-content-between">
                                    <a href="dataProduk.php" class="btn btn-secondary"><strong>Kembali</strong></a>
                                    <?php if ($_SESSION['user']['jabatan'] == 'karyawan') : ?>
                                        <button type="submit" class="btn btn-primary" name="ubah">Ubah</button>
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