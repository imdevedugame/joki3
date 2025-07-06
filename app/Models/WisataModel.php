<?php

namespace App\Models;

use CodeIgniter\Model;

class PaketWisataModel extends Model
{
    protected $table = 'paket_wisata';
    protected $primaryKey = 'id_paket';
    protected $allowedFields = ['nama_paket', 'deskripsi', 'harga', 'kapasitas', 'gambar'];
    protected $useTimestamps = false;
}
