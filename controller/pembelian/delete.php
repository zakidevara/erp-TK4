<?php
$BASE_URL = realpath(dirname(__DIR__).'\..');
include($BASE_URL.'/connect_db.php');
include($BASE_URL.'/model/Pembelian.php');

if(isset($_GET['id']));
{
    $id = $_GET['id'];
    $pembelian = new Pembelian($conn);
    try {
        $pembelian->deletePembelian($id);
        header ("location:/erp-TK4/view/pembelian/index.php");
    } catch (Exception $e) {
        echo "<p>Gagal menghapus dengan error: </p>";
        echo $e;
        echo "<p>Kembali ke halaman sebelumnya dalam 3 detik...</p>";
        header ("Refresh: 3; URL=/erp-TK4/view/pembelian/index.php");
    }
}
?>