<?php

namespace App\Controllers;

use App\Models\HomestayModel;
use App\Models\PemesananHomestayModel;

class HomestayController extends BaseController
{
    public function index()
    {
        $homestayModel = new HomestayModel();
        $keyword = $this->request->getGet('keyword');

        if ($keyword) {
            $homestays = $homestayModel->like('nama_homestay', $keyword)->findAll();
        } else {
            $homestays = $homestayModel->findAll();
        }

        return view('homestay/index', [
            'homestays' => $homestays,
            'keyword' => $keyword
        ]);
    }

    public function pesan($id)
    {
        $homestayModel = new HomestayModel();
        $homestay = $homestayModel->find($id);

        if (!$homestay) {
            return redirect()->to('/homestay')->with('error', 'Homestay tidak ditemukan');
        }

        return view('homestay/pesan', ['homestay' => $homestay]);
    }

    public function simpanPesan()
    {
        $pesananModel = new PemesananHomestayModel();
        $id_member = session()->get('id_member');

        if (!$id_member) {
            return redirect()->to('/member/login')->with('error', 'Silakan login terlebih dahulu');
        }

        $pesananModel->insert([
            'id_member' => $id_member,
            'id_homestay' => $this->request->getPost('id_homestay'),
            'tanggal_pesan' => date('Y-m-d'),
            'status' => 'Belum Bayar'
        ]);

        return redirect()->to('/homestay/checkout')->with('success', 'Homestay berhasil dipesan, silakan lakukan pembayaran.');
    }

    public function checkout()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('pemesanan_homestay');
        
        $builder->select('
            pemesanan_homestay.*,
            homestay.nama_homestay,
            homestay.harga,
            pemesanan_homestay.file_bukti,
            pemesanan_homestay.tanggal_upload,
            pemesanan_homestay.status AS status_pembayaran
        ');
        
        $builder->join('homestay', 'homestay.id_homestay = pemesanan_homestay.id_homestay');
        $builder->where('pemesanan_homestay.id_member', session()->get('id_member'));
        
        $query = $builder->get();

        $data['pemesanan'] = $query->getResultArray();

        return view('homestay/checkout', $data);
    }

    public function simpanPembayaran()
    {
        $validation = \Config\Services::validation();
        $rules = [
            'id_pemesanan_homestay' => 'required',
            'file_bukti' => 'uploaded[file_bukti]|is_image[file_bukti]|max_size[file_bukti,2048]'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->with('error', $validation->listErrors());
        }

        $file = $this->request->getFile('file_bukti');
        $newName = $file->getRandomName();
        $file->move('uploads/bukti_homestay/', $newName);

        $pemesananModel = new PemesananHomestayModel();
        $pemesananModel->update($this->request->getPost('id_pemesanan_homestay'), [
            'file_bukti' => $newName,
            'tanggal_upload' => date('Y-m-d H:i:s'),
            'status' => 'Menunggu Konfirmasi'
        ]);

        return redirect()->to('/checkout-homestay')->with('success', 'Bukti pembayaran berhasil diupload dan menunggu konfirmasi admin.');
    }
}
