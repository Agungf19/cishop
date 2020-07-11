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
						<div class="col-md-8">
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
											<td><?= $content->email ?> | <?= $content->no_tlp ?></td>
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
						<div class="col-md-4 text-center">
							<img class="img_profil mb-1" src="<?= $content->image ? base_url("/images/user/$content->image") : base_url("/images/user/no_foto_user.jpg") ?>" alt="" height="200">
							<div class="card-header text-center color_header_profile">
								<span class="font-weight-bold">Hak Akses : </span>
								<?= $content->role ?> |
								<?= $content->is_active ? '<span class="badge badge-success badge-pill">Aktif</span>' : '<span class="badge badge-danger badge-pill">Tidak Aktif</span>' ?>
							</div>
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