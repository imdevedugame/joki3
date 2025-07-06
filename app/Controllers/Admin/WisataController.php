<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\PaketWisataModel;

class WisataController extends BaseController
{
    protected $PaketWisataModel;

    public function __construct()
    {
        $this->PaketWisataModel = new PaketWisataModel();
    }

    // =================== INDEX ===================
    public function index()
    {
        $wisata = $this->PaketWisataModel->findAll();

        return view('admin/wisata/index', [
            'wisata' => $wisata
        ]);
    }

    // =================== TAMBAH ===================
    public function tambah()
    {
        return view('admin/wisata/tambah');
    }

    // =================== SIMPAN ===================
    public function simpan()
    {
        // Validasi input
        if (!$this->validate([
            'nama_paket' => 'required',
            'deskripsi' => 'required',
            'harga' => 'required|numeric',
            'kapasitas' => 'required|numeric',
            'gambar' => 'uploaded[gambar]|max_size[gambar,2048]|is_image[gambar]'
        ])) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Proses upload gambar
        $fileGambar = $this->request->getFile('gambar');
        $namaGambar = $fileGambar->getRandomName();
        $fileGambar->move('uploads/wisata', $namaGambar);

        // Simpan data ke DB
        $this->PaketWisataModel->save([
            'nama_paket' => $this->request->getPost('nama_paket'),
            'deskripsi' => $this->request->getPost('deskripsi'),
            'harga' => $this->request->getPost('harga'),
            'kapasitas' => $this->request->getPost('kapasitas'),
            'gambar' => $namaGambar
        ]);

        return redirect()->to('/admin/wisata')->with('success', 'Paket wisata berhasil ditambahkan.');
    }

    // =================== EDIT ===================
    public function edit($id_paket)
    {
        $data = [
            'wisata' => $this->PaketWisataModel->find($id_paket)
        ];

        return view('admin/wisata/edit', $data);
    }

    // =================== UPDATE ===================
    public function update($id_paket)
    {
        // Validasi input
        if (!$this->validate([
            'nama_paket' => 'required',
            'deskripsi' => 'required',
            'harga' => 'required|numeric',
            'kapasitas' => 'required|numeric'
        ])) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $wisata = $this->PaketWisataModel->find($id_paket);

        $data = [
            'nama_paket' => $this->request->getPost('nama_paket'),
            'deskripsi' => $this->request->getPost('deskripsi'),
            'harga' => $this->request->getPost('harga'),
            'kapasitas' => $this->request->getPost('kapasitas')
        ];

        $fileGambar = $this->request->getFile('gambar');

        // Jika ada gambar baru diupload
        if ($fileGambar && $fileGambar->isValid() && !$fileGambar->hasMoved()) {
            // Hapus gambar lama
            if ($wisata && file_exists('uploads/wisata/' . $wisata['gambar'])) {
                unlink('uploads/wisata/' . $wisata['gambar']);
            }

            $namaGambar = $fileGambar->getRandomName();
            $fileGambar->move('uploads/wisata', $namaGambar);
            $data['gambar'] = $namaGambar;
        }

        $this->PaketWisataModel->update($id_paket, $data);

        return redirect()->to('/admin/wisata')->with('success', 'Paket wisata berhasil diupdate.');
    }

    // =================== HAPUS ===================
    public function hapus($id_paket)
    {
        $wisata = $this->PaketWisataModel->find($id_paket);

        // Hapus gambar di folder jika ada
        if ($wisata && file_exists('uploads/wisata/' . $wisata['gambar'])) {
            unlink('uploads/wisata/' . $wisata['gambar']);
        }

        // Hapus data di database
        $this->PaketWisataModel->delete($id_paket);

        return redirect()->to('/admin/wisata')->with('success', 'Paket wisata berhasil dihapus.');
    }
}
