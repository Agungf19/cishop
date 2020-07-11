<main role="main" class="container">
	<?php $this->load->view('layouts/_alert'); ?>
	<div class="row">
		<div class="col-md-8">
			<div class="card mb-3 card_shadow">
				<div class="card-header color_header">
					Formulir Alamat Pengiriman
				</div>
				<div class="card-body">
					<form action="<?= base_url("/checkout/create") ?>" method="POST">
						<?php foreach ($user  as $key => $row) : ?>
							<?= $row->alamat ?>

							<div class="row">
								<div class="form-group col-md-6">
									<label for="">Nama</label>
									<input type="text" class="form-control" name="name" placeholder="Masukkan nama penerima" value="<?= $row->user_name ?>" autocomplete="off">
									<?= form_error('name') ?>
								</div>
								<div class="form-group col-md-6">
									<label for="">Telepon</label>
									<input type="text" class="form-control" name="phone" placeholder="Masukkan nomor telepon penerima" value="<?= $row->no_tlp ?>" autocomplete="off">
									<?= form_error('phone') ?>
								</div>
							</div>
							<div class="form-group">
								<label for="">Alamat</label>
								<textarea name="address" id="" cols="30" rows="5" placeholder="Masukkan Alamat penerima" class="form-control"><?= $row->alamat ?></textarea>
								<?= form_error('address') ?>
							</div>
							<div class="form-group">
								<label for="">Tulis Catatan</label>
								<input type="text" class="form-control" name="catatan" autofocus placeholder="Masukkan nomor telepon penerima" value="<?= $input->catatan ?>" autocomplete="off">
								<?= form_error('address') ?>
							</div>
							<button class="btn btn-primary" type="submit">Simpan</button>
						<?php endforeach ?>
					</form>
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="row">
				<div class="col-md-12">
					<div class="card mb-3 card_shadow">
						<div class="card-header color_header">
							Ringkasan Belanja
						</div>
						<div class="card-body">
							<div class="card-header text-center text-white font-weight-bold" style="background-color: #35d0ba;">
								Rp <?= number_format(array_sum(array_column($cart, 'subtotal')), 0, ',', '.') ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>