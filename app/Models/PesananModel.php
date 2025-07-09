<?php

namespace App\Models;

use CodeIgniter\Model;

class PesananModel extends Model
{
    protected $table = 'pesanan';
    protected $primaryKey = 'id_pesanan';

    // ✅ Tambahkan 'id_paket' di allowedFields
    protected $allowedFields = [
        'id_member',
        'id_paket', // WAJIB ada agar insert berhasil
        'tanggal_pesan',
        'total_harga',
        'status_pembayaran',
        'status_pengiriman',
        'file_bukti',
        'tanggal_upload'
    ];



    public function getPesananByMember($id_member)
    {
        return $this->where('id_member', $id_member)
            ->orderBy('tanggal_pesan', 'DESC')
            ->findAll();
    }
}
