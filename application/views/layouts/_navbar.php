<nav class="navbar navbar-expand-lg navbar-dark fixed-top color_navbar">
    <div class="container">
        <a class="navbar-brand" href="<?= base_url() ?>">
            <Span class="text-dark font-weight-bold"><?= $this->session->userdata('role'); ?></Span> - CIShop
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse_kategori" aria-controls="navbarCollapse_kategori" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse_kategori">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url() ?>">Beranda <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" id="dropdown-1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Manage</a>
                    <div class="dropdown-menu" aria-labelledby="dropdown-1">
                        <a href="<?= base_url('category') ?>" class="dropdown-item">Kategori</a>
                        <a href="<?= base_url('product') ?>" class="dropdown-item">Produk</a>
                        <a href="<?= base_url('order') ?>" class="dropdown-item">Order</a>
                        <a href="<?= base_url('user') ?>" class="dropdown-item">Pengguna</a>
                    </div>
                </li>
            </ul>
            <ul class="navbar-nav">
                <!-- Jika sudah login Menu Cart akan muncul, jika belum login menu Cart ini tidak akan muncul -->
                <?php if ($this->session->userdata('is_login')) : ?>
                    <li class="nav-item">
                        <a href="<?= base_url('cart') ?>" class="nav-link" data-toggle="tooltip" data-placement="bottom" title="Keranjang Belanja"><i class="fas fa-shopping-cart"></i> Cart (<?= getCart(); ?>)</a>
                    </li>
                <?php endif ?>
                <!-- Jika belum login, maka menu ini akan muncul -->
                <?php if (!$this->session->userdata('is_login')) : ?>
                    <li class="nav-item">
                        <a href="<?= base_url('/login') ?>" class="nav-link">Login</a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url('/register') ?>l" class="nav-link">Register</a>
                    </li>
                <?php else : ?>
                    <div class="dropdown">
                        <a class="btn btn-info dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Hei <?= $this->session->userdata('name'); ?>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <a href="<?= base_url('/profile') ?>" class="dropdown-item">Profile</a>
                            <a href="<?= base_url('/orders') ?>" class="dropdown-item">Orders</a>
                            <a href="<?= base_url('/logout') ?>" class="dropdown-item">Logout</a>
                        </div>
                    </div>
                <?php endif ?>
                &nbsp;
                <form action="">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Cari Produk" aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-warning"><i class="fas fa-search"></i> Cari</button>
                        </div>
                    </div>
                </form>
            </ul>
        </div>
    </div>
</nav>