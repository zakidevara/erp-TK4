<?php
    $BASE_URL = realpath(dirname(__DIR__).'\..');
	include($BASE_URL.'/connect_db.php');
	include($BASE_URL.'/model/Pelanggan.php');
    
    if(isset($_POST['update']));
    {
        $pelanggan = new Pelanggan($conn);
        $pelanggan->setIdPelanggan($_POST['id_pelanggan']);
        $pelanggan->setNamaPelanggan($_POST['nama_pelanggan']);
        $pelanggan->setAlamat($_POST['alamat']);
        $pelanggan->setNoTelp($_POST['no_telp']);
        $pelanggan->updatePelanggan();
        header ("location:/erp-TK4/view/pelanggan/index.php");
    }
?>