<?php 
	
	class Login
	{
		private $db;
		function __construct()
		{
			require_once 'db.php';
			$this->db = new Database();
		}
		function login($username, $password)
		{
			if (!$username || !$password) {
				return false;
			}

			$result = $this->db->mysqli->query("SELECT * FROM hafizramadhan_users WHERE username = '$username'");
			if (!$result) {
				return false;
			}

			$count = $result->num_rows;
			if ($count == 0) {
				return false;
			}

			$data  = $result->fetch_assoc();

			# validasi password
			$validate = password_verify($password, $data['password']);
			if (!$validate) {
				return false; // password tidak sama
			}
			return $data; // password sama
		}
	}
?>