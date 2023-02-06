<?php	
	$BASE_URL = realpath(dirname(__DIR__).'\..');
	include($BASE_URL.'/connect_db.php');
	include($BASE_URL.'/model/Pengguna.php');

    $id = $_GET['id'];
	$pengguna = new Pengguna($conn);
	$penggunaDetail = $pengguna->findPenggunaById($id);
    
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

		<div class="p-5">		
            <form action="/erp-TK4/controller/pengguna/update.php" method="post" enctype="multipart/form-data">
                <div class="container">
                    <h3 class="mb-4">Form Add Pengguna</h3>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>ID Pengguna</label>
                                <input name="id_pengguna" id="id_pengguna" class="form-control" placeholder="Contoh: P001" value="<?= $penggunaDetail["IdPengguna"]?>" required />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Nama Pengguna</label>
                                <input name="nama_pengguna" id="nama_pengguna" class="form-control" placeholder="Contoh: Na Jaemin" value="<?= $penggunaDetail["NamaPengguna"]?>" required />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Nama Password</label>
                                <input name="password" id="password" type="password" class="form-control" placeholder="******" value="<?= $penggunaDetail["Password"]?>" required />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Nama Depan</label>
                                <input name="nama_depan" id="nama_depan"  class="form-control" placeholder="Contoh: Na " value="<?= $penggunaDetail["NamaDepan"]?>" required />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Nama Belakang</label>
                                <input name="nama_belakang" id="nama_belakang" class="form-control" placeholder="Contoh: Jaemin" value="<?= $penggunaDetail["NamaBelakang"]?>" required />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Nomor Handphone</label>
                                <input type="text" name="no_hp" id="no_hp" class="form-control" placeholder="Contoh: 0812345465" value="<?= $penggunaDetail["NoHp"]?>"required />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Alamat</label>
                                <textarea name="alamat" id="alamat" class="form-control" placeholder="Alamat" required rows="10"><?= $penggunaDetail["Alamat"]?></textarea>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary mt-4" name="update" value="Update">Update</button>
                    <a href="/erp-TK4/view/pengguna" class="btn btn-danger mt-4" role="button" aria-disabled="true">Batal</a>
                </div>
            </form>

        </div>

		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
		<script src="https://kit.fontawesome.com/f65023b3df.js" crossorigin="anonymous"></script>
	</body>
</html>