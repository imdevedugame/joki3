<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan Pembayaran</title>
    <style>
        table { width: 100%; border-collapse: collapse; }
        table, th, td { border: 1px solid black; padding: 5px; }
        th { background-color: #eee; }
    </style>
</head>
<body>
    <h3>Laporan Pembayaran</h3>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>ID Member</th>
                <th>Tanggal Pesan</th>
                <th>Total Harga</th>
                <th>Status Pembayaran</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pesanan as $i => $p): ?>
            <tr>
                <td><?= $i+1 ?></td>
                <td><?= $p['id_member'] ?></td>
                <td><?= $p['tanggal_pesan'] ?></td>
                <td>Rp<?= number_format($p['total_harga']) ?></td>
                <td><?= $p['status_pembayaran'] ?></td>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</body>
</html>
