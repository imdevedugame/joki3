<?= $this->extend('admin/layout') ?>
<?= $this->section('content') ?>

<style>
    body {
        background-color: #1e1e2f;
        color: white;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .card {
        background-color: #2c2c3a;
        border: none;
        border-radius: 8px;
        padding: 20px;
    }

    label {
        font-weight: 500;
        color: white; /* ✅ label teks putih */
    }

    .form-control {
        background-color: #3a3a4a;
        color: white; /* ✅ input text putih */
        border: 1px solid #555;
    }

    .form-control::placeholder {
        color: #ccc; /* ✅ placeholder terang */
    }

    .form-control:focus {
        background-color: #3a3a4a;
        color: white;
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
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="mb-0">Edit Gallery</h2>
        <a href="<?= base_url('admin/gallery') ?>" class="btn-back">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>
    </div>

    <div class="card">
        <form action="<?= base_url('admin/gallery/update/' . $gallery['id_galeri']) ?>" method="post" enctype="multipart/form-data">
            <?= csrf_field() ?>
            <div class="mb-3">
                <label>Judul</label>
                <input type="text" name="judul" class="form-control" value="<?= $gallery['judul'] ?>" placeholder="Masukkan judul">
            </div>
            <div class="mb-3">
                <label>Deskripsi</label>
                <textarea name="deskripsi" class="form-control" placeholder="Masukkan deskripsi"><?= $gallery['deskripsi'] ?></textarea>
            </div>
            <div class="mb-3">
                <label>Gambar Baru (kosongkan jika tidak diganti)</label>
                <input type="file" name="file_gambar" class="form-control">
                <br>
                <img src="<?= base_url('uploads/gallery/' . $gallery['file_gambar']) ?>" width="150">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>

<?= $this->endSection() ?>
