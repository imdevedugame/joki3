<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\HomestayModel;
use App\Models\PemesananHomestayModel;
use App\Models\PesananModel;

class HomestayController extends BaseController
{
    protected $homestayModel;
    protected $pemesananModel;
    protected $pembayaranModel;

    public function __construct()
    {
        $this->homestayModel = new HomestayModel();
        $this->pemesananModel = new PemesananHomestayModel();
        $this->pembayaranModel = new PesananModel();
    }

    public function index()
    {
        $data['homestays'] = $this->homestayModel->findAll();
        return view('admin/homestay/index', $data);
    }

    public function create()
    {
        return view('admin/homestay/create');
    }

    public function store()
    {
        $file = $this->request->getFile('foto');
        $filename = 'default.jpg';

        if ($file->isValid() && !$file->hasMoved()) {
            $filename = $file->getRandomName();
            $file->move('uploads/homestay', $filename);
        }

        $this->homestayModel->insert([
            'nama_homestay' => $this->request->getPost('nama_homestay'),
            'deskripsi' => $this->request->getPost('deskripsi'),
            'harga' => $this->request->getPost('harga'),
            'kapasitas' => $this->request->getPost('kapasitas'),
            'foto' => $filename
        ]);

        return redirect()->to('/admin/homestay')->with('success', 'Homestay berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $data['homestay'] = $this->homestayModel->find($id);
        return view('admin/homestay/edit', $data);
    }

    public function update($id)
    {
        $homestay = $this->homestayModel->find($id);
        $file = $this->request->getFile('foto');
        $filename = $homestay['foto'];

        if ($file->isValid() && !$file->hasMoved()) {
            $filename = $file->getRandomName();
            $file->move('uploads/homestay', $filename);
        }

        $this->homestayModel->update($id, [
            'nama_homestay' => $this->request->getPost('nama_homestay'),
            'deskripsi' => $this->request->getPost('deskripsi'),
            'harga' => $this->request->getPost('harga'),
            'kapasitas' => $this->request->getPost('kapasitas'),
            'foto' => $filename
        ]);

        return redirect()->to('/admin/homestay')->with('success', 'Homestay berhasil diupdate.');
    }

    public function delete($id)
    {
        $this->homestayModel->delete($id);
        return redirect()->to('/admin/homestay')->with('success', 'Homestay berhasil dihapus.');
    }

    public function checkout()
{
    $id_member = session()->get('id_member');

    // ✅ Pastikan user login
    if (!$id_member) {
        return redirect()->to('/member/login')->with('error', 'Silakan login terlebih dahulu.');
    }

    $db = \Config\Database::connect();
    $builder = $db->table('pemesanan_homestay');
    $builder->select('
        pemesanan_homestay.*,
        homestay.nama_homestay,
        homestay.harga,
        pemesanan_homestay.file_bukti,
        pemesanan_homestay.tanggal_upload,
        pemesanan_homestay.status as status_bayar
    ');
    $builder->join('homestay', 'homestay.id_homestay = pemesanan_homestay.id_homestay');
    // ✅ Menghapus join ke pemesanan_homestay sendiri yang menyebabkan error
    $builder->where('pemesanan_homestay.id_member', $id_member);
    $query = $builder->get();

    $data['pemesanan'] = $query->getResultArray();

    return view('homestay/checkout', $data);
}


    public function simpanPembayaran()
    {
        $validation = \Config\Services::validation();
        $rules = [
            'file_bukti' => 'uploaded[file_bukti]|is_image[file_bukti]|max_size[file_bukti,2048]',
            'id_pemesanan_homestay' => 'required'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->with('error', $validation->listErrors());
        }

        $file = $this->request->getFile('file_bukti');
        $newName = $file->getRandomName();
        $file->move('uploads/bukti_homestay/', $newName);

        $this->pembayaranModel->insert([
            'id_pemesanan_homestay' => $this->request->getPost('id_pemesanan_homestay'),
            'file_bukti' => $newName,
            'tanggal_upload' => date('Y-m-d H:i:s'),
            'status' => 'Menunggu Konfirmasi'
        ]);

        return redirect()->to('/homestay/checkout')->with('success', 'Bukti pembayaran homestay berhasil diupload dan menunggu konfirmasi admin.');
    }
}
