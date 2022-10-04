<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

	<!-- Sidebar - Brand -->
	<a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('admin/beranda') ?>">
		<div class="sidebar-brand-icon">
			<i class="fas fa-subway"></i>
		</div>
		<div class="sidebar-brand-text mx-3">KAI <sup>Indonesia</sup></div>
	</a>

	<!-- Divider -->
	<hr class="sidebar-divider my-0">

	<!-- Nav Item - Dashboard -->
	<li class="nav-item <?php echo $this->uri->segment(2) == 'dashboard' ? 'active' : '' ?>">
		<a class="nav-link" href="<?= base_url('user/dashboard') ?>">
			<i class="fas fa-fw fa-tachometer-alt"></i>
			<span>Beranda</span></a>
	</li>
	<hr class="sidebar-divider my-0">
	<li class="nav-item <?php echo $this->uri->segment(2) == 'jadwal' ? 'active' : '' ?>">
		<a class="nav-link" href="<?= base_url('user/jadwal') ?>">
			<i class="fas fa-fw fa-calendar"></i>
			<span>Jadwal Kereta</span></a>
	</li>
	<hr class="sidebar-divider my-0">
	<li class="nav-item <?php echo $this->uri->segment(2) == '/' ? 'active' : '' ?>">
		<a class="nav-link" href="<?= base_url('/') ?>" target="_blank">
			<i class="fas fa-fw fa-eye"></i>
			<span>Lihat Jadwal</span></a>
	</li>
	<hr class="sidebar-divider my-0">
	<li class="nav-item <?php echo $this->uri->segment(2) == 'running' ? 'active' : '' ?>">
		<a class="nav-link" href="<?= base_url('user/running') ?>">
			<i class="fas fa-fw fa-text-width"></i>
			<span>Running Text</span></a>
	</li>
	<hr class="sidebar-divider my-0">
	<li class="nav-item <?php echo $this->uri->segment(2) == 'profil' ? 'active' : '' ?>">
		<a class="nav-link" href="<?= base_url('user/profil') ?>">
			<i class="fas fa-fw fa-user"></i>
			<span>Password</span></a>
	</li>
</ul>
