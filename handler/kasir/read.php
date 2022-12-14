<?php 
	if ($_SERVER['REQUEST_METHOD'] === "POST") {
		require_once '../../class/kasir.php'; # memanggil class kasir
		$process 	= new Kasir();
		$nik 		= $_POST['nik'];

		# proses read kasir
		$read = $process->read($nik);
		if (!$read) {
			header('Content-Type: application/json; charset=utf-8');
			echo json_encode([
				"status" 	=> false,
				"msg" 		=> "kasir gagal dibaca"
			], JSON_PRETTY_PRINT);
			return;
		}
		header('Content-Type: application/json; charset=utf-8');
		echo json_encode([
			"status" 	=> true,
			"msg" 		=> "kasir berhasil dibaca",
			"data"		=>	$read
		], JSON_PRETTY_PRINT);
		return;
	}
?>