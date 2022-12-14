<?php 
	if ($_SERVER['REQUEST_METHOD'] === "POST") {
		require_once '../../class/barang.php'; # memanggil class barang
		$process 	= new Barang();
		$suplier 	= $_POST['kode_suplier'];
		$kode 		= $_POST['kode_barang'];
		$nama 		= $_POST['nama_barang'];
		$hargajual 	= $_POST['harga_jual'];
		$hargabeli 	= $_POST['harga_beli'];
		$stok 		= $_POST['stok_barang'];
		$satuan 	= $_POST['satuan_barang'];

		# pengecekan apakah harga jual kurang dari harga beli ?
		if ($hargajual < $hargabeli) {
			header('Content-Type: application/json; charset=utf-8');
			echo json_encode([
				"status" 	=> false,
				"msg" 		=> "harga jual tidak boleh kurang dari harga beli"
			], JSON_PRETTY_PRINT);
			return;
		}

		# proses simpan barang
		$simpan = $process->create($suplier, $kode, $nama, $hargajual, $hargabeli, $stok, $satuan);
		if (!$simpan) {
			header('Content-Type: application/json; charset=utf-8');
			echo json_encode([
				"status" 	=> false,
				"msg" 		=> "barang gagal disimpan"
			], JSON_PRETTY_PRINT);
			return;
		}
		header('Content-Type: application/json; charset=utf-8');
		echo json_encode([
			"status" 	=> true,
			"msg" 		=> "barang berhasil disimpan"
		], JSON_PRETTY_PRINT);
		return;
	}
?>