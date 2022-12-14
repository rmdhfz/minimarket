<?php 
	if ($_SERVER['REQUEST_METHOD'] === "POST") {
		require_once '../../class/suplier.php'; # memanggil class suplier
		$process 	= new Suplier();
		$id 		= $_POST['id'];
		$nama 		= $_POST['nama_suplier'];
		$telepon 	= $_POST['telepon'];
		$alamat 	= $_POST['alamat'];

		# proses update suplier
		$update = $process->update($id, $nama, $telepon, $alamat);
		if (!$update) {
			header('Content-Type: application/json; charset=utf-8');
			echo json_encode([
				"status" 	=> false,
				"msg" 		=> "suplier gagal diupdate"
			], JSON_PRETTY_PRINT);
			return;
		}
		header('Content-Type: application/json; charset=utf-8');
		echo json_encode([
			"status" 	=> true,
			"msg" 		=> "suplier berhasil diupdate"
		], JSON_PRETTY_PRINT);
		return;
	}
?>