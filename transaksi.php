<?php
	include_once "class/Db.php";
	include_once "class/Fungsi.php";

	$kode = $ff->get("kode_tarif");
	$id = $ff->get("id_pelanggan");

	$q = $odb->select("tarif where kode_tarif = '$kode'");
	$d = $q->fetch();

	$query = $odb->select("pelanggan where id_pelanggan = '$id'");
	$dt = $query->fetch();

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
		<div id="box" style="font-size: 15px;">
			<div class="box-top" style="font-size: 18px;">
				<center>TRANSAKSI PEMBAYARAN LISTRIK ONLINE</center>
			</div>
			<div class="box-panel">
				<form method="post" action="">
					<label>Dari Informasi yang Kami dapat yaitu :</label> <br>
					Nama Pengguna : <?=$dt['nama']?> <br>
					Daya yang Anda gunakan : <?=$d['daya']?> KwH <br>
					Tarif perKWH : <?=$ff->rp($d['tarif_perkwh'])?> <br>
					Meter Awal = 1 KwH<br>
					Meter Akhir : <input type="number" name="meter_akhir" required=""> <br> <br>
					<button type="submit" name="submit" class="btn btn-xs btn-success">Hitung</button> <br>
				</form> <br><br>
				<?php
					if (isset($_POST['submit'])) {
						$post = $odb->sant(INPUT_POST);
						$meter_akhir = $ff->post('meter_akhir');
						$tarif = $d['tarif_perkwh'];
						$biaya_admin = '5000';
						extract($post);

						$res = $meter_akhir * $tarif;
						$result = $res + $biaya_admin; 
				?>
					Pembayaran Listrik : <?=$ff->rp($res)?> <br>
					<b>Ditambah</b> dengan biaya Admin sebesar RP 5,000 <br>
					Jadi total yang harus Anda bayar : <?=$ff->rp($result)?>

				<?php
					$id_pelanggan = $dt['id_pelanggan'];
					$bulan = date("m");
					$tahun = date("Y");
					$meter_awal = '1';
					// meter_akhir
					$tanggal_bayar = date("Y-m-d");
					// biaya_admin
					$status = 'sudah bayar';
					
						// perintah untuk input data ke database
					$odb->insert("penggunaan", "'', '$id_pelanggan', '$bulan', '$tahun' ,'$meter_awal', '$meter_akhir', '$tanggal_bayar', '$biaya_admin', '$status'");
				?>

				<br><br>
				<a href="index.php" class="btn-xs btn btn-success">Selesai</a>

				<?php } ?>

			</div>
		</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="vendor/js/bootstrap.min.js"></script>
    <script src="style/js/admin.js"></script>
</body>
</html>
