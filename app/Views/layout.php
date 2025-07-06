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
            background: linear-gradient(135deg, #a78bfa, #7c3aed);
            min-height: 100vh;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            padding-top: 70px; /* ✅ untuk navbar fixed agar konten tidak tertutup */
        }

        /* ✅ Navbar sticky hide on scroll down, show on scroll up */
        .navbar {
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 9999;
            transition: top 0.3s;
        }
    </style>
</head>

<body>

    <!-- Navbar (tetap posisinya, hanya behavior diubah) -->
    <?= $this->include('layout/navbar') ?>

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
                // scroll up
                navbar.style.top = "0";
            } else {
                // scroll down
                navbar.style.top = "-80px"; // sesuaikan dengan tinggi navbar jika berbeda
            }

            prevScrollPos = currentScrollPos;
        }
    </script>

    <!-- Custom Script -->
    <?= $this->renderSection('script') ?>
</body>

</html>
