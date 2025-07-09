<?php

namespace App\Controllers;

use App\Models\GalleryModel;

class GalleryController extends BaseController
{
    public function index()
    {
        $model = new GalleryModel();
        $data['gallery'] = $model->findAll();

        return view('gallery/index', $data);
    }
}
