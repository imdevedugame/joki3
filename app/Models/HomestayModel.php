<?php

namespace App\Models;

use CodeIgniter\Model;

class HomestayModel extends Model
{
    protected $table = 'homestay';
    protected $primaryKey = 'id_homestay';
    protected $allowedFields = ['nama_homestay', 'deskripsi', 'harga','kapasitas' , 'foto'];
}
