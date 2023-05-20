<?php

namespace App\Models;

use CodeIgniter\Model;

class Env extends Model
{
    public function webName() {
        return 'Web App';
    }

   public function encode($id = null)
    {
        $v = (double)$id*7421952535.24;
        $encode = base64_encode($v);
        return str_replace('=','',$encode);
    }
    
    public function decode($id = null)
    {
        $v = base64_decode($id);
        $decode = (double)$v/7421952535.24;
        return str_replace('=','',$decode);
    }

    public function slug($id)
    {
        $slug = strtolower(preg_replace('~[^\pL\d]+~u', '-', $id));
        return $slug;
    }

}
