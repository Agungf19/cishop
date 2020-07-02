<main role="main" class="container">
	<?php $this->load->view('layouts/_alert') ?>
	<div class="row">
		<div class="col-md-10 mx-auto">
			<div class="card mb-3">
				<div class="card-header">
					<span>Pengguna</span>
					<a href="<?= base_url('user/create') ?>" class="btn btn-sm btn-success" data-toggle="tooltip" data-placement="bottom" title="Tambah Pengguna">
						<i class="fas fa-plus-circle"></i> Tambah
					</a>

					<div class="float-right">
						<?= form_open(base_url('user/search'), ['method' => 'POST']) ?>
						<div class="input-group">
							<input type="text" name="keyword" class="form-control form-control-sm text-center" data-toggle="tooltip" data-placement="bottom" title="Cari Data Pengguna Disini" placeholder="Cari Pengguna" value="<?= $this->session->userdata('keyword') ?>" autocomplete="off">
							<div class="input-group-append">
								<button class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="bottom" title="Cari Pengguna" type="submit">
									<i class="fas fa-search"></i>
								</button>
								<a href="<?= base_url('user/reset') ?>" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="bottom" title="Reset Pencarian">
									<i class="fas fa-eraser"></i>
								</a>
							</div>
						</div>
						<?= form_close() ?>
					</div>
				</div>
				<div class="card-body table-responsive">
					<table class="table table-hover table-bordered">
						<thead class="bg-warning">
							<tr>
								<th scope="col">#</th>
								<th scope="col">Pengguna</th>
								<th scope="col">E-Mail</th>
								<th scope="col">Role</th>
								<th scope="col">Status</th>
								<th scope="col">Action</th>
							</tr>
						</thead>
						<tbody>
							<?php $no = 0;
							foreach ($content as $row) : $no++; ?>
								<tr>
									<td><?= $no ?></td>
									<td>
										<p>
											<img src="<?= $row->image ? base_url("images/user/$row->image") : base_url("images/user/no_foto_user.jpg") ?>" alt="<?= $row->image ?>" title="<?= $row->image ?>" height="50">
											<?= $row->name ?>
										</p>
									</td>
									<td><?= $row->email ?></td>
									<td><?= $row->role ? '<span class="badge badge-info badge-pill">ADMIN</span>' : '<span class="badge badge-warning badge-pill">MEMBER</span>' ?></td>
									<td><?= $row->is_active ? '<span class="badge badge-success badge-pill">Aktif</span>' : '<span class="badge badge-danger badge-pill">Tidak Aktif</span>' ?></td>
									<td>
										<?= form_open(base_url("user/delete/$row->id"), ['method' => 'POST']) ?>
										<?= form_hidden('id', $row->id) ?>
										<a href="<?= base_url("user/edit/$row->id") ?>" class="btn btn-warning btn-sm" data-toggle="tooltip" data-placement="bottom" title="Edit data <?= $row->name ?>">
											<i class="fas fa-edit"></i>
										</a>
										<button class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="bottom" title="Hapus data <?= $row->name ?>" type="submit" onclick="return confirm('Apakah yakin ingin menghapus?')">
											<i class="fas fa-trash"></i>
										</button>
										<?= form_close() ?>
									</td>
								</tr>
							<?php endforeach ?>
						</tbody>
					</table>
				</div>
				<div class="card-footer">
					<nav aria-label="Page navigation example">
						<?= $pagination ?>
					</nav>
				</div>
			</div>
		</div>
	</div>
</main>