<?php

namespace App\Controllers;

use App\Models\PaketWisataModel;
use App\Models\PesananModel;

class PaketWisataController extends BaseController
{
    protected $pesananModel;
    protected $paketModel;

    public function __construct()
    {
        $this->pesananModel = new PesananModel();
        $this->paketModel = new PaketWisataModel();
    }

    public function index()
    {
        $keyword = $this->request->getGet('keyword');
        $paket_wisata = $keyword
            ? $this->paketModel->like('nama_paket', $keyword)->findAll()
            : $this->paketModel->findAll();

        return view('paket_wisata/index', [
            'paket_wisata' => $paket_wisata,
            'keyword' => $keyword
        ]);
    }

    public function pesan($id_paket)
    {
        if (!session()->get('logged_in_member')) {
            return redirect()->to('/member/login')->with('error', 'Anda harus login terlebih dahulu.');
        }

        $paket = $this->paketModel->find($id_paket);
        if (!$paket) {
            return redirect()->to('/paketwisata')->with('error', 'Paket wisata tidak ditemukan.');
        }

        return view('paket_wisata/pesanan', ['paket' => $paket]);
    }

    public function konfirmasiPesan($id_paket)
    {
        if (!session()->get('logged_in_member')) {
            return redirect()->to('/member/login')->with('error', 'Login terlebih dahulu.');
        }

        $paket = $this->paketModel->find($id_paket);
        if (!$paket) {
            return redirect()->to('/paketwisata')->with('error', 'Paket wisata tidak ditemukan.');
        }

        $data = [
            'id_member' => session()->get('id_member'),
            'id_paket' => $id_paket,
            'tanggal_pesan' => date('Y-m-d'),
            'total_harga' => $paket['harga'],
            'status_pembayaran' => 'Belum Bayar',
            'status_pengiriman' => '-'
        ];

        $this->pesananModel->insert($data);
        $id_pesanan = $this->pesananModel->insertID();

        return redirect()->to('/paket_wisata/checkout/' . $id_pesanan)
            ->with('success', 'Pesanan berhasil dibuat, lanjutkan pembayaran.');
    }

    public function checkout($id_pesanan)
    {
        $pesanan = $this->pesananModel
            ->select('pesanan.*, paket_wisata.nama_paket')
            ->join('paket_wisata', 'paket_wisata.id_paket = pesanan.id_paket')
            ->where('id_pesanan', $id_pesanan)
            ->first();

        if (!$pesanan) {
            return redirect()->to('/paketwisata')->with('error', 'Pesanan tidak ditemukan.');
        }

        return view('paket_wisata/checkout', ['pesanan' => $pesanan]);
    }

    public function pembayaran($id_pesanan)
    {
        $pesanan = $this->pesananModel
            ->select('pesanan.*, paket_wisata.nama_paket')
            ->join('paket_wisata', 'paket_wisata.id_paket = pesanan.id_paket')
            ->where('id_pesanan', $id_pesanan)
            ->first();

        if (!$pesanan) {
            return redirect()->to('/paketwisata')->with('error', 'Pesanan tidak ditemukan.');
        }

        return view('paket_wisata/pembayaran', ['pesanan' => $pesanan]);
    }

    public function prosesPembayaran()
    {
        if (!session()->get('logged_in_member')) {
            return redirect()->to('/member/login')->with('error', 'Anda harus login terlebih dahulu.');
        }

        $file = $this->request->getFile('bukti');
        $id_pesanan = $this->request->getPost('id_pesanan');

        if ($file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move('uploads/bukti_bayar', $newName);

            $this->pesananModel->update($id_pesanan, [
                'file_bukti' => $newName,
                'tanggal_upload' => date('Y-m-d H:i:s'),
                'status_pembayaran' => 'Menunggu Konfirmasi'
            ]);

            return redirect()->to('/riwayat-pesanan')->with('success', 'Bukti pembayaran berhasil diupload. Menunggu konfirmasi admin.');
        }

        return redirect()->back()->with('error', 'Upload gagal, coba lagi.');
    }

    public function riwayatPesanan()
    {
        if (!session()->get('logged_in_member')) {
            return redirect()->to('/login-member')->with('error', 'Silakan login terlebih dahulu.');
        }

        $id_member = session()->get('id_member');
        $pesanan = $this->pesananModel
            ->where('id_member', $id_member)
            ->findAll();

        return view('paket_wisata/riwayat_pesanan', ['pesanan' => $pesanan]);
    }
}
