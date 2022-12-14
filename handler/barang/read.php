<?php 
	if ($_SERVER['REQUEST_METHOD'] === "POST") {
		require_once '../../class/barang.php'; # memanggil class barang
		$process 	= new Barang();
		$kode 		= $_POST['kode_barang'];

		# proses read barang
		$read = $process->read($kode);
		if (!$read) {
			header('Content-Type: application/json; charset=utf-8');
			echo json_encode([
				"status" 	=> false,
				"msg" 		=> "barang gagal dibaca"
			], JSON_PRETTY_PRINT);
			return;
		}
		header('Content-Type: application/json; charset=utf-8');
		echo json_encode([
			"status" 	=> true,
			"msg" 		=> "barang berhasil dibaca",
			"data"		=>	$read
		], JSON_PRETTY_PRINT);
		return;
	}
?>