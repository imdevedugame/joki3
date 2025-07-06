<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\BeritaModel;

class BeritaController extends BaseController
{
    protected $beritaModel;

    public function __construct()
    {
        $this->beritaModel = new BeritaModel();
    }

    public function index()
    {
        $data['berita'] = $this->beritaModel->findAll();
        return view('admin/berita/index', $data);
    }

    public function tambah()
    {
        return view('admin/berita/tambah');
    }

    public function simpan()
    {
        if (!$this->validate([
            'judul' => 'required',
            'isi' => 'required',
            'gambar' => 'uploaded[gambar]|max_size[gambar,2048]|is_image[gambar]'
        ])) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $file = $this->request->getFile('gambar');
        $namaFile = $file->getRandomName();
        $file->move('uploads/berita', $namaFile);

        $this->beritaModel->save([
            'judul' => $this->request->getPost('judul'),
            'isi' => $this->request->getPost('isi'),
            'tanggal' => date('Y-m-d'),
            'gambar' => $namaFile
        ]);

        return redirect()->to('/admin/berita')->with('success', 'Berita berhasil ditambahkan.');
    }

    public function edit($id_berita)
    {
        $data['berita'] = $this->beritaModel->find($id_berita);
        return view('admin/berita/edit', $data);
    }

    public function update($id_berita)
    {
        if (!$this->validate([
            'judul' => 'required',
            'isi' => 'required'
        ])) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'judul' => $this->request->getPost('judul'),
            'isi' => $this->request->getPost('isi')
        ];

        if ($this->request->getFile('gambar')->isValid()) {
            $file = $this->request->getFile('gambar');
            $namaFile = $file->getRandomName();
            $file->move('uploads/berita', $namaFile);
            $data['gambar'] = $namaFile;
        }

        $this->beritaModel->update($id_berita, $data);
        return redirect()->to('/admin/berita')->with('success', 'Berita berhasil diupdate.');
    }

    public function hapus($id_berita)
    {
        $berita = $this->beritaModel->find($id_berita);

        if ($berita && file_exists('uploads/berita/' . $berita['gambar'])) {
            unlink('uploads/berita/' . $berita['gambar']);
        }

        $this->beritaModel->delete($id_berita);
        return redirect()->to('/admin/berita')->with('success', 'Berita berhasil dihapus.');
    }
}
