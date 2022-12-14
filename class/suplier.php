	<?php 
	
	class Suplier
	{
		private $db;
		function __construct()
		{
			require_once 'db.php';
			$this->db = new Database();
		}

		function list()
		{
			$list = $this->db->mysqli->query("SELECT * FROM hafizramadhan_suplier");
			if (!$list) {
				return false;
			}
			return $list->fetch_row();
		}

		function create($kode, $nama, $telepon, $alamat)
		{
			if (!$kode || !$nama || !$telepon || !$alamat) {
				return false;
			}
			$create = $this->db->mysqli->query("INSERT INTO hafizramadhan_suplier 
				(kode_suplier, nama_suplier, telepon, alamat) VALUES
				('$kode', '$nama', '$telepon', '$alamat')");
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

			$read = $this->db->mysqli->query("SELECT * FROM hafizramadhan_suplier WHERE kode_suplier = '$kode'");
			if (!$read) {
				return false;
			}
			return $read->fetch_assoc();
		}

		function update($id, $nama, $telepon, $alamat)
		{
			if (!$id || !$nama || !$telepon || !$alamat) {
				return false;
			}
			$update = $this->db->mysqli->query("
				UPDATE 
				hafizramadhan_suplier 
				
				SET 
				nama_suplier = '$nama', 
				telepon = '$telepon', 
				alamat = '$alamat', 
				
				WHERE 
				kode_suplier = '$id'");
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

			$delete = $this->db->mysqli->query("DELETE FROM hafizramadhan_suplier WHERE kode_suplier = '$kode'");
			if (!$delete) {
				return false;
			}
			return true;
		}
	}
?>