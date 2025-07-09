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
        <h3>Edit Homestay</h3>
        <a href="<?= base_url('admin/homestay') ?>" class="btn-back">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>
    </div>

    <form action="<?= base_url('admin/homestay/update/' . $homestay['id_homestay']) ?>" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label>Nama Homestay</label>
            <input type="text" name="nama_homestay" class="form-control" value="<?= $homestay['nama_homestay'] ?>" required>
        </div>
        <div class="mb-3">
            <label>Deskripsi</label>
            <textarea name="deskripsi" class="form-control" required><?= $homestay['deskripsi'] ?></textarea>
        </div>
        <div class="mb-3">
            <label>Harga</label>
            <input type="number" name="harga" class="form-control" value="<?= $homestay['harga'] ?>" required>
        </div>
        <div class="mb-3">
            <label>Kapasitas</label>
            <input type="number" name="kapasitas" class="form-control" value="<?= $homestay['kapasitas'] ?>" required>
        </div>
        <div class="mb-3">
            <label>Foto Saat Ini</label><br>
            <img src="<?= base_url('uploads/homestay/' . $homestay['foto']) ?>" width="150">
        </div>
        <div class="mb-3">
            <label>Ganti Foto (opsional)</label>
            <input type="file" name="foto" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>

<?= $this->endSection() ?>
