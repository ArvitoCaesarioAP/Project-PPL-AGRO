<?php

require_once "./functions.php";

session_start();

if (!isset($_SESSION['login'])) {
    header("Location: ./login.php");
    exit;
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
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

    <title>Index Sumber Rejeki</title>
</head>

<body>

    <?php include 'navbar.php'; ?>

    <div class="card navbar-light bg-transparent" style="font-size: medium;
        text-align: center;
        padding-top: 0.5rem;">
        <p>
            <a href="https://www.instagram.com
                "><i class="bi bi-instagram"></i></a>
            <span>&ensp;</span>
            <a href="https://twitter.com/"><i class="bi bi-twitter"></i></a>
            <span>&ensp;</span>
            <a href="https://www.facebook.com/
                "><i class="bi bi-facebook"></i></a>
        </p>
        <p style="font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif; font-size: x-large"><b>TOKOKOPI</b><i class="bi bi-cup"></i></p>
        <p>Proud of Indonesian Coffe</p>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-4 pt-4 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center" style="padding-right: 5rem; margin-right: 20rem">
                <h3 style="margin-top: 5rem; font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif; font-size: large; text-shadow: 0px 2px 3px grey">TOKOKOPI SUMBER REJEKI</h3>
                <hr style="border: 2px solid black" />
                <p style="color: darkred; font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif; font-size: large">
                    Setiap karakter dan arti kehidupan dapat kita temukan dalam secangkir kopi. Selama ada yang namanya kopi, orang-orang dapat menemukan dirinya disini.
                </p>
            </div>
            <div class="col-lg-4 pt-4 order-1 order-lg-2 d-flex flex-column justify-content-center">
                <img src="./assets/img/gambardiindex.jpeg" class="img-fluid" alt="gambar toko sumber rejeki" style="margin: 2rem" />
            </div>
        </div>
    </div>
    <div class="container-fluid py-4" style="background-color: white; margin-top: 0.8rem">
        <p class="" style="text-align: center; font-size: medium; padding-top: 0.5rem">&copy;Design by Kelompok PPLAM</p>
    </div>


    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>

</html>