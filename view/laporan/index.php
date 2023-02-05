<?php
	$BASE_URL = realpath(dirname(__DIR__).'\..');
	include($BASE_URL.'/connect_db.php');
	include($BASE_URL.'/model/Barang.php');

	$barang = new Barang($conn);
    $laporanList = $barang->laporanList();
?>

<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<link rel="stylesheet" href="/erp-TK4/index.css">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
	</head>
	<body>
    	<?php include($BASE_URL.'/sidenav.php') ?>
    	<div class="container p-5 my-5">
            <h3 style="margin-bottom: 1em">Laporan Laba Rugi</h3>
            <table class="table" align="center">
                <tr style="">
                    <th>ID Barang</th>
                    <th>Nama Barang</th>
                    <th>Harga Jual</th>
                    <th>Jumlah Penjualan</th>
                    <th>Harga Beli</th>
                    <th>Jumlah Pembelian</th>
                    <th>Pendapatan</th>
                    <th>Keuntungan</th>
                </tr>
                <?php
                    if (!is_null($laporanList) && count($laporanList) > 0) {
                        foreach($laporanList as $index => $item) {
                            ?>
                            <tr>
                                <td>
                                    <?php echo $item["IdBarang"]; ?>
                                </td>
                                <td>
                                    <?php echo $item["NamaBarang"]; ?>
                                </td>
                                <td>
                                    <?php echo $item["HargaJual"]; ?>
                                </td>
                                <td>
                                    <?php echo $item["JumlahPenjualan"]; ?>
                                </td>
                                <td>
                                    <?php echo $item["HargaBeli"]; ?>
                                </td>
                                <td>
                                    <?php echo $item["JumlahPembelian"]; ?>
                                </td>
                                <td>
                                    <?php echo $item["pendapatan"]; ?>
                                </td>
                                <td>
                                    <?php echo $item["keuntungan"]; ?>
                                </td>
                            </tr>
                <?php
                        }
                    }else{
                        ?>
                            <tr>
                                <td colspan="6">Tidak ada Barang.</td>
                            </tr>
                <?php
                    }

                    ?>
            </table>
        </div>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        <script src="https://kit.fontawesome.com/f65023b3df.js" crossorigin="anonymous"></script>
    </body>
</html>