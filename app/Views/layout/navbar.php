<nav class="navbar navbar-expand-lg shadow-sm" style="background: linear-gradient(135deg, #a78bfa, #7c3aed);">
    <div class="container">
        <a class="navbar-brand fw-bold text-white fs-4" href="<?= base_url('/') ?>">
            <i class="fas fa-tree"></i> Desa Wisata Banjaran
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse mt-2 mt-lg-0" id="navbarNav">
            <ul class="navbar-nav ms-auto align-items-center">
                <li class="nav-item"><a class="nav-link text-white px-3" href="<?= base_url('/') ?>">Home</a></li>
                <li class="nav-item"><a class="nav-link text-white px-3" href="<?= base_url('paketwisata') ?>">Wisata</a></li>
                <li class="nav-item"><a class="nav-link text-white px-3" href="<?= base_url('homestay') ?>">Homestay</a></li>
                <li class="nav-item"><a class="nav-link text-white px-3" href="<?= base_url('gallery') ?>">Galeri</a></li>
                <li class="nav-item"><a class="nav-link text-white px-3" href="<?= base_url('berita') ?>">Berita</a></li>
                <li class="nav-item"><a class="nav-link text-white px-3" href="<?= base_url('video') ?>">Video</a></li>
                <li class="nav-item ms-2">

                </li>

                <?php if (session()->get('logged_in_member')) : ?>
                    <li class="nav-item"><a class="nav-link text-white px-3" href="<?= base_url('riwayat-pesanan') ?>">Riwayat Pesanan</a></li>
                    <li class="nav-item"><a class="nav-link text-white px-3" href="<?= base_url('member/logout') ?>">Logout</a></li>
                <?php else : ?>
                    <li class="nav-item"><a class="nav-link text-white px-3" href="<?= base_url('member/login') ?>">Login Member</a></li>
                <?php endif; ?>

                <li class="nav-item"><a class="nav-link text-white px-3" href="<?= base_url('admin/login') ?>">Login Admin</a></li>
            </ul>
        </div>
    </div>
</nav>

<style>
    .btn-purple {
        background-color: #6b21a8;
        color: white;
        font-weight: 500;
        border: none;
        border-radius: 8px;
        transition: 0.3s;
    }

    .btn-purple:hover {
        background-color: #4c1d95;
        color: white;
    }

    .navbar .nav-link {
        font-weight: 500;
        transition: 0.3s;
        font-size: 16px;
    }

    .navbar .nav-link:hover {
        color: #e0c3fc;
    }

    .navbar {
        padding: 15px 0;
    }
</style>