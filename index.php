<!-- masuk, mengambil id, lanjut transaksi, ngambil tarifprkwh dr nometer,
masukkan meter akhir, result+simpan -->
<?php
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

	<title>Pembayaran Listrik Online</title>

	<link href="vendor/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="style/css/admin.css">
</head>
<body>
	<center>
		<div id="box" style="width: 52%;">
			<div class="box-top" style="font-size: 17px;">
				PEMBAYARAN LISTRIK ONLINE
			</div>
			<div class="box-panel">
				<form action="" method="post" style="float">
					<div class="form-group col-md-6">
						<label for="id_pelanggan" style="float: left;">Masukkan ID Anda disini</label>
						<input type="text" name="id_pelanggan" class="form-control" required="">
					</div>
					<button style="margin-left: -44%; margin-top: 25px;" type="submit" name="submit" class="btn btn-success">Cari</button>
					<br><br>
					<i><?=$err?></i> <br> <br>
					<p style="float: left;">* atau daftar jika belum memiliki ID <a href="register.php?aksi=register" class="btn btn-warning btn-xs">Daftar</a></p>
					<br> <br>
				</form>
			</div>
		</div>
	</center>

	<?php
		if (isset($_POST['submit'])) {
			$post = $odb->sant(INPUT_POST);
			$id_pelanggan = $ff->post('id_pelanggan');
			extract($post);

			$q = $odb->select("pelanggan where id_pelanggan = '$id_pelanggan'");
			while ($dt = $q->fetch()) {
	?>
	<center>
		<div id="box" style="width: 52%;">
			<div class="box-panel">
				<?php if (isset($_POST['id_pelanggan'])) {
				?>
				ID Pelanggan : <?=$dt['id_pelanggan']?> <br>
				Nomor Meter : <?=$dt['no_meter']?> <br>
				Nama Pelanggan : <?=$dt['nama']?> <br>
				Alamat : <?=$dt['alamat']?> <br>
				<!-- Tarif yang digunakan : <?=$dt['kode_tarif']?> -->
				<br><br>
				<a href="transaksi.php?kode_tarif=<?=$dt['kode_tarif']?>&id_pelanggan=<?=$dt['id_pelanggan']?>" class="btn btn-success btn-xs">Selanjutnya</a>
				<a href="index.php" class="btn btn-danger btn-xs">Kembali</a>
				<br><br>
				<i>Klik tombol 'selanjutnya' jika benar, dan 'kembali jika salah!'</i><br>
				<?php } else { ?>
			</div>
			<?php
				$ff->redirect("index.php?err=1");
				}
			?>
		</div>
	</center>
	<?php 
			}
		}
	?>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="vendor/js/bootstrap.min.js"></script>
    <script src="style/js/admin.js"></script>
</body>
</html>