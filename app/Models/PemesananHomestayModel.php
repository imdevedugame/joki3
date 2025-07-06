<?php

namespace App\Models;

use CodeIgniter\Model;

class PemesananHomestayModel extends Model
{
    protected $table = 'pemesanan_homestay';
    protected $primaryKey = 'id_pemesanan_homestay';
    protected $allowedFields = [
        'id_member',
        'id_homestay',
        'tanggal_pesan',
        'status',
        'file_bukti',
        'tanggal_upload'
    ];

    protected $useTimestamps = false;
}
