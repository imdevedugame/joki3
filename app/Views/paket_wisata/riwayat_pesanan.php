<?= $this->extend('admin/layout') ?>
<?= $this->section('content') ?>

<style>
    body {
        background: linear-gradient(135deg, #1e1e2f, #6b21a8);
        min-height: 100vh;
        color: white;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .card {
        border: none;
        border-radius: 10px;
        background-color: #2d2d44;
        color: white;
    }

    h2 {
        font-weight: bold;
        color: white;
        text-align: center;
        margin-bottom: 30px;
    }

    table thead {
        background-color: #6b21a8;
        color: white;
    }

    .btn-purple {
        background-color: #6b21a8;
        color: white;
        font-weight: 500;
        border: none;
        border-radius: 8px;
        padding: 8px 16px;
        text-decoration: none;
        transition: 0.3s;
    }

    .btn-purple:hover {
        background-color: #4c1d95;
        color: white;
    }

    .badge {
        font-size: 14px;
        padding: 5px 10px;
    }

    .alert {
        border-radius: 8px;
    }
</style>

<div class="container py-4">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="mb-0">Riwayat Pesanan Member</h2>
        <a href="<?= base_url('/') ?>" class="btn-purple">
            <i class="fas fa-arrow-left"></i> Kembali ke Beranda
        </a>
    </div>

    <?php if (session()->getFlashdata('success')) : ?>
        <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
    <?php endif; ?>

    <?php if (empty($pesanan)) : ?>
        <div class="alert alert-info text-dark">Belum ada riwayat pesanan.</div>
    <?php else : ?>
        <div class="card shadow-sm">
            <div class="card-body table-responsive">
                <table class="table table-bordered table-hover text-white">
                    <thead>
                        <tr class="text-center">
                            <th>No</th>
                            <th>Tanggal Pesan</th>
                            <th>Total Harga</th>
                            <th>Status Pembayaran</th>
                            <th>Status Pengiriman</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($pesanan as $i => $p): ?>
                            <tr class="text-center">
                                <td><?= $i + 1 ?></td>
                                <td><?= esc($p['tanggal_pesan']) ?></td>
                                <td>Rp<?= number_format($p['total_harga'], 0, ',', '.') ?></td>
                                <td>
                                    <?php if ($p['status_pembayaran'] == 'Lunas'): ?>
                                        <span class="badge bg-success"><?= esc($p['status_pembayaran']) ?></span>
                                    <?php elseif ($p['status_pembayaran'] == 'Menunggu Konfirmasi'): ?>
                                        <span class="badge bg-warning text-dark"><?= esc($p['status_pembayaran']) ?></span>
                                    <?php else: ?>
                                        <span class="badge bg-secondary"><?= esc($p['status_pembayaran']) ?></span>
                                    <?php endif; ?>
                                </td>
                                <td><?= esc($p['status_pengiriman']) ?></td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    <?php endif; ?>

</div>

<?= $this->endSection() ?>
