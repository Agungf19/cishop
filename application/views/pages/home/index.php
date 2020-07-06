<main role="main">
    <div class="container isi_content">
        <?php $this->load->view('layouts/_alert') ?>
        <div class="row">

            <div class="col-md-10">
                <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                        <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="/images/slide/slide1.jpg" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>First slide label</h5>
                                <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="/images/slide/slide2.jpg" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>Second slide label</h5>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="/images/slide/slide3.jpg" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>Third slide label</h5>
                                <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
                            </div>
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12">
                        <div class="card mb-3">
                            <div class="card-body card_shadow">
                                Kategori: <strong><?= isset($category) ? $category : 'Semua Kategori' ?></strong>
                                <span class="float-right">
                                    Urutkan Harga:
                                    <a href="<?= base_url("/shop/sortby/asc") ?>" class="badge badge-success">Termurah</a> |
                                    <a href="<?= base_url("/shop/sortby/desc") ?>" class="badge badge-danger">Termahal</a>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <h4 class="text-center font-weight-bold mb-3 text-warning">PRODUK TERBARU</h4>
                <div class="row">
                    <?php foreach ($content as $row) : ?>
                        <div class="col-md-3 col-sm-6">
                            <div class="card mb-3 mr_produk">
                                <div class="container_product">
                                    <img style="width:120px;height:120px;" src="<?= $row->image ? base_url("/images/product/$row->image") : base_url("/images/product/no_image_prduct.png") ?>" alt="" class="card-img-top image_product">
                                    <div class="middle_product">
                                        <p class="card-text text_product" style="font-size: 14px;"><?= $row->description ?></p>
                                    </div>
                                    <a href="#" class="badge badge-primary"><i class="fas fa-tags"></i> <?= $row->category_title ?></a>
                                </div>
                                <div class="card-body">

                                    <div class="tooltips">
                                        <h5 class="card-title"><?= substr($row->product_title, 0, 21) ?>...</h5>
                                        <div class="top">
                                            <span><?= $row->product_title ?></span>
                                            <i></i>
                                        </div>
                                    </div>

                                    <p class="card-text text-danger"><strong>Rp<?= number_format($row->price, 0, ',', '.') ?></strong></p>
                                    <i class="fas fa-star text-warning"></i>
                                    <i class="fas fa-star text-warning"></i>
                                    <i class="fas fa-star text-warning"></i>
                                    <i class="fas fa-star text-warning"></i>
                                    <i class="fas fa-star-half-alt text-warning"></i>
                                </div>
                                <div class="card-footer">
                                    <form action="<?= base_url("/cart/add") ?>" method="POST">
                                        <input type="hidden" name="id_product" value="<?= $row->id ?>">
                                        <div class="row">
                                            <div class="input-group-append col-md-4">
                                                <button class="btn btn-info" data-toggle="tooltip" data-placement="bottom" title="Detail Produk">Detail</button>
                                            </div>
                                            <div class="input-group col-md-8">
                                                <input type="number" name="qty" value="0" data-toggle="tooltip" data-placement="bottom" title="Masukan jumlah order" class="form-control">
                                                <div class="input-group-append">
                                                    <button class="btn btn-info" data-toggle="tooltip" data-placement="bottom" title="Tambah Kedalam Keranjang">
                                                        <i class="fas fa-cart-plus"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    <?php endforeach ?>
                </div>
            </div>

            <div class="col-md-2 bg-light">
                <div class="row no-gutters">
                    <div class="col-md-12">
                        <div class="card card mb-3 card_shadow">
                            <div class="card-header bg-warning" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                                <i class="fas fa-bars"></i> KATEGORI
                                <span class="navbar-toggler-icon"></span>
                            </div>
                            <div class="list-group list-group-flush collapse navbar-collapse" id="navbarCollapse">
                                <a href="<?= base_url('/') ?>" class="list-group-item list-group-item-action">
                                    <i class="fas fa-angle-right"></i> Semua Kategori
                                    <span class="badge badge-primary float-right"><?= count(getProduct()) ?></span>
                                </a>
                                <?php foreach (getCategories() as $category) : ?>
                                    <a href="<?= base_url("/shop/category/$category->slug") ?>" class="list-group-item list-group-item-action">
                                        <i class="fas fa-angle-right"></i> <?= $category->title ?>
                                        <span class="badge badge-primary float-right"><?= $category->jumlah ?></span>
                                    </a>
                                <?php endforeach ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="card-footer bg-warning">
            <nav aria-label="Page navigation example">
                <?= $pagination ?>
            </nav>
        </div>
    </div>
</main>