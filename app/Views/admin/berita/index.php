<?= $this->extend('admin/layout') ?>
<?= $this->section('content') ?>

<style>
    body {
        background-color: #1e1e2f;
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
    }

    .btn-back:hover {
        background-color: #4c1d95;
        color: white;
    }

    table img {
        border-radius: 6px;
    }
</style>

<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Data Berita</h2>
        <a href="<?= base_url('admin/dashboard') ?>" class="btn-back">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>
    </div>

    <a href="<?= base_url('admin/berita/tambah') ?>" class="btn btn-primary mb-3">Tambah Berita</a>

    <table class="table table-bordered table-dark table-hover">
        <thead>
            <tr>
                <th>No</th>
                <th>Judul</th>
                <th>Isi</th>
                <th>Gambar</th>
                <th>Tanggal</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($berita as $i => $b): ?>
            <tr>
                <td><?= $i+1 ?></td>
                <td><?= esc($b['judul']) ?></td>
                <td><?= esc($b['isi']) ?></td>
                <td><img src="<?= base_url('uploads/berita/' . $b['gambar']) ?>" width="100"></td>
                <td><?= esc($b['tanggal']) ?></td>
                <td>
                    <div class="d-flex gap-2">
                        <a href="<?= base_url('admin/berita/edit/' . $b['id_berita']) ?>" class="btn btn-warning btn-sm">Edit</a>
                        <a href="<?= base_url('admin/berita/hapus/' . $b['id_berita']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus?')">Hapus</a>
                    </div>
                </td>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>

<?= $this->endSection() ?>
