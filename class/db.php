<?php 
	
	class Database
	{
		private $host = "localhost"; # host basis data
		private $user = "root"; # username basis data
		private $pwd  = ""; # password basis data
		private $name = "hafizramadhan_minimarket"; # nama basis data
		public $mysqli;

		# buat fungsi koneksi ke basis data di __construct
		# fungsi ini akan otomatis dijalankan, ketika object dari class Database dibuat / dipanggil
		function __construct()
		{
			$this->mysqli = new mysqli($this->host, $this->user, $this->pwd, $this->name);
			if ($this->mysqli->connect_errno) {
				echo "Failed to connect to MySQL: ".$this->mysqli->connect_error;
				exit();
			}
			return $this->mysqli;
		}
	}
	
 ?>