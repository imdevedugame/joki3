<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<style>
    body {
        background: linear-gradient(135deg, #a78bfa, #7c3aed);
        min-height: 100vh;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        padding: 20px;
    }

    h3 {
        font-weight: bold;
        color: white;
    }

    .card {
        border: none;
        border-radius: 12px;
        box-shadow: 0 5px 20px rgba(0,0,0,0.1);
        background: white;
    }

    .table th {
        background-color: #6b21a8 !important;
        color: white;
    }

    .btn-purple {
        background-color: #6b21a8;
        color: white;
        font-weight: 500;
        border: none;
        border-radius: 8px;
        padding: 10px 20px;
        text-decoration: none;
        display: inline-block;
        transition: 0.3s;
    }

    .btn-purple:hover {
        background-color: #4c1d95;
        color: white;
    }

    .alert {
        border-radius: 8px;
    }
</style>

<div class="container mt-5">

    <h3 class="text-center mb-4">Checkout Pemesanan Wisata</h3>

    <?php if (session()->getFlashdata('failed')): ?>
        <div class="alert alert-danger"><?= session()->getFlashdata('failed') ?></div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
    <?php endif; ?>

    <?php if (!empty($pesanan)): ?>
        <div class="card shadow p-4">
            <table class="table table-hover">
                <thead>
                    <tr class="text-center">
                        <th>Nama Paket</th>
                        <th>Harga</th>
                        <th>Status Pembayaran</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="text-center">
                        <td><?= esc($pesanan['nama_paket']) ?></td>
                        <td>Rp<?= number_format($pesanan['total_harga'], 0, ',', '.') ?></td>
                        <td><?= esc($pesanan['status_pembayaran']) ?></td>
                    </tr>
                </tbody>
            </table>

            <div class="mt-3 text-center">
                <p>Dengan klik tombol di bawah, Anda setuju untuk melanjutkan pemesanan ini.</p>

                <a href="<?= base_url('pembayaran/' . $pesanan['id_pesanan']) ?>" class="btn-purple w-100">
                    <i class="fas fa-credit-card"></i> Lanjutkan ke Pembayaran
                </a>
            </div>
        </div>

    <?php else: ?>
        <div class="alert alert-warning text-center mt-4">Tidak ada pesanan untuk ditampilkan.</div>
        <div class="text-center">
            <a href="<?= base_url('paketwisata') ?>" class="btn-purple">← Kembali Pilih Paket Wisata</a>
        </div>
    <?php endif; ?>

    <div class="mt-4">
        <a href="<?= base_url('/') ?>" class="btn-purple">← Kembali ke Beranda</a>
    </div>
</div>

<?= $this->endSection() ?>
