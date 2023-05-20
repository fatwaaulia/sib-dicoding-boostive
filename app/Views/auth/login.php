<section>
<div class="container">
	<div class="row">
		<div class="col-xxl-3 col-lg-4 col-md-6 position-absolute top-50 start-50 translate-middle">
			<div class="card">
				<div class="card-body">
					<h4 class="mb-2 fw-600">Selamat datang👋</h4>
					<p class="mb-4">Silakan masuk ke akun Anda.</p>
					<form class="mb-3" action="<?= base_url() . 'login-process' ?>" method="POST">
						<?= csrf_field(); ?>
						<div class="mb-3">
							<label for="email" class="form-label">Email</label>
							<input type="email" class="form-control <?= validation_show_error('email') ? "is-invalid" : '' ?>" id="email" name="email" value="<?= old('email') ?>" placeholder="name@gmail.com" autofocus autocomplete="off">
							<div class="invalid-feedback">
								<?= validation_show_error('email') ?>
							</div>
						</div>
						<div class="mb-3">
							<div class="d-flex justify-content-between">
								<label class="form-label" for="password">Password</label>
								<a href="<?= base_url('forgot-password') ?>">
								<small>Lupa Password?</small>
								</a>
							</div>
							<div class="position-relative">
								<input type="password" class="form-control <?= validation_show_error('password') ? "is-invalid" : '' ?>" id="password" name="password" placeholder="Password" autocomplete="off">
								<div class="invalid-feedback">
									<?= validation_show_error('password') ?>
								</div>
                                <img src="<?= base_url('assets/img/show.png') ?>" class="position-absolute" id="eye_password">
							</div>
						</div>
						<div class="mb-3">
							<button class="btn btn-primary d-grid w-100" type="submit">Masuk</button>
						</div>
					</form>
					<div class="text-center">
						<span>Belum punya akun?</span>
						<a href="<?= base_url('register') ?>">
						<span>Daftar</span>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</section>

<script>
let eye_password = document.getElementById('eye_password');
eye_password.onclick = () => {
    let input_password = document.getElementById('password');
	if (input_password.getAttribute('type') == 'password') {
		input_password.type = 'text';
		eye_password.src = "<?= base_url('assets/img/hide.png') ?>"
	} else {
		input_password.type ='password';
		eye_password.src = "<?= base_url('assets/img/show.png') ?>"
	}
};
</script>