<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Desa Wisata Banjaran</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">

    <style>
        body {
            background: linear-gradient(135deg, #a78bfa, #7c3aed); /* 🔄 gradient kembali seperti awal */
            min-height: 100vh;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            padding-top: 90px;
        }

        .navbar {
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 9999;
            transition: top 0.3s;
            background: linear-gradient(135deg, #a78bfa, #7c3aed); /* 🔄 gradient kembali seperti awal */
            height: 70px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* ✅ efek bayangan */
        }

        .navbar .nav-link, .navbar .navbar-brand {
            line-height: 40px;
        }

        .dropdown-menu {
            background-color: #6b21a8;
        }

        .dropdown-menu a {
            color: white;
        }

        .dropdown-menu a:hover {
            background-color: #4c1d95;
            color: white;
        }
    </style>
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="<?= base_url('/') ?>">
                <i class="fas fa-tree"></i> Desa Wisata Banjaran
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">

                    <!-- Menu existing -->
                    <li class="nav-item"><a class="nav-link" href="<?= base_url('/') ?>">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= base_url('wisata') ?>">Wisata</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= base_url('homestay') ?>">Homestay</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= base_url('gallery') ?>">Galeri</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= base_url('berita') ?>">Berita</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= base_url('video') ?>">Video</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= base_url('riwayat-pesanan') ?>">Riwayat Pesanan</a></li>

                    <!-- Login Admin tetap ada -->
                    <li class="nav-item"><a class="nav-link" href="<?= base_url('admin/login') ?>">Login Admin</a></li>

                    <!-- Profil Member Dropdown -->
                    <?php if (session('id_member')): ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarProfile" role="button"
                               data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-user-circle"></i> <?= esc(session('nama')) ?>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarProfile">
                                <li><a class="dropdown-item" href="<?= base_url('member/profil') ?>">
                                    <i class="fas fa-user"></i> Profil</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="<?= base_url('member/logout') ?>">
                                    <i class="fas fa-sign-out-alt"></i> Logout</a></li>
                            </ul>
                        </li>
                    <?php else: ?>
                        <!-- Jika belum login member -->
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('member/login') ?>">Login Member</a>
                        </li>
                    <?php endif; ?>
                    
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container py-4">
        <?= $this->renderSection('content') ?>
    </div>

    <!-- Footer -->
    <?= $this->include('layout/footer') ?>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Sticky Navbar Script -->
    <script>
        let prevScrollPos = window.pageYOffset;
        const navbar = document.querySelector(".navbar");

        window.onscroll = function() {
            const currentScrollPos = window.pageYOffset;

            if (prevScrollPos > currentScrollPos) {
                navbar.style.top = "0";
            } else {
                navbar.style.top = "-80px";
            }

            prevScrollPos = currentScrollPos;
        }
    </script>

    <!-- Custom Script -->
    <?= $this->renderSection('script') ?>
</body>

</html>
