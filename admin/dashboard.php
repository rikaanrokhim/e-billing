<?php
	$q = $odb->select("pelanggan order by id_pelanggan desc limit 1");
	$a = $q->fetch();
?>

<div id="box">
	<div class="box-top">
		<span class="glyphicon glyphicon-tags" aria-hidden="true"></span>
		<span>Seseorang baru saja mendaftar menjadi pelanggan</span>
	</div>
	<div class="box-panel">
		Memiliki ID : <a href="?hal=pelanggan-data"><?=$a['id_pelanggan']?></a>
	</div>
</div>

<?php
	$now = date("Y-m-d");
	$query = $odb->select("penggunaan where tanggal_bayar = '$now'");
	$d = $odb->nur($query);
?>

<div id="box">
	<div class="box-top">
		<span class="glyphicon glyphicon-tags" aria-hidden="true"></span>
		<span>Transaksi Baru</span>
	</div>
	<div class="box-panel">
		<a href="?hal=penggunaan-data">Terdapat <?=$d?> transaksi</a>
	</div>
</div>
