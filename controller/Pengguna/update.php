<?php
    $BASE_URL = realpath(dirname(__DIR__).'\..');
	include($BASE_URL.'/connect_db.php');
	include($BASE_URL.'/model/Pengguna.php');
    
    if(isset($_POST['update']));
    {
        $pengguna = new Pengguna($conn);
        $pengguna->setIdPengguna($_POST['id_pengguna']);
        $pengguna->setNamaPengguna($_POST['nama_pengguna']);
        $pengguna->setPassword($_POST['password']);
        echo $_POST['nama_depan'];
        $pengguna->setNamaDepan($_POST['nama_depan']);
        $pengguna->setNamaBelakang($_POST['nama_belakang']);
        $pengguna->setNoHP($_POST['no_hp']);
        $pengguna->setAlamat($_POST['alamat']);
        $pengguna->updatePengguna();
        header ("location:/erp-TK4/view/pengguna/index.php");
    }
?>