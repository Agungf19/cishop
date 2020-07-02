<main role="main" class="container">
	<?php $this->load->view('layouts/_alert'); ?>
	<div class="row">
		<div class="col-md-10 mx-auto">
			<div class="card mb-3">
				<div class="card-header">
					<span>Kategori</span>
					<a href="<?= base_url('category/create') ?>" class="btn btn-sm btn-success" data-toggle="tooltip" data-placement="bottom" title="Tambah Kategori">
						<i class="fas fa-plus-circle"></i> Tambah
					</a>

					<div class="float-right">
						<?= form_open(base_url('category/search'), ['method' => 'POST']) ?>
						<div class="input-group">
							<input type="text" name="keyword" class="form-control form-control-sm text-center" data-toggle="tooltip" data-placement="bottom" title="Cari Data Kategori Disini" placeholder="Cari Kategori" value="<?= $this->session->userdata('keyword') ?>" autocomplete="off">
							<div class="input-group-append">
								<button class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="bottom" title="Cari Kategori" type="submit">
									<i class="fas fa-search"></i>
								</button>
								<a href="<?= base_url('category/reset') ?>" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="bottom" title="Reset Pencarian">
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
								<th scope="col">Title</th>
								<th scope="col">Slug</th>
								<th scope="col">Action</th>
							</tr>
						</thead>
						<tbody>
							<?php $no = 0;
							foreach ($content as $row) :  $no++; ?>
								<tr>
									<td><?= $no ?></td>
									<td><?= $row->title ?></td>
									<td><?= $row->slug ?></td>
									<td>
										<?= form_open("category/delete/$row->id", ['method' => 'POST']) ?>
										<?= form_hidden('id', $row->id) ?>
										<a href="<?= base_url("category/edit/$row->id") ?>" class="btn btn-warning btn-sm" data-toggle="tooltip" data-placement="bottom" title="Edit data <?= $row->title ?>">
											<i class="fas fa-edit"></i>
										</a>
										<button class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="bottom" title="Hapus data <?= $row->title ?>" type="submit" onclick="return confirm('Yakin ingin hapus Kategori <?= $row->title ?> ?')">
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