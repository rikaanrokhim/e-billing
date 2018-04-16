<?php
	$today = date("Y-m-d");
	$p = date("w");
	$awal_minggu = date("Y-m-d", strtotime("-".$p. " day"));
	$pa = 6-$p;
	$akhir_minggu = date("Y-m-d", strtotime("+".$pa. " day"));
	$qharian = $odb->select("penggunaan where tanggal_bayar='$today'");
	$qmingguan = $odb->select("penggunaan where tanggal_bayar<='$akhir_minggu' and tanggal_bayar>='$awal_minggu'");
	$nmingguan = $odb->nur($qmingguan);
	$nharian = $odb->nur($qharian);
?>
<br>
<center>
	<div id="box" style="width: 60%; font-size: 20px;">
		<div class="box-top">
			LAPORAN TRANSAKSI
		</div>
		<div class="box-panel">
			<span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>
            <span class="hidden-sm hidden-xs"><?=$nharian?></span>
            <p>Transkasi Hari ini</p>
            <a href="#" class="card-footer text-white clearfix small z-1">
					<span class="glyphicon glyphicon-print btn btn-primary"></span>
				</a>

            <br><hr>

            <span class="glyphicon glyphicon-list" aria-hidden="true"></span>
            <span class="hidden-sm hidden-xs"><?=$nmingguan?></span>
            <p>Transkasi Minggu ini</p>
            <a href="#" class="card-footer text-white clearfix small z-1">
				<span class="glyphicon glyphicon-print btn btn-primary"></span>
			</a>
			<br>
		</div>
	</div>
</center>