<?= $this->extend('layout') ?>

<?= $this->section('content') ?>
<style>
    body {
        background: linear-gradient(135deg, #d8b4fe, #818cf8);
        min-height: 100vh;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .btn-back {
        background-color: #6b21a8;
        color: white;
        border: none;
        border-radius: 5px;
        font-weight: 500;
        box-shadow: 0 2px 5px rgba(0,0,0,0.2);
        transition: background 0.3s ease;
    }

    .btn-back:hover {
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

    .ratio iframe {
        border-radius: 10px 10px 0 0;
    }

    .alert-info {
        background-color: #e0c3fc;
        color: #6b21a8;
        border: none;
    }
</style>

<div class="container py-5">
    <div class="mb-4">
        <a href="<?= base_url('/') ?>" class="btn btn-back">
            <i class="bi bi-arrow-left"></i> Kembali ke Beranda
        </a>
    </div>

    <h2 class="mb-5 text-center page-title">Galeri Video Desa Wisata Banjaran</h2>

    <?php if (!empty($videos)) : ?>
        <div class="row">
            <?php foreach ($videos as $video) : ?>
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow">
                        <div class="ratio ratio-16x9">
                            <iframe src="<?= str_replace('watch?v=', 'embed/', $video['link_youtube']) ?>" title="<?= $video['judul'] ?>" frameborder="0" allowfullscreen></iframe>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title"><?= esc($video['judul']) ?></h5>
                            <p class="card-text"><?= esc($video['deskripsi']) ?></p>
                        </div>
                        <div class="card-footer bg-transparent border-0 text-center">
                            <a href="<?= $video['link_youtube'] ?>" target="_blank" class="btn btn-purple btn-sm">Tonton di YouTube</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else : ?>
        <div class="alert alert-info text-center">
            Belum ada video yang ditambahkan.
        </div>
    <?php endif; ?>
</div>

<?= $this->endSection() ?>
