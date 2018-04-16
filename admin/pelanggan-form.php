<?php
	$id = $ff->get("id_pelanggan");
	$query = $odb->select("pelanggan where id_pelanggan = '$id'");
	$d = $query->fetch();
?>
<div id="box">
	<div class="box-top">
		<span class="glyphicon glyphicon-tags" aria-hidden="true"></span>
		<span>Form Pelanggan</span>
	</div>
	<div class="box-panel">
		<?php
			$aksi = $ff->get("aksi");
			if ($aksi == "add") {
		?>
		<form method="post" action="pelanggan-aksi.php?aksi=add">
			<div class="form-group">
				<label for="no_meter">Nomor Meter</label>
				<input type="number" name="no_meter" class="form-control" required="">
			</div>
			<div class="form-group">
				<label for="nama">Nama</label>
				<input type="text" name="nama" class="form-control" required="">
			</div>
			<div class="form-group">
				<label for="alamat">Alamat</label>
				<input type="text" name="alamat" class="form-control" required="">
			</div>
			<div class="form-group">
				<label for="kode_tarif">Daya</label>
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
			<button type="submit" class="btn btn-success">Simpan</button>
		</form>
		<?php
			} else {
		?>
		<form method="post" action="pelanggan-aksi.php?aksi=update&id_pelanggan=<?=$id?>">
			<div class="form-group">
				<label for="no_meter">Nomor Meter</label>
				<input type="number" name="no_meter" class="form-control" value="<?=$d['no_meter']?>" required="">
			</div>
			<div class="form-group">
				<label for="nama">Nama</label>
				<input type="text" name="nama" class="form-control" value="<?=$d['nama']?>" required="">
			</div>
			<div class="form-group">
				<label for="alamat">Alamat</label>
				<input type="text" name="alamat" class="form-control" value="<?=$d['alamat']?>" required="">
			</div>
			<div class="form-group">
				<label for="kode_tarif">Daya</label>
				<select name="kode_tarif" class="form-control" required="">
					<?php
					$q = $odb->select("tarif");
					while ($dt = $q->fetch()) {
					?>
					<option value="<?=$dt['kode_tarif']?>"><?=$dt['daya']?></option>
					<?php
						}
					?>
				</select>
			</div>
			<button type="submit" class="btn btn-success">Simpan</button>
		</form>
		<?php
			}
		?>
	</div>
</div>