<?php

namespace App\Models;

use CodeIgniter\Model;

class Users extends Model
{
    protected $table         = 'users';
    protected $protectFields = false;
    protected $useTimestamps = true;

    public function password_hash($password = null)
    {
        return hash('SHA512', 'S3cuR1ty' . $password . 'Sys73m');
    }

}
