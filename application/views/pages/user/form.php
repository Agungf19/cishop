<main role="main" class="container">
	<div class="row">
		<div class="col-md-10 mx-auto">
			<div class="card mb-3">
				<div class="card-header">
					<span>Formulir Pengguna</span>
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
								<?= form_input('name', $input->name, ['class' => 'form-control', 'required' => true, 'autofocus' => true, 'autocomplete' => 'off']) ?>
							</div>
							<?= form_error('name') ?>
						</div>
						<div class="form-group col-md-6">
							<label for="">E-Mail</label>
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text color_header"><i class="fa fa-at"></i></span>
								</div>
								<?= form_input(['type' => 'email', 'name' => 'email', 'value' => $input->email, 'class' => 'form-control', 'placeholder' => 'Masukkan alamat email aktif', 'required' => true, 'autocomplete' => 'off']) ?>
							</div>
							<?= form_error('email') ?>
						</div>
					</div>
					<div class="row">
						<div class="form-group col-md-4">
							<label for="">Password</label>
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text color_header"><i class="fas fa-key"></i></span>
								</div>
								<?= form_password('password', '', ['class' => 'form-control', 'placeholder' => 'Password minimal 8 karakter']) ?>
							</div>
							<?= form_error('password') ?>
						</div>
						<div class="form-group col-md-4">
							<label for="">Hak Akses</label>
							<br>
							<div class="form-check form-check-inline">
								<?= form_radio(['type' => 'radio', 'name' => 'role', 'value' => 'admin', 'checked' => $input->role == 'admin' ? true : false, 'form-check-input', 'id' => 'inlineRadio1']) ?>
								<label for="inlineRadio1" class="form-check-label btn btn-success form-check-label">Admin</label>
							</div>
							<div class="form-check form-check-inline">
								<?= form_radio(['type' => 'radio', 'name' => 'role', 'value' => 'member', 'checked' => $input->role == 'member' ? true : false, 'form-check-input', 'id' => 'inlineRadio2']) ?>
								<label for="inlineRadio2" class="form-check-label btn btn-danger form-check-label">Member</label>
							</div>
						</div>

						<div class="form-group col-md-4">
							<label for="">Status</label>
							<br>
							<div class="form-check form-check-inline">
								<?= form_radio(['type' => 'radio', 'name' => 'is_active', 'value' => 1, 'checked' => $input->is_active == 1 ? true : false, 'form-check-input', 'id' => 'inlineRadio3']) ?>
								<label for="inlineRadio3" class="form-check-label btn btn-success form-check-label">Aktif</label>
							</div>
							<div class="form-check form-check-inline">
								<?= form_radio(['type' => 'radio', 'name' => 'is_active', 'value' => 0, 'checked' => $input->is_active == 0 ? true : false, 'form-check-input', 'id' => 'inlineRadio4']) ?>
								<label for="inlineRadio4" class="form-check-label btn btn-danger form-check-label">Tidak Aktif</label>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="form-group col-md-4">
							<label for="">Foto</label>
							<div class="custom-file">
								<?= form_upload(['type' => 'file', 'name' => 'image', 'class' => 'custom-file-input', 'id' => 'customFile']) ?>
								<label class="custom-file-label" for="customFile">Pilih Foto Produk</label>
							</div>
						</div>
						<div class="form-group col-md-4 text-center">
							<?php if ($this->session->flashdata('image_error')) : ?>
								<small class="form-text text-danger"><?= $this->session->flashdata('image_error') ?></small>
							<?php endif ?>
							<?php if (isset($input->image)) : ?>
								<img src="<?= base_url("/images/user/$input->image") ?>" alt="" height="150">
							<?php endif ?>
						</div>
					</div>

				</div>
				<div class="card-footer">
					<a href="<?= base_url('user') ?>" class="btn btn-danger" data-toggle="tooltip" data-placement="bottom" title="Kembali Ke Product">
						<i class="fas fa-angle-left"></i> Kembali
					</a>
					<button type="submit" class="btn btn-primary float-right" data-toggle="tooltip" data-placement="bottom" title="Apakah Yakin Akan Menyimpan Data ?">
						<i class="fas fa-save"></i> Simpan
					</button>
				</div>
				<?= form_close() ?>
			</div>
		</div>
	</div>
</main>