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
</style>

<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="mb-0">Data Paket Wisata</h2>
        <a href="<?= base_url('admin/dashboard') ?>" class="btn-back">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>
    </div>

    <a href="<?= base_url('admin/wisata/tambah') ?>" class="btn btn-primary mb-3">Tambah Paket</a>

    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('failed')): ?>
        <div class="alert alert-danger"><?= session()->getFlashdata('failed') ?></div>
    <?php endif; ?>

    <table class="table table-bordered table-dark table-hover">
        <thead>
            <tr class="text-center">
                <th>No</th>
                <th>Nama Paket</th>
                <th>Harga</th>
                <th>Kapasitas</th>
                <th>Gambar</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($wisata)): ?>
                <?php foreach ($wisata as $i => $w): ?>
                    <tr class="text-center">
                        <td><?= $i + 1 ?></td>
                        <td><?= esc($w['nama_paket']) ?></td>
                        <td>Rp<?= number_format($w['harga'], 0, ',', '.') ?></td>
                        <td><?= esc($w['kapasitas']) ?> orang</td>
                        <td><img src="<?= base_url('uploads/wisata/' . $w['gambar']) ?>" width="100"></td>
                        <td>
                            <a href="<?= base_url('admin/wisata/edit/' . $w['id_paket']) ?>" class="btn btn-warning btn-sm">Edit</a>
                            <a href="<?= base_url('admin/wisata/hapus/' . $w['id_paket']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                        </td>
                    </tr>
                <?php endforeach ?>
            <?php else: ?>
                <tr>
                    <td colspan="6" class="text-center">Belum ada data paket wisata.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<?= $this->endSection() ?>
