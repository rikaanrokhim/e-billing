<?php
	include_once "../class/Db.php";
	include_once "../class/Fungsi.php";

	$aksi = $ff->get("aksi");
	if ($aksi == "add") {
		$post = $odb->sant(INPUT_POST);
		extract($post);
		$odb->insert("tarif", "'', '$daya', '$tarif_perkwh'");
		$ff->alert('Data berhasil disimpan');
		$ff->redirect('home.php?hal=tarif-data');
	}
	if ($aksi == "update") {
		$id = $ff->get("kode_tarif");
		$post = $odb->sant(INPUT_POST);
		extract($post);
		$odb->update("tarif", "daya = '$daya', tarif_perkwh = '$tarif_perkwh' where kode_tarif = '$id'");
		$ff->alert('Data berhasil diupdate');
		$ff->redirect('home.php?hal=tarif-data');
	}
	if ($aksi == "hapus") {
		$id = $ff->get("kode_tarif");
		$odb->delete("tarif where kode_tarif = '$id'");
		$ff->alert('Data berhasil dihapus');
		$ff->redirect('home.php?hal=tarif-data');
	}
?>