<?php 
	if ($_SERVER['REQUEST_METHOD'] === "POST") {
		require_once '../../class/kasir.php'; # memanggil class kasir
		$process 	= new Kasir();
		$nik 		= $_POST['nik'];

		# proses delete kasir
		$delete = $process->delete($nik);
		if (!$delete) {
			header('Content-Type: application/json; charset=utf-8');
			echo json_encode([
				"status" 	=> false,
				"msg" 		=> "kasir gagal dihapus"
			], JSON_PRETTY_PRINT);
			return;
		}
		header('Content-Type: application/json; charset=utf-8');
		echo json_encode([
			"status" 	=> true,
			"msg" 		=> "kasir berhasil dihapus"
		], JSON_PRETTY_PRINT);
		return;
	}
?>