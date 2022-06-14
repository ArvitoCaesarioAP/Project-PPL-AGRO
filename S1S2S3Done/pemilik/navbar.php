<?php if ($_SESSION['user']['jabatan'] == 'pemilik') : ?>
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: yellow;">
        <div class="container">
            <a class="navbar-brand" href="../index.php" style="font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif; font-size: x-large"><b>TOKOKOPI</b><i class="bi bi-cup"></i></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse d-flex justify-content-end" id="navbarSupportedContent">
                <ul class="navbar-nav mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            karyawan
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="./dataVerifikasi.php">Verifikasi Akun Karyawan</a></li>
                            <li><a class="dropdown-item" href="./shift_jam.php">Waktu Jam Kerja</a></li>
                            <li><a class="dropdown-item" href="./shift_karyawan.php">Data Shift Karyawan</a></li>
                            <li><a class="dropdown-item" href="./gaji.php">Gaji Karyawan</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Data Produk
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="./dataProduk.php">Data Produk</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Laporan Keuangan
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="../laporanKeuangan.php">Laporan Keuangan</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-person-circle"></i>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="../profil.php">Profil</a></li>
                            <?php if (!isset($_SESSION['login'])) : ?>
                                <li><a class="dropdown-item" href="../login.php">Login</a></li>
                            <?php elseif (isset($_SESSION['login'])) : ?>
                                <li><a class="dropdown-item" href="../logout.php">Logout</a></li>
                            <?php endif; ?>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
<?php elseif ($_SESSION['user']['jabatan'] == 'karyawan') : ?>
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: yellow;">
        <div class="container">
            <a class="navbar-brand" href="../index.php" style="font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif; font-size: x-large"><b>TOKOKOPI</b><i class="bi bi-cup"></i></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse d-flex justify-content-end" id="navbarSupportedContent">
                <ul class="navbar-nav mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Data Produk
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="./dataProduk.php">Data Produk</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Karyawan
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="../absenKaryawan.php">Absen Karyawan</a></li>
                            <li><a class="dropdown-item" href="../detail_gaji.php">Laporan Gaji</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Laporan Keuangan
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="../laporanKeuangan.php">Laporan Keuangan</a></li>
                        </ul>
                    </li>
                </ul>
                <ul class="navbar-nav mb-2 mb-lg-0">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-person-circle"></i>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="../profil.php">Profil</a></li>
                            <?php if (!isset($_SESSION['login'])) : ?>
                                <li><a class="dropdown-item" href="../login.php">Login</a></li>
                            <?php elseif (isset($_SESSION['login'])) : ?>
                                <li><a class="dropdown-item" href="../logout.php">Logout</a></li>
                            <?php endif; ?>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
<?php endif; ?>