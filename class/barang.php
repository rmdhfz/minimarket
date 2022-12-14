	<?php 
	
	class Barang
	{
		private $db;
		function __construct()
		{
			require_once 'db.php';
			$this->db = new Database();
		}

		function list()
		{
			$list = $this->db->mysqli->query("SELECT * FROM hafizramadhan_barang");
			if (!$list) {
				return false;
			}
			return $list->fetch_array();
		}

		function create($suplier, $kode, $nama, $hargajual, $hargabeli, $stok, $satuan)
		{
			if (!$suplier || !$kode || !$nama || !$hargajual || !$hargabeli || !$stok || !$satuan) {
				return false;
			}
			$create = $this->db->mysqli->query("INSERT INTO hafizramadhan_barang 
				(kode_suplier, kode_barang, nama_barang, harga_jual, harga_beli, stok, satuan) VALUES
				('$suplier', '$kode', '$nama', '$hargajual', '$hargabeli', '$stok', '$satuan')");

			if (!$create) {
				return false; # terjadi error
			}
			return true;
		}

		function read($kode)
		{
			if (!$kode) {
				return false;
			}

			$read = $this->db->mysqli->query("SELECT * FROM hafizramadhan_barang WHERE kode_barang = '$kode'");
			if (!$read) {
				return false;
			}
			return $read->fetch_assoc();
		}

		function update($id, $suplier, $nama, $hargajual, $hargabeli, $stok, $satuan)
		{
			if (!$id || !$suplier || !$nama || !$hargajual || !$hargabeli || !$stok || !$satuan) {
				return false;
			}
			$update = $this->db->mysqli->query("
				UPDATE hafizramadhan_barang 
				
				SET 
				kode_suplier = '$suplier',
				nama_barang = '$nama', 
				harga_jual = '$hargajual', 
				harga_beli = '$hargabeli', 
				stok = '$stok', 
				satuan = '$satuan' 
				
				WHERE 
				kode_barang = '$id'");
			if (!$update) {
				return false; # terjadi error
			}
			return true;
		}

		function delete($kode)
		{
			if (!$kode) {
				return false;
			}

			$delete = $this->db->mysqli->query("DELETE FROM hafizramadhan_barang WHERE kode_barang = '$kode'");
			if (!$delete) {
				return false;
			}
			return true;
		}

		function data_suplier()
		{
			$list = $this->db->mysqli->query("SELECT kode_suplier, nama_suplier FROM hafizramadhan_suplier");
			if (!$list) {
				return false;
			}
			return $list->fetch_assoc();
		}
	}
?>