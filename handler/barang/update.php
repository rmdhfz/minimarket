<?php 
	if ($_SERVER['REQUEST_METHOD'] === "POST") {
		require_once '../../class/barang.php'; # memanggil class barang
		$process 	= new Barang();
		$id 		= $_POST['id'];
		$suplier 	= $_POST['kode_suplier'];
		$nama 		= $_POST['nama_barang'];
		$hargajual 	= $_POST['harga_jual'];
		$hargabeli 	= $_POST['harga_beli'];
		$stok 		= $_POST['stok_barang'];
		$satuan 	= $_POST['satuan_barang'];


		# proses update barang
		$update = $process->update($id, $suplier, $nama, $hargajual, $hargabeli, $stok, $satuan);
		if (!$update) {
			header('Content-Type: application/json; charset=utf-8');
			echo json_encode([
				"status" 	=> false,
				"msg" 		=> "barang gagal diupdate"
			], JSON_PRETTY_PRINT);
			return;
		}
		header('Content-Type: application/json; charset=utf-8');
		echo json_encode([
			"status" 	=> true,
			"msg" 		=> "barang berhasil diupdate"
		], JSON_PRETTY_PRINT);
		return;
	}
?>