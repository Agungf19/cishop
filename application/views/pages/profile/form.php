<main role="main" class="container">
	<div class="row">
		<div class="col-md-3">
			<?php $this->load->view('layouts/_menu'); ?>
		</div>
		<div class="col-md-9">
			<div class="card card_shadow">
				<div class="card-header color_header">
					Formulir Profile
				</div>
				<div class="card-body">
					<?= form_open_multipart($form_action, ['method' => 'POST']) ?>
					<?= isset($input->id) ? form_hidden('id', $input->id) : '' ?>
					<div class="row">
						<div class="form-group col-md-6">
							<label for="">Nama</label>
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text color_header"><i class="fas fa-user"></i></span>
								</div>
								<?= form_input('name', $input->name, ['class' => 'form-control', 'required' => true, 'autofocus' => true]) ?>
							</div>
							<?= form_error('name') ?>
						</div>
						<div class="form-group col-md-6">
							<label for="">E-Mail</label>
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text color_header"><i class="fas fa-user"></i></span>
								</div>
								<?= form_input(['type' => 'email', 'name' => 'email', 'value' => $input->email, 'class' => 'form-control', 'placeholder' => 'Masukkan alamat email aktif', 'required' => true]) ?>
							</div>
							<?= form_error('email') ?>
						</div>
					</div>
					<div class="row">
						<div class="form-group col-md-5">
							<label for="">Password</label>
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text color_header"><i class="fas fa-user"></i></span>
								</div>
								<?= form_password('password', '', ['class' => 'form-control', 'placeholder' => 'password minimal 8 karakter']) ?>
							</div>
							<?= form_error('password') ?>
						</div>
						<div class="form-group col-md-7">
							<label for="">Foto</label>
							<br>
							<?= form_upload('image') ?>
							<?php if ($this->session->flashdata('image_error')) : ?>
								<small class="form-text text-danger"><?= $this->session->flashdata('image_error') ?></small>
							<?php endif ?>
							<?php if (isset($input->image)) : ?>
								<img src="<?= base_url("/images/user/$input->image") ?>" alt="" height="150">
							<?php endif ?>
						</div>
					</div>
					<div class="form-group">
						<label for="">Alamat Lengkap</label>
						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text color_header"><i class="fas fa-address-book"></i></span>
							</div>
							<?= form_textarea(['name' => 'alamat', 'value' => $input->alamat, 'rows' => 5, 'class' => 'form-control']) ?>
						</div>
						<?= form_error('alamat') ?>
					</div>
					<button type="submit" class="btn btn-primary">Simpan</button>
					<?= form_close() ?>
				</div>
			</div>
		</div>
	</div>
</main>