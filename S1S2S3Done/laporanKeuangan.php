<?php

require_once "./functions.php";

session_start();

if (!isset($_SESSION['login'])) {
    header("Location: ./login.php");
    exit;
}


$pengeluaran = query("SELECT * FROM laporan_keuangan");
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

    <title>Laporan Keuangan</title>
</head>

<body>

    <?php include 'navbar.php'; ?>

    <div class="container">

        <h2 class="my-5">Laporan Keuangan</h2>

        <?php if ($_SESSION['user']['jabatan'] == 'karyawan') : ?>
            <a href="./tambahLaporan.php" class="btn btn-primary mb-3">Tambah Data</a>
        <?php endif; ?>


        <div id="content">
            <table class="table table-striped table-hover align-middle">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Laporan Pemasukan</td>
                        <td>
                            <a href="./laporanPemasukan.php" class="btn btn-primary btn-sm">Detail</a>
                        </td>
                    </tr>
                    <tr>
                        <td>Laporan Pengeluaran</td>
                        <td>
                            <a href="./laporanPengeluaran.php" class="btn btn-primary btn-sm">Detail</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>


    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="./script.js"></script>
</body>

</html>