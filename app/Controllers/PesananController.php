<?php

namespace App\Controllers;

use App\Models\PaketWisataModel;
use App\Models\PesananModel;

class PesananController extends BaseController
{
    protected $pesananModel;
    protected $paketModel;

    public function __construct()
    {
        $this->pesananModel = new PesananModel();
        $this->paketModel = new PaketWisataModel();
    }

    public function pesan($id_paket)
    {
        if (!session()->get('logged_in_member')) {
            return redirect()->to('/login-member')->with('error', 'Anda harus login terlebih dahulu untuk memesan.');
        }

        $paket = $this->paketModel->find($id_paket);
        if (!$paket) {
            return redirect()->back()->with('error', 'Paket wisata tidak ditemukan.');
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

        return redirect()->to('/riwayat-pesanan')->with('success', 'Pemesanan berhasil. Silakan lakukan pembayaran.');
    }

    public function riwayat()
    {
        if (!session()->get('logged_in_member')) {
            return redirect()->to('/login-member')->with('error', 'Anda harus login terlebih dahulu.');
        }

        // Ambil data pesanan beserta bukti bayar (kolom file_bukti sudah digabung ke tabel pesanan)
        $data['pesanan'] = $this->pesananModel
            ->where('id_member', session()->get('id_member'))
            ->findAll();

        return view('pesanan/riwayat', $data);
    }

    public function uploadBukti($id_pesanan)
    {
        if (!session()->get('logged_in_member')) {
            return redirect()->to('/login-member')->with('error', 'Anda harus login terlebih dahulu.');
        }

        $pesanan = $this->pesananModel->find($id_pesanan);
        if (!$pesanan) {
            return redirect()->back()->with('error', 'Pesanan tidak ditemukan.');
        }

        return view('pesanan/upload_bukti', ['pesanan' => $pesanan]);
    }

    public function simpanBukti()
    {
        if (!session()->get('logged_in_member')) {
            return redirect()->to('/login-member')->with('error', 'Anda harus login terlebih dahulu.');
        }

        $validation = \Config\Services::validation();
        $rules = [
            'id_pesanan' => 'required',
            'file_bukti' => 'uploaded[file_bukti]|is_image[file_bukti]|max_size[file_bukti,2048]'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->with('error', $validation->listErrors());
        }

        $id_pesanan = $this->request->getPost('id_pesanan');
        $pesanan = $this->pesananModel->find($id_pesanan);
        if (!$pesanan) {
            return redirect()->back()->with('error', 'Pesanan tidak ditemukan.');
        }

        $file = $this->request->getFile('file_bukti');
        if ($file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move('uploads/bukti_pembayaran/', $newName);

            // Update langsung ke tabel pesanan
            $this->pesananModel->update($id_pesanan, [
                'file_bukti' => $newName,
                'tanggal_upload' => date('Y-m-d H:i:s'),
                'status_pembayaran' => 'Menunggu Konfirmasi'
            ]);

            return redirect()->to('/riwayat-pesanan')->with('success', 'Bukti pembayaran berhasil diupload dan menunggu konfirmasi admin.');
        } else {
            return redirect()->back()->with('error', 'Gagal mengupload file.');
        }
    }
}
