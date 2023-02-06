<?php
    $BASE_URL = realpath(dirname(__DIR__).'\..');
	include($BASE_URL.'/connect_db.php');
	include($BASE_URL.'/model/Barang.php');
    
    if(isset($_POST['update']));
    {
        $barang = new Barang($conn);
        $barang->setIdBarang($_POST['id_barang']);
        $barang->setNamaBarang($_POST['nama_barang']);
        $barang->setKeterangan($_POST['keterangan']);
        $barang->setSatuan($_POST['satuan']);
        $barang->setIdPengguna($_POST['id_pengguna']);
        $barang->updateBarang();
        header ("location:/erp-TK4/view/barang/index.php");
    }
?>