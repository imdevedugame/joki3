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
        <h2 class="mb-0">Data Video</h2>
        <a href="<?= base_url('admin/dashboard') ?>" class="btn-back">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>
    </div>

    <a href="<?= base_url('admin/video/tambah') ?>" class="btn btn-primary mb-3">Tambah Video</a>

    <table class="table table-bordered table-dark table-hover">
        <thead>
            <tr class="text-center">
                <th>No</th>
                <th>Judul</th>
                <th>Link YouTube</th>
                <th>Deskripsi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($video)) : ?>
                <?php foreach ($video as $i => $v): ?>
                    <tr class="text-center">
                        <td><?= $i+1 ?></td>
                        <td><?= esc($v['judul']) ?></td>
                        <td><a href="<?= esc($v['link_youtube']) ?>" target="_blank" class="text-info">Lihat Video</a></td>
                        <td><?= esc($v['deskripsi']) ?></td>
                        <td>
                            <div class="d-flex justify-content-center gap-2">
                                <a href="<?= base_url('admin/video/edit/' . $v['id_video']) ?>" class="btn btn-warning btn-sm">Edit</a>
                                <a href="<?= base_url('admin/video/hapus/' . $v['id_video']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus?')">Hapus</a>
                            </div>
                        </td>
                    </tr>
                <?php endforeach ?>
            <?php else : ?>
                <tr>
                    <td colspan="5" class="text-center">Belum ada data video.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<?= $this->endSection() ?>
