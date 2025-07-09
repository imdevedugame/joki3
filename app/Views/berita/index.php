<?= $this->extend('layout') ?>

<?= $this->section('content') ?>
<style>
    body {
        background: linear-gradient(135deg, #d8b4fe, #818cf8);
        min-height: 100vh;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .back-btn {
        background-color: #6b21a8;
        color: white;
        border: none;
        border-radius: 5px;
        font-weight: 500;
        box-shadow: 0 2px 5px rgba(0,0,0,0.2);
        transition: background 0.3s ease;
    }

    .back-btn:hover {
        background-color: #4c1d95;
        color: white;
    }

    .page-title {
        font-weight: bold;
        color: white;
        text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
    }

    .card {
        border: none;
        border-radius: 15px;
        overflow: hidden;
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }

    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 20px rgba(0,0,0,0.15);
    }

    .card-title {
        color: #6b21a8;
        font-weight: 600;
    }

    .card-text {
        color: #333;
    }

    .btn-purple {
        background-color: #9333ea;
        color: white;
        border: none;
        border-radius: 5px;
        font-weight: 500;
        box-shadow: 0 2px 5px rgba(0,0,0,0.2);
        transition: background 0.3s ease;
    }

    .btn-purple:hover {
        background-color: #6b21a8;
        color: white;
    }

    .card-img-top {
        width: 100%;
        height: 200px;
        object-fit: cover;
    }

    .alert-info {
        background-color: #e0c3fc;
        color: #6b21a8;
        border: none;
    }
</style>

<div class="container py-5">
    <a href="<?= base_url('/') ?>" class="btn back-btn mb-4">← Kembali ke Beranda</a>

    <h2 class="text-center mb-5 page-title">Berita Desa Wisata Banjaran</h2>

    <div class="row">
        <?php if (!empty($berita)) : ?>
            <?php foreach ($berita as $b) : ?>
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow">
                        <?php if (!empty($b['gambar'])) : ?>
                            <img src="<?= base_url('uploads/berita/' . $b['gambar']) ?>" class="card-img-top" alt="<?= esc($b['judul']) ?>">
                        <?php endif; ?>
                        <div class="card-body">
                            <h5 class="card-title"><?= esc($b['judul']) ?></h5>
                            <p class="card-text"><?= word_limiter(strip_tags($b['isi']), 20) ?></p>
                        </div>
                        <div class="card-footer bg-transparent border-0 text-center">
                            <a href="<?= base_url('berita/detail/' . $b['id_berita']) ?>" class="btn btn-purple btn-sm">Baca Selengkapnya</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else : ?>
            <div class="alert alert-info text-center w-100">
                Belum ada berita.
            </div>
        <?php endif; ?>
    </div>
</div>

<?= $this->endSection() ?>
