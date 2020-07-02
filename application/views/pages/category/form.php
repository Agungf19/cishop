<main role="main" class="container">
	<div class="row">
		<div class="col-md-6 mx-auto">
			<div class="card mb-3">
				<div class="card-header">
					<span>Formulir Kategori</span>
				</div>
				<div class="card-body">
					<?= form_open($form_action, ['method' => 'POST']) ?>
					<?= isset($input->id) ? form_hidden('id', $input->id) : '' ?>
					<div class="form-group">
						<label for="">Kategori</label>
						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text color_header"><i class="fas fa-tags"></i></span>
							</div>
							<?= form_input('title', $input->title, ['class' => 'form-control', 'id' => 'title', 'onkeyup' => 'createSlug()', 'required' => true, 'autofocus' => true, 'autocomplete' => 'off']) ?>
						</div>
						<?= form_error('title') ?>
					</div>
					<div class="form-group">
						<label for="">Slug</label>
						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text color_header"><i class="fas fa-link"></i></span>
							</div>
							<?= form_input('slug', $input->slug, ['class' => 'form-control', 'id' => 'slug', 'required' => true, 'autocomplete' => 'off', 'data-toggle' => 'tooltip', 'data-placement' => 'bottom', 'title' => 'Slug ini otomatis terisi', 'readonly' => true]) ?>
						</div>
						<?= form_error('slug') ?>
					</div>
				</div>
				<div class="card-footer">
					<a href="<?= base_url('category') ?>" class="btn btn-danger" data-toggle="tooltip" data-placement="bottom" title="Kembali Ke Category">
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