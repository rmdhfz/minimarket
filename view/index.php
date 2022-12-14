<?php 
	session_start();
	if (!empty($_SESSION['is_login'])) {
		header('Location: http://localhost/hfzrmd/view/dashboard');
		return;
	}
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login | Aplikasi Kasir &dot; Hafiz Ramadhan - 191011402923</title>
	<!-- menggunakan bootstrap versi 4.6.2 dengan CDN (Content Delivery Network) -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
	<!-- menggunakan jquery versi 3.5.1 dengan CDN (Content Delivery Network) -->
	<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script> 
	<!-- menggunakan bootstrap versi 4.6.2 dengan CDN (Content Delivery Network) -->
	<style type="text/css">
		#box {
			margin-top: 10rem;
		}
		#background {
			background-image: url("./../assets/kasir.jpg");
		}
	</style>
</head>
<body>
	<div class="container" id="box">
		<div class="row">
			<div class="col-sm-6">
				<form id="form-login" method="post">
					<center>
						<h1>Login</h1>
						<small>Selamat datang di Aplikasi Kasir - Universitas Pamulang</small>
					</center>
					<div class="form-outline mb-4">
						<label class="form-label" for="username">Username</label>
						<input type="text" name="username" id="username" class="form-control" placeholder="masukan username anda" required minlength="4" maxlength="25" pattern="[a-zA-Z0-9\s]{4,25}">
					</div>
					<div class="form-outline mb-4">
						<label class="form-label" for="password">Password</label>
						<input type="password" name="password" id="password" class="form-control" placeholder="masukan password anda" required minlength="4" maxlength="25" />
					</div>
					<button type="submit" class="btn btn-primary btn-block mb-4">Login</button>
				</form>
			</div>
			<div class="col-sm-6" id="background">
			</div>
		</div>
	</div> <br><br>
	<center><small>&copy; <a href="https://linkedin.com/in/hfzrmd" target="_blank">Hafiz Ramadhan</a> - 191011402923. Universitas Pamulang</small></center>
</body>
<script type="text/javascript">
	$(document).ready(function() {
		const base_url = "http://localhost/hfzrmd/";
		$("#form-login").submit(function(event) {
			event.preventDefault();
			$.post(base_url + 'handler/login.php', $("#form-login").serialize(), function(res) {
				if (res.status) {
					window.location = base_url + "/view/dashboard";
				}
				if (res.status == false) {
					alert(res.msg);
				}
			});
		});
	});
</script>
</html>