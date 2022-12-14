	<?php 
	
	class Transaksi
	{
		private $db;
		function __construct()
		{
			require_once 'db.php';
			$this->db = new Database();
		}

		function list()
		{
			$list = $this->db->mysqli->query("SELECT * FROM hafizramadhan_transaksi");
			if (!$list) {
				return false;
			}
			return $list->fetch_row();
		}

		function create($id_transaksi, $nik, $kode_barang, $tanggal_pembelian, $jumlah_barang, $total)
		{
			if (!$id_transaksi || !$nik || !$kode_barang || !$tanggal_pembelian || !$jumlah_barang || !$total) {
				return false;
			}
			$create = $this->db->mysqli->query("INSERT INTO hafizramadhan_transaksi 
				(id_transaksi, nik_transaksi, kode_barang, tanggal_pembelian, jumlah_barang, total) VALUES
				('$id_transaksi', '$nik', '$kode_barang', '$tanggal_pembelian', '$jumlah_barang', '$total')");
			if (!$create) {
				return false; # terjadi error
			}
			return true;
		}

		function read($id_transaksi)
		{
			if (!$id_transaksi) {
				return false;
			}

			$read = $this->db->mysqli->query("SELECT * FROM hafizramadhan_transaksi WHERE id_transaksi = '$id_transaksi'");
			if (!$read) {
				return false;
			}
			return $read->fetch_assoc();
		}

		function update($id_transaksi, $nik, $kode_barang, $tanggal_pembelian, $jumlah_barang, $total)
		{
			if (!$id_transaksi || !$nik || !$kode_barang || !$tanggal_pembelian || !$jumlah_barang || !$total) {
				return false;
			}
			$update = $this->db->mysqli->query("
				UPDATE 
				hafizramadhan_transaksi 
				
				SET 
				nik = '$nik', 
				kode_barang = '$kode_barang', 
				tanggal_pembelian = '$tanggal_pembelian', 
				jumlah_barang = '$jumlah_barang',
				total = '$total'
				
				WHERE 
				id_transaksi = '$id_transaksi'");

			if (!$update) {
				return false; # terjadi error
			}
			return true;
		}

		function delete($id_transaksi)
		{
			if (!$id_transaksi) {
				return false;
			}

			$delete = $this->db->mysqli->query("DELETE FROM hafizramadhan_transaksi WHERE id_transaksi = '$id_transaksi'");
			if (!$delete) {
				return false;
			}
			return true;
		}
	}
?>