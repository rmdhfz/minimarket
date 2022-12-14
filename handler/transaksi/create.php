<?php 
	if ($_SERVER['REQUEST_METHOD'] === "POST") {
		require_once '../class/transaksi.php'; # memanggil class transaksi
		$process 			= new Transaksi();
		$transaksi_id		= uniqid(10);
		$nik 				= $_POST['nik'];
		$kode_barang 		= $_POST['kode_barang'];
		$tanggal_pembelian 	= $_POST['tanggal_pembelian'];
		$jumlah_barang		= $_POST['jumlah_barang'];
		$total				= $_POST['total'];

		# proses simpan transaksi
		$simpan = $process->create($transaksi_id, $nik, $kode_barang, $tanggal_pembelian, $jumlah_barang, $total);
		if (!$simpan) {
			header('Content-Type: application/json; charset=utf-8');
			echo json_encode([
				"status" 	=> false,
				"msg" 		=> "transaksi gagal disimpan"
			], JSON_PRETTY_PRINT);
			return;
		}
		header('Content-Type: application/json; charset=utf-8');
		echo json_encode([
			"status" 	=> true,
			"msg" 		=> "transaksi berhasil disimpan"
		], JSON_PRETTY_PRINT);
		return;
	}
?>