<?php
    $BASE_URL = realpath(dirname(__DIR__).'\..');
	include($BASE_URL.'/connect_db.php');
	include($BASE_URL.'/model/HakAkses.php');
    
    if(isset($_POST['update']));
    {
        $hakakses = new HakAkses($conn);
        $hakakses->setIdAkses($_POST['id_akses']);
        $hakakses->setNamaAkses($_POST['nama_akses']);
        $hakakses->setKeterangan($_POST['keterangan']);
        header ("location:/erp-TK4/view/hakakses/index.php");
    }
?>