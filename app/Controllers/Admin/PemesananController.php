<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\PesananModel;
use App\Models\PaketWisataModel;
use App\Models\MemberModel;

class PemesananController extends BaseController
{
    protected $pesananModel;
    protected $paketModel;
    protected $memberModel;

    public function __construct()
    {
        $this->pesananModel = new PesananModel();
        $this->paketModel = new PaketWisataModel();
        $this->memberModel = new MemberModel();
    }

    public function index()
    {
        $data['pesanan'] = $this->pesananModel
            ->select('
                pesanan.*,
                paket_wisata.nama_paket,
                member.nama as nama_member
            ')
            ->join('paket_wisata', 'paket_wisata.id_paket = pesanan.id_paket')
            ->join('member', 'member.id_member = pesanan.id_member')
            ->findAll();

        return view('admin/pemesanan/index', $data);
    }

    public function konfirmasi($id)
    {
        $pesanan = $this->pesananModel->find($id);
        if (!$pesanan) {
            return redirect()->to('/admin/pemesanan')->with('error', 'Data pesanan tidak ditemukan.');
        }

        // Update status pembayaran menjadi 'Lunas' dan status pengiriman menjadi 'Sedang Diproses'
        $this->pesananModel->update($id, [
            'status_pembayaran' => 'Lunas',
            'status_pengiriman' => 'Sedang Diproses'
        ]);

        return redirect()->to('/admin/pemesanan')->with('success', 'Pemesanan telah dikonfirmasi. Status pembayaran Lunas dan pengiriman sedang diproses.');
    }
}
