<?php

require_once "./functions.php";

session_start();

if (!isset($_SESSION['login'])) {
    header("Location: ./login.php");
    exit;
}

$id_user = $_SESSION['user']['id_user'];

$user = query("SELECT * FROM users WHERE id_user = '$id_user'")[0]

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

    <title>Profil Akun</title>
</head>

<body>

    <?php include 'navbar.php'; ?>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 mt-5 text-center">
                <h3>PROFILE</h3>
                <hr class="bg-dark">
            </div>
            <form action="" method="post">
                <div class="row justify-content-center">
                    <div class="col-md-5">
                        <div class="col mb-3">
                            <div class="form-group">
                                <label for="nama_user">Nama</label>
                                <input type="text" class="form-control mt-2" name="nama_user" id="nama_user" value="<?= $user['nama_user']; ?>" readonly>
                            </div>
                        </div>
                        <div class="col mb-3">
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" class="form-control mt-2" name="username" id="username" value="<?= $user['username']; ?>" readonly>
                            </div>
                        </div>
                        <div class="col mb-3">
                            <div class="form-group">
                                <label for="alamat_user">Alamat</label>
                                <input type="text" class="form-control mt-2" name="alamat_user" id="alamat_user" value="<?= $user['alamat_user']; ?>" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="col mb-3">
                            <div class="form-group">
                                <label for="email_user">Email</label>
                                <input type="email" class="form-control mt-2" name="email_user" id="email_user" value="<?= $user['email_user']; ?>" readonly>
                            </div>
                        </div>
                        <div class="col mb-3">
                            <div class="form-group">
                                <label for="jabatan">Jabatan</label>
                                <input type="text" class="form-control mt-2" name="jabatan" id="jabatan" value="<?= $user['jabatan']; ?>" readonly>
                            </div>
                        </div>
                        <div class="col mb-3">
                            <div class="form-group">
                                <label for="no_hp_user">No HP</label>
                                <input type="text" class="form-control mt-2" name="no_hp_user" id="no_hp_user" value="<?= $user['no_hp_user']; ?>" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-10">
                        <div class="d-flex justify-content-between">
                            <a href="ubahProfil.php" class="btn btn-light"><strong><i class="bi bi-pencil-square"></i> Edit Profil</strong></a>
                            <a href="logout.php" class="btn btn-light"><strong>Logout</strong></a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>


    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>

</html>