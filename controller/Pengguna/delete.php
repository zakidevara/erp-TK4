<?php
    $BASE_URL = realpath(dirname(__DIR__).'\..');
	include($BASE_URL.'/connect_db.php');
	include($BASE_URL.'/model/Pengguna.php');

    if(isset($_GET['id']));
    {
        $id = $_GET['id'];
        $pengguna = new Pengguna($conn);
        try {
            $pengguna->deletePengguna($id);
            header ("location:/erp-TK4/view/pengguna/index.php");
        } catch (Exception $e) {
            echo "<p>Gagal menghapus dengan error: </p>";
            echo $e;
            echo "<p>Kembali ke halaman sebelumnya dalam 3 detik...</p>";
            header ("Refresh: 3; URL=/erp-TK4/view/pengguna/index.php");
        }
    }
?>