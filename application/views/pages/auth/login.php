<main role="main" class="container">
	<?php $this->load->view('layouts/_alert') ?>
	<div class="row">
		<div class="col-md-5 mx-auto">
			<div class="card border_header mr_login_register">
				<div class="card-header color_header">
					Formulir Login
				</div>
				<div class="card-body">
					<?= form_open('login', ['method' => 'POST']) ?>
					<div class="form-group">
						<label for="">E-Mail</label>
						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text color_header"><i class="fas fa-envelope"></i></span>
							</div>
							<?= form_input(['type' => 'email', 'name' => 'email', 'value' => $input->email, 'class' => 'form-control', 'required' => true, 'autocomplete' => 'off', 'data-toggle' => 'tooltip', 'data-placement' => 'bottom', 'title' => 'Masukan email anda']) ?>
						</div>
						<?= form_error('email') ?>
					</div>
					<div class="form-group">
						<label for="">Password</label>
						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text color_header"><i class="fas fa-key"></i></span>
							</div>
							<?= form_password('password', '', ['class' => 'form-control', 'required' => true, 'data-toggle' => 'tooltip', 'data-placement' => 'bottom', 'title' => 'Masukan password anda']) ?>
						</div>
						<?= form_error('password') ?>
					</div>
					<button type="submit" class="btn btn-outline-primary float-right"><i class="fas fa-sign-in-alt"></i> Login</button>
					<span class="text-danger">Belum punya akun ?</span><br>
					<a href="<?= base_url('/register') ?>">Daftar Sekarang</a>
				</div>
				<?= form_close() ?>
				<div class="card-footer bg-warning"></div>
			</div>
		</div>
	</div>
</main>