<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>

<style>
    body {
        background-color: #1e1e2f;
        color: white;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .card {
        background-color: #2c2c3a;
        color: white;
    }

    .card-title {
        color: #e0e0e0;
        font-weight: 600;
    }

    .btn-purple {
        background-color: #6b21a8;
        color: white;
        font-weight: 500;
        border: none;
        border-radius: 8px;
        padding: 6px 12px;
        transition: 0.3s;
    }

    .btn-purple:hover {
        background-color: #4c1d95;
        color: white;
    }

    .btn-logout {
        background-color: #dc3545;
        color: white;
        font-weight: 500;
        border: none;
        border-radius: 8px;
        padding: 6px 12px;
        transition: 0.3s;
    }

    .btn-logout:hover {
        background-color: #bb2d3b;
        color: white;
    }
</style>

<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="mb-0">Dashboard Admin</h1>
        <a href="<?= base_url('admin/logout') ?>" class="btn btn-logout">
            <i class="fas fa-sign-out-alt"></i> Logout
        </a>
    </div>

    <p>Selamat datang, <strong><?= session('nama_lengkap') ?></strong>!</p>

    <div class="row g-3">
        <?php
        $menus = [
            ['Paket Wisata', 'admin/wisata'],
            ['Homestay', 'admin/homestay'],
            ['Gallery', 'admin/gallery'],
            ['Video', 'admin/video'],
            ['Pemesanan', 'admin/pemesanan'],
            ['Pemesanan Homestay', 'admin/pembayaranhomestay'],
            ['Laporan', 'admin/laporan'],
            ['Berita', 'admin/berita'],
        ];
        ?>

        <?php foreach ($menus as $menu): ?>
            <div class="col-md-3">
                <div class="card h-100 shadow-sm border-0">
                    <div class="card-body text-center">
                        <h5 class="card-title"><?= $menu[0] ?></h5>
                        <a href="<?= base_url($menu[1]) ?>" class="btn btn-purple btn-sm mt-2">Kelola</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<?= $this->endSection() ?>
