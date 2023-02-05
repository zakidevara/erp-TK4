<?php	
	$BASE_URL = realpath(dirname(__DIR__).'\..');
	include($BASE_URL.'/connect_db.php');
	include($BASE_URL.'/model/Barang.php');

	$barang = new Barang($conn);
?>


<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<link rel="stylesheet" href="/supplychain/index.css">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
	</head>
	<body>
		<?php include($BASE_URL.'/sidenav.php') ?>

		<div class="p-5">		
            <form action="/erp-TK4/controller/barang/add.php" method="post" enctype="multipart/form-data">
                <div class="container">
                    <h3 class="mb-4">Form Add Barang</h3>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>ID Barang</label>
                                <input name="id_barang" id="id_barang" class="form-control" placeholder="Contoh: B001" required />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Nama Barang</label>
                                <input name="nama_barang" id="nama_barang" class="form-control" placeholder="Contoh: Tomat" required />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Satuan</label>
                                <input type="text" name="satuan" id="satuan" class="form-control" placeholder="Contoh: kg" required />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Keterangan</label>
                                <textarea name="keterangan" id="keterangan" class="form-control" placeholder="Tidak wajib diisi" required rows="10"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>ID Pengguna</label>
                                <input type="text" name="id_pengguna" id="id_pengguna" class="form-control" placeholder="Contoh: L001" required />
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary mt-4" name="add" value="Add">Add</button>
                    <a href="/erp-TK4/view/barang" class="btn btn-danger mt-4" role="button" aria-disabled="true">Batal</a>
                </div>
            </form>

        </div>

		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
		<script src="https://kit.fontawesome.com/f65023b3df.js" crossorigin="anonymous"></script>
	</body>
</html>