<?php
	
	// fitur ini digunakan untuk pencegahan dari csrf - logout
	if ($_SERVER['REQUEST_METHOD'] === "POST") {
		if ($_POST['logout']) {
			session_start();
			$_SESSION['is_login'] = FALSE;
			$_SESSION['login_at'] = FALSE;
			session_destroy();
			header('Location: http://localhost/minimarket/view');		
		}else{
			http_response_code(400);
			return; // bad request
		}
	}else{
		http_response_code(405);
		return; // method tidak diizinkan
	}
?>