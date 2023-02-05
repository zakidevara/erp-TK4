<?php
    $BASE_URL = realpath(dirname(__DIR__).'\..');
	include($BASE_URL.'/connect_db.php');
	include($BASE_URL.'/model/HakAkses.php');

    if(isset($_GET['id']));
    {
        $id = $_GET['id'];
        $hakakses = new HakAkses($conn);
        try {
            $hakakses->deleteHakAkses($id);
            header ("location:/erp-TK4/view/hakakses/index.php");
        } catch (Exception $e) {
            echo "<p>Gagal menghapus dengan error: </p>";
            echo $e;
            echo "<p>Kembali ke halaman sebelumnya dalam 3 detik...</p>";
            header ("Refresh: 3; URL=/erp-TK4/view/hakakses/index.php");
        }
    }
?>