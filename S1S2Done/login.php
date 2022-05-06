<?php
require_once("./functions.php");

session_start();


if (isset($_SESSION['login'])) {
    header("Location: ./index.php");
    exit;
}



if (isset($_POST["login"])) {

    $email = $_POST["email"];
    $password = $_POST["password"];


    $result = mysqli_query($conn, "SELECT * FROM users WHERE email_user = '$email' AND verifikasi = 'Telah diverifikasi'");
    $verifikasi = mysqli_query($conn, "SELECT * FROM users WHERE email_user = '$email' AND verifikasi = 'Belum verifikasi'");

    // cek verifikasi
    if (mysqli_num_rows($verifikasi) === 1) {

        echo "<script> alert('Akun Anda belum di verifikasi!'); </script>";
        echo '<script> location="./login.php"; </script>';

        return false;
    }

    // cek username
    if (mysqli_num_rows($result) === 1) {

        // cek password
        $row = mysqli_fetch_assoc($result);

        if (password_verify($password, $row['password'])) {

            $_SESSION["login"] = true;
            $_SESSION["user"] = $row;
            header("Location: ./index.php");
            exit;
        }
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

    <title>Login Akun</title>
</head>

<body id="body-login" background="./assets/img/background-aplikasi2.jpg">

    <section id="login">
        <div class="container">
            <div class="row justify-content-center" style="margin-top: 200px">
                <div class="col-md-4 text-white" style="background-color: #515151;">
                    <div class="header text-center my-4 ">
                        <h5>LOGIN TO YOUR ACCOUNT</h5>
                        <p>Masukkan Email kamu untuk login</p>
                    </div>
                    <form action="" method="post">
                        <div class="mb-3">
                            <label for="email" class="form-label">Email address</label>
                            <input type="email" class="form-control" id="email" name="email">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password">
                        </div>
                        <div class="d-grid gap-2 text-center">
                            <button type="submit" class="btn btn-primary" name="login">Login</button>
                            <p>Belum memiliki akun ? <a href="registrasi.php" style="text-decoration: none; color: #6296C5;">Buat Akun</a></p>
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