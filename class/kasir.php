	<?php 
	
	class Kasir
	{
		private $db;
		function __construct()
		{
			require_once 'db.php';
			$this->db = new Database();
		}

		function list()
		{
			$list = $this->db->mysqli->query("SELECT * FROM hafizramadhan_kasir");
			if (!$list) {
				return false;
			}
			return $list->fetch_row();
		}

		function create($nik, $nama, $jk, $tempat_lahir, $alamat)
		{
			if (!$nik || !$nama || !$jk || !$tempat_lahir || !$alamat) {
				return false;
			}
			$create = $this->db->mysqli->query("INSERT INTO hafizramadhan_kasir 
				(nik, nama, jk, tempat_lahir, alamat) VALUES
				('$nik', '$nama', '$jk', '$tempat_lahir', '$alamat')");
			if (!$create) {
				return false; # terjadi error
			}
			return true;
		}

		function read($nik)
		{
			if (!$nik) {
				return false;
			}

			$read = $this->db->mysqli->query("SELECT * FROM hafizramadhan_kasir WHERE nik = '$nik'");
			if (!$read) {
				return false;
			}
			return $read->fetch_assoc();
		}

		function update($nik, $nama, $jk, $tempat_lahir, $alamat)
		{
			if (!$nik || !$nama || !$jk || !$tempat_lahir || !$alamat) {
				return false;
			}
			$update = $this->db->mysqli->query("
				UPDATE 
				hafizramadhan_kasir 
				
				SET 
				nama = '$nama', 
				jk = '$jk', 
				tempat_lahir = '$tempat_lahir', 
				alamat = '$alamat'
				
				WHERE 
				nik = '$nik'");

			if (!$update) {
				return false; # terjadi error
			}
			return true;
		}

		function delete($nik)
		{
			if (!$nik) {
				return false;
			}

			$delete = $this->db->mysqli->query("DELETE FROM hafizramadhan_kasir WHERE nik = '$nik'");
			if (!$delete) {
				return false;
			}
			return true;
		}
	}
?>