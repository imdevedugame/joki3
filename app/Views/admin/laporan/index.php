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

    .btn-purple {
        background-color: #6b21a8;
        color: white;
        font-weight: 500;
        border: none;
        border-radius: 8px;
        padding: 10px 16px;
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

    .table-purple {
        background-color: #6b21a8;
    }

    .table-responsive {
        overflow-x: auto;
    }

    .alert-success {
        background-color: #198754;
        color: white;
        border: none;
    }
</style>

<div class="container mt-4">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Laporan Pembayaran</h2>
        <a href="<?= base_url('admin/dashboard') ?>" class="btn-back">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>
    </div>

    <!-- Form Filter Tanggal -->
    <form action="<?= base_url('admin/laporan') ?>" method="get" class="row g-3 mb-4">
        <div class="col-md-3">
            <label for="from" class="form-label">Dari Tanggal</label>
            <input type="date" name="from" id="from" class="form-control" value="<?= esc($from ?? '') ?>">
        </div>
        <div class="col-md-3">
            <label for="to" class="form-label">Sampai Tanggal</label>
            <input type="date" name="to" id="to" class="form-control" value="<?= esc($to ?? '') ?>">
        </div>
        <div class="col-md-3 d-flex align-items-end">
            <button type="submit" class="btn btn-purple w-100"><i class="fas fa-filter"></i> Filter</button>
        </div>
    </form>

    <!-- Tombol Export -->
    <div class="mb-4">
        <a href="<?= base_url('admin/laporan/pdf') ?>" class="btn btn-danger me-2"><i class="fas fa-file-pdf"></i> Export PDF</a>
        <a href="<?= base_url('admin/laporan/excel') ?>" class="btn btn-success"><i class="fas fa-file-excel"></i> Export Excel</a>
    </div>

    <!-- Tabel Laporan -->
    <div class="table-responsive">
        <table class="table table-bordered table-dark table-hover">
            <thead class="table-purple text-white text-center">
                <tr>
                    <th>No</th>
                    <th>ID Member</th>
                    <th>Tanggal Pesan</th>
                    <th>Total Harga</th>
                    <th>Status Pembayaran</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $totalPendapatan = 0;
                if (!empty($pesanan)):
                    foreach ($pesanan as $i => $p):
                        if (in_array($p['status_pembayaran'], ['Lunas', 'Sudah Dibayar'])) {
                            $totalPendapatan += $p['total_harga'];
                        }
                ?>
                        <tr>
                            <td class="text-center"><?= $i + 1 ?></td>
                            <td class="text-center"><?= esc($p['id_member']) ?></td>
                            <td class="text-center"><?= date('d/m/Y', strtotime($p['tanggal_pesan'])) ?></td>
                            <td class="text-end">Rp<?= number_format($p['total_harga'], 0, ',', '.') ?></td>
                            <td class="text-center"><?= esc($p['status_pembayaran']) ?></td>
                        </tr>
                    <?php
                    endforeach;
                else:
                    ?>
                    <tr>
                        <td colspan="5" class="text-center">Tidak ada data transaksi pada periode ini.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <!-- Total Pendapatan -->
    <div class="alert alert-success fw-bold mt-3">
        Total Pendapatan: Rp<?= number_format($totalPendapatan, 0, ',', '.') ?>
    </div>

</div>

<?= $this->endSection() ?>
