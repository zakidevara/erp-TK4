<?php
    $BASE_URL = realpath(dirname(__DIR__).'\..');
	include($BASE_URL.'/connect_db.php');
	include($BASE_URL.'/model/Supplier.php');
    
    if(isset($_POST['update']));
    {
        $supplier = new Supplier($conn);
        $supplier->setIdSupplier($_POST['id_supplier']);
        $supplier->setNamaSupplier($_POST['nama_supplier']);
        $supplier->setAlamat($_POST['alamat']);
        $supplier->setNoTelp($_POST['no_telp']);
        $supplier->updateSupplier();
        header ("location:/supplychain/view/supplier/index.php");
    }
?>