<!DOCTYPE html>
<html>
<head>
    <title>Laporan Paket Wisata</title>
    <style>
        table { width: 100%; border-collapse: collapse }
        table, th, td { border: 1px solid black }
        th, td { padding: 6px; text-align: left }
    </style>
</head>
<body>
    <h2>Laporan Paket Wisata</h2>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Paket</th>
                <th>Harga</th>
                <th>Kapasitas</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($wisata as $i => $w): ?>
            <tr>
                <td><?= $i + 1 ?></td>
                <td><?= esc($w['nama_paket']) ?></td>
                <td><?= number_format($w['harga']) ?></td>
                <td><?= esc($w['kapasitas']) ?> orang</td>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</body>
</html>
