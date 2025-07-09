<?php

namespace App\Models;

use CodeIgniter\Model;

class MemberModel extends Model
{
    protected $table = 'member';
    protected $primaryKey = 'id_member';
    protected $allowedFields = ['nama', 'email', 'password', 'no_hp', 'alamat', 'foto'];
}
