<?php

require_once "./functions.php";

session_start();

if (!isset($_SESSION['login'])) {
    header("Location: ./login.php");
    exit;
}


$bulan = date('m');
$tahun = date('Y');


$id_user = $_SESSION['user']['id_user'];
$user = query("SELECT * FROM users WHERE id_user = {$id_user}")[0];
$absen = query("SELECT * FROM absensi_karyawan WHERE month(tanggal_absen) = '$bulan' AND year(tanggal_absen) = '$tahun' AND  id_user = {$id_user}");
$gaji_pokok = query("SELECT * FROM gaji_pokok")[0];
$bonus = query("SELECT * FROM bonus")[0];

if (isset($_POST['kirim'])) {
    $tanggal_mulai = $_POST['tanggal_mulai'];
    $tanggal_mulai_trim = explode("-", $tanggal_mulai);

    $absen = query("SELECT * FROM absensi_karyawan WHERE month(tanggal_absen) = {$tanggal_mulai_trim[1]} AND year(tanggal_absen) = {$tanggal_mulai_trim[0]} AND id_user = {$id_user}");
}

$tanggal = isset($tanggal_mulai) ? $tanggal_mulai : date('Y-m');

$i = 0;

$kehadiran = 0;

if (!empty($absen)) {
    $kehadiran = count($absen);
}

$total_gaji_pokok = $kehadiran * $bonus['bonus'] + $gaji_pokok['gaji_pokok'];

$karyawans = query("SELECT * FROM users WHERE jabatan = 'karyawan' AND verifikasi = 'Telah diverifikasi'")


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

    <title>Laporan Gaji</title>
</head>

<body>

    <?php include 'navbar.php'; ?>

    <div class="container">
        <h2 class="text-center my-5">Gaji Karyawan</h2>
        <hr>
        <?php if ($user['jabatan'] == 'pemilik') : ?>
            <table class="table table-striped table-hover align-middle">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Karyawan</th>
                        <th class="col-2 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    <?php foreach ($karyawans as $karyawan) : ?>
                        <tr>
                            <td><?= $no; ?></td>
                            <td>
                                <?= $karyawan['nama_user']; ?>
                            </td>
                            <td class="text-center">
                                <a href="detail_gaji.php?id_user=<?= $karyawan['id_user']; ?>" class="btn btn-primary">Detail Gaji</a>
                            </td>
                        </tr>
                        <?php $no++ ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php elseif ($user['jabatan'] == 'karyawan') : ?>

            <div class="row justify-content-center">
                <div class="col-md-7">
                    <h2 class="my-5 text-center">Laporan Gaji</h2>
                    <!-- 
        <div class="col mb-3">
            <a href="laporanKeuangan.php" class="btn btn-secondary"><strong>Kembali</strong></a>
        </div> -->

                    <form action="" method="post">

                        <div class="row">
                            <div class="col-md-10">
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

                    <hr>

                    <div id="content">

                        <div class="row">
                            <div class="col col-md-4 mb-3">
                                <strong>Nama</strong>
                            </div>
                            <div class="col col-md-4 mb-3">
                                : <?= $user['nama_user']; ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col col-md-4 mb-3">
                                <strong>Jabatan</strong>
                            </div>
                            <div class="col col-md-4 mb-3">
                                : <?= $user['jabatan']; ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col col-md-4 mb-3">
                                <strong>Total Kehadiran</strong>
                            </div>
                            <div class="col col-md-4 mb-3">
                                : <?= $kehadiran; ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col col-md-4 mb-3">
                                <strong>Gaji Pokok</strong>
                            </div>
                            <div class="col col-md-4 mb-3">
                                : Rp. <?= number_format($gaji_pokok['gaji_pokok']); ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col col-md-4 mb-3">
                                <strong>Bonus</strong>
                            </div>
                            <div class="col col-md-4 mb-3">
                                : Rp. <?= number_format($bonus['bonus'] * $kehadiran); ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col col-md-4 mb-3">
                                <strong>Total Pendapatan</strong>
                            </div>
                            <div class="col col-md-4 mb-3">
                                : <strong>Rp. <?= number_format($total_gaji_pokok); ?></strong>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>




    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="./script.js"></script>
</body>

</html>