<?= $this->extend('admin/layout') ?>
<?= $this->section('content') ?>

<style>
    body { background-color: #1e1e2f; color: white; }
    label { color: white; }
    .table { color: white; }
    .btn-back { background-color: #dc3545; color: white; font-weight: 500; border: none; border-radius: 8px; padding: 10px 16px; text-decoration: none; transition: 0.3s; }
    .btn-back:hover { background-color: #b02a37; color: white; }
</style>

<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3>Daftar Homestay</h3>
        <a href="<?= base_url('admin/dashboard') ?>" class="btn-back">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>
    </div>

    <a href="<?= base_url('admin/homestay/create') ?>" class="btn btn-success mb-3">Tambah Homestay</a>

    <?php if (session()->getFlashdata('success')) : ?>
        <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
    <?php endif; ?>

    <table class="table table-bordered table-dark table-hover">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Deskripsi</th>
                <th>Harga</th>
                <th>Kapasitas</th>
                <th>Foto</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($homestays as $h) : ?>
                <tr>
                    <td><?= $h['nama_homestay'] ?></td>
                    <td><?= $h['deskripsi'] ?></td>
                    <td>Rp<?= number_format($h['harga'],0,',','.') ?></td>
                    <td><?= $h['kapasitas'] ?> orang</td>
                    <td><img src="<?= base_url('uploads/homestay/' . $h['foto']) ?>" width="100"></td>
                    <td>
                        <a href="<?= base_url('admin/homestay/edit/' . $h['id_homestay']) ?>" class="btn btn-warning btn-sm">Edit</a>
                        <a href="<?= base_url('admin/homestay/delete/' . $h['id_homestay']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin?')">Hapus</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?= $this->endSection() ?>
