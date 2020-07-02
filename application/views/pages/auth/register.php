<main role="main" class="container">
	<?php $this->load->view('layouts/_alert') ?>
	<div class="row">
		<div class="col-md-8 mx-auto">
			<div class="card border_header mr_login_register">
				<div class="card-header color_header">
					Formulir Registrasi
				</div>
				<div class="card-body">
					<?= form_open('register', ['method' => 'POST']) ?>
					<div class="row">
						<div class="form-group col-md-6">
							<label for="">Nama Anda</label>
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text color_header"><i class="fas fa-id-card"></i></span>
								</div>
								<?= form_input('name', $input->name, ['class' => 'form-control', 'required' => true, 'autofocus' => true, 'autocomplete' => 'off', 'data-toggle' => 'tooltip', 'data-placement' => 'bottom', 'title' => 'Masukan nama anda']) ?>
							</div>
							<?= form_error('name') ?>
						</div>
						<div class="form-group col-md-6">
							<label for="">E-Mail</label>
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text color_header"><i class="fas fa-envelope"></i></span>
								</div>
								<?= form_input(['type' => 'email', 'name' => 'email', 'value' => $input->email, 'class' => 'form-control', 'required' => true, 'autocomplete' => 'off', 'data-toggle' => 'tooltip', 'data-placement' => 'bottom', 'title' => 'Masukan email aktif anda']) ?>
							</div>
							<?= form_error('email') ?>
						</div>
					</div>
					<div class="row">
						<div class="form-group col-md-6">
							<label for="">Password</label>
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text color_header"><i class="fas fa-key"></i></span>
								</div>
								<?= form_password('password', '', ['class' => 'form-control', 'required' => true, 'data-toggle' => 'tooltip', 'data-placement' => 'bottom', 'title' => 'Password minimal 8 karakter']) ?>
							</div>
							<?= form_error('password') ?>
						</div>
						<div class="form-group col-md-6">
							<label for="">Konfirmasi Password</label>
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text color_header"><i class="fas fa-retweet"></i></span>
								</div>
								<?= form_password('password_confirmation', '', ['class' => 'form-control', 'required' => true,  'data-toggle' => 'tooltip', 'data-placement' => 'bottom', 'title' => 'Masukkan password yang sama']) ?>
							</div>
							<?= form_error('password_confirmation') ?>
						</div>
					</div>
				</div>
				<div class="card-footer bg-warning">
					<button type="submit" class="btn btn-primary"><i class="fas fa-sign-in-alt"></i> Register</button>
					<?= form_close() ?>
				</div>
			</div>
		</div>
	</div>
</main>