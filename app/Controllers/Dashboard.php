<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Dashboard extends BaseController
{   
    public function dashboard()
    {
        $data['title'] = 'Dashboard';
        
        $data['user'] = $this->user_session;
        if ($data['user']['id_role'] == 1) {
            $data['content'] = view('dashboard/superadmin', $data);
        } elseif ($data['user']['id_role'] == 2) {
            $data['content'] = view('dashboard/admin', $data);
        } elseif ($data['user']['id_role'] == 3) {
            $data['content'] = view('dashboard/started', $data);
        }
        $data['sidebar'] = view('dashboard/sidebar', $data);
        return view('dashboard/header', $data);
    }
}
