<?php 
	
	if ($_SERVER['REQUEST_METHOD'] === "POST") {
		require_once '../class/login.php'; # memanggl class login
		$process  = new Login(); # membuat object baru dari class login
		
		# menangkap kedua parameter, yaitu username & password
		$username = $_POST['username'];
		$password = $_POST['password'];

		# parsing parameter kedalam fungsi login (dari class login)
		$login = $process->login($username, $password);
		
		if (!$login) {
			# jika $login = false (gagal), tampilkan pesan
			header('Content-Type: application/json; charset=utf-8');
			echo json_encode([
				"status" 	=> false,
				"msg" 		=> "username atau password tidak valid"
			], JSON_PRETTY_PRINT);
			return;
		}
		
		# jika $login = true (berhasil), set session
		session_start();
		# set session: username, login_at, is_login
		$_SESSION['username'] = $login['username'];
		$_SESSION['login_at'] = date('d-m-Y h:i:s');
		$_SESSION['is_login'] = true;

		header('Content-Type: application/json; charset=utf-8');
		echo json_encode([
			"status"	=> true,
			"session"	=> $_SESSION['username']
		], JSON_PRETTY_PRINT);
		return;
	}else{
		http_response_code(405); # method tidak diizinkan
		return;
	}

?>