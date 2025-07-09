<?php

namespace App\Controllers;

use App\Models\BeritaModel;

class BeritaController extends BaseController
{
    public function index()
    {
        $model = new BeritaModel();
        $data['berita'] = $model->findAll();

        return view('berita/index', $data);
    }

    public function detail($id)
    {
        $model = new BeritaModel();
        $data['berita'] = $model->find($id);

        if (!$data['berita']) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        return view('berita/detail', $data);
    }
}
