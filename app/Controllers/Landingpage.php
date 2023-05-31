<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Landingpage extends BaseController
{   
    public function beranda()
    {   
        $data['content'] = view('landingpage/beranda');
        $data['navbar_footer'] = view('landingpage/navbar_footer', $data);
        return view('landingpage/header', $data);
    }

    public function produktif()
    {
        $data['title'] = 'Produktif';
        
        $data['content'] = view('landingpage/produktif', $data);
        $data['navbar_footer'] = view('landingpage/navbar_footer', $data);
        return view('landingpage/header', $data);
    }

    public function kategoriProduktif($kategori)
    {
        $data['title'] = 'Kategori Produktif - ' . $kategori;
        
        $data['content'] = view('landingpage/kategori_produktif', $data);
        $data['navbar_footer'] = view('landingpage/navbar_footer', $data);
        return view('landingpage/header', $data);
    }

    public function detailProduktif()
    {
        $data['title'] = 'Detail Produktif';
        
        $data['content'] = view('landingpage/detail_produktif', $data);
        $data['navbar_footer'] = view('landingpage/navbar_footer', $data);
        return view('landingpage/header', $data);
    }

    public function tentangKami()
    {
        $data['title'] = 'Tentang Kami';
        
        $data['content'] = view('landingpage/tentang_kami', $data);
        $data['navbar_footer'] = view('landingpage/navbar_footer', $data);
        return view('landingpage/header', $data);
    }
}
