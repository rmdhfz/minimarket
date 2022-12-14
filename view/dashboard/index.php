<?php 
session_start();
if (!$_SESSION['is_login']) {
	header('Location: http://localhost/hfzrmd/view');
	return;
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Dashboard | Aplikasi Kasir &dot; Hafiz Ramadhan - 191011402923</title>
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
	</style>
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<div class="container">
			<a class="navbar-brand" href="http://localhost/hfzrmd/view/dashboard/"> <b>Aplikasi Kasir</b> </a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNav">
				<ul class="navbar-nav">
					<li class="nav-item active">
						<a class="nav-link" href="http://localhost/hfzrmd/view/dashboard/kasir.php"> Kasir <span class="sr-only">(current)</span></a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="http://localhost/hfzrmd/view/dashboard/barang.php"> Barang </a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="http://localhost/hfzrmd/view/dashboard/suplier.php"> Suplier </a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="http://localhost/hfzrmd/view/dashboard/transaksi.php"> Transaksi </a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="javascript:void(0)" id="logout"> Keluar </a>
					</li>
				</ul>
			</div>
		</div>
	</nav> <br>
	<div class="container">
		<h3>Halo <?php echo $_SESSION['username'] ?>,</h3> 
		Selamat datang di Aplikasi Kasir Universitas Pamulang. <br>
		<small>Terakhir login: <?php echo $_SESSION['login_at'] ?></small>
	</div>
</body>
<script type="text/javascript">
	$(document).ready(function() {
		$("#logout").on('click', function(event) {
			event.preventDefault();
			if (confirm("Apakah Anda yakin ingin keluar dari Aplikasi ?")) {
				$.post('http://localhost/hfzrmd/handler/logout.php', {logout: true}, function(res) {
					window.location.reload(false);
				});
			}
		});
	});
</script>
</html>