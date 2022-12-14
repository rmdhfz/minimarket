<?php 
	if ($_SERVER['REQUEST_METHOD'] === "POST") {
		require_once '../../class/suplier.php'; # memanggil class suplier
		$process 	= new Suplier();
		$kode 		= $_POST['kode_suplier'];
		$nama 		= $_POST['nama_suplier'];
		$telepon 	= $_POST['telepon'];
		$alamat 	= $_POST['alamat'];

		# proses simpan suplier
		$simpan = $process->create($kode, $nama, $telepon, $alamat);
		if (!$simpan) {
			header('Content-Type: application/json; charset=utf-8');
			echo json_encode([
				"status" 	=> false,
				"msg" 		=> "suplier gagal disimpan"
			], JSON_PRETTY_PRINT);
			return;
		}
		header('Content-Type: application/json; charset=utf-8');
		echo json_encode([
			"status" 	=> true,
			"msg" 		=> "suplier berhasil disimpan"
		], JSON_PRETTY_PRINT);
		return;
	}
?>