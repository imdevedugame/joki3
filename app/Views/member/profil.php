<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<div class="container py-5">
    <div class="card mx-auto" style="max-width: 600px;">
        <div class="card-header bg-purple text-white">
            <h5 class="mb-0"><i class="fas fa-user"></i> Profil Member</h5>
        </div>
        <div class="card-body">
            <?php if (session()->getFlashdata('failed')): ?>
                <div class="alert alert-danger"><?= session()->getFlashdata('failed') ?></div>
            <?php endif; ?>
            <?php if (session()->getFlashdata('success')): ?>
                <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
            <?php endif; ?>

            <p><strong>Nama:</strong> <?= esc($member['nama']) ?></p>
            <p><strong>Email:</strong> <?= esc($member['email']) ?></p>
            <p><strong>No HP:</strong> <?= esc($member['no_hp']) ?></p>

            <hr>

            <h6>Ganti Password</h6>
            <form action="<?= base_url('member/update-password') ?>" method="post">
                <?= csrf_field() ?>
                <div class="mb-3">
                    <label>Password Lama</label>
                    <input type="password" name="password_lama" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Password Baru</label>
                    <input type="password" name="password_baru" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-purple">Update Password</button>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
