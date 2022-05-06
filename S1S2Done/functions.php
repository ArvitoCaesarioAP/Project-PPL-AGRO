<?php

//koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "tokokopi");


function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function ubahPassword($data, $id)
{
    global $conn;
    $user = query("SELECT * FROM users WHERE id = $id")[0];

    // var_dump($data);
    $namalengkap = $user['namalengkap'];
    $email = $user['email'];
    $provinsi = $user['provinsi'];
    $kota = $user['kota'];
    $kecamatan = $user['kecamatan'];
    $kodepos = $user['kodepos'];
    $nohp = $user['nohp'];
    $password = mysqli_real_escape_string($conn, $data["passwordBaru"]);
    $role = $user['role'];
    $gambar = $user['gambar'];

    // enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);


    $query = " UPDATE users SET
                namalengkap = '$namalengkap',
                email = '$email',
                provinsi = '$provinsi',
                kota = '$kota',
                kecamatan = '$kecamatan',
                kodepos = '$kodepos',
                nohp = '$nohp',
                password = '$password',
                role = '$role',
                gambar = '$gambar'
                WHERE id = $id
            ";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}





function registrasi($data)
{

    global $conn;
    // var_dump($data);
    $nama = stripslashes($data["nama"]);
    $nohp = $data["nohp"];
    $email = strtolower(stripslashes($data["email"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $jabatan = 'karyawan';
    $verifikasi = 'Belum verifikasi';

    // cek username sudah ada atau belum
    $result = mysqli_query($conn, "SELECT email_user FROM users WHERE email_user = '$email'");

    if (mysqli_fetch_row($result)) {
        echo "
        <script> 
            alert('Email sudah terdaftar!');
        </script>
    ";
        return false;
    }


    // enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    // tambahkan userbaru ke database
    mysqli_query($conn, "INSERT INTO users VALUES ('', '$nama', '$email', '$nohp','', '$password', '', '$jabatan', '$verifikasi')");

    return mysqli_affected_rows($conn);
}

function ubah($data, $id)
{
    global $conn;

    $nama_user = htmlspecialchars($data["nama_user"]);
    $email_user = htmlspecialchars($data["email_user"]);
    $no_hp_user = htmlspecialchars($data["no_hp_user"]);
    $username = htmlspecialchars($data["username"]);
    $alamat_user = htmlspecialchars($data["alamat_user"]);

    $query = " UPDATE users SET
                nama_user = '$nama_user',
                email_user = '$email_user',
                no_hp_user = '$no_hp_user',
                username = '$username',
                alamat_user = '$alamat_user'
                WHERE id_user = $id
            ";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function tambahProduk($data)
{
    global $conn;
    $nama_produk = htmlspecialchars($data["nama_produk"]);
    $deskripsi_produk = htmlspecialchars($data["deskripsi_produk"]);
    $harga_produk = htmlspecialchars($data["harga_produk"]);
    $stock_produk = htmlspecialchars($data["stock_produk"]);
    $gambar_produk = htmlspecialchars($_FILES['gambar_produk']['name']);

    // upload gambar
    $gambar_produk = uploadProduk();
    if (!$gambar_produk) {
        return false;
    }

    $query = "INSERT INTO produk VALUES
                ('','$nama_produk', '$deskripsi_produk', '$harga_produk', '$stock_produk', '$gambar_produk')";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function ubahProduk($data, $id)
{
    global $conn;
    $produk = query("SELECT * FROM produk WHERE id_produk = $id")[0];

    $nama_produk = htmlspecialchars($data["nama_produk"]);
    $deskripsi_produk = htmlspecialchars($data["deskripsi_produk"]);
    $harga_produk = htmlspecialchars($data["harga_produk"]);
    $stock_produk = htmlspecialchars($data["stock_produk"]);
    $gambar_produk = htmlspecialchars($_FILES['gambar_produk']['name']);


    $error = $_FILES['gambar_produk']['error'];

    // cek apakah tidak ada file yang di upload
    if ($error !== 4) {
        $result = mysqli_query($conn, "SELECT gambar_produk FROM produk WHERE id_produk = $id");
        $file = mysqli_fetch_assoc($result);

        $fileName = implode('.', $file);

        $location = "../assets/img/foto_produk/$fileName";
        if (file_exists($location)) {
            unlink("../assets/img/foto_produk/" . $fileName);
        }
        $gambar_produk = uploadProduk();
    } else if ($error === 4) {
        $gambar_produk = $produk['gambar_produk'];
    }

    $query = " UPDATE produk SET
                nama_produk = '$nama_produk',
                deskripsi_produk = '$deskripsi_produk',
                harga_produk = '$harga_produk',
                stock_produk = '$stock_produk',
                gambar_produk = '$gambar_produk'
                WHERE id_produk = $id
            ";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function uploadProduk()
{

    $namaFile = $_FILES['gambar_produk']['name'];
    $ukuranFile = $_FILES['gambar_produk']['size'];
    $error = $_FILES['gambar_produk']['error'];
    $tmpName = $_FILES['gambar_produk']['tmp_name'];

    // cek apakah yang diupload adalah gambar
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $namaSementara = $ekstensiGambar;
    $namaSementaraLagi = strtolower($namaSementara[0]);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    $namaSementara = $ekstensiGambar;
    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "<script>
                alert('Format harus jpg, jpeg atau png!');
                </script>";
        return false;
    }

    // cek jika ukurannya terlalu besar
    if ($ukuranFile > 3000000) {
        echo "<script>
                alert('Ukuran gambar terlalu besar! maks 3mb');
                </script>";
        return false;
    }

    // lolos pengecheckan, gambar siap di upload
    // generate nama gambar baru
    $namaFileBaru = uniqid() . '-' . $namaSementaraLagi;
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;
    move_uploaded_file($tmpName, '../assets/img/foto_produk/' . $namaFileBaru);
    return $namaFileBaru;
}

function hapusProduk($id)
{

    global $conn;
    $result = mysqli_query($conn, "SELECT gambar_produk FROM produk WHERE id_produk = $id");
    $file = mysqli_fetch_assoc($result);

    $fileName = implode('.', $file);

    $location = "../assets/img/foto_produk/$fileName";
    if (file_exists($location)) {
        unlink('../assets/img/foto_produk/' . $fileName);
    }

    mysqli_query($conn, "DELETE FROM produk where id_produk = $id");

    return mysqli_affected_rows($conn);
}

function tambahLaporan($data)
{
    global $conn;
    $nama_laporan = htmlspecialchars($data["nama_laporan"]);
    $total = htmlspecialchars($data["total"]);
    $deskripsi_laporan = htmlspecialchars($data["deskripsi_laporan"]);
    $tanggal = date("Y-m-d");


    $query = "INSERT INTO laporan_keuangan VALUES
                ('','$tanggal', '$nama_laporan', '$total', '$deskripsi_laporan')";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function ubahLaporan($data, $id)
{
    global $conn;

    $nama_laporan = htmlspecialchars($data["nama_laporan"]);
    $total = htmlspecialchars($data["total"]);
    $keterangan_laporan = htmlspecialchars($data["deskripsi_laporan"]);

    $query = " UPDATE laporan_keuangan SET
                nama_laporan = '$nama_laporan',
                total = '$total',
                keterangan_laporan = '$keterangan_laporan'
                WHERE id_laporan_keuangan = $id
            ";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}
