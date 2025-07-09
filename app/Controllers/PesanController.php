<?php

namespace App\Controllers;

use App\Models\PemesananHomestayModel;
use App\Models\HomestayModel;

class PesanController extends BaseController
{
    protected $pemesananHomestayModel;
    protected $homestayModel;

    public function __construct()
    {
        $this->pemesananHomestayModel = new PemesananHomestayModel();
        $this->homestayModel = new HomestayModel();
    }

    public function checkoutHomestay()
{
    $id_member = session()->get('id_member');

    // ✅ Pastikan user login
    if (!$id_member) {
        return redirect()->to('/member/login')->with('failed', 'Silakan login terlebih dahulu.');
    }

    $data['pemesanan'] = $this->pemesananHomestayModel
        ->select('
            pemesanan_homestay.*,
            homestay.nama_homestay,
            homestay.harga,
            pemesanan_homestay.file_bukti,
            pemesanan_homestay.tanggal_upload,
            pemesanan_homestay.status AS status_pembayaran
        ')
        ->join('homestay', 'homestay.id_homestay = pemesanan_homestay.id_homestay')
        ->where('pemesanan_homestay.id_member', $id_member)
        ->findAll();

    return view('paket_wisata/checkout_homestay', $data);
}


    public function uploadBuktiBayarHomestay()
{
    if (!session()->get('logged_in_member')) {
        return redirect()->to('/login-member')->with('error', 'Anda harus login terlebih dahulu.');
    }

    $validation = \Config\Services::validation();
    $rules = [
        'id_pemesanan_homestay' => 'required',
        'file_bukti' => 'uploaded[file_bukti]|is_image[file_bukti]|max_size[file_bukti,2048]'
    ];

    if (!$this->validate($rules)) {
        return redirect()->back()->with('error', $validation->listErrors());
    }

    $file = $this->request->getFile('file_bukti');

    if ($file->isValid() && !$file->hasMoved()) {
        $newName = $file->getRandomName();
        $file->move('uploads/bukti_homestay/', $newName);

        $id_pemesanan = $this->request->getPost('id_pemesanan_homestay');

        // Update table pemesanan_homestay langsung
        $this->pemesananHomestayModel->update($id_pemesanan, [
            'file_bukti' => $newName,
            'tanggal_upload' => date('Y-m-d H:i:s'),
            'status' => 'Menunggu Konfirmasi'
        ]);

        return redirect()->to('/homestay/checkout')->with('success', 'Bukti pembayaran berhasil diupload dan menunggu konfirmasi admin.');
    }

    return redirect()->back()->with('error', 'Gagal mengupload bukti pembayaran.');
}

}
