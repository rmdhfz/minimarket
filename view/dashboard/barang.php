<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Barang | Aplikasi Kasir &dot; Hafiz Ramadhan - 191011402923</title>
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
			<h1>Selamat datang di Menu Barang 
				<button type="button" class="btn btn-sm btn-flat btn-primary waves-effect" data-toggle="modal" data-target="#modal-barang" data-backdrop="static" data-keyboard="false">
					Tambah
				</button>
				<a href="http://localhost/minimarket/view/dashboard" class="btn btn-default"> Kembali </a>
			</h1> <hr>
		</div>
		<div class="table-responsive">
			<table id="table-barang" class="table table-striped">
				<thead>
					<tr>
						<th>No</th>
						<th>Kode Suplier</th>
						<th>Kode Barang</th>
						<th>Nama Barang</th>
						<th>Harga Jual</th>
						<th>Harga Beli</th>
						<th>Stok</th>
						<th>Satuan</th>
						<th>Opsi</th>
					</tr>
				</thead>
				<tbody>
					<?php 
						require_once '../../class/db.php';
						$con = new Database();
						$barang = $con->mysqli->query("SELECT * FROM hafizramadhan_barang");
						$no = 1;
						while($value = mysqli_fetch_array($barang)){
							echo "
							<tr>
									<td>".$no++."</td>
									<td>".$value['kode_suplier']."</td>
									<td>".$value['kode_barang']."</td>
									<td>".$value['nama_barang']."</td>
									<td>".$value['harga_jual']."</td>
									<td>".$value['harga_beli']."</td>
									<td>".$value['stok']."</td>
									<td>".$value['satuan']."</td>
									<td>
										<a id='edit' data-id='".$value['kode_barang']."' class='btn btn-warning btn-sm'>Edit</a>
										<a id='delete' data-id='".$value['kode_barang']."' class='btn btn-danger btn-sm'>Hapus</a>
									</td>
							</tr>";
						}
					 ?>
				</tbody>
			</table>
		</div>
	</div>
	<div id="modal-barang" tabindex="-1" role="dialog" class="modal fade modal-flex">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Form Barang</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="container-fluid">
						<form id="form-barang" method="post">
							<input type="hidden" id="id" name="id">
							<div class="container">
								<div class="form-group row">
									<label class="form-label col-sm-4">Kode Suplier</label>
									<select id="suplier" name="kode_suplier" class="form-control col-sm-8"></select>
								</div>
								<div class="form-group row">
									<label class="form-label col-sm-4">Kode Barang</label>
									<input type="text" id="kode_barang" name="kode_barang" class="col-sm-8 form-control" required placeholder="masukan kode barang" readonly="1" value="<?php echo uniqid(10); ?>">
								</div>
								<div class="form-group row">
									<label class="form-label col-sm-4">Nama Barang</label>
									<input type="text" id="nama_barang" name="nama_barang" class="col-sm-8 form-control" required placeholder="masukan nama barang">
								</div>
								<div class="form-group row">
									<label class="form-label col-sm-4">Harga Jual</label>
									<input type="number" id="harga_jual" name="harga_jual" class="col-sm-8 form-control" required placeholder="masukan harga jual barang">
								</div>
								<div class="form-group row">
									<label class="form-label col-sm-4">Harga Beli</label>
									<input type="number" id="harga_beli" name="harga_beli" class="col-sm-8 form-control" required placeholder="masukan harga beli barang">
								</div>
								<div class="form-group row">
									<label class="form-label col-sm-4">Stok</label>
									<input type="number" id="stok_barang" name="stok_barang" class="form-control col-sm-8" required placeholder="masukan stok barang">
								</div>
								<div class="form-group row">
									<label class="form-label col-sm-4">Satuan</label>
									<select id="satuan_barang" name="satuan_barang" class="form-control col-sm-8">
										<option value="" disabled selected> Pilih Satuan Barang</option>
										<option value="kilogram">Kilogram (kg)</option>
										<option value="gram">Gram (gr)</option>
										<option value="liter">Liter</option>
										<option value="lusin">Lusin</option>
									</select>
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
		table = $("#table-barang").DataTable();

		get_suplier();
		function get_suplier()
		{
			$.post(baseurl + 'handler/barang/data_suplier.php', function(res, xhr, status) {
				const data = res.data;
				console.log(data);
				$.each(data, function(index, val) {
					$("#suplier").append(`<option value='${val.kode_suplier}'> ${val.nama_suplier} - ${val.kode_suplier}</option>`);
				});
			});
		}


		$("#form-barang").submit(function(event) {
			event.preventDefault();
			if (confirm("Apakah data yang Anda input sudah benar ?")) {
				let id = $("#id").val() === "" ? url = "handler/barang/create.php" : url = "handler/barang/update.php";
				$.post(baseurl + url, $(this).serializeArray(), function(res) {
					if (res.status) {
						alert("Barang berhasil dinput");
						window.location.reload(false);
					}else{
						alert(res.msg);
					}
				});
			}
		});

		$("#table-barang").on('click', '#edit', function(event) {
			event.preventDefault();
			const id = $(this).data('id');
			if (id) {
				$.post(baseurl + 'handler/barang/read.php', {kode_barang: id}, function(res) {
					if (res) {
						const data = res.data;
						if (data) {
							$("#modal-barang").modal('show');
							$("#id").val(data.kode_barang);
							$("#kode_suplier").val(data.kode_suplier);
							$("#nama_barang").val(data.nama_barang);
							$("#harga_jual").val(data.harga_jual);
							$("#harga_beli").val(data.harga_beli);
							$("#stok_barang").val(data.stok);
							$("#satuan_barang").val(data.satuan);
						}
					}
				});
			}
		});
		$("#table-barang").on('click', '#delete', function(event) {
			event.preventDefault();
			if (confirm("Apakah Anda yakin ingin menghapus data ini ?")) {
				const id = $(this).data('id');
				if (id) {
					$.post(baseurl + 'handler/barang/delete.php', {kode_barang: id}, function(res) {
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