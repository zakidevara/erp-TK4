<?php
    $BASE_URL = realpath(dirname(__DIR__).'\..');
	include($BASE_URL.'/connect_db.php');
	include($BASE_URL.'/model/Pengguna.php');
    
    if(isset($_POST['add']));
    {
        $pengguna = new Pengguna($conn);
        $pengguna->setIdPengguna($_POST['id_pengguna']);
        $pengguna->setNamaPengguna($_POST['nama_pengguna']);
        $pengguna->setPassword($_POST['password']);
        $pengguna->setNamaDepan($_POST['nama_depan']);
        $pengguna->setNamaBelakang($_POST['nama_belakang']);
        $pengguna->setNoHP($_POST['no_hp']);
        $pengguna->setAlamat($_POST['alamat']);
        
        try {
            $barang->addPengguna();
            header ("location:/erp-TK4/view/pengguna/index.php");
        } catch (Exception $e) {
            echo "<p>Gagal menambahkan pengguna dengan error: </p>";
            echo $e;
            echo "<p>Kembali ke halaman sebelumnya dalam 3 detik...</p>";
            header ("Refresh: 3; URL=/erp-TK4/view/pengguna/index.php");
        }
    }
?>