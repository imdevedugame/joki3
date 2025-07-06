<?= $this->extend('layout') ?>

<?= $this->section('content') ?>
<style>
    body {
        background: linear-gradient(135deg, #a78bfa, #7c3aed);
        min-height: 100vh;
    }

    h2 {
        font-weight: bold;
        background-color: #6b21a8;
        color: white;
        padding: 12px;
        border-radius: 8px;
        text-align: center;
        margin-bottom: 30px;
    }

    .card {
        border: none;
        border-radius: 12px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    }

    table thead {
        background-color: #9333ea;
        color: white;
    }

    .btn-purple,
    .btn-back {
        background-color: #6b21a8;
        color: white;
        font-weight: 500;
        border: none;
        transition: 0.3s;
    }

    .btn-purple:hover,
    .btn-back:hover {
        background-color: #4c1d95;
        color: white;
    }

    .btn-back i {
        margin-right: 5px;
    }

    .table img {
        border-radius: 8px;
        max-width: 100px;
    }

    .input-group .form-control {
        border-radius: 20px 0 0 20px;
    }

    .input-group .btn {
        border-radius: 0 20px 20px 0;
    }
</style>

<div class="container py-5">

    <!-- Tombol Back -->
    <a href="<?= base_url('/') ?>" class="btn btn-back mb-3">
        <i class="fas fa-arrow-left"></i> Kembali ke Beranda
    </a>

    <h2 class="mb-4">Daftar Homestay</h2>

    <!-- Form Pencarian -->
    <form action="<?= base_url('homestay') ?>" method="get" class="mb-4">
        <div class="input-group">
            <input type="text" name="keyword" class="form-control" placeholder="Cari nama homestay..." value="<?= esc($keyword ?? '') ?>">
            <button type="submit" class="btn btn-purple"><i class="fas fa-search"></i> Cari</button>
        </div>
    </form>

    <div class="card shadow-sm">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-bordered table-striped mb-0">
                    <thead class="text-center">
                        <tr>
                            <th>No</th>
                            <th>Nama Homestay</th>
                            <th>Deskripsi</th>
                            <th>Harga</th>
                            <th>Kapasitas</th>
                            <th>Gambar</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($homestays)) : ?>
                            <?php $no = 1;
                            foreach ($homestays as $h) : ?>
                                <tr>
                                    <td class="text-center"><?= $no++ ?></td>
                                    <td><strong><?= esc($h['nama_homestay']) ?></strong></td>
                                    <td><?= esc($h['deskripsi']) ?></td>
                                    <td>Rp <?= number_format($h['harga'], 0, ',', '.') ?></td>
                                    <td><?= esc($h['kapasitas']) ?> orang</td>
                                    <td class="text-center">
                                        <img src="<?= base_url('uploads/homestay/' . $h['foto']) ?>" alt="<?= esc($h['nama_homestay']) ?>">
                                    </td>
                                    <td class="text-center">
                                        <a href="<?= base_url('homestay/pesan/' . $h['id_homestay']) ?>" class="btn btn-purple btn-sm">
                                            <i class="fas fa-shopping-cart"></i> Pesan
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <tr>
                                <td colspan="7" class="text-center">Belum ada data homestay.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

<script src="<?= base_url('assets/js/bootstrap.bundle.min.js') ?>"></script>

<?= $this->endSection() ?>