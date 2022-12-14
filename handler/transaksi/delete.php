<?php 
	if ($_SERVER['REQUEST_METHOD'] === "POST") {
		require_once '../class/transaksi.php'; # memanggil class transaksi
		$process 		= new Transaksi();
		$transaksi_id 	= $_POST['transaksi_id'];

		# proses delete transaksi
		$delete = $process->delete($transaksi_id);
		if (!$delete) {
			header('Content-Type: application/json; charset=utf-8');
			echo json_encode([
				"status" 	=> false,
				"msg" 		=> "transaksi gagal dihapus"
			], JSON_PRETTY_PRINT);
			return;
		}
		header('Content-Type: application/json; charset=utf-8');
		echo json_encode([
			"status" 	=> true,
			"msg" 		=> "transaksi berhasil dihapus"
		], JSON_PRETTY_PRINT);
		return;
	}
?>