<?php	
	$BASE_URL = realpath(dirname(__DIR__).'\..');
	include($BASE_URL.'/connect_db.php');
	include($BASE_URL.'/model/Penjualan.php');

	$penjualan = new Penjualan($conn);
	$penjualanList = $penjualan->penjualanList();
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
			<h3 style="margin-bottom: 1em">Daftar Penjualan</h3>
			<a href="./form_add.php" class="btn btn-primary btn-sm mb-4" role="button" aria-disabled="true">Tambah</a>
			<table class="table" align="center">
				<tr style="">
					<th>ID Penjualan</th>
					<th>Jumlah Penjualan</th>
					<th>Harga Jual</th>
					<th>IdPengguna</th>
					<th>IdBarang</th>
                    <th>IdPelanggan</th>
				</tr>
				<?php
					if (!is_null($penjualanList) && count($penjualanList) > 0) {
						foreach($penjualanList as $index => $item) {
							?>
							<tr>
								<td>
									<?php echo $item["IdPenjualan"]; ?>
								</td>
								<td>
									<?php echo $item["JumlahPenjualan"]; ?>
								</td>
								<td>
									<?php echo $item["HargaJual"]; ?>
								</td>
								<td>
									<?php echo $item["IdPengguna"]; ?>
								</td>
                                <td>
                                    <?php echo $item["IdBarang"]; ?>
                                </td>
                                <td>
                                    <?php echo $item["IdPelanggan"]; ?>
                                </td>
								<td>						
									<a href="./form_edit.php?id=<?= $item["IdPenjualan"]?>" class="btn btn-warning btn-sm" role="button" aria-disabled="true">Edit</a>
									<a href="/erp-TK4/controller/penjualan/delete.php?id=<?= $item["IdPenjualan"]?>" class="btn btn-danger btn-sm" role="button" aria-disabled="true">Delete</a>
								</td>
							</tr>
				<?php
						}
					}else{
						?>
							<tr>
								<td colspan="6">Tidak ada Penjualan.</td>
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