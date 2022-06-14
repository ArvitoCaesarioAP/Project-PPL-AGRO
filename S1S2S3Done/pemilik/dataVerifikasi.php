<?php

require_once "../functions.php";

session_start();

if (!isset($_SESSION['login'])) {
    header("Location: ../login.php");
    exit;
}

if ($_SESSION['user']['jabatan'] !== 'pemilik') {
    header("Location: ../index.php");
    exit;
}

$verifikasi_karyawan = query("SELECT * FROM users WHERE jabatan = 'karyawan' AND verifikasi = 'Belum verifikasi'");

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

    <title>Verifikasi Karyawan</title>
</head>

<body>

    <?php include 'navbar.php'; ?>


    <div class="container">

        <h2 class="text-center my-5">Verifikasi Akun Karyawan</h2>
        <hr>
        <table class="table table-striped table-hover align-middle">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>NO HP</th>
                    <th>Jabatan</th>
                    <th>Status Verifikasi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; ?>
                <?php foreach ($verifikasi_karyawan as $verifikasi) : ?>
                    <tr>
                        <td><?= $no; ?></td>
                        <td><?= $verifikasi['nama_user']; ?></td>
                        <td><?= $verifikasi['email_user']; ?></td>
                        <td><?= $verifikasi['no_hp_user']; ?></td>
                        <td><?= $verifikasi['jabatan']; ?></td>
                        <td><?= $verifikasi['verifikasi']; ?></td>
                        <td>
                            <a href="./verifikasiAkun.php?id=<?= $verifikasi['id_user']; ?>" class="btn btn-primary btn-sm">Verifikasi Akun</a>
                        </td>
                    </tr>
                    <?php $no++ ?>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>


    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>

</html>