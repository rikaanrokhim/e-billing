<?php
	$q = "select p.id_pelanggan, p.no_meter, p.nama, p.alamat, t.daya from pelanggan p, tarif t where p.kode_tarif=t.kode_tarif";
	$page = isset($_GET['page'])?$_GET['page']:1;
	$pag = $odb->paging($q, 3, $page);
?>
<div id="box">
	<div class="box-top">
		<span class="glyphicon glyphicon-user" aria-hidden="true"></span>
		<span>Data Pelanggan</span>
	</div>
	<div class="box-panel">
		<table class="table">
			<tr>
				<th>Nomor</th>
				<th>Nomor Meter</th>
				<th>Nama</th>
				<th>Alamat</th>
				<th>Daya</th>
				<th colspan="2">Opsi</th>
			</tr>
			<?php
				$j = $pag["no"];
				$n = $j + 1;
				while ($dt = $pag["query"]->fetch()) {
			?>
			<tr>
				<td><?=$n?></td>
				<td><?=$dt['no_meter']?></td>
				<td><?=$dt['nama']?></td>
				<td><?=$dt['alamat']?></td>
				<td><?=$dt['daya']?></td>
				<td>
					<a href="pelanggan-aksi.php?aksi=hapus&id_pelanggan=<?=$dt['id_pelanggan']?>" class="btn btn-danger glyphicon glyphicon-trash" onclick="return confirm('Yakin ingin menghapus data?')"></a>
					<a href="?hal=pelanggan-form&aksi=edit&id_pelanggan=<?=$dt['id_pelanggan']?>" class="btn btn-info glyphicon glyphicon-pencil"></a>
				</td>
			</tr>
			<?php
				$n++;
				} 
			?>
		</table>
		<?php
			$odb->nav("?hal=pelanggan-data", $pag["jumlah"], $page);
		?>
		<br>
		<a href="?hal=pelanggan-form&aksi=add" class="btn btn-success">Tambahkan Data</a>
	</div>
</div>