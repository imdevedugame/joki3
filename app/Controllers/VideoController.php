<?php

namespace App\Controllers;

use App\Models\VideoModel;

class VideoController extends BaseController
{
    public function index()
    {
        $videoModel = new VideoModel();
        $data['videos'] = $videoModel->findAll();

        return view('video/index', $data);
    }
}
