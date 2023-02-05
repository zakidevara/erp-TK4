<?php
    $BASE_URL = realpath(dirname(__DIR__).'\..');
	include($BASE_URL.'/connect_db.php');
	include($BASE_URL.'/model/HakAkses.php');
    
    if(isset($_POST['add']));
    {
        $hakakses   = new HakAkses($conn);
        $hakakses->setIdAkses($_POST['id_akses']);
        $hakakses->setNamaAkses($_POST['nama_akses']);
        $hakakses->setKeterangan($_POST['keterangan']);
        
        
        try {
            $hakakses->addHakAkses();
            header ("location:/erp-TK4/view/hakakses/index.php");
        } catch (Exception $e) {
            echo "<p>Gagal menambahkan hak akses dengan error: </p>";
            echo $e;
            echo "<p>Kembali ke halaman sebelumnya dalam 3 detik...</p>";
            header ("Refresh: 3; URL=/erp-TK4/view/hakakses/index.php");
        }
    }
?>