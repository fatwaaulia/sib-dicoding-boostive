<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Kontribusi extends BaseController
{
    public function __construct()
    {
        $this->base_name = 'kontribusi';
        $this->base_name_2 = 'produktif';
        $this->base_model = model('Produktif');
        $this->env_model = model('Env');
    }

    public function index()
    {
        $where = [
            'accepted_at' => null,
            'status !='   => 'Diterima'
        ];
        $data['data'] = $this->base_model->where($where)->findAll();
        $data['base_name'] = $this->base_name;
        $data['base_route'] = $this->base_route;
        $data['title'] = 'Data Kontribusi';

        $data['content'] = view($this->base_name . '/index', $data);
        $data['sidebar'] = view('dashboard/sidebar', $data);
        return view('dashboard/header', $data);
    }

    public function new()
    {
        $data['title'] = 'Formulir Kontribusi';
        
        $data['content'] = view('landingpage/formulir_kontribusi', $data);
        // $data['navbar_footer'] = view('landingpage/navbar_footer', $data);
        return view('landingpage/header', $data);
    }

    public function create()
    {
        $rules = [
            'nama_kontributor'  => 'required',
            'email_kontributor' => 'required|valid_email',
            'id_kategori'       => 'required',
            'nama'              => "required|is_unique[$this->base_name_2.nama]",
            'tautan'            => 'required',
            'deskripsi'         => 'required',
        ];
        if (! $this->validate($rules)) {
            return redirect()->back()->withInput();
        }else {
            $field = [
                'nama_kontributor'  => $this->request->getVar('nama_kontributor', $this->filter),
                'email_kontributor' => $this->request->getVar('email_kontributor', $this->filter),
                'id_kategori'       => $this->request->getVar('id_kategori', $this->filter),
                'nama'              => trim($this->request->getVar('nama', $this->filter)),
                'tautan'            => trim($this->request->getVar('tautan', $this->filter)),
                'deskripsi'         => $this->request->getVar('deskripsi', $this->filter),
                'status'            => 'Diproses',
            ];
            
            // dd($field);
            $this->base_model->insert($field);
            return redirect()->to($this->base_route)
            ->with('message',
            "<script>
                Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: 'Formulir berhasil dikirim',
                showConfirmButton: true,
                })
            </script>");
        }
    }

    // Superadmin
    public function update($id = null)
    {
        $id = $this->env_model->decode($id);
        $data = $this->base_model->find($id);

        $rules = [
            'status'    => 'required',
        ];
        if (! $this->validate($rules)) {
            return redirect()->back()->withInput();
        }else {
            $status = $this->request->getVar('status', $this->filter);
            if ($status == 'Diterima') {
                $accepted_at = date('d-m-Y H:i:s');
            } else {
                $accepted_at = null;
            }
            $field = [
                'status'        => $status,
                'accepted_at'   => $accepted_at,
            ];
            
            // dd($field);
            $this->base_model->update($id, $field);
            return redirect()->to($this->base_route)
            ->with('message',
            "<script>
                Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: 'Kontribusi $status',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                })
            </script>");
        }
    }
}
