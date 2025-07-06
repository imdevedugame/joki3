<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\KontakModel;

class KontakController extends BaseController
{
    protected $kontakModel;

    public function __construct()
    {
        $this->kontakModel = new KontakModel();
    }

    public function index()
    {
        $data['kontak'] = $this->kontakModel->findAll();
        return view('admin/kontak/index', $data);
    }

    public function hapus($id_kontak)
    {
        $this->kontakModel->delete($id_kontak);
        return redirect()->to('/admin/kontak')->with('success', 'Pesan berhasil dihapus.');
    }
}
