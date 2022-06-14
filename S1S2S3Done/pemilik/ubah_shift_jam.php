<?php

require_once('../functions.php');
session_start();

$shift_jam_id = $_GET['id'];
$datas = query("SELECT * FROM shift_jam WHERE shift_jam_id = {$shift_jam_id}")[0];

// cek apakah tombol submit sudah ditekan atau belum
if (isset($_POST["simpan"])) {
    // echo '<script> alert("post ubah"); </script>';
    // cek apakah data berhasil di ubah atau tidak
    if (shift_jam($_POST, $shift_jam_id) > 0) {
        echo "
            <script> 
                alert('Jam kerja berhasil diubah');
                document.location.href = './shift_jam.php';
            </script>
            ";
    } else {
        echo "
        <script> 
        alert('Jam kerja gagal diubah');
        // document.location.href = './ubah_shift_jam.php?id=$shift_jam_id';
        </script>
        ";
    }
    // $success = false;
};
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
    <title>Ubah Jam Kerja</title>
</head>

<body>

    <?php include 'navbar.php' ?>

    <div class="container mt-5">
        <form action="" method="POST">
            <input type="hidden" name="shift_jam_id" id="shift_jam_id" value="<?= $datas['shift_jam_id']; ?>">
            <div class="row d-flex justify-content-center">
                <div class="col col-md-6">
                    <div class="row d-flex justify-content-center   ">
                        <div class="col col-md-12">
                            <h2 class="mb-3">Edit Jam Masuk</h2>
                        </div>
                        <div class="col d-grid col-md-12 mb-3">
                            <label for="start">Jam Mulai :</label>
                        </div>
                        <div class="col d-grid col-md-12 mb-3">
                            <input type="time" name="start" id="start" value="<?= $datas['start']; ?>">
                        </div>
                        <div class="col d-grid col-md-12 mb-3">
                            <label for="finish">Jam Selesai :</label>
                        </div>
                        <div class="col d-grid col-md-12 mb-3">
                            <input type="time" name="finish" id="finish" value="<?= $datas['finish']; ?>">
                        </div>
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <button class="btn btn-primary" name="simpan">Simpan</button>
                            <a href="shift_jam.php" class="btn btn-outline-secondary">Kembali</a>
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