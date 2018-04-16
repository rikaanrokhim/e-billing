<?php
	$q = "select * from tarif";
	$page = isset($_GET['page'])?$_GET['page']:1;
	$pag = $odb->paging($q, 3, $page);
?>
<div id="box">
	<div class="box-top">
		<span class="glyphicon glyphicon-th" aria-hidden="true"></span>
		<span>Data Tarif</span>
	</div>
	<div class="box-panel">
		<table class="table">
			<tr>
				<th>Nomor</th>
				<th>Daya</th>
				<th>Tarif perKWH</th>
				<th colspan="2">Opsi</th>
			</tr>
			<?php
				$j = $pag["no"];
				$n = $j + 1;
				while ($dt = $pag["query"]->fetch()) {
			?>
			<tr>
				<td><?=$n?></td>
				<td><?=$dt['daya']?></td>
				<td><?=$ff->rp($dt['tarif_perkwh'])?></td>
				<td>
					<a href="tarif-aksi.php?aksi=hapus&kode_tarif=<?=$dt['kode_tarif']?>" class="btn btn-danger glyphicon glyphicon-trash" onclick="return confirm('Yakin ingin menghapus data?')"></a>
					<a href="?hal=tarif-form&aksi=edit&kode_tarif=<?=$dt['kode_tarif']?>" class="btn btn-info glyphicon glyphicon-pencil"></a>
				</td>
			</tr>
			<?php
				$n++;
			} 
			?>
		</table>
		<?php
			$odb->nav("?hal=tarif-data", $pag["jumlah"], $page);
		?>
		<br>
		<a href="?hal=tarif-form&aksi=add" class="btn btn-success">Tambahkan Data</a>
	</div>
</div>