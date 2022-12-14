<?php 
	if ($_SERVER['REQUEST_METHOD'] === "POST") {
		require_once '../../class/kasir.php'; # memanggil class kasir
		$process 		= new Kasir();
		$nik 			= $_POST['nik'];
		$nama 			= $_POST['nama'];
		$jk 			= $_POST['jk'];
		$tempat_lahir 	= $_POST['tempat_lahir'];
		$alamat 		= $_POST['alamat'];

		# proses update kasir
		$update = $process->update($nik, $nama, $jk, $tempat_lahir, $alamat);
		if (!$update) {
			header('Content-Type: application/json; charset=utf-8');
			echo json_encode([
				"status" 	=> false,
				"msg" 		=> "kasir gagal disimpan"
			], JSON_PRETTY_PRINT);
			return;
		}
		header('Content-Type: application/json; charset=utf-8');
		echo json_encode([
			"status" 	=> true,
			"msg" 		=> "kasir berhasil disimpan"
		], JSON_PRETTY_PRINT);
		return;
	}
?>