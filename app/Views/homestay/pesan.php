

<style>
    body {
        background: linear-gradient(135deg, #a78bfa, #7c3aed);
        min-height: 100vh;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        padding: 20px;
    }

    h2 {
        font-weight: bold;
        color: white;
        text-align: center;
        margin-bottom: 30px;
    }

    .btn-back {
        background-color: #6b21a8;
        color: white;
        font-weight: 500;
        border: none;
        border-radius: 8px;
        padding: 8px 16px;
        text-decoration: none;
        display: inline-block;
        margin-bottom: 20px;
    }

    .btn-back:hover {
        background-color: #4c1d95;
        color: white;
    }

    .card {
        background: white;
        border: none;
        border-radius: 12px;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
        max-width: 500px;
        width: 100%;
        margin: 0 auto;
        overflow: hidden;
    }

    .card-header {
        background-color: #6b21a8;
        color: white;
        font-weight: bold;
        text-align: center;
        font-size: 20px;
        padding: 15px;
    }

    .card-body {
        padding: 25px;
        text-align: center;
    }

    .card-body img {
        border-radius: 8px;
        max-width: 250px;
        margin-bottom: 20px;
    }

    .card-body p {
        margin: 5px 0;
        font-size: 16px;
    }

    .btn-confirm {
        background-color: #6b21a8;
        color: white;
        font-weight: 500;
        border: none;
        border-radius: 8px;
        padding: 10px 20px;
        text-decoration: none;
        display: inline-block;
        transition: 0.3s;
    }

    .btn-confirm:hover {
        background-color: #4c1d95;
        color: white;
    }

    .alert {
        max-width: 500px;
        margin: 20px auto;
    }
</style>

<div class="container py-3">

    <a href="<?= base_url('homestay') ?>" class="btn-back">
        <i class="fas fa-arrow-left"></i> Kembali ke Daftar Homestay
    </a>

    <h2>Pesan Homestay</h2>

    <?php if (session()->getFlashdata('error')): ?>
        <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
    <?php endif; ?>

    <div class="card">
        <div class="card-header">
            <?= esc($homestay['nama_homestay']) ?>
        </div>
        <div class="card-body">
            <img src="<?= base_url('uploads/homestay/' . $homestay['foto']) ?>" alt="<?= esc($homestay['nama_homestay']) ?>" class="img-fluid">

            <p><strong>Deskripsi:</strong> <?= esc($homestay['deskripsi']) ?></p>
            <p><strong>Harga:</strong> Rp <?= number_format($homestay['harga'], 0, ',', '.') ?></p>
            <p><strong>Kapasitas:</strong> <?= esc($homestay['kapasitas']) ?> orang</p>

            <form action="<?= base_url('homestay/simpan-pesan') ?>" method="post" class="mt-3">
                <input type="hidden" name="id_homestay" value="<?= $homestay['id_homestay'] ?>">
                <button type="submit" class="btn-confirm w-75">
                    <i class="fas fa-check-circle"></i> Konfirmasi Pesan
                </button>
            </form>
        </div>
    </div>

</div>

<script src="<?= base_url('assets/js/bootstrap.bundle.min.js') ?>"></script>
