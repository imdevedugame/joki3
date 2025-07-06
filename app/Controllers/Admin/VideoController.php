<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\VideoModel;

class VideoController extends BaseController
{
    protected $videoModel;

    public function __construct()
    {
        $this->videoModel = new VideoModel();
    }

    public function index()
    {
        $data['video'] = $this->videoModel->findAll();
        return view('admin/video/index', $data);
    }

    public function tambah()
    {
        return view('admin/video/tambah');
    }

    public function simpan()
    {
        if (!$this->validate([
            'judul' => 'required',
            'link_youtube' => 'required',
            'deskripsi' => 'required'
        ])) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->videoModel->save([
            'judul' => $this->request->getPost('judul'),
            'link_youtube' => $this->request->getPost('link_youtube'),
            'deskripsi' => $this->request->getPost('deskripsi')
        ]);

        return redirect()->to('/admin/video')->with('success', 'Video berhasil ditambahkan.');
    }

    public function edit($id_video)
    {
        $data['video'] = $this->videoModel->find($id_video);
        return view('admin/video/edit', $data);
    }

    public function update($id_video)
    {
        if (!$this->validate([
            'judul' => 'required',
            'link_youtube' => 'required',
            'deskripsi' => 'required'
        ])) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->videoModel->update($id_video, [
            'judul' => $this->request->getPost('judul'),
            'link_youtube' => $this->request->getPost('link_youtube'),
            'deskripsi' => $this->request->getPost('deskripsi')
        ]);

        return redirect()->to('/admin/video')->with('success', 'Video berhasil diupdate.');
    }

    public function hapus($id_video)
    {
        $this->videoModel->delete($id_video);
        return redirect()->to('/admin/video')->with('success', 'Video berhasil dihapus.');
    }
}
