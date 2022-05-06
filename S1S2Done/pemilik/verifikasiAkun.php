<?php

require_once '../functions.php';

$id_user = $_GET['id'];

$conn->query("UPDATE users SET verifikasi = 'Telah diverifikasi' WHERE id_user = '$id_user'");

echo '<script> alert("Karyawan telah diverifikasi"); </script>';
echo '<script> location="./dataVerifikasi.php"; </script>';
