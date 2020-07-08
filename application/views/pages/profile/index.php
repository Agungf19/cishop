<main role="main" class="container">
	<?php $this->load->view('layouts/_alert'); ?>
	<div class="row">
		<div class="col-md-3">
			<?php $this->load->view('layouts/_menu'); ?>
		</div>
		<div class="col-md-9">
			<div class="card card_shadow">
				<div class="card-header color_header">
					<i class="fas fa-id-card"></i> PROFILE USER
				</div>
				<div class="card-body">
					<div class="row">
						<div class="col-md-9">
							<div class="table-responsive">
								<table class="table table-borderless">
									<thead>
										<tr>
											<th style="width: 18%;">Nama</th>
											<th>:</th>
											<td><?= $content->name ?></td>
										</tr>
										<tr>
											<th>E-Mail</th>
											<th>:</th>
											<td><?= $content->email ?></td>
										</tr>
										<tr>
											<th>Hak Akses</th>
											<th>:</th>
											<td><?= $content->role ?></td>
										</tr>
										<tr>
											<th>Status</th>
											<th>:</th>
											<td><?= $content->is_active ? '<span class="badge badge-success badge-pill">Aktif</span>' : '<span class="badge badge-danger badge-pill">Tidak Aktif</span>' ?></td>
										</tr>
										<tr>
											<th>Alamat</th>
											<th>:</th>
											<td><?= $content->alamat ?></td>
										</tr>
									</thead>
								</table>
							</div>
						</div>
						<div class="float-left">
							<img src="<?= $content->image ? base_url("/images/user/$content->image") : base_url("/images/user/no_foto_user.jpg") ?>" alt="" height="200">
						</div>
					</div>
				</div>
				<div class="card-footer">
					<a href="<?= base_url("/profile/update/$content->id") ?>" class="btn btn-warning" data-toggle="tooltip" data-placement="bottom" title="Edit Data Profile <?= $content->name ?>"><i class="fas fa-edit"></i> Edit</a>
				</div>
			</div>
		</div>
	</div>
</main>