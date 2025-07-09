<?= $this->extend('layout') ?>
<?= $this->section('content') ?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Galeri Desa Wisata Banjaran</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        body {
            background: linear-gradient(135deg, #d8b4fe, #818cf8);
            min-height: 100vh;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        h2 {
            font-weight: bold;
            color: white;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
        }

        .btn-purple-back {
            background-color: #6b21a8;
            color: white;
            border: none;
            padding: 8px 20px;
            border-radius: 6px;
            text-decoration: none;
            display: inline-block;
            font-weight: 500;
            transition: background-color 0.3s ease;
        }

        .btn-purple-back:hover {
            background-color: #4c1d95;
            color: white;
        }

        .btn-purple-back i {
            margin-right: 5px;
        }

        .card {
            border: none;
            border-radius: 15px;
            overflow: hidden;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
            background: white;
            margin-bottom: 30px; /* jarak antar kartu */
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0,0,0,0.15);
        }

        .card-title {
            font-weight: 600;
            color: #6b21a8;
        }

        .card-text {
            color: #333;
        }

        .card-img-top {
            width: 100%;
            height: auto;
            object-fit: contain;
            background: #f3e8ff;
        }

        .alert-info {
            background-color: #e0c3fc;
            color: #6b21a8;
            border: none;
        }

        .card-body {
            padding: 15px;
        }

        .gallery-row {
            row-gap: 20px; /* jarak vertikal antar baris */
        }

        /* ✅ Tambahan padding kanan kiri agar tidak mepet */
        .container-gallery {
            padding-left: 30px;
            padding-right: 30px;
        }

        @media (min-width: 768px) {
            .container-gallery {
                padding-left: 50px;
                padding-right: 50px;
            }
        }

        @media (min-width: 1200px) {
            .container-gallery {
                padding-left: 100px;
                padding-right: 100px;
            }
        }
    </style>
</head>

<body>

    <div class="container py-5 container-gallery">
        <a href="<?= base_url('/') ?>" class="btn-purple-back mb-4">
            <i class="fas fa-arrow-left"></i> Kembali ke Beranda
        </a>

        <h2 class="text-center mb-5">Galeri Desa Wisata Banjaran</h2>

        <div class="row gallery-row">
            <?php if (!empty($gallery)) : ?>
                <?php foreach ($gallery as $g) : ?>
                    <div class="col-md-4">
                        <div class="card shadow">
                            <img src="<?= base_url('uploads/gallery/' . $g['file_gambar']) ?>" class="card-img-top" alt="<?= esc($g['judul']) ?>">
                            <div class="card-body">
                                <h5 class="card-title"><?= esc($g['judul']) ?></h5>
                                <p class="card-text"><?= esc($g['deskripsi']) ?></p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else : ?>
                <div class="alert alert-info text-center w-100">
                    Belum ada foto galeri yang diunggah.
                </div>
            <?php endif; ?>
        </div>
    </div>

    <script src="<?= base_url('assets/js/bootstrap.bundle.min.js') ?>"></script>
</body>

</html>
<?= $this->endSection() ?>
