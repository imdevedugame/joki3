<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\PemesananHomestayModel;
use App\Models\HomestayModel;
use App\Models\MemberModel;

class PemesananHomestayController extends BaseController
{
    protected $pesananModel;
    protected $homestayModel;
    protected $memberModel;

    public function __construct()
    {
        $this->pesananModel = new PemesananHomestayModel();
        $this->homestayModel = new HomestayModel();
        $this->memberModel = new MemberModel();
    }

    public function index()
    {
        $data['pemesanan'] = $this->pesananModel
            ->select('
                pemesanan_homestay.*,
                homestay.nama_homestay,
                homestay.harga,
                member.nama as nama_member,
                pemesanan_homestay.file_bukti,
                pemesanan_homestay.status as status_bayar
            ')
            ->join('homestay', 'homestay.id_homestay = pemesanan_homestay.id_homestay')
            ->join('member', 'member.id_member = pemesanan_homestay.id_member')
            ->findAll();

        return view('admin/pemesanan_homestay/index', $data);
    }

    public function konfirmasi($id)
    {
        // Pastikan data pesanan ada
        $pesanan = $this->pesananModel->find($id);
        if (!$pesanan) {
            return redirect()->to('/admin/pemesananhomestay')->with('error', 'Data pesanan tidak ditemukan.');
        }

        // Update status pesanan menjadi Sudah Dikonfirmasi
        $this->pesananModel->update($id, ['status' => 'Sudah Dikonfirmasi']);

        return redirect()->to('/admin/pemesananhomestay')->with('success', 'Pemesanan homestay telah dikonfirmasi.');
    }

    public function simpanBukti()
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

        $id_pemesanan = $this->request->getPost('id_pemesanan_homestay');
        $file = $this->request->getFile('file_bukti');
        $newName = $file->getRandomName();
        $file->move('uploads/bukti_homestay/', $newName);

        // Update ke tabel pemesanan_homestay langsung
        $this->pesananModel->update($id_pemesanan, [
            'file_bukti' => $newName,
            'tanggal_upload' => date('Y-m-d H:i:s'),
            'status' => 'Menunggu Konfirmasi'
        ]);

        return redirect()->to('/checkout-homestay')->with('success', 'Bukti pembayaran homestay berhasil diupload dan menunggu konfirmasi admin.');
    }
}
