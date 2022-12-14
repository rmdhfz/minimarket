<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>transaksi | Aplikasi transaksi &dot; Hafiz Ramadhan - 191011402923</title>
	<!-- menggunakan bootstrap versi 4.6.2 dengan CDN (Content Delivery Network) -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

	<!-- menggunakan jquery versi 3.5.1 dengan CDN (Content Delivery Network) -->
	<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script> 
	<!-- menggunakan bootstrap versi 4.6.2 dengan CDN (Content Delivery Network) -->

	<!-- datatable -->
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
	<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
	<style type="text/css">
		#box {
			margin-top: 5rem;
		}
	</style>
</head>
<body>
	<div class="container" id="box">
		<div class="col-sm-12">
			<h1>Selamat datang di Menu Transaksi (coming soon) 
				<button type="button" class="btn btn-sm btn-flat btn-primary waves-effect" data-toggle="modal" data-target="#modal-transaksi" data-backdrop="static" data-keyboard="false">
					Tambah
				</button>
				<a href="http://localhost/minimarket/view/dashboard" class="btn btn-default"> Kembali </a>
			</h1> <hr>
		</div>
		<div class="table-responsive">
			<table id="table-transaksi" class="table table-striped">
				<thead>
					<tr>
						<th>No</th>
						<th>NIK</th>
						<th>Nama</th>
						<th>Jenis Kelamin</th>
						<th>Tempat Lahir</th>
						<th>Alamat</th>
						<th>Opsi</th>
					</tr>
				</thead>
				<tbody>
					<?php 
						require_once '../../class/db.php';
						$con = new Database();
						$transaksi = $con->mysqli->query("SELECT * FROM hafizramadhan_transaksi");
						$no = 1;
						while($value = mysqli_fetch_array($transaksi)){
							echo "
							<tr>
									<td>".$no++."</td>
									<td>".$value['nik']."</td>
									<td>".$value['nama']."</td>
									<td>".($value['jk'] == 1 ? "Laki-laki" : "Perempuan")."</td>
									<td>".$value['tempat_lahir']."</td>
									<td>".$value['alamat']."</td>
									<td>
										<a id='edit' data-id='".$value['nik']."' class='btn btn-warning btn-sm'>Edit</a>
										<a id='delete' data-id='".$value['nik']."' class='btn btn-danger btn-sm'>Hapus</a>
									</td>
							</tr>";
						}
					 ?>
				</tbody>
			</table>
		</div>
	</div>
	<div id="modal-transaksi" tabindex="-1" role="dialog" class="modal fade modal-flex">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Form transaksi</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="container-fluid">
						<form id="form-transaksi" method="post">
							<input type="hidden" id="id" name="id">
							<div class="container">
								<div class="form-group row">
									<label class="form-label col-sm-4">NIK</label>
									<input type="text" id="nik" name="nik" class="col-sm-8 form-control" required placeholder="masukan nik anda">
								</div>
								<div class="form-group row">
									<label class="form-label col-sm-4">Nama transaksi</label>
									<input type="text" id="nama" name="nama" class="col-sm-8 form-control" required placeholder="masukan nama transaksi">
								</div>
								<div class="form-group row">
									<label class="form-label col-sm-4">Jenis Kelamin</label>
									<select id="jk" name="jk" class="form-control col-sm-8" required>
										<option value="" disabled selected>Jenis Kelamin</option>
										<option value="1">Laki-laki</option>
										<option value="0">Perempuan</option>
									</select>
								</div>
								<div class="form-group row">
									<label class="form-label col-sm-4">Tempat Lahir</label>
									<input type="text" id="tempat_lahir" name="tempat_lahir" class="col-sm-8 form-control" required placeholder="masukan tempat lahir">
								</div>
								<div class="form-group row">
									<label class="form-label col-sm-4">Alamat</label>
									<input type="text" id="alamat" name="alamat" class="col-sm-8 form-control" required placeholder="masukan alamat">
								</div>
								<button type="submit" hidden id="submit"></button>
							</div>
						</form>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" onclick="$('#submit').click()" class="btn btn-sm btn-primary waves-effect waves-light btn-block">Submit</button>
				</div>
			</div>
		</div>
	</div>
</body>
<script type="text/javascript">
	$(document).ready(function() {

		let table, baseurl = "http://localhost/minimarket/";
		table = $("#table-transaksi").DataTable();


		$("#form-transaksi").submit(function(event) {
			event.preventDefault();
			if (confirm("Apakah data yang Anda input sudah benar ?")) {
				let id = $("#id").val() === "" ? url = "handler/transaksi/create.php" : url = "handler/transaksi/update.php";
				$.post(baseurl + url, $(this).serializeArray(), function(res) {
					if (res.status) {
						alert("transaksi berhasil dinput");
						window.location.reload(false);
					}
				});
			}
		});

		$("#table-transaksi").on('click', '#edit', function(event) {
			event.preventDefault();
			const id = $(this).data('id');
			if (id) {
				$.post(baseurl + 'handler/transaksi/read.php', {nik: id}, function(res) {
					if (res) {
						const data = res.data;
						if (data) {
							$("#modal-transaksi").modal('show');
							$("#id").val(data.nik);
							$("#nik").val(data.nik);
							$("#nama").val(data.nama);
							$("#jk").val(data.jk);
							$("#tempat_lahir").val(data.tempat_lahir);
							$("#alamat").val(data.alamat);
						}
					}
				});
			}
		});
		$("#table-transaksi").on('click', '#delete', function(event) {
			event.preventDefault();
			if (confirm("Apakah Anda yakin ingin menghapus data ini ?")) {
				const id = $(this).data('id');
				if (id) {
					$.post(baseurl + 'handler/transaksi/delete.php', {nik: id}, function(res) {
						if (res) {
							window.location.reload(false);
						}
					});
				}
			}
		});
	});
</script>
</html>