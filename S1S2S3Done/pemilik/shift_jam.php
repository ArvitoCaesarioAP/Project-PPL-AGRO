<?php

require_once('../functions.php');
session_start();
$datas = query("SELECT * FROM shift_jam");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <title>Waktu Jam Kerja</title>
</head>

<body>

    <?php include 'navbar.php' ?>

    <div class="container mt-5">
        <h2 class="mb-3 text-center mb-5">Waktu Jam Kerja</h2>
        <hr>
        <form action="ubah_shift_jam.php" method="POST">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>KETERANGAN</th>
                        <th>JAM MULAI</th>
                        <th>JAM SELESAI</th>
                        <th>AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($datas as $data) : ?>
                        <tr>
                            <td><?= $i; ?></td>
                            <td><?= $data['shift']; ?></td>
                            <td><?= $data['start']; ?></td>
                            <td><?= $data['finish']; ?></td>
                            <td>
                                <a href="./ubah_shift_jam.php?id=<?= $data['shift_jam_id']; ?>" class="btn btn-primary btn-sm">
                                    <i class="bi bi-pencil-square">Ubah Jam</i>
                                </a>
                            </td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </form>
    </div>

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>

</html>