<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('user/templates/head'); ?>

<body id="page-top">
	<div id="wrapper">
		<?php $this->load->view('user/templates/menu'); ?>
		<div id="content-wrapper" class="d-flex flex-column">

			<!-- Main Content -->
			<div id="content">
				<?php $this->load->view('user/templates/navbar'); ?>
				<?php $this->load->view('user/' . $folder . '/' . $page); ?>

				<!-- Footer -->
				<footer class="sticky-footer bg-white">
					<div class="container my-auto">
						<div class="copyright text-center my-auto">
							<span>Copyright &copy; KAI 2022</span>
						</div>
					</div>
				</footer>
				<!-- End of Footer -->
			</div>
		</div>
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
</body>

</html>
