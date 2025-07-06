<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Pembayaran Pesanan</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            background: linear-gradient(135deg, #a78bfa, #7c3aed);
            min-height: 100vh;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            padding: 20px;
        }

        h3 {
            font-weight: bold;
            font-size: 28px;
            color: white;
            text-align: center;
            margin-bottom: 30px;
        }

        .card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
            background: white;
            max-width: 700px;
            margin: auto;
            padding: 30px;
        }

        .btn-purple {
            background-color: #6b21a8;
            color: white;
            font-weight: 500;
            border: none;
            border-radius: 8px;
            padding: 10px 20px;
            text-decoration: none;
            display: block; /* ✅ memastikan tombol block */
            width: 100%;    /* ✅ memastikan lebar penuh */
            transition: 0.3s;
        }

        .btn-purple:hover {
            background-color: #4c1d95;
            color: white;
        }

        .btn-info-small {
            background-color: #6b21a8;
            color: white;
            font-size: 12px;
            padding: 5px 10px;
            border-radius: 5px;
            border: none;
            margin-top: 10px;
        }

        .btn-info-small:hover {
            background-color: #4c1d95;
            color: white;
        }

        .btn-back {
            background-color: #6b21a8;
            color: white;
            border: none;
            border-radius: 8px;
            padding: 10px 20px;
            text-decoration: none;
            display: inline-block;
            margin-top: 20px;
            font-weight: 500;
        }

        .btn-back:hover {
            background-color: #4c1d95;
            color: white;
        }

        .modal-content {
            border-radius: 12px;
        }

        .copy-success {
            color: green;
            font-size: 14px;
        }
    </style>
</head>

<body>

    <h3>Pembayaran Pesanan</h3>

    <div class="card">

        <?php if (session()->getFlashdata('error')): ?>
            <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
        <?php endif; ?>

        <table class="table">
            <tr>
                <th>Nama Paket</th>
                <td><?= esc($pesanan['nama_paket'] ?? 'Paket Tidak Ditemukan') ?></td>
            </tr>
            <tr>
                <th>Total Harga</th>
                <td>Rp <?= number_format($pesanan['total_harga'] ?? 0, 0, ',', '.') ?></td>
            </tr>
        </table>

        <hr>

        <div class="text-center">
            <button class="btn-info-small" onclick="showPopup()">
                Info Rekening
            </button>
        </div>

        <br>

        <form action="<?= base_url('pembayaran/proses') ?>" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id_pesanan" value="<?= $pesanan['id_pesanan'] ?? '' ?>">
            <div class="mb-3">
                <label class="form-label">Upload Bukti Pembayaran</label>
                <input type="file" name="bukti" class="form-control" required>
            </div>

            <hr>

            <button type="submit" class="btn-purple mb-2">
                <i class="fas fa-check-circle"></i> Konfirmasi Pembayaran
            </button>
        </form>

    </div>

    <div style="max-width:700px; margin:auto;">
        <a href="<?= base_url('/') ?>" class="btn-back">
            <i class="fas fa-arrow-left"></i> Kembali ke Beranda
        </a>
    </div>

    <!-- Popup Modal Custom -->
    <div id="popup" style="display:none; position:fixed; top:0; left:0; width:100%; height:100%; background:rgba(0,0,0,0.5); z-index:9999;">
        <div style="background:white; max-width:400px; margin:100px auto; padding:20px; border-radius:10px; position:relative;">
            <h5 class="text-center">Nomor Rekening</h5>
            <p class="text-center mb-1">An. Tatacherda Zeblanov Sembara</p>
            <p class="text-center fw-bold" id="norek" style="cursor:pointer;" onclick="copyRekening()">1589 0100 4708 506</p>
            <p class="text-center copy-success" id="copySuccess" style="display: none;">Nomor rekening berhasil dicopy!</p>
            <div class="text-center mt-3">
                <button class="btn-purple" onclick="hidePopup()">Tutup</button>
            </div>
            <span style="position:absolute; top:10px; right:15px; cursor:pointer; font-size:20px;" onclick="hidePopup()">&times;</span>
        </div>
    </div>

    <script>
        function showPopup() {
            document.getElementById('popup').style.display = 'block';
        }

        function hidePopup() {
            document.getElementById('popup').style.display = 'none';
        }

        function copyRekening() {
            const norek = document.getElementById('norek').innerText;
            navigator.clipboard.writeText(norek).then(function() {
                document.getElementById('copySuccess').style.display = 'block';
                setTimeout(() => {
                    document.getElementById('copySuccess').style.display = 'none';
                }, 2000);
            }, function(err) {
                alert('Gagal menyalin nomor rekening');
            });
        }
    </script>

    <script src="<?= base_url('assets/js/bootstrap.bundle.min.js') ?>"></script>
</body>

</html>
