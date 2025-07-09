<?php

namespace App\Models;

use CodeIgniter\Model;

class VideoModel extends Model
{
    protected $table = 'video';
    protected $primaryKey = 'id_video';
    protected $allowedFields = ['judul', 'link_youtube', 'deskripsi'];
}
