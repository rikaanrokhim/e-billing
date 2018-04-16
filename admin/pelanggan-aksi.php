<?php
	include_once "../class/Db.php";
	include_once "../class/Fungsi.php";

	$aksi = $ff->get("aksi");
	if ($aksi == "add") {
		$post = $odb->sant(INPUT_POST);
		extract($post);
		$odb->insert("pelanggan", "'', '$no_meter', '$nama', '$alamat', '$kode_tarif'");
		$ff->alert('Data berhsil disimpan!');
		$ff->redirect('home.php?hal=pelanggan-data');
	}
	if ($aksi == 'update') {
		$id = $ff->get("id_pelanggan");
		$post = $odb->sant(INPUT_POST);
		extract($post);
		$odb->update("pelanggan", "no_meter = '$no_meter', nama = '$nama', alamat = '$alamat', kode_tarif = '$kode_tarif' where id_pelanggan = '$id'");
		$ff->alert('Data berhsil diupdate!');
		$ff->redirect('home.php?hal=pelanggan-data');
	}
	if ($aksi == "hapus") {
		$id = $ff->get("id_pelanggan");
		$odb->delete("pelanggan where id_pelanggan = '$id'");
		$ff->alert('Data berhsil dihapus!');
		$ff->redirect('home.php?hal=pelanggan-data');
	}
?>