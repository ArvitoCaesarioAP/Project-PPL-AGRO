<?php

session_start();

// memanggil funngsi fungsi ada pada file functions.php
require_once '../functions.php';

$sort = $_GET['sort'];

$produk = query("SELECT * FROM produk ORDER BY stock_produk $sort")

?>

<table class="table table-striped table-hover align-middle">
    <thead>
        <tr>
            <th>No</th>
            <th>Gambar</th>
            <th>Nama Produk</th>
            <th>Harga</th>
            <th>Stock</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1; ?>
        <?php foreach ($produk as $perproduk) : ?>
            <tr>
                <td><?= $no; ?></td>
                <td>
                    <img src="../assets/img/foto_produk/<?= $perproduk['gambar_produk']; ?>" width="100px" alt="gambar produk">
                </td>
                <td><?= $perproduk['nama_produk']; ?></td>
                <td><?= $perproduk['harga_produk']; ?></td>
                <td><?= $perproduk['stock_produk']; ?></td>
                <td>
                    <a href="./detailProduk.php?id=<?= $perproduk['id_produk']; ?>" class="btn btn-primary btn-sm">Detail</a>
                    <?php /* if ($_SESSION['user']['jabatan'] == 'karyawan') : ?>
                        <a href="./hapusProduk.php?id=<?= $perproduk['id_produk']; ?>" class="btn btn-danger btn-sm">Hapus</a>
                    <?php endif; */ ?>
                </td>
            </tr>
            <?php $no++ ?>
        <?php endforeach; ?>
    </tbody>
</table>