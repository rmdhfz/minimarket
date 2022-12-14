<?php 
	if ($_SERVER['REQUEST_METHOD'] === "POST") {
		require_once '../../class/suplier.php'; # memanggil class suplier
		$process 	= new Suplier();
		$kode 		= $_POST['kode_suplier'];

		# proses delete suplier
		$delete = $process->delete($kode);
		if (!$delete) {
			header('Content-Type: application/json; charset=utf-8');
			echo json_encode([
				"status" 	=> false,
				"msg" 		=> "suplier gagal dihapus"
			], JSON_PRETTY_PRINT);
			return;
		}
		header('Content-Type: application/json; charset=utf-8');
		echo json_encode([
			"status" 	=> true,
			"msg" 		=> "suplier berhasil dihapus"
		], JSON_PRETTY_PRINT);
		return;
	}
?>