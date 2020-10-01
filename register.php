<?php
        // fungsi untuk ambil koneksi dari database
	include_once "class/Db.php";
	include_once "class/Fungsi.php";

	$err = "Silahkan klik tombol untuk melanjutkan!";

	if (isset($_GET['err'])) {
		switch ($_GET['err']) {
			case  1:
				$err = "Nama yang Anda cari tidak terdaftar!";
				break;
			
			default:
				$err = "Silahkan klik tombol untuk melanjutkan!";
				break;
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Register Pembayaran Listrik Online</title>

	<link href="vendor/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="style/css/admin.css">
</head>
<body>
	<center>
		<div id="box" style="width: 52%;">
			<div class="box-top" style="font-size: 17px;">
				REGISTRASI MEMBER PEMBAYARAN LISTRIK ONLINE
			</div>
			<div class="box-panel">
				<?php
					$aksi = $ff->get("aksi");
					if ($aksi == 'register') {
				?>
				<form method="post" action="">
					<div class="form-group">
						<label for="no_meter" style="float: left;">Nomor Meter</label>
						<input type="number" name="no_meter" class="form-control" required="">
					</div>
					<div class="form-group">
						<label for="nama" style="float: left;">Nama</label>
						<input type="text" name="nama" class="form-control" required="">
					</div>
					<div class="form-group">
						<label for="alamat" style="float: left;">Alamat</label>
						<input type="text" name="alamat" class="form-control" required="">
					</div>
					<div class="form-group">
						<label for="kode_tarif" style="float: left;">Daya <i>*pilih daya yang anda gunakan</i></label>
						<select name="kode_tarif" class="form-control" required="">
							<?php
							$q = $odb->select("tarif");
							while ($dt = $q->fetch()) {
							?>
							<option value="<?=$dt['kode_tarif']?>"><?=$dt['kode_tarif']?></option>
							<?php
								}
							?>
						</select>
					</div>
					<i><?=$err?></i> <br><br>
					<button style="" type="submit" name="submit" class="btn btn-success">Daftar</button> &nbsp;
					<a href="index.php" class="btn btn-danger">Batal</a>
				</form>
				<?php 
					} else {
						$q = $odb->select("pelanggan order by id_pelanggan desc limit 1");
						$a = $q->fetch();
				?>
					<label> Anda mendapatkan ID : <?=$a['id_pelanggan']?> </label> <br>
					Nama Pelanggan : <?=$a['nama']?> <br>
					Nomor Meter : <?=$a['no_meter']?> <br>
					Alamat : <?=$a['alamat']?> <br><br>
					<a href="index.php" class="btn btn-success btn-xs">Selesai</a>
				<?php
					}
				?>
			</div>
		</div>
	</center>

	<?php
		if (isset($_POST['submit'])) {
			$post = $odb->sant(INPUT_POST);
			extract($post);
			$odb->insert("pelanggan", "'', '$no_meter', '$nama', '$alamat', '$kode_tarif'");
			$ff->alert('Pendaftaran member berhasil!');
			$ff->redirect('register.php?aksi=result');
		}
	?>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="vendor/js/bootstrap.min.js"></script>
    <script src="style/js/admin.js"></script>
</body>
</html>
