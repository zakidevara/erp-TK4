<?php
    $BASE_URL = realpath(dirname(__DIR__).'\..');
	include($BASE_URL.'/connect_db.php');
	include($BASE_URL.'/model/Barang.php');
    
    if(isset($_POST['add']));
    {
        $barang = new Barang($conn);
        $barang->setIdBarang($_POST['id_barang']);
        $barang->setNamaBarang($_POST['nama_barang']);
        $barang->setSatuan($_POST['satuan']);
        $barang->setKeterangan($_POST['keterangan']);
        $barang->setIdPengguna($_POST['id_pengguna'])
        
        try {
            $barang->addBarang();
            header ("location:/erp-TK4/view/barang/index.php");
        } catch (Exception $e) {
            echo "<p>Gagal menambahkan barang dengan error: </p>";
            echo $e;
            echo "<p>Kembali ke halaman sebelumnya dalam 3 detik...</p>";
            header ("Refresh: 3; URL=/erp-TK4/view/barang/index.php");
        }
    }
?>