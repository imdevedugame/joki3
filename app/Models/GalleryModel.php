<?php

namespace App\Models;

use CodeIgniter\Model;

class GalleryModel extends Model
{
    protected $table = 'galeri';
    protected $primaryKey = 'id_galeri';
    protected $allowedFields = ['judul', 'file_gambar', 'deskripsi'];
}
