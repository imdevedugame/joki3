<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Register Member - Desa Wisata</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        body {
            background: linear-gradient(135deg, #e0c3fc, #8ec5fc);
            /* gradasi ungu muda + biru muda */
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            padding: 20px;
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

        .btn-back {
            background-color: #a178df;
            color: white;
            border: none;
            margin-bottom: 15px;
        }

        .btn-back:hover {
            background-color: #895ccf;
            color: white;
        }

        .btn-back i {
            margin-right: 5px;
        }

        h3 {
            font-weight: bold;
            color: #5b21b6;
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">

                <a href="<?= base_url('/') ?>" class="btn btn-back">
                    <i class="fas fa-arrow-left"></i> Kembali ke Beranda
                </a>

                <div class="card">
                    <h3 class="text-center mb-4">Register Member</h3>

                    <?php if (session()->getFlashdata('error')): ?>
                        <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
                    <?php endif; ?>

                    <form method="post" action="<?= base_url('member/register-proses') ?>">
                        <div class="mb-3">
                            <label>Nama</label>
                            <input type="text" name="nama" class="form-control" placeholder="Masukkan nama" required autofocus>
                        </div>
                        <div class="mb-3">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" placeholder="Masukkan email" required>
                        </div>
                        <div class="mb-3">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Masukkan password" required>
                        </div>
                        <div class="mb-3">
                            <label>No HP</label>
                            <input type="text" name="no_hp" class="form-control" placeholder="08xxxx" required>
                        </div>
                        <div class="mb-3">
                            <label>Alamat</label>
                            <textarea name="alamat" class="form-control" placeholder="Masukkan alamat lengkap" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-purple w-100">Register</button>
                    </form>

                    <div class="text-center mt-3">
                        <small>Sudah punya akun? <a href="<?= base_url('member/login') ?>">Login disini</a></small>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script src="<?= base_url('assets/js/bootstrap.bundle.min.js') ?>"></script>
</body>

</html>
