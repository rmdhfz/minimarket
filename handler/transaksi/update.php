<?php 
	if ($_SERVER['REQUEST_METHOD'] === "POST") {
		require_once '../class/transaksi.php'; # memanggil class transaksi
		$process 			= new Transaksi();
		$transaksi_id		= $_POST['transaksi_id'];
		$nik 				= $_POST['nik'];
		$kode_barang 		= $_POST['kode_barang'];
		$tanggal_pembelian 	= $_POST['tanggal_pembelian'];
		$jumlah_barang		= $_POST['jumlah_barang'];
		$total				= $_POST['total'];

		# proses update transaksi
		$update = $process->update($transaksi_id, $nik, $kode_barang, $tanggal_pembelian, $jumlah_barang, $total);
		if (!$update) {
			header('Content-Type: application/json; charset=utf-8');
			echo json_encode([
				"status" 	=> false,
				"msg" 		=> "transaksi gagal diupdate"
			], JSON_PRETTY_PRINT);
			return;
		}
		header('Content-Type: application/json; charset=utf-8');
		echo json_encode([
			"status" 	=> true,
			"msg" 		=> "transaksi berhasil diupdate"
		], JSON_PRETTY_PRINT);
		return;
	}
?>