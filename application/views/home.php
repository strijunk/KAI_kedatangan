<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<script src="https://js.pusher.com/7.0/pusher.min.js"></script>

	<title><?= SITE_NAME . " | " . $title ?></title>

	<!-- Custom fonts for this template-->
	<link href="<?= base_url('assets/') ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

	<!-- Custom styles for this template-->
	<link href="<?= base_url('assets/') ?>css/sb-admin-2.css" rel="stylesheet">
	<link href="<?= base_url('assets/') ?>vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

	<script src="<?= base_url('assets/') ?>vendor/jquery/jquery.min.js"></script>
	<script src="<?= base_url('assets/') ?>vendor/datatables/jquery.dataTables.js"></script>

</head>


<body id="page-top" class="body-home">

	<!-- Page Wrapper -->
	<div id="wrapper">

		<!-- Content Wrapper -->
		<div id="content-wrapper" class="d-flex flex-column">

			<!-- Main Content -->
			<div id="content">

				<!-- Topbar -->
				<nav class="navbar navbar-expand navbar-light bg-home topbar mb-4 static-top shadow">
					<!-- Topbar Search -->
					<div class="d-sm-inline-block form-inline ml-md-3 my-2 my-md-0 mw-100">
						<img src="<?= base_url('assets/') ?>home.png" width="100px" height="50px" alt="">
					</div>
					<div class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100">
						<span class="text-logo">SISTEM DISPLAY INFORMASI</span>
						<span class="text-logo">KEDATANGAN KERETA API</span>
					</div>
					<div class="d-none d-sm-inline-block form-inline mr-auto ml-md-2 my-2 my-md-0 mw-100 navbar-search">
					</div>

					<!-- Topbar Navbar -->
					<ul class="navbar-nav ml-auto">

						<!-- Nav Item - User Information -->
						<li class="nav-item dropdown no-arrow">
							<span class="mr-2 d-none d-lg-inline text-time">
								<div id="runtime" class="mt-4"></div>
							</span>
						</li>

					</ul>

				</nav>
				<!-- End of Topbar -->
				<!-- Begin Page Content -->
				<div class="container-fluid">

					<!-- Page Heading -->
					<h1 class="h2 mb-4 text-center text-black-f">Jadwal Kedatangan Kereta Api - Stasiun Poncol</h1>
					<!-- DataTales Example -->
					<div class="card shadow mb-4">
						<div class="card-body">
							<div class="table-responsive">
								<table class="table table-bordered" id="mydata" width="100%" cellspacing="0">
									<thead class="text-black-f text-size">
										<tr>
											<th>No</th>
											<th>Jalur Kereta</th>
											<th>No Kereta</th>
											<th>Nama Kereta</th>
											<th>Tujuan</th>
											<th>Kedatangan</th>
										</tr>
									</thead>

									<tbody id="show_data" class="text-black-f text-size-b">
									</tbody>
								</table>
							</div>
						</div>

					</div>

				</div>
				<!-- /.container-fluid -->

			</div>
			<!-- End of Main Content -->



			<!-- End of Page Wrapper -->
			<footer class="flex-shrink-0 py-0">
				<div class="mb-5">
					<div class="marquee text-center">
						<div class="marquee__inner">
							<p class="marquee__line text-right" style="font-size: 25px;" ><?= $running->text ?></p>
						</div>
					</div>
				</div>
				<div id="sticky-footer" class="flex-shrink-0 py-4" style="background-color: #282462;">
					<div class="container text-center">

						<span class="footer-text">Copyright &copy; PT KERETA API INDONESIA PERSERO</span>
					</div>
				</div>
			</footer>
		</div>
		<!-- End of Content Wrapper -->

	</div>

	<!-- Scroll to Top Button-->
	<a class="scroll-to-top rounded" href="#page-top">
		<i class="fas fa-angle-up"></i>
	</a>

	<!-- Bootstrap core JavaScript-->
	<script src="<?= base_url('assets/') ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

	<!-- Core plugin JavaScript-->
	<script src="<?= base_url('assets/') ?>vendor/jquery-easing/jquery.easing.min.js"></script>
	<!-- Page level plugins -->
	<script src="<?= base_url('assets/') ?>vendor/datatables/dataTables.bootstrap4.min.js"></script>

	<!-- Custom scripts for all pages-->
	<script src="<?= base_url('assets/') ?>js/sb-admin-2.min.js"></script>

	<!-- Page level plugins -->
	<script src="<?= base_url('assets/'); ?>vendor/jquery-mask/jquery.mask.min.js"></script>
	<script src="<?= base_url('assets/'); ?>js/d3.v3.min.js"></script>
	<script>
		$(document).ready(function() {

			getData(); //pemanggilan fungsi
			var pusher = new Pusher('fae17dc39599b4dfcd36', {
				cluster: 'ap1',
				forceTLS: true
			});

			var channel = pusher.subscribe('my-channel');
			channel.bind('my-event', function(data) {
				if (data.message === 'success') {
					var table = $('#mydata').DataTable();
					getData();
				}
			});

			//fungsi get data
			function getData() {
				$.ajax({
					type: 'GET',
					url: '<?php echo base_url() ?>getdata',
					async: true,
					dataType: 'json',
					success: function(data) {
						var html = '';
						var i;
						for (i = 0; i < data.length; i++) {
							var o = i + 1;
							html += '<tr>' +
								'<td>' + o + '</td>' +
								'<td>' + data[i].jalur_kereta + '</td>' +
								'<td>' + data[i].no_kereta + '</td>' +
								'<td>' + data[i].nama_kereta + '</td>' +
								'<td>' + data[i].tujuan_kereta + '</td>' +
								'<td>' + data[i].waktu_keberangkatan + '</td>' +
								'</tr>';
						}
						$('#show_data').html(html);
						var table = $('#mydata').DataTable();
					}
				});
			}
			//end fungsi get data
		});
		var d, h, m, s;
		currtime();

		$(document).ready(function() {
			setInterval(currtime, 1000);
		});

		d3.select("#runtime")
			.append("text")
			.text("Waktu Sekarang: ")
			.append("span")
			.attr("id", "time")
			.text(h + ":" + m + ":" + s);

		function currtime() {
			d = new Date();
			h = d.getHours();
			m = d.getMinutes();
			s = d.getSeconds();
			d3.select("#runtime")
				.select("#time")
				.text(h + ":" + m + ":" + s);
		}
	</script>
</body>

</html>
