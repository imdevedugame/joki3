<?= $this->extend('layout') ?>

<?= $this->section('content') ?>
<style>
  body {
    background: linear-gradient(135deg, #e0c3fc, #8ec5fc);
    background-repeat: no-repeat;
    background-size: cover;
    background-attachment: scroll;
  }
  .page-title {
    color: #6f42c1;
    font-weight: bold;
    text-shadow: 1px 1px 2px rgba(0,0,0,0.2);
  }
  .content-text {
    font-size: 1rem;
    color: #333;
  }
  .btn-purple {
    background-color: #a178df;
    color: white;
    border: none;
  }
  .btn-purple:hover {
    background-color: #895ccf;
    color: white;
  }
  .img-fluid {
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    max-height: 400px;
    object-fit: cover;
  }
</style>

<div class="container mt-5">
  <a href="<?= base_url('/berita') ?>" class="btn btn-purple mb-3">← Kembali ke Berita</a>

  <h2 class="page-title mb-4"><?= esc($berita['judul']) ?></h2>
  
  <?php if (!empty($berita['gambar'])) : ?>
    <img src="<?= base_url('uploads/berita/' . $berita['gambar']) ?>" class="img-fluid mb-4" alt="<?= esc($berita['judul']) ?>">
  <?php endif; ?>

  <p class="content-text"><?= esc($berita['isi']) ?></p>
</div>

<?= $this->endSection() ?>
