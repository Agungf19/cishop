<main role="main" class="container">
	<?php $this->load->view('layouts/_alert') ?>
	<div class="row">
		<div class="col-md-12">
			<div class="card mb-3 card_shadow">
				<div class="card-header color_header">
					Keranjang Belanja
				</div>
				<div class="card-body">
					<div class="table-responsive">
						<table class="table table-hover">
							<thead class="bg-warning">
								<tr>
									<th></th>
									<th>Produk</th>
									<th>Harga</th>
									<th class="text-center" style="width: 15%;">Qty</th>
									<th>Subtotal</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($content as $row) : ?>
									<tr>
										<td>
											<p>
												<img src="<?= $row->image ? base_url("/images/product/$row->image") : base_url('/images/product/default.png') ?>" alt="" height="50">
											</p>
										</td>
										<td>
											<p><?= $row->product_title ?></p>
										</td>
										<td>Rp<?= number_format($row->price, 0, ',', '.') ?></td>
										<td>
											<form action="<?= base_url("cart/update/$row->id") ?>" method="POST">
												<input type="hidden" name="id" value="<?= $row->id ?>">
												<div class="input-group">
													<input type="number" name="qty" class="form-control text-center" value="<?= $row->qty ?>">
													<div class="input-group-append">
														<button class="btn btn-info" type="submit"><i class="fas fa-check"></i></button>
													</div>
												</div>
											</form>
										</td>
										<td>Rp<?= number_format($row->subtotal, 0, ',', '.') ?></td>
										<td>
											<form action="<?= base_url("cart/delete/$row->id") ?>" method="POST">
												<input type="hidden" name="id" value="<?= $row->id ?>">
												<button class="btn btn-danger" data-toggle="tooltip" data-placement="bottom" title="Hapus order <?= $row->product_title ?>" type="submit" onclick="return confirm('Apakah yakin ingin menghapus?')">
													<i class="fas fa-trash-alt"></i>
												</button>
											</form>
										</td>
									</tr>
								<?php endforeach ?>
								<tr class="text-white font-weight-bold" style="background-color: #35d0ba;">
									<td class="text-center">Total : </td>
									<td colspan="3"></td>
									<td>Rp <?= number_format(array_sum(array_column($content, 'subtotal')), 0, ',', '.') ?></td>
									<td></td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
				<div class="card-footer">
					<button onclick="location.href='<?= base_url('/') ?>'" class="btn btn-danger">
						<span class="d-none d-lg-block">Kembali Belanja</span>
						<i class="d-md-none fas fa-angle-left"></i>
					</button>

					<button onclick="location.href='<?= base_url('/checkout') ?>'" class="btn btn-success float-right">
						<span class="d-none d-lg-block"> Checkout</span>
						<i class="d-md-none fas fa-angle-right"></i>
					</button>

				</div>
			</div>
		</div>
	</div>
</main>