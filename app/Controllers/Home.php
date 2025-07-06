<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $paketWisataModel = new \App\Models\PaketWisataModel();
        $homestayModel = new \App\Models\HomestayModel();
        $galleryModel = new \App\Models\GalleryModel();
        $beritaModel = new \App\Models\BeritaModel();
        $videoModel = new \App\Models\VideoModel();

        // Ambil semua data
        $paket_wisata = $paketWisataModel->findAll();
        $homestays = $homestayModel->findAll();
        $galeri = $galleryModel->findAll();
        $berita = $beritaModel->findAll();
        $video = $videoModel->findAll();

        // Konversi link YouTube menjadi embed
        foreach ($video as &$v) {
            if (strpos($v['link_youtube'], 'watch?v=') !== false) {
                $v['link_youtube'] = str_replace('watch?v=', 'embed/', $v['link_youtube']);
            }
        }

        // Kirim ke view
        $data = [
            'paket_wisata' => $paket_wisata,
            'homestays' => $homestays,
            'galeri' => $galeri,
            'berita' => $berita,
            'video' => $video,
        ];

        return view('home', $data);
    }
}
