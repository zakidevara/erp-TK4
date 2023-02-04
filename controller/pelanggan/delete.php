<?php
    $BASE_URL = realpath(dirname(__DIR__).'\..');
	include($BASE_URL.'/connect_db.php');
	include($BASE_URL.'/model/Pelanggan.php');

    if(isset($_GET['id']));
    {
        $id = $_GET['id'];
        $pelanggan = new Pelanggan($conn);
        try {
            $pelanggan->deletePelanggan($id);
            header ("location:/erp-TK4/view/pelanggan/index.php");
        } catch (Exception $e) {
            echo "<p>Gagal menghapus dengan error: </p>";
            echo $e;
            echo "<p>Kembali ke halaman sebelumnya dalam 3 detik...</p>";
            header ("Refresh: 3; URL=/erp-TK4/view/pelanggan/index.php");
        }
    }
?>