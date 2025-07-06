<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<style>
    body {
        background: linear-gradient(135deg, #a78bfa, #7c3aed);
        min-height: 100vh;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        padding: 30px;
    }

    h3 {
        font-weight: bold;
        color: white;
        text-align: center;
        margin-bottom: 30px;
    }

    .card {
        background: white;
        border: none;
        border-radius: 12px;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
        max-width: 1000px;
        margin: auto;
        padding: 30px;
    }

    .table thead {
        background-color: #6b21a8;
        color: white;
        text-align: center;
    }

    .table td {
        vertical-align: middle;
        text-align: center;
    }

    .btn-purple {
        background-color: #6b21a8;
        color: white;
        border: none;
        border-radius: 8px;
        padding: 6px 12px;
        font-weight: 500;
    }

    .btn-purple:hover {
        background-color: #4c1d95;
        color: white;
    }

    .alert {
        max-width: 600px;
        margin: 20px auto;
    }
</style>

<div class="container py-3">

    <h3>Checkout Pemesanan Homestay</h3>

    <?php if (session()->getFlashdata('failed')): ?>
        <div class="alert alert-danger text-center"><?= session()->getFlashdata('failed') ?></div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success text-center"><?= session()->getFlashdata('success') ?></div>
    <?php endif; ?>

    <div class="card">
        <?php if (!empty($pemesanan)): ?>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Nama Homestay</th>
                            <th>Harga</th>
                            <th>Status</th>
                            <th>Upload Bukti</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($pemesanan as $p): ?>
                            <tr>
                                <td><strong><?= esc($p['nama_homestay']) ?></strong></td>
                                <td>Rp<?= number_format($p['harga'], 0, ',', '.') ?></td>
                                <td><?= esc($p['status']) ?></td>
                                <td>
                                    <?php if ($p['status'] == 'Belum Bayar'): ?>
                                        <form action="<?= base_url('homestay/upload-bukti') ?>" method="post" enctype="multipart/form-data">
                                            <?= csrf_field() ?>
                                            <input type="hidden" name="id_pemesanan_homestay" value="<?= $p['id_pemesanan_homestay'] ?>">
                                            <input type="file" name="file_bukti" class="form-control mb-2" required>
                                            <button type="submit" class="btn btn-purple btn-sm">
                                                <i class="fas fa-upload"></i> Upload Bukti
                                            </button>
                                        </form>
                                    <?php elseif ($p['status'] == 'Menunggu Konfirmasi'): ?>
                                        <span class="text-warning">Menunggu Konfirmasi</span>
                                    <?php else: ?>
                                        <span class="text-success">Sudah Dibayar</span>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php else: ?>
            <div class="alert alert-warning text-center">Belum ada pemesanan homestay.</div>
            <div class="text-center">
                <a href="<?= base_url('homestay') ?>" class="btn btn-purple">
                    <i class="fas fa-plus"></i> Pesan Homestay
                </a>
            </div>
        <?php endif; ?>
    </div>

</div>

<script src="<?= base_url('assets/js/bootstrap.bundle.min.js') ?>"></script>

<?= $this->endSection() ?>