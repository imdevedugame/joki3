<?php

namespace App\Models;

use CodeIgniter\Model;

class PaketWisataModel extends Model
{
    protected $table = 'paket_wisata';
    protected $primaryKey = 'id_paket';
    protected $allowedFields = ['nama_paket', 'deskripsi', 'harga', 'gambar', 'kapasitas'];
    protected $useTimestamps = true;

    public function semuaPaket()
    {
        return $this->orderBy('id_paket', 'DESC')->findAll();
    }

    public function cariPaket($keyword)
    {
        return $this->like('nama_paket', $keyword)
            ->orLike('deskripsi', $keyword)
            ->findAll();
    }
}
