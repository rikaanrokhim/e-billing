<?php
	$id = $ff->get("id_penggunaan");
	$q = $odb->select("penggunaan where id_penggunaan = '$id'");
	$d = $q->fetch();
?>
<div id="box">
	<div class="box-top">
		<span class="glyphicon glyphicon-tags" aria-hidden="true"></span>
		<span>Form Penggunaan</span>
	</div>
	<div class="box-panel">
		<?php
			$aksi = $ff->get("aksi");
			if ($aksi == "add") {
		?>
		<form method="post" action="penggunaan-aksi.php?aksi=add">
			<div class="form-group col-md-6">
				<label for="id_pelanggan">Nama Pelanggan</label>
				<select name="id_pelanggan" class="form-control" required="">
					<?php
						$q = $odb->select("pelanggan");
						while ($dt = $q->fetch()) {
					?>
					<option value="<?=$dt['id_pelanggan']?>"><?=$dt['nama']?></option>
					<?php
						}
					?>
				</select>
			</div>
			<div class="form-group col-md-6">
				<label for="daya">Bulan</label> <br>
				<input class="form-control" type="text" name="bulan" value="" required="">
			</div>
			<div class="form-group col-md-6">
				<label for="tahun">Tahun</label> <br>
				<input class="form-control" type="year" name="tahun" value="" required="">
			</div>
			<div class="form-group col-md-6">
				<label for="meter_awal">Meter Awal</label> <br>
				<input class="form-control" type="number" name="meter_awal" value="" required="">
			</div>
			<div class="form-group col-md-6">
				<label for="meter_akhir">Meter Akhir</label> <br>
				<input class="form-control" type="number" name="meter_akhir" value="" required="">
			</div>
			<div class="form-group col-md-6">
				<label for="tanggal_bayar">Tanggal Bayar</label> <br>
				<input class="form-control" type="date" name="tanggal_bayar" value="" required="">
			</div>
			<div class="form-group col-md-12">
				<label for="biaya_admin">Biaya Admin</label> <br>
				<input class="form-control" type="number" name="biaya_admin" value="" required="">
			</div>
			<button type="submit" class="btn btn-success">Simpan</button>
		</form>
		<?php 
			} else {
		?>
		<form method="post" action="penggunaan-aksi.php?aksi=update&id_penggunaan=<?=$id?>">
			<div class="form-group col-md-6">
				<label for="id_penggunaan">Nama Pelanggan</label>
				<select name="id_pelanggan" class="form-control" required="">
					<?php
						$q = $odb->select("pelanggan");
						while ($dt = $q->fetch()) {
					?>
					<option value="<?=$dt['id_pelanggan']?>"><?=$dt['nama']?></option>
					<?php
						}
					?>
				</select>
			</div>
			<div class="form-group col-md-6">
				<label for="daya">Bulan</label> <br>
				<input class="form-control" type="text" name="bulan" value="<?=$d['bulan']?>" required="">
			</div>
			<div class="form-grou col-md-6">
				<label for="tahun">Tahun</label> <br>
				<input class="form-control" type="year" name="tahun" value="<?=$d['tahun']?>" required="">
			</div>
			<div class="form-group col-md-6">
				<label for="meter_awal">Meter Awal</label> <br>
				<input class="form-control" type="number" name="meter_awal" value="<?=$d['meter_awal']?>" required="">
			</div>
			<div class="form-group col-md-6">
				<label for="meter_akhir">Meter Akhir</label> <br>
				<input class="form-control" type="number" name="meter_akhir" value="<?=$d['meter_akhir']?>" required="">
			</div>
			<div class="form-group col-md-6">
				<label for="tanggal_bayar">Tanggal Bayar</label> <br>
				<input class="form-control" type="date" name="tanggal_bayar" value="<?=$d['tanggal_bayar']?>" required="">
			</div>
			<div class="form-group col-md-12">
				<label for="biaya_admin">Biaya Admin</label> <br>
				<input class="form-control" type="number" name="biaya_admin" value="<?=$d['biaya_admin']?>" required="">
			</div>
			<button type="submit" class="btn btn-success">Simpan</button>
		</form>
		<?php
			}
		?>
	</div>
</div>