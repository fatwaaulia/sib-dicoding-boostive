<section>
<div class="container">
	<div class="row">
		<div class="col-xxl-3 col-lg-4 col-md-6 position-absolute top-50 start-50 translate-middle">
			<div class="card">
				<div class="card-body">
					<h4 class="mb-2 fw-600">Reset Password</h4>
					<p class="mb-4"><?= $user['email'] ?></p>
					<form class="mb-3" action="<?= base_url() . 'reset-password-process/' . $user['token'] ?>" method="POST">
						<?= csrf_field(); ?>
						<div class="mb-3">
							<label for="password" class="form-label">Password Baru</label>
							<div class="mb-2 position-relative">
								<input type="password" class="form-control <?= validation_show_error('password') ? "is-invalid" : '' ?>" name="password" id="password" value="<?= old('password') ?>" placeholder="Password baru">
								<div class="invalid-feedback">
									<?= validation_show_error('password') ?>
								</div>
								<img src="<?= base_url('assets/img/show.png') ?>" class="position-absolute" id="eye_password">
							</div>
							<div class="position-relative">
								<input type="password" class="form-control <?= validation_show_error('passconf') ? "is-invalid" : '' ?>" name="passconf" id="passconf" value="<?= old('passconf') ?>" placeholder="Confirm password">
								<div class="invalid-feedback">
									<?= validation_show_error('passconf') ?>
								</div>
								<img src="<?= base_url('assets/img/show.png') ?>" class="position-absolute" id="eye_passconf">
							</div>
						</div>
						<div class="mb-3">
							<button class="btn btn-primary d-grid w-100" type="submit">Simpan</button>
						</div>
					</form>
					<div class="text-center">
						<a href="<?= base_url('login') ?>">
						<span>
							<i class="fa-solid fa-angle-left me-1"></i>
							Kembali
						</span>
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
let eye_passconf = document.getElementById('eye_passconf');
eye_passconf.onclick = () => {
    let input_passconf = document.getElementById('passconf');
	if (input_passconf.getAttribute('type') == 'password') {
		input_passconf.type = 'text';
		eye_passconf.src = "<?= base_url('assets/img/hide.png') ?>"
	} else {
		input_passconf.type ='password';
		eye_passconf.src = "<?= base_url('assets/img/show.png') ?>"
	}
};
</script>