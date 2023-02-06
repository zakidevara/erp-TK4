<?php
$BASE_URL = realpath(dirname(__DIR__).'\..');
include($BASE_URL.'/connect_db.php');
include($BASE_URL.'/model/Pembelian.php');

if(isset($_POST['update']));
{
    $pembelian = new Pembelian($conn);
    $pembelian->setIdPembelian($_POST['id_pembelian']);
    $pembelian->setJumlahPembelian($_POST['jumlah_pembelian']);
    $pembelian->setHargaBeli($_POST['harga_beli']);
    $pembelian->setIdPengguna($_POST['id_pengguna']);
    $pembelian->setIdBarang($_POST['id_barang']);
    $pembelian->setIdSupplier($_POST['id_supplier']);
    $pembelian->updatePembelian();
    header ("location:/erp-TK4/view/pembelian/index.php");
}
?>