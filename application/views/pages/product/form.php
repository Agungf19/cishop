<main role="main" class="container">
	<div class="row">
		<div class="col-md-10 mx-auto">
			<div class="card mb-3 card_shadow">
				<div class="card-header color_header">
					<span>Formulir Produk</span>
				</div>
				<div class="card-body">
					<?= form_open_multipart($form_action, ['method' => 'POST']) ?>
					<?= isset($input->id) ? form_hidden('id', $input->id) : '' ?>
					<div class="row">
						<div class="form-group col-md-5">
							<label for="">Nama Produk</label>
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text color_header"><i class="fas fa-cubes"></i></span>
								</div>
								<?= form_input('title', $input->title, ['class' => 'form-control', 'id' => 'title', 'onkeyup' => 'createSlug()', 'required' => true, 'autofocus' => true, 'autocomplete' => 'off']) ?>
							</div>
							<?= form_error('title') ?>
						</div>
						<div class="form-group col-md-3">
							<label for="">Harga Produk</label>
							<div class="input-group mb-2">
								<div class="input-group-prepend">
									<div class="input-group-text color_header">Rp.</div>
								</div>
								<?= form_input(['type' => 'number', 'name' => 'price', 'value' => $input->price, 'class' => 'form-control', 'required' => true, 'autocomplete' => 'off']) ?>
							</div>
							<?= form_error('price') ?>
						</div>
						<div class="form-group col-md-4">
							<label for="">Merk Produk</label>
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text color_header"><i class="fas fa-box-open"></i></span>
								</div>
								<?= form_input('merk', $input->merk, ['class' => 'form-control', 'id' => 'merk', 'required' => true, 'autofocus' => true, 'autocomplete' => 'off']) ?>
							</div>
							<?= form_error('merk') ?>
						</div>
					</div>
					<div class="row">
						<div class="form-group col-md-3">
							<label for="">Kategori Produk</label>
							<div class="input-group mb-2">
								<div class="input-group-prepend">
									<span class="input-group-text color_header"><i class="fas fa-tags"></i></span>
								</div>
								<?= form_dropdown('id_category', getDropdownList('category', ['id', 'title']), $input->id_category, ['class' => 'form-control']) ?>
							</div>
							<?= form_error('id_category') ?>
						</div>
						<div class="form-group col-md-5">
							<label for="">Slug</label>
							<div class="input-group mb-2">
								<div class="input-group-prepend">
									<span class="input-group-text color_header"><i class="fas fa-link"></i></span>
								</div>
								<?= form_input('slug', $input->slug, ['class' => 'form-control', 'id' => 'slug', 'required' => true, 'readonly' => 'off', 'data-toggle' => 'tooltip', 'data-placement' => 'bottom', 'title' => $input->slug]) ?>
							</div>
							<?= form_error('slug') ?>
						</div>
						<div class="form-group col-md-4">
							<label for="">Ada Stock ?</label>
							<br>
							<div class="form-check form-check-inline">
								<?= form_radio(['type' => 'radio', 'name' => 'is_available', 'value' => 1, 'checked' => $input->is_available == 1 ? true : false, 'form-check-input', 'id' => 'inlineRadio1']) ?>
								<label for="inlineRadio1" class="form-check-label btn btn-success form-check-label">Tersedia</label>
							</div>
							<div class="form-check form-check-inline">
								<?= form_radio(['type' => 'radio', 'name' => 'is_available', 'value' => 0, 'checked' => $input->is_available == 0 ? true : false, 'form-check-input', 'id' => 'inlineRadio2']) ?>
								<label for="inlineRadio2" class="form-check-label btn btn-danger form-check-label">Kosong</label>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="form-group col-md-4">
							<label for="">Gambar</label>
							<div class="custom-file">
								<?= form_upload(['type' => 'file', 'name' => 'image', 'class' => 'custom-file-input', 'id' => 'customFile']) ?>
								<label class="custom-file-label" for="customFile">Pilih Gambar Produk</label>
							</div>
						</div>
						<div class="form-group col-md-4 text-center">
							<?php if ($this->session->flashdata('image_error')) : ?>
								<small class="form-text text-danger"><?= $this->session->flashdata('image_error') ?></small>
							<?php endif ?>
							<?php if ($input->image) : ?>
								<img src="<?= base_url("/images/product/$input->image") ?>" alt="" height="150">
							<?php endif ?>
						</div>
					</div>
					<div class="form-group">
						<label for="">Deskripsi</label>
						<?= form_textarea(['name' => 'description', 'value' => $input->description, 'rows' => 5, 'class' => 'form-control']) ?>
						<?= form_error('description') ?>
					</div>
				</div>
				<div class="card-footer">
					<a href="<?= base_url('product') ?>" class="btn btn-danger" data-toggle="tooltip" data-placement="bottom" title="Kembali Ke Product">
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