<?php

namespace App\Controllers;

use App\Models\PaketWisataModel;

class WisataMemberController extends BaseController
{
    public function index()
    {
        $model = new PaketWisataModel();
        $data['wisata'] = $model->findAll();
        return view('frontend/v_wisata', $data); // buat nanti
    }
}
