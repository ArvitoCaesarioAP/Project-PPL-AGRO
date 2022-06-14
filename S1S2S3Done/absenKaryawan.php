<?php

require_once('functions.php');
session_start();

if (isset($_GET['shift_karyawan_id'])) {
    if (absensi_karyawan($_GET) > 0) {
        echo "
                    <script> 
                        alert('Absen Berhasil!');
                        document.location.href = './absenKaryawan.php';
                    </script>
                    ";
    } else {
        echo "
                <script> 
                alert('Absen Gagal!');
                document.location.href = './absenKaryawan.php';
                </script>
                ";
    }
}

$id_user = $_SESSION['user']['id_user'];

date_default_timezone_set('Asia/Jakarta');
if (isset($_POST['submit'])) {
    $date = isset($_POST['date']) ? $_POST['date'] : date('Y-m-d');
} else {
    $date = date('Y-m-d');
}

$tanggal_hari_ini = date('Y-m-d');
$time = date('H:i:s');
$datas = query("SELECT * FROM shift_karyawan JOIN shift_jam ON shift_karyawan.shift = shift_jam.shift JOIN users ON users.id_user = shift_karyawan.id_user  WHERE shift_karyawan.id_user = {$id_user} AND shift_karyawan.tanggal_absen = '$date' ");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

    <title>Document</title>
</head>

<body>

    <?php include 'navbar.php' ?>

    <div class="container mt-5">
        <h2 class="my-5 text-center">Absen Karyawan</h2>

        <form action="" method="POST">
            <div class="col">
                <label for="date" class="mb-3">Tanggal Hari ini : </label>
            </div>
            <div class="row mb-3">
                <div class="col col-md-4 d-grid">
                    <input type="date" name="date" id="date" value="<?= $date; ?>">
                </div>
                <div class="col col-md-4">
                    <button type="submit" class="btn btn-primary" name="submit" id="submit">Lihat</button>
                </div>
            </div>
        </form>
        <hr>
        <table class="table table-striped table-hover align-middle">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>NO HP</th>
                    <th>Jabatan</th>
                    <th>Jam Absen</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; ?>
                <?php foreach ($datas as $data) : ?>
                    <?php
                    $absen_success = query("SELECT * FROM absensi_karyawan WHERE tanggal_absen = '$date' AND shift_karyawan_id = '$data[shift_karyawan_id]'")
                    ?>
                    <tr>
                        <td><?= $no; ?></td>
                        <td><?= $data['nama_user']; ?></td>
                        <td><?= $data['email_user']; ?></td>
                        <td><?= $data['no_hp_user']; ?></td>
                        <td><?= $data['jabatan']; ?></td>
                        <td><?= $data['start']; ?> - <?= $data['finish']; ?></td>
                        <td>
                            <?php if (!empty($absen_success)) : ?>
                                <?php foreach ($absen_success as $success) : ?>
                                    <?php if ($success['keterangan_absen'] == 'Masuk') : ?>
                                        <button class="btn btn-success"><i class="bi bi-check-lg">Terecord</i></button>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            <?php else : ?>
                                <?php if (($data['start'] <= $time && $data['finish'] >= $time) and ($data['tanggal_absen'] == $tanggal_hari_ini)) : ?>
                                    <a href="./absenKaryawan.php?shift_karyawan_id=<?= $data['shift_karyawan_id']; ?>&id_user=<?= $id_user; ?>&jam=<?= $time; ?>" class="btn btn-primary btn-sm">Absen</a>
                                <?php else : ?>
                                    <button disabled="disabled" class="btn btn-danger btn-sm">Tidak Absen</button>
                                <?php endif; ?>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <?php $no++ ?>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>

</html>