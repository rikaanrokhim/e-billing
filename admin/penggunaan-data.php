<?php
	$q = "select pen.id_penggunaan, pen.bulan, pen.tahun, pen.meter_awal, pen.meter_akhir, pen.tanggal_bayar, pen.biaya_admin, pen.status, p.nama from penggunaan pen, pelanggan p where pen.id_pelanggan=p.id_pelanggan";
	// $q = "select * from penggunaan";
	$page = isset($_GET['page'])?$_GET['page']:1;
	$pag = $odb->paging($q, 3, $page);
?>
<div id="box">
	<div class="box-top">
		<span class="glyphicon glyphicon-tags" aria-hidden="true"></span>
		<span>Data Penggunaan</span>
	</div>
	<div class="box-panel">
		<table class="table">
			<tr>
				<th>Nomor</th>
				<th>Nama Pelanggan</th>
				<th>Bulan</th>
				<th>Tahun</th>
				<th>Meter Awal</th>
				<th>Meter Akhir</th>
				<th>Tanggal Bayar</th>
				<th>Biaya Admin</th>
				<th>Status</th>
				<th colspan="2">Opsi</th>
			</tr>
			<?php
				$j = $pag["no"];
				$n = $j + 1;
				while ($dt = $pag["query"]->fetch()) {
			?>
			<tr>
				<td><?=$n?></td>
				<td><?=$dt['nama']?></td>
				<td><?=$dt['bulan']?></td>
				<td><?=$dt['tahun']?></td>
				<td><?=$dt['meter_awal']?></td>
				<td><?=$dt['meter_akhir']?></td>
				<td><?=$dt['tanggal_bayar']?></td>
				<td><?=$dt['biaya_admin']?></td>
				<td><?=$dt['status']?></td>
				<td>
					<a href="penggunaan-aksi.php?aksi=hapus&id_penggunaan=<?=$dt['id_penggunaan']?>" class="btn btn-danger glyphicon glyphicon-trash" onclick="return confirm('Yakin ingin menghapus data?')"></a>
					<a href="?hal=penggunaan-form&aksi=edit&id_penggunaan=<?=$dt['id_penggunaan']?>" class="btn btn-info glyphicon glyphicon-pencil"></a>
				</td>
			</tr>
			<?php
				$n++;
				}
			?>
		</table>
		<?php
			$odb->nav("?hal=penggunaan-data", $pag["jumlah"], $page);
		?>
		<br>
		<a href="?hal=penggunaan-form&aksi=add" class="btn btn-success">Tambahkan Data</a>
	</div>
</div>