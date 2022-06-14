<?php

require_once('../functions.php');
session_start();

// cek apakah tombol submit sudah ditekan atau belum
if (isset($_POST["submit"])) {

    if (shift_karyawan($_POST) > 0) {
        echo "
            <script> 
                alert('Tambah Absen Berhasil ');
                document.location.href = './dataAbsen.php';
            </script>
            ";
    } else {
        echo "
        <script> 
        alert('Tambah Absen Gagal');
        document.location.href = './dataAbsen.php';
        </script>
        ";
    }
};

date_default_timezone_set('Asia/Jakarta');
$date = date('d-m-Y H:i:s');
$time = date('H:i:s');
$ds = '11:00:00';
$df = '13:35:00';
$datas = query("SELECT * FROM users WHERE jabatan = 'karyawan' AND verifikasi = 'Telah diverifikasi'");
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

    <title>Tambah Data Absen</title>
</head>

<body>

    <?php include 'navbar.php' ?>

    <div class="container mt-5">

        <form action="" method="POST">

            <h2 class="text-center my-5"> Shift Karyawan</h2>
            <div class="row justify-content-center">
                <div class="col col-md-5">
                    <hr>
                    <div class="col col-12 mb-3">
                        <label for="tanggal_absen" class="form-label">Tanggal Shift Kerja :</label>
                        <input type="date" class="form-control" id="tanggal_absen" name="tanggal_absen" required>
                    </div>
                    <div class="col mb-3">
                        <div class="col col-12 mb-3">
                            <label for="shift" class="form-label">Shift Kerja</label>
                            <select class="form-select" aria-label="Default select example" name="shift" id="shift" required>
                                <option value="Shift 1" selected>Shift 1</option>
                                <option value="Shift 2">Shift 2</option>
                            </select>
                        </div>
                    </div>
                    <div class="col col-12 mb-3"></div>
                    <div class="col col-12 mb-3">
                        <label for="nama_karyawan">Nama Karyawan</label>
                        <select class="form-select" multiple aria-label="multiple select example" name="nama_karyawan[]" id="nama_karyawan[]" required>
                            <?php foreach ($datas as $data) : ?>
                                <option value="<?= $data['id_user']; ?>"><?= $data['nama_user']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col col-12 mb-3"></div>
                    <div class="col col-12 d-flex justify-content-end">
                        <a href="./shift_karyawan.php" class="btn btn-outline-secondary me-3">Kembali</a>
                        <button class="btn btn-primary" name="submit">Tambah Absen</button>
                    </div>
                </div>
            </div>
        </form>


    </div>

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>

</html>