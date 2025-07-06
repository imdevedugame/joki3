<?= $this->extend('admin/layout') ?>
<?= $this->section('content') ?>

<style>
    body {
        background-color: #1e1e2f;
        color: white;
    }

    label {
        color: white;
    }

    .form-control {
        background-color: #3a3a4a;
        color: white;
        border: 1px solid #555;
    }

    .form-control:focus {
        border-color: #6b21a8;
        box-shadow: none;
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
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Edit Berita</h2>
        <a href="<?= base_url('admin/berita') ?>" class="btn-back">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>
    </div>

    <form action="<?= base_url('admin/berita/update/' . $berita['id_berita']) ?>" method="post" enctype="multipart/form-data">
        <?= csrf_field() ?>
        <div class="mb-3">
            <label>Judul</label>
            <input type="text" name="judul" class="form-control" value="<?= esc($berita['judul']) ?>" required>
        </div>
        <div class="mb-3">
            <label>Isi</label>
            <textarea name="isi" class="form-control" required><?= esc($berita['isi']) ?></textarea>
        </div>
        <div class="mb-3">
            <label>Gambar Saat Ini</label><br>
            <img src="<?= base_url('uploads/berita/' . $berita['gambar']) ?>" width="150">
        </div>
        <div class="mb-3">
            <label>Ganti Gambar (Opsional)</label>
            <input type="file" name="gambar" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>

<?= $this->endSection() ?>
