<?php 
	if ($_SERVER['REQUEST_METHOD'] == "POST") {
		require_once '../../class/barang.php'; # memanggil class barang
		$process 	= new Barang();
		$data 		= $process->data_suplier();
		if (!$data) {
			# gagal membaca data suplier
			header('Content-Type: application/json; charset=utf-8');
			echo json_encode([
				"status" 	=> false,
				"msg" 		=> "data suplier gagal dibaca",
			], JSON_PRETTY_PRINT);
			return;
		}
		# berhasil membaca data suplier
		header('Content-Type: application/json; charset=utf-8');
		echo json_encode([
			"status" 	=> true,
			"msg" 		=> "data suplier berhasil dibaca",
			"data"		=> [$data]
		], JSON_PRETTY_PRINT);
		return;
	}
?>