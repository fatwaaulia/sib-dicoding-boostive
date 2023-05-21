<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Produktif extends BaseController
{
    public function __construct()
    {
        $this->base_name = 'produktif';
        $this->base_model = model('Produktif');
        $this->env_model = model('Env');
    }

    public function index()
    {
        $data['data'] = $this->base_model->findAll();
        $data['base_name'] = $this->base_name;
        $data['base_route'] = $this->base_route;
        $data['title'] = 'Data ' . ucwords(str_replace('_', ' ', $this->base_name));

        $data['content'] = view($this->base_name . '/index', $data);
        $data['sidebar'] = view('dashboard/sidebar', $data);
        return view('dashboard/header', $data);
    }

    public function new()
    {
        $data['base_route'] = $this->base_route;
        $data['title'] = 'Tambah ' . ucwords(str_replace('_', ' ', $this->base_name));

        $data['content']   = view($this->base_name . '/new', $data);
        $data['sidebar'] = view('dashboard/sidebar', $data);
        return view('dashboard/header', $data);
    }

    public function create()
    {
        $rules = [
            'id_kategori'   => 'required',
            'nama'          => "required|is_unique[$this->base_name.nama]",
            'tautan'        => 'required',
            'deskripsi'     => 'required',
        ];
        if (! $this->validate($rules)) {
            return redirect()->back()->withInput();
        }else {
            $field = [
                'id_kontributor'    => $this->user_session['id'],
                'id_kategori'       => $this->request->getVar('id_kategori', $this->filter),
                'nama'              => trim($this->request->getVar('nama', $this->filter)),
                'tautan'            => trim($this->request->getVar('tautan', $this->filter)),
                'deskripsi'         => $this->request->getVar('deskripsi', $this->filter),
            ];
            
            // dd($field);
            $this->base_model->insert($field);
            return redirect()->to($this->base_route)
                ->with('message',
                "<script>
                    Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Data berhasil ditambahkan',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    })
                </script>");
        }
    }

    public function edit($id = null)
    {
        $id = $this->env_model->decode($id);
        $data['data'] = $this->base_model->find($id);
        $data['base_name'] = $this->base_name;
        $data['base_route'] = $this->base_route;
        $data['title'] = 'Edit ' . ucwords(str_replace('_', ' ', $this->base_name));
        
        $data['content']   = view($this->base_name . '/edit', $data);
        $data['sidebar'] = view('dashboard/sidebar', $data);
        return view('dashboard/header', $data);

    }

    public function update($id = null)
    {
        $id = $this->env_model->decode($id);
        $data = $this->base_model->find($id);

        $rules = [
            'id_kategori'   => 'required',
            'nama'          => "required|is_unique[$this->base_name.nama,id,$id]",
            'tautan'        => 'required',
            'deskripsi'     => 'required',
        ];
        if (! $this->validate($rules)) {
            return redirect()->back()->withInput();
        }else {
            $field = [
                'id_kategori'       => $this->request->getVar('id_kategori', $this->filter),
                'nama'              => trim($this->request->getVar('nama', $this->filter)),
                'tautan'            => trim($this->request->getVar('tautan', $this->filter)),
                'deskripsi'         => $this->request->getVar('deskripsi', $this->filter),
            ];
            
            // dd($field);
            $this->base_model->update($id, $field);
            return redirect()->to($this->base_route)
                ->with('message',
                "<script>
                    Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Perubahan disimpan',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    })
                </script>");
        }
    }

    public function delete($id = null)
    {
        $id = $this->env_model->decode($id);
        $data = $this->base_model->find($id);

        $this->base_model->delete($id);
        return redirect()->to($this->base_route)
        ->with('message',
        "<script>
            Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: 'Data berhasil dihapus',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            })
        </script>");
    }
}
