<main role="main" class="container">
	<?php $this->load->view('layouts/_alert') ?>
	<div class="row">
		<div class="col-md-10 mx-auto">
			<div class="card mb-3">
				<div class="card-header">
					<span>Produk</span>
					<a href="<?= base_url('product/create') ?>" class="btn btn-sm btn-success" data-toggle="tooltip" data-placement="bottom" title="Tambah Produk">
						<i class="fas fa-plus-circle"></i> Tambah
					</a>

					<div class="float-right">
						<?= form_open(base_url('product/search'), ['method' => 'POST']) ?>
						<div class="input-group">
							<input type="text" name="keyword" class="form-control form-control-sm text-center" data-toggle="tooltip" data-placement="bottom" title="Cari Data Produk Disini" placeholder="Cari Produk" value="<?= $this->session->userdata('keyword') ?>" autocomplete="off">
							<div class="input-group-append">
								<button class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="bottom" title="Cari Produk" type="submit">
									<i class="fas fa-search"></i>
								</button>
								<a href="<?= base_url('product/reset') ?>" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="bottom" title="Reset Pencarian">
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
								<th scope="col">Produk</th>
								<th scope="col">Kategori</th>
								<th scope="col">Harga</th>
								<th scope="col">Stock</th>
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
											<img src="<?= $row->image ? base_url("images/product/$row->image") : base_url("images/product/no_image_prduct.png") ?>" alt="" height="50">
											<?= $row->product_title ?>
										</p>
									</td>
									<td>
										<span class="badge badge-primary"><i class="fas fa-tags"></i> <?= $row->category_title ?></span>
									</td>
									<td>Rp<?= number_format($row->price, 0, ',', '.') ?>,-</td>
									<td><?= $row->is_available ? '<span class="badge badge-success badge-pill">Tersedia</span>' : '<span class="badge badge-danger badge-pill">Kosong</span>' ?></td>
									<td>
										<?= form_open(base_url("/product/delete/$row->id"), ['method' => 'POST']) ?>
										<?= form_hidden('id', $row->id) ?>
										<a href="<?= base_url("/product/edit/$row->id") ?>" class="btn btn-warning btn-sm" data-toggle="tooltip" data-placement="bottom" title="Edit data <?= $row->product_title ?>">
											<i class=" fas fa-edit"></i>
										</a>
										<button class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="bottom" title="Hapus data <?= $row->product_title ?>" type="submit" onclick="return confirm('Apakah yakin ingin menghapus?')">
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