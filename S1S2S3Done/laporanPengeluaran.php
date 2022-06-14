<?php

require_once "./functions.php";

session_start();

if (!isset($_SESSION['login'])) {
    header("Location: ./login.php");
    exit;
}

$pengeluaran = query("SELECT * FROM laporan_keuangan WHERE nama_laporan = 'Pengeluaran'");

if (isset($_POST['kirim'])) {
    $tanggal_mulai = $_POST['tanggal_mulai'];

    $tanggal_mulai_trim = explode("-", $tanggal_mulai);

    $pengeluaran = query("SELECT * FROM laporan_keuangan WHERE month(tanggal) = {$tanggal_mulai_trim[1]} AND year(tanggal) = {$tanggal_mulai_trim[0]} AND nama_laporan = 'Pengeluaran'");
}

$tanggal = isset($tanggal_mulai) ? $tanggal_mulai : date('Y-m');

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

    <title>Laporan Pengeluaran</title>
</head>

<body>

    <?php include 'navbar.php'; ?>

    <div class="container">

        <h2 class="my-5">Laporan Pengeluaran</h2>

        <div class="col mb-3">
            <a href="laporanKeuangan.php" class="btn btn-secondary"><strong>Kembali</strong></a>
        </div>

        <form action="" method="post">

            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="tanggal_mulai">Tanggal Mulai</label>
                        <input type="month" class="form-control" name="tanggal_mulai" id="tanggal_mulai" value="<?= $tanggal; ?>">
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
                    <?php foreach ($pengeluaran as $peritem) : ?>
                        <tr>
                            <td><?= $no; ?></td>
                            <td><?= date("d-m-Y", strtotime($peritem['tanggal'])); ?></td>
                            <td><?= $peritem['nama_laporan']; ?></td>
                            <td>Rp. <?= number_format($peritem['total']); ?></td>
                            <td><?= $peritem['keterangan_laporan']; ?></td>
                            <td>
                                <?php if ($_SESSION['user']['jabatan'] == 'karyawan') : ?>
                                    <a href="./ubahLaporanPengeluaran.php?id=<?= $peritem['id_laporan_keuangan']; ?>" class="btn btn-info btn-sm">Ubah</a>
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