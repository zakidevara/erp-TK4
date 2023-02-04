<?php
    $BASE_URL = realpath(dirname(__DIR__).'\..');
	include($BASE_URL.'/connect_db.php');
	include($BASE_URL.'/model/Supplier.php');
    
    if(isset($_POST['add']));
    {
        $supplier = new Supplier($conn);
        $supplier->setIdSupplier($_POST['id_supplier']);
        $supplier->setNamaSupplier($_POST['nama_supplier']);
        $supplier->setAlamat($_POST['alamat']);
        $supplier->setNoTelp($_POST['no_telp']);
        
        try {
            $supplier->addSupplier();
            header ("location:/erp-TK4/view/supplier/index.php");
        } catch (Exception $e) {
            echo "<p>Gagal menambahkan Supplier dengan error: </p>";
            echo $e;
            echo "<p>Kembali ke halaman sebelumnya dalam 3 detik...</p>";
            header ("Refresh: 3; URL=/erp-TK4/view/supplier/index.php");
        }
    }
?>