<?php
	include_once "../class/Db.php";
	include_once "../class/Fungsi.php";

	$aksi = $ff->get("aksi");
	if ($aksi == "add") {
		$post = $odb->sant(INPUT_POST);
		extract($post);
		$status = 'pending';
		$odb->insert("penggunaan", "'', '$id_pelanggan', '$bulan', '$tahun', '$meter_awal', '$meter_akhir', '$tanggal_bayar', '$biaya_admin', '$status'");
		$ff->alert('Data berhasil disimpan!');
		$ff->redirect('home.php?hal=penggunaan-data');
	}
	if ($aksi == 'update') {
		$id = $ff->get("id_penggunaan");
		$post = $odb->sant(INPUT_POST);
		extract($post);
		$status = 'pending';
		$odb->update("penggunaan", "id_pelanggan = '$id_pelanggan', bulan = '$bulan', tahun = '$tahun', meter_awal = '$meter_awal', meter_akhir = '$meter_akhir', tanggal_bayar = 'tanggal_bayar', biaya_admin = '$biaya_admin', status = '$status' where id_penggunaan = '$id'");
		$ff->alert('Data berhasil diupdate!');
		$ff->redirect('home.php?hal=penggunaan-data');
	}
	if ($aksi == "hapus") {
		$id = $ff->get("id_penggunaan");
		$odb->delete("penggunaan where id_penggunaan = '$id'");
		$ff->alert('Data berhasil dihapus!');
		$ff->redirect('home.php?hal=penggunaan-data');
	}
?>