<?php
	include_once  "../class/Db.php";
    include_once  "../class/Fungsi.php";
	if (isset($_GET['cari'])) {
		$cari = $_GET['cari'];
		$q = $odb->select("pelanggan where nama like  '% $cari %'");
		$dt = $q->fetch();
?>
<!DOCTYPE html>
<html>
<head>
		<meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Admin Template</title>

        <!-- Bootstrap -->
        <link href="../vendor/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="../style/css/admin.css">
</head>
<body>
	<div id="box">
	<div class="box-top">
		<span class="glyphicon glyphicon-tags" aria-hidden="true"></span>
		<span>Daftar Pelanggan</span>
	</div>
	<div class="box-panel">
		<table class="table">
			<tr>
				<th>Nomor</th>
				<th>Nomor Meter</th>
				<th>Nama</th>
				<th>Alamat</th>
				<th>Kode Tarif</th>
			</tr>
			<tr>
				<td><?=$dt['id_pelanggan']?></td>
				<td><?=$dt['no_meter']?></td>
				<td><?=$dt['nama']?></td>
				<td><?=$dt['alamat']?></td>
				<td><?=$dt['kode_tarif']?></td>
			</tr>
		</table>
		<br>
	</div>
</div>
<?php } ?>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="../vendor/js/bootstrap.min.js"></script>
        <script src="../style/js/admin.js"></script>
</body>
</html>