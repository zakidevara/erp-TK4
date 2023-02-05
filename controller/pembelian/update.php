<?php
$BASE_URL = realpath(dirname(__DIR__).'\..');
include($BASE_URL.'/connect_db.php');
include($BASE_URL.'/model/Barang.php');

if(isset($_POST['update']));
{
    $pembelian = new Pembelian($conn);
    $pembelian->setIdPembelian($_POST['id_barang']);
    $pembelian->setJumlahPembelian($_POST['nama_barang']);
    $pembelian->setHargaBeli($_POST['satuan']);
    $pembelian->setIdPengguna($_POST['keterangan']);
    $pembelian->setIdBarang($_POST['id_pengguna']);
    $pembelian->setIdSupplier($_POST['id_pengguna']);
    header ("location:/erp-TK4/view/pembelian/index.php");
}
?>