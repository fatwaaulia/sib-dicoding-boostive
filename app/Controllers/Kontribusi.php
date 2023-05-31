<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Kontribusi extends BaseController
{
    public function __construct()
    {
        $this->base_name = 'kontribusi';
        $this->base_model = model('Kontribusi');
        $this->env_model = model('Env');
        $this->produktif_model = model('Produktif');
    }

    public function statusKontribusi()
    {
        $data['title'] = 'Status Kontribusi';
        
        $data['content'] = view('landingpage/status_kontribusi', $data);
        return view('landingpage/header', $data);
    }

    public function index()
    {
        $data['data'] = $this->base_model->findAll();
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
        return view('landingpage/header', $data);
    }

    public function create()
    {
        $rules = [
            'nama_kontributor'  => 'required',
            'email_kontributor' => 'required|valid_email',
            'id_kategori'       => 'required',
            'nama'              => "required|is_unique[$this->base_name.nama]",
            'tautan'            => 'required',
            'deskripsi'         => 'required',
            'input_penjumlahan' => 'required',
        ];
        if (! $this->validate($rules)) {
            return redirect()->back()->withInput();
        }else {
            $angka_pertama = $this->request->getVar('angka_pertama', $this->filter);
            $angka_kedua = $this->request->getVar('angka_kedua', $this->filter);
            $input_penjumlahan = $this->request->getVar('input_penjumlahan', $this->filter);
            $jawaban_penjumlahan = (int)$angka_pertama + (int)$angka_kedua;

            if ((int)$input_penjumlahan !== $jawaban_penjumlahan) {
                return redirect()->to($this->base_route)
                ->with('message',
                "<script>
                    Swal.fire({
                    position: 'top-end',
                    icon: 'error',
                    title: 'Jawaban penjumlahan kamu kurang tepat!',
                    showConfirmButton: true,
                    })
                </script>");
            } else {
                $nama = trim($this->request->getVar('nama', $this->filter));
                $slug = $this->env_model->slug($nama);
                $field = [
                    'nama_kontributor'  => $this->request->getVar('nama_kontributor', $this->filter),
                    'email_kontributor' => $this->request->getVar('email_kontributor', $this->filter),
                    'id_kategori'       => $this->request->getVar('id_kategori', $this->filter),
                    'nama'              => $nama,
                    'slug'              => $slug,
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
                    title: 'Terimakasih, kontribusi Anda sedang ditinjau',
                    showConfirmButton: true,
                    })
                </script>");
            }
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
                $this->base_model->delete($id);
                $field = [
                    'nama_kontributor'  => $data['nama_kontributor'],
                    'email_kontributor' => $data['email_kontributor'],
                    'id_kategori'       => $data['id_kategori'],
                    'nama'              => $data['nama'],
                    'slug'              => $data['slug'],
                    'tautan'            => $data['tautan'],
                    'deskripsi'         => $data['deskripsi'],
                ];
                $this->produktif_model->insert($field);
            } else {
                $field = [
                    'status' => $status,
                ];
                $this->base_model->update($id, $field);
            }
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
