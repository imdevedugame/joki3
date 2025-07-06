<?= $this->extend('admin/layout') ?>
<?= $this->section('content') ?>

<style>
    body {
        background-color: #1e1e2f;
        color: white;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .table-dark th,
    .table-dark td {
        color: white;
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
        transition: 0.3s;
        margin-bottom: 20px;
    }

    .btn-back:hover {
        background-color: #4c1d95;
        color: white;
    }

    .btn-purple {
        background-color: #6b21a8;
        color: white;
        font-weight: 500;
        border: none;
        border-radius: 8px;
        padding: 5px 10px;
        text-decoration: none;
        transition: 0.3s;
    }

    .btn-purple:hover {
        background-color: #4c1d95;
        color: white;
    }
</style>

<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="mb-0">Daftar Pemesanan Wisata</h3>
        <a href="<?= base_url('admin/dashboard') ?>" class="btn-back">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>
    </div>

    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('error')): ?>
        <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
    <?php endif; ?>

    <div class="table-responsive">
        <table class="table table-bordered table-hover table-dark">
            <thead>
                <tr class="text-center">
                    <th>No</th>
                    <th>Member</th>
                    <th>Paket Wisata</th>
                    <th>Tanggal Pesan</th>
                    <th>Total Harga</th>
                    <th>Bukti Bayar</th>
                    <th>Status Pembayaran</th>
                    <th>Status saat ini</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($pesanan)): ?>
                    <?php foreach ($pesanan as $i => $p): ?>
                        <tr class="text-center">
                            <td><?= $i + 1 ?></td>
                            <td><?= esc($p['nama_member']) ?></td>
                            <td><?= esc($p['nama_paket']) ?></td>
                            <td><?= esc($p['tanggal_pesan']) ?></td>
                            <td>Rp<?= number_format($p['total_harga'], 0, ',', '.') ?></td>
                            <td>
                                <?php if (!empty($p['file_bukti'])): ?>
                                    <a href="<?= base_url('uploads/bukti_bayar/' . $p['file_bukti']) ?>" target="_blank" class="btn btn-purple btn-sm">Lihat Bukti</a>
                                <?php else: ?>
                                    <span class="text-danger">Belum Upload</span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <?php if ($p['status_pembayaran'] == 'Lunas'): ?>
                                    <span class="badge bg-success">Lunas</span>
                                <?php elseif ($p['status_pembayaran'] == 'Menunggu Konfirmasi'): ?>
                                    <span class="badge bg-warning text-dark">Menunggu Konfirmasi</span>
                                <?php else: ?>
                                    <span class="badge bg-danger">Belum Bayar</span>
                                <?php endif; ?>
                            </td>
                            <td><?= esc($p['status_pengiriman']) ?></td>
                            <td>
                                <?php if ($p['status_pembayaran'] != 'Lunas'): ?>
                                    <a href="<?= base_url('admin/pemesanan/konfirmasi/' . $p['id_pesanan']) ?>"
                                        class="btn btn-sm btn-success"
                                        onclick="return confirm('Konfirmasi pesanan ini sebagai Lunas dan proses pengiriman?')">
                                        Konfirmasi
                                    </a>
                                <?php else: ?>
                                    <span class="text-success">✔</span>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="9" class="text-center">Tidak ada data pemesanan.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?= $this->endSection() ?>
