<?php
    $BASE_URL = realpath(dirname(__DIR__).'\..');
    include($BASE_URL.'/connect_db.php');
    include($BASE_URL.'/model/Penjualan.php');

    if(isset($_POST['update']));
    {
        $penjualan = new Penjualan($conn);
        $penjualan->setIdPenjualan($_POST['id_penjualan']);
        $penjualan->setJumlahPenjualan($_POST['jumlah_penjualan']);
        $penjualan->setHargaJual($_POST['harga_jual']);
        $penjualan->setIdPengguna($_POST['id_pengguna']);
        $penjualan->setIdBarang($_POST['id_barang']);
        $penjualan->setIdPelanggan($_POST['id_pelanggan']);
        $penjualan->updatePenjualan();
        header ("location:/erp-TK4/view/penjualan/index.php");
    }
?>