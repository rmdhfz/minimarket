<?php 
	if ($_SERVER['REQUEST_METHOD'] === "POST") {
		require_once '../class/transaksi.php'; # memanggil class transaksi
		$process 		= new Transaksi();
		$transaksi_id 	= $_POST['transaksi_id'];

		# proses read transaksi
		$read = $process->read($transaksi_id);
		if (!$read) {
			header('Content-Type: application/json; charset=utf-8');
			echo json_encode([
				"status" 	=> false,
				"msg" 		=> "transaksi gagal dibaca"
			], JSON_PRETTY_PRINT);
			return;
		}
		header('Content-Type: application/json; charset=utf-8');
		echo json_encode([
			"status" 	=> true,
			"msg" 		=> "transaksi berhasil dibaca",
			"data"		=>	$read
		], JSON_PRETTY_PRINT);
		return;
	}
?>