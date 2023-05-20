<section>
<div class="container">
	<div class="row">
		<div class="col-xxl-3 col-lg-4 col-md-6 position-absolute top-50 start-50 translate-middle">
			<div class="card">
				<div class="card-body">
					<h4 class="mb-2 fw-600">Lupa Kata Sandi?</h4>
					<p class="mb-4">Masukkan email Anda yang terdaftar.</p>
					<form id="formAuthentication" class="mb-3" action="<?= base_url() . 'forgot-password-process' ?>" method="POST">
						<?= csrf_field(); ?>
						<div class="mb-3">
						<label for="email" class="form-label">Email</label>
							<input type="email" class="form-control <?= validation_show_error('email') ? "is-invalid" : '' ?>" id="email" name="email" placeholder="name@gmail.com" autofocus autocomplete="off">
							<div class="invalid-feedback">
								<?= validation_show_error('email') ?>
							</div>
						</div>
						<div class="mb-3">
							<button class="btn btn-primary d-grid w-100" type="submit">Kirim</button>
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