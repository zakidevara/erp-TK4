<?php
    $BASE_URL = realpath(dirname(__DIR__).'\..');
	include($BASE_URL.'/connect_db.php');
	include($BASE_URL.'/model/Pelanggan.php');
    
    if(isset($_POST['add']));
    {
        $pelanggan = new Pelanggan($conn);
        $pelanggan->setIdPelanggan($_POST['id_pelanggan']);
        $pelanggan->setNamaPelanggan($_POST['nama_pelanggan']);
        $pelanggan->setAlamat($_POST['alamat']);
        $pelanggan->setNoTelp($_POST['no_telp']);
        
        try {
            $pelanggan->addPelanggan();
            header ("location:/erp-TK4/view/pelanggan/index.php");
        } catch (Exception $e) {
            echo "<p>Gagal menambahkan Pelanggan dengan error: </p>";
            echo $e;
            echo "<p>Kembali ke halaman sebelumnya dalam 3 detik...</p>";
            header ("Refresh: 3; URL=/erp-TK4/view/pelanggan/index.php");
        }
    }
?>