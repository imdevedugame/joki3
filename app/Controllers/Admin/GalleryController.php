<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\GalleryModel;

class GalleryController extends BaseController
{
    protected $galleryModel;

    public function __construct()
    {
        $this->galleryModel = new GalleryModel();
    }

    // =================== INDEX ===================
    public function index()
    {
        $data['gallery'] = $this->galleryModel->findAll();
        return view('admin/gallery/index', $data);
    }

    // =================== TAMBAH ===================
    public function tambah()
    {
        return view('admin/gallery/tambah');
    }

    // =================== SIMPAN ===================
    public function simpan()
    {
        if (!$this->validate([
            'judul' => 'required',
            'file_gambar' => 'uploaded[file_gambar]|max_size[file_gambar,2048]|is_image[file_gambar]'
        ])) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $file = $this->request->getFile('file_gambar');
        $namaFile = $file->getRandomName();
        $file->move('uploads/gallery', $namaFile);

        $this->galleryModel->save([
            'judul' => $this->request->getPost('judul'),
            'deskripsi' => $this->request->getPost('deskripsi'),
            'file_gambar' => $namaFile
        ]);

        return redirect()->to('/admin/gallery')->with('success', 'Gallery berhasil ditambahkan.');
    }

    // =================== EDIT ===================
    public function edit($id_galeri)
    {
        $data['gallery'] = $this->galleryModel->find($id_galeri);
        return view('admin/gallery/edit', $data);
    }

    // =================== UPDATE ===================
    public function update($id_galeri)
    {
        $gallery = $this->galleryModel->find($id_galeri);

        $data = [
            'judul' => $this->request->getPost('judul'),
            'deskripsi' => $this->request->getPost('deskripsi')
        ];

        $file = $this->request->getFile('file_gambar');

        // Jika ada gambar baru diupload
        if ($file && $file->isValid() && !$file->hasMoved()) {
            // Hapus file lama
            if ($gallery && file_exists('uploads/gallery/' . $gallery['file_gambar'])) {
                unlink('uploads/gallery/' . $gallery['file_gambar']);
            }

            $namaFile = $file->getRandomName();
            $file->move('uploads/gallery', $namaFile);
            $data['file_gambar'] = $namaFile;
        }

        $this->galleryModel->update($id_galeri, $data);
        return redirect()->to('/admin/gallery')->with('success', 'Gallery berhasil diupdate.');
    }

    // =================== HAPUS ===================
    public function hapus($id_galeri)
    {
        $gallery = $this->galleryModel->find($id_galeri);

        // Hapus file gambar jika ada
        if ($gallery && file_exists('uploads/gallery/' . $gallery['file_gambar'])) {
            unlink('uploads/gallery/' . $gallery['file_gambar']);
        }

        $this->galleryModel->delete($id_galeri);
        return redirect()->to('/admin/gallery')->with('success', 'Gallery berhasil dihapus.');
    }
}
