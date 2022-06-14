<?php

require_once('../functions.php');
session_start();

// cek apakah tombol submit sudah ditekan atau belum
if (isset($_POST["submit"])) {
    // echo '<script> alert("post ubah"); </script>';
    // cek apakah data berhasil di ubah atau tidak
    if (bonus($_POST) > 0) {
        echo "
            <script> 
            alert('Data Bonus berhasil diubah');
            document.location.href = './gaji.php';
            </script>
            ";
    }

    if (gaji($_POST) > 0) {
        echo "
            <script> 
                alert('Data Gaji berhasil diubah');
                document.location.href = './gaji.php';
            </script>
            ";
    }
};

$gaji_pokok = query("SELECT * FROM gaji_pokok")[0];
$bonus = query("SELECT * FROM bonus")[0];
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

    <title>Atur Gaji Karyawan</title>
</head>

<body>

    <?php include 'navbar.php' ?>

    <div class="container mt-5">
        <form action="" method="POST">
            <input type="hidden" name="gaji_pokok_id" value="<?= $gaji_pokok['gaji_pokok_id']; ?>">
            <input type="hidden" name="bonus_id" value="<?= $bonus['bonus_id']; ?>">
            <h2 class="text-center my-5">GAJI</h2>
            <div class="row justify-content-center">
                <div class="col col-md-5">
                    <div class="col col-12 mb-3">
                        <label for="gaji_pokok" class="form-label">Gaji Pokok :</label>
                        <input type="number" class="form-control" id="gaji_pokok" name="gaji_pokok" value="<?= $gaji_pokok['gaji_pokok']; ?>" required>
                    </div>
                    <div class="col col-12 mb-3">
                        <label for="bonus" class="form-label">Bonus :</label>
                        <input type="number" class="form-control" id="bonus" name="bonus" value="<?= $bonus['bonus']; ?>" required>
                    </div>

                    <div class="col col-12 d-flex justify-content-end ">
                        <button class="btn btn-primary me-3" name="submit">Simpan</button>
                        <a href="../laporanGaji.php" class="btn btn-outline-secondary">Gaji Karyawan</a>
                    </div>
                </div>
            </div>
        </form>


    </div>

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>

</html>