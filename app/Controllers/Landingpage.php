<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Landingpage extends BaseController
{   
    public function beranda()
    {   
        $data['content'] = view('landingpage/beranda');
        return view('landingpage/header', $data);
    }

    public function produktif()
    {
        $data['title'] = 'Menu';
        
        $data['content'] = view('landingpage/produktif', $data);
        return view('landingpage/header', $data);
    }

    public function tentangKami()
    {
        $data['title'] = 'Tentang Kami';
        
        $data['content'] = view('landingpage/tentang_kami', $data);
        return view('landingpage/header', $data);
    }

    public function detailTautanProduktif()
    {
        $data['title'] = 'Tentang Kami';
        
        $data['content'] = view('landingpage/detail_tautan_produktif', $data);
        return view('landingpage/header', $data);
    }
}
