<?php 
$user_session = session()->get('user');
$user = model('Users')->where('id', $user_session['id'])->first();
?>

<div class="wrapper">
	<nav id="sidebar" class="sidebar js-sidebar">
		<div class="sidebar-content js-simplebar">
			<a class="sidebar-brand" href="<?= base_url('dashboard') ?>">
				<img src="<?= base_url() . 'assets/img/logo.png' ?>" class="w-100" alt="<?= model('Env')->webName() ?>">
			</a>

			<ul class="sidebar-nav">
				<!-- Sidebar Menu -->
				<?php
				$sidebar = [
					[
						'text'    => 'Dashboard',
						'url'     => 'dashboard',
						'icon'    => 'fa-solid fa-chart-line',
						'role'    => [1, 2, 3]
					],
					// SUPERADMIN
					[
						'text'    => 'Home',
						'url'     => ' ',
						'icon'    => 'fa-solid fa-house',
						'role'    => [1]
					],
					[
						'text'    => 'DATA PRODUKTIF',
						'role'   => [1]
					],
					[
						'text'    => 'Kontribusi',
						'url'     => 'pengajuan-kontribusi',
						'icon'    => 'fa-solid fa-paper-plane',
						'role'    => [1]
					],
					[
						'text'    => 'Data Produktif',
						'url'     => 'data-produktif',
						'icon'    => 'fa-solid fa-up-right-from-square',
						'role'    => [1]
					],
					// SEMUA ROLE
					[
						'text'    => 'AKUN SAYA',
						'role'   => [1, 2, 3]
					],
					[
						'text'    => 'Profil',
						'url'     => 'profile',
						'icon'    => 'fa-solid fa-user',
						'role'    => [1, 2, 3]
					],
					[
						'text'    => 'Keluar',
						'url'     => 'logout',
						'icon'    => 'fa-solid fa-arrow-right-from-bracket',
						'role'    => [1, 2, 3]
					],

				];
				?>

				<?php 
				$uri_1 = service('uri')->getSegment(1);
				foreach ($sidebar as $v) : 
					//  Menampilkan semua data sidebar sesuai role
					if (in_array($user['id_role'], $v['role'])) :
						// Active sidebar
						if (!empty($v['url'])) {
							($uri_1 == $v['url']) ? $active = 'active' : $active = '';
				?>
				<li class="sidebar-item <?= $active ?>">
					<a class="sidebar-link" href="<?= base_url() . $v['url'] ?>">
						<i class="align-middle <?= $v['icon'] ?>"></i> 
						<span class="align-middle"><?= $v['text'] ?></span>
					</a>
				</li>
				<?php 
						} else { 
				?>
				<li class="sidebar-header text-secondary fw-500">
					<?= $v['text'] ?>
				</li>
				<?php 
				}
					endif;
				endforeach; 
				?>
		</div>
	</nav>

	<div class="main">
		<nav class="navbar navbar-expand navbar-light navbar-bg">
			<a class="sidebar-toggle js-sidebar-toggle">
				<i class="hamburger align-self-center"></i>
			</a>
			<div class="navbar-collapse collapse">
				<ul class="navbar-nav navbar-align">
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
							<?php
							if ($user['img']) {
								$img = base_url('assets/img/users/' . $user['img']);
							} else {
								$img = base_url('assets/img/user-default.png');
							}
							?>
							<img src="<?= $img ?>" class="avatar img-fluid img-style rounded-circle me-1" /> 
							<span class="text-dark d-none d-md-inline-block">
								<?= mb_strimwidth($user['nama'], 0, 15, "..."); ?>
							</span>
						</a>
						<div class="dropdown-menu dropdown-menu-end">
							<a class="dropdown-item" href="<?= base_url('profile') ?>">
								<i class="fa-solid fa-user me-1"></i>
								Profil
							</a>
								<div class="dropdown-divider"></div>
							<a class="dropdown-item" href="<?= base_url('logout') ?>">
								<i class="fa-solid fa-arrow-right-from-bracket me-1"></i>
								Keluar
							</a>
						</div>
					</li>
				</ul>
			</div>
		</nav>
