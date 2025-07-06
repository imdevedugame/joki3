<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Login Admin - Desa Wisata</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        body {
            background: linear-gradient(to right, #d8b4fe, #a5b4fc);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }

        .btn-purple {
            background-color: #6f42c1;
            color: white;
            border: none;
        }

        .btn-purple:hover {
            background-color: #59339c;
            color: white;
        }

        .btn-back {
            background-color: #6f42c1;
            color: white;
            border: none;
            margin-bottom: 15px;
        }

        .btn-back:hover {
            background-color: #59339c;
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
                <div class="card p-4">
                    <h3 class="text-center mb-3">Login Admin</h3>
                    <?php if (session()->getFlashdata('error')): ?>
                        <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
                    <?php endif; ?>
                    <form method="post" action="<?= base_url('admin/login/proses') ?>">
                        <div class="mb-3">
                            <label>Username</label>
                            <input type="text" name="username" class="form-control" required autofocus>
                        </div>
                        <div class="mb-3">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-purple w-100">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
