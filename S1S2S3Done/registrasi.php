<?php
require_once("./functions.php");

if (isset($_POST["register"])) {
    if (registrasi($_POST) > 0) {
        echo "
            <script> 
                alert('User baru berhasil ditambahkan');
                document.location.href = 'login.php';
            </script>
        ";
    } else {
        echo mysqli_error($conn);
    }
}

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Daftar Akun</title>
</head>

<body background="./assets/img/background-aplikasi2.jpg">

    <section id="registrasi">
        <div class="container">
            <div class="row justify-content-center" style="margin-top: 150px">
                <div class="col-md-4 text-white" style="background-color: #515151;">
                    <div class="header text-center my-4 ">
                        <h5>Daftar Akun</h5>
                        <p>Masukkan data diri anda untuk membuat akun</p>
                    </div>
                    <form action="" method="post">
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama" required>
                        </div>
                        <div class="mb-3">
                            <label for="nohp" class="form-label">No HP</label>
                            <input type="text" pattern="^\d{12}$" class="form-control" id="nohp" name="nohp" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email address</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <div class="d-grid gap-2 text-center">
                            <button type="submit" class="btn btn-primary" name="register">Daftar Akun</button>
                            <p>Sudah memiliki akun ? <a href="login.php" style="text-decoration: none; color: #6296C5;">login</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>


    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>

</html>