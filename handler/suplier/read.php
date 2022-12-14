<?php 
	if ($_SERVER['REQUEST_METHOD'] === "POST") {
		require_once '../../class/suplier.php'; # memanggil class suplier
		$process 	= new Suplier();
		$kode 		= $_POST['kode_suplier'];

		# proses read suplier
		$read = $process->read($kode);
		if (!$read) {
			header('Content-Type: application/json; charset=utf-8');
			echo json_encode([
				"status" 	=> false,
				"msg" 		=> "suplier gagal dibaca"
			], JSON_PRETTY_PRINT);
			return;
		}
		header('Content-Type: application/json; charset=utf-8');
		echo json_encode([
			"status" 	=> true,
			"msg" 		=> "suplier berhasil dibaca",
			"data"		=>	$read
		], JSON_PRETTY_PRINT);
		return;
	}
?>