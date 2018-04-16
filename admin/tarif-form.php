<?php
	$id = $ff->get("kode_tarif");
	$query = $odb->select("tarif where kode_tarif = '$id'");
	$d = $query->fetch();
?>
<div id="box">
	<div class="box-top">
		<span class="glyphicon glyphicon-tags" aria-hidden="true"></span>
		<span>Form Tarif</span>
	</div>
	<div class="box-panel">
		<?php 
			$aksi = $ff->get("aksi");
			if ($aksi == "add") {
		?>
		<form method="post" action="tarif-aksi.php?aksi=add">
			<div class="form-group">
				<label for="daya">Isian Daya</label> <br>
				<input class="form-control" type="number" name="daya" value="" required="">
			</div>
			<div class="form-group">
				<label for="tarif_perkwh">Tarif Daya</label> <br>
				<input class="form-control" type="number" name="tarif_perkwh" value="" required="">
			</div>
			<button type="submit" class="btn btn-success">Simpan</button>
		</form>

		<?php } else { ?>

		<form method="post" action="tarif-aksi.php?aksi=update&kode_tarif=<?=$id?>">
			<div class="form-group">
				<label for="daya">Isian Daya</label> <br>
				<input class="form-control" type="number" name="daya" value="<?=$d['daya']?>" required="">
			</div>
			<div class="form-group">
				<label for="tarif_perkwh">Tarif Daya</label> <br>
				<input class="form-control" type="number" name="tarif_perkwh" value="<?=$d['tarif_perkwh']?>" required="">
			</div>
			<button type="submit" class="btn btn-success">Simpan</button>
		</form>
	</div>
	<?php } ?>
</div>