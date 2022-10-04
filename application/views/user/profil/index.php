<!-- Begin Page Content -->
<div class="container-fluid">
	<!-- DataTales Example -->
	<?= $this->session->flashdata('message'); ?>
	<?php if ($this->session->flashdata('success') == TRUE) : ?>
		<div class="alert alert-success alert-dismissible fade show" role="alert">
			<?= $this->session->flashdata('success') ?>.
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
	<?php endif; ?>

	<div class="card shadow mb-4">

		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Profil</h6>
		</div>
		<form action="<?= base_url('user/profil/update') ?>" method="POST">
			<div class="card-body">
				<div class="form-group">
					<label>Username</label>
					<input type="text" name="username" value="<?= $profil->username ?>" class="form-control" required>
				</div>
				<div class="form-group">
					<label>Ganti Password</label>
					<input type="password" name="password" class="form-control">
				</div>
				<button type="submit" class="btn btn-primary">Submit</button>
			</div>
		</form>

	</div>

</div>
