<?php

require_once('../functions.php');
session_start();

$shift_karyawan_id = isset($_GET['shift_karyawan_id']) ? $_GET['shift_karyawan_id'] : header('Location: shift_karyawan.php');

// cek apakah tombol submit sudah ditekan atau belum
if (isset($_POST["ubah"])) {
    if (ubah_shift_karyawan($_POST, $shift_karyawan_id) > 0) {
        echo "
            <script> 
                alert('Shift kerja berhasil diubah!');
                document.location.href = './shift_karyawan.php';
            </script>
            ";
    } else {
        echo "
        <script> 
        alert('Shift kerja gagal diubah!');
        document.location.href = './ubah_shift_karyawan.php?shift_karyawan_id=$shift_karyawan_id';
        </script>
        ";
    }
};

date_default_timezone_set('Asia/Jakarta');
if (isset($_POST['submit'])) {
    $date = isset($_POST['date']) ? $_POST['date'] : date('Y-m-d');
} else {
    $date = date('Y-m-d');
}
$tanggal_hari_ini = date('Y-m-d');
$time = date('H:i:s');
$datas = query("SELECT * FROM shift_karyawan JOIN shift_jam ON shift_karyawan.shift = shift_jam.shift JOIN users ON users.id_user = shift_karyawan.id_user  WHERE shift_karyawan.shift_karyawan_id = {$shift_karyawan_id} ")[0];

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

<body style="min-height: 100vh ;">

    <?php include 'navbar.php' ?>

    <div class="container mt-5">

        <form action="" method="post">
            <div class="row justify-content-center">
                <div class="col-md-5">
                    <div class="row">
                        <div class="col col-12 mb-3">
                            <label for="nama" class="form-label">Nama Karyawan :</label>
                            <input type="text" class="form-control" name="nama" id="nama" value="<?= $datas['nama_user']; ?>" disabled=disabled>
                        </div>
                        <div class="col col-12 mb-3">
                            <label for="tanggal_absen" class="form-label">Tanggal Shift Kerja :</label>
                            <input type="date" class="form-control" name="tanggal_absen" id="tanggal_absen" value="<?= $datas['tanggal_absen']; ?>" required>
                        </div>
                        <div class="col col-12 mb-3">
                            <label for="shift" class="form-label">Shift Kerja</label>
                            <select class="form-select" aria-label="Default select example" name="shift" id="shift" required>
                                <option value="Shift 1" <?php
                                                        if ($datas['shift'] == 'Shift 1') {
                                                            echo "Selected";
                                                        } ?>>Shift 1</option>
                                <option value="Shift 2" <?php
                                                        if ($datas['shift'] == 'Shift 2') {
                                                            echo "Selected";
                                                        } ?>>Shift 2</option>
                            </select>
                        </div>
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <a href="shift_karyawan.php" class="btn btn-outline-secondary">Kembali</a>
                            <button class="btn btn-primary me-md-2" type="submit" name="ubah" id="ubah">Ubah</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

    </div>

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>

</html>