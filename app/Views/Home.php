<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<style>
    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background: linear-gradient(135deg, #a78bfa, #7c3aed);
        min-height: 100vh;
    }

    .hero {
        text-align: center;
        padding: 120px 20px;
        color: white;
    }

    .hero h1 {
        font-size: 48px;
        font-weight: bold;
        margin-bottom: 20px;
    }

    .hero p {
        font-size: 18px;
        margin-bottom: 30px;
    }

    .btn-purple {
        background-color: #6b21a8;
        color: white;
        font-weight: 500;
        border: none;
        border-radius: 8px;
        padding: 12px 30px;
        text-decoration: none;
        transition: 0.3s;
    }

    .btn-purple:hover {
        background-color: #4c1d95;
        color: white;
    }

    section {
        padding: 60px 0;
    }

    .section-title {
        text-align: center;
        font-weight: bold;
        margin-bottom: 40px;
        color: white;
        font-size: 32px;
    }

    .card-custom {
        border: none;
        border-radius: 12px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        transition: 0.3s;
        text-align: center;
    }

    .card-custom:hover {
        transform: translateY(-5px);
    }

    .card-custom img {
        display: block;
        margin: 0 auto;
        border-top-left-radius: 12px;
        border-top-right-radius: 12px;
        height: 200px;
        object-fit: cover;
    }

    .card-custom .card-body {
        background: white;
        padding: 20px;
        text-align: center;
    }

    .card-custom .card-body h5 {
        font-weight: bold;
    }

    footer {
        background-color: #4c1d95;
        color: white;
        text-align: center;
        padding: 30px 0;
        margin-top: 60px;
    }
</style>

<!-- Hero Section -->
<div class="hero">
    <h1>Selamat Datang di Desa Wisata Banjaran</h1>
    <p>Explore keindahan alam, budaya, dan kuliner khas Banjaran bersama kami</p>
    <a href="<?= base_url('paketwisata') ?>" class="btn btn-purple">Paket Wisata</a>
    <a href="<?= base_url('homestay') ?>" class="btn btn-purple">Homestay</a>
    <a href="<?= base_url('gallery') ?>" class="btn btn-purple">Galeri</a>
    <a href="<?= base_url('berita') ?>" class="btn btn-purple">Berita</a>
    <a href="<?= base_url('video') ?>" class="btn btn-purple">Video</a>
</div>

<!-- Tentang Section -->
<section>
    <div class="container">
        <h2 class="section-title">Tentang Desa Wisata Banjaran</h2>
        <div class="row justify-content-center">
            <div class="col-md-8 text-center text-white">
                <p>Desa Wisata Banjaran terletak di Bojongsari, Purbalingga. Menawarkan pengalaman wisata alam, edukasi, dan homestay tradisional yang nyaman bagi para wisatawan lokal maupun mancanegara.</p>
            </div>
        </div>
    </div>
</section>

<hr>
<!-- Paket Wisata Section -->
<section>
    <div class="container">
        <h2 class="section-title">Paket Wisata</h2>
        <div class="row">
            <?php foreach ($paket_wisata as $p) : ?>
                <div class="col-md-4 mb-4">
                    <div class="card-custom">
                        <img src="<?= base_url('uploads/wisata/' . $p['gambar']) ?>" alt="<?= esc($p['nama_paket']) ?>">
                        <div class="card-body">
                            <h5><?= esc($p['nama_paket']) ?></h5>
                            <p>Rp <?= number_format($p['harga'], 0, ',', '.') ?></p>
                            <a href="<?= base_url('paketwisata/pesan/' . $p['id_paket']) ?>" class="btn btn-purple btn-sm">Pesan</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<hr>

<!-- Homestay Section -->
<section>
    <div class="container">
        <h2 class="section-title">Homestay</h2>
        <div class="row">
            <?php foreach ($homestays as $h) : ?>
                <div class="col-md-4 mb-4">
                    <div class="card-custom">
                        <img src="<?= base_url('uploads/homestay/' . $h['foto']) ?>" alt="<?= esc($h['nama_homestay']) ?>">
                        <div class="card-body">
                            <h5><?= esc($h['nama_homestay']) ?></h5>
                            <p>Rp <?= number_format($h['harga'], 0, ',', '.') ?> / malam</p>
                            <a href="<?= base_url('homestay/pesan/' . $h['id_homestay']) ?>" class="btn btn-purple btn-sm">Pesan</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<hr>

<!-- Galeri Section -->
<section>
    <div class="container">
        <h2 class="section-title">Galeri</h2>
        <div class="row">
            <?php foreach ($galeri as $g) : ?>
                <div class="col-md-3 mb-4">
                    <div class="card-custom">
                        <img src="<?= base_url('uploads/gallery/' . $g['file_gambar']) ?>" alt="<?= esc($g['judul']) ?>">
                        <div class="card-body">
                            <h5><?= esc($g['judul']) ?></h5>
                            <p><?= esc($g['deskripsi']) ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<hr>

<!-- Berita Section -->
<section>
    <div class="container">
        <h2 class="section-title">Berita Terbaru</h2>
        <div class="row">
            <?php foreach ($berita as $b) : ?>
                <div class="col-md-4 mb-4">
                    <div class="card-custom">
                        <img src="<?= base_url('uploads/berita/' . $b['gambar']) ?>" alt="<?= esc($b['judul']) ?>">
                        <div class="card-body">
                            <h5><?= esc($b['judul']) ?></h5>
                            <a href="<?= base_url('berita/detail/' . $b['id_berita']) ?>" class="btn btn-purple btn-sm">Baca</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<hr>

<!-- Video Section -->
<section>
    <div class="container">
        <h2 class="section-title">Video</h2>
        <div class="row">
            <?php if (!empty($video)) : ?>
                <?php foreach ($video as $v) : ?>
                    <div class="col-md-4 mb-4">
                        <div class="card-custom">
                            <div class="ratio ratio-16x9">
                                <iframe src="<?= esc($v['link_youtube']) ?>" frameborder="0" allowfullscreen></iframe>
                            </div>
                            <div class="card-body">
                                <h5><?= esc($v['judul']) ?></h5>
                                <p><?= esc($v['deskripsi']) ?></p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else : ?>
                <p class="text-center">Belum ada video ditambahkan.</p>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- Footer -->
<footer>
    &copy; <?= date('Y') ?> Desa Wisata Banjaran. All Rights Reserved.
</footer>

<?= $this->endSection() ?>
