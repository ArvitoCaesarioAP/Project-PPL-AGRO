<?php

require_once "./functions.php";

session_start();

if (!isset($_SESSION['login'])) {
    header("Location: ./login.php");
    exit;
}

$pemasukan = query("SELECT * FROM laporan_keuangan WHERE nama_laporan ='Pemasukan'");

if (isset($_POST['kirim'])) {
    $tanggal_mulai = $_POST['tanggal_mulai'];
    $tanggal_selesai = $_POST['tanggal_selesai'];

    $pemasukan = query("SELECT * FROM laporan_keuangan WHERE tanggal BETWEEN '$tanggal_mulai' AND '$tanggal_selesai' AND nama_laporan = 'Pemasukan'");
}


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

    <title>Laporan Pemasukan</title>
</head>

<body>

    <?php include 'navbar.php'; ?>

    <div class="container">

        <h2 class="my-5">Laporan Pemasukan</h2>

        <div class="col mb-3"> 
            <a href="laporanKeuangan.php" class="btn btn-secondary"><strong>Kembali</strong></a>
        </div>

        <form action="" method="post">
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="tanggal_mulai">Tanggal Mulai</label>
                        <input type="date" class="form-control" name="tanggal_mulai" id="tanggal_mulai" value="<?= $tanggal_mulai; ?>">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="tanggal_selesai">Tanggal Selesai</label>
                        <input type="date" class="form-control" name="tanggal_selesai" id="tanggal_selesai" value="<?= $tanggal_selesai; ?>">
                    </div>
                </div>
                <div class="col-md-2"><br>
                    <button type="submit" name="kirim" class="btn btn-primary">Filter</button>
                </div>
            </div>
        </form>

        <div id="content">
            <table class="table table-striped table-hover align-middle">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Nama Laporan</th>
                        <th>Total</th>
                        <th>Keterangan</th>
                        <?php if ($_SESSION['user']['jabatan'] == 'karyawan') : ?>
                            <th>Aksi</th>
                        <?php endif; ?>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    <?php foreach ($pemasukan as $peritem) : ?>
                        <!-- <pre><?= print_r($verifikasi); ?></pre> -->
                        <tr>
                            <td><?= $no; ?></td>
                            <td><?= date("d-m-Y", strtotime($peritem['tanggal'])); ?></td>
                            <td><?= $peritem['nama_laporan']; ?></td>
                            <td>Rp. <?= number_format($peritem['total']); ?></td>
                            <td><?= $peritem['keterangan_laporan']; ?></td>
                            <td>
                                <!-- <a href="./detailLaporanPemasukan.php?id=<?= $peritem['id_laporan_keuangan']; ?>" class="btn btn-primary btn-sm">Detail</a> -->
                                <?php if ($_SESSION['user']['jabatan'] == 'karyawan') : ?>
                                    <a href="./ubahLaporanPemasukan.php?id=<?= $peritem['id_laporan_keuangan']; ?>" class="btn btn-info btn-sm">Ubah</a>
                                <?php endif; ?>
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