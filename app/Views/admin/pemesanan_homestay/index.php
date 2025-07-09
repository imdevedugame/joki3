<?= $this->extend('admin/layout') ?>
<?= $this->section('content') ?>

<style>
    body {
        background-color: #1e1e2f;
        color: white;
    }

    .table {
        color: white;
        text-align: center; /* semua isi tabel rata tengah */
    }

    .table thead {
        background-color: #2c2c3a;
        color: white;
    }

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

    .btn-back {
        background-color: #dc3545;
        color: white;
        font-weight: 500;
        border: none;
        border-radius: 8px;
        padding: 10px 16px;
        text-decoration: none;
        transition: 0.3s;
    }

    .btn-back:hover {
        background-color: #b02a37;
        color: white;
    }
</style>

<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3>Daftar Pemesanan Homestay</h3>
        <a href="<?= base_url('admin/dashboard') ?>" class="btn-back">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-dark">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Homestay</th>
                    <th>Member</th>
                    <th>Tanggal Pesan</th>
                    <th>Bukti Bayar</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($pemesanan)): ?>
                    <?php foreach ($pemesanan as $i => $p): ?>
                        <tr>
                            <td><?= $i + 1 ?></td>
                            <td><?= esc($p['nama_homestay']) ?></td>
                            <td><?= esc($p['nama_member']) ?></td>
                            <td><?= esc($p['tanggal_pesan']) ?></td>
                            <td>
                                <?php if (!empty($p['file_bukti'])): ?>
                                    <a href="<?= base_url('uploads/bukti_homestay/' . $p['file_bukti']) ?>" target="_blank" class="btn btn-purple btn-sm">Lihat Bukti</a>
                                <?php else: ?>
                                    <span class="text-danger">Belum Upload</span>
                                <?php endif; ?>
                            </td>
                            <td><?= esc($p['status']) ?></td>
                            <td>
                                <?php if ($p['status'] != 'Sudah Dikonfirmasi'): ?>
                                    <a href="<?= base_url('admin/pemesananhomestay/konfirmasi/' . $p['id_pemesanan_homestay']) ?>" class="btn btn-success btn-sm" onclick="return confirm('Konfirmasi pesanan ini?')">Konfirmasi</a>
                                <?php else: ?>
                                    <span class="text-success">Terkonfirmasi</span>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="7" class="text-center">Tidak ada data pemesanan.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?= $this->endSection() ?>
