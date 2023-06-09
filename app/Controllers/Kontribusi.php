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
        $data['data'] = $this->base_model->orderBy('id','DESC')->findAll();
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
                    icon: 'success',
                    title: 'Terimakasih, kontribusi Anda sedang ditinjau',
                    showConfirmButton: true,
                    })
                </script>");
            }
        }
    }

    // Superadmin
    public function update($id_encode = null)
    {
        $id = $this->env_model->decode($id_encode);
        $data = $this->base_model->find($id);

        $rules = [
            'status'    => 'required',
            'img'       => 'max_size[img,1024]|ext_in[img,png,jpg,jpeg]',
        ];
        if (! $this->validate($rules)) {
            $error_status = service('validation')->getError('status') ?? '';
            $error_img = str_replace('img,', 'gambar ', service('validation')->getError('img')) ?? '';
            $errors = $error_status . '<br>' . $error_img;
            return redirect()->to($this->base_route)
            ->with('message',
            "<script>
                Swal.fire({
                icon: 'error',
                title: '" . $errors . "',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                })
            </script>");
        }else {
            $status = $this->request->getVar('status', $this->filter);
            if ($status == 'Diterima') {
                $img = $this->request->getFile('img');
                if ($img != '') {
                    $img_name = $img->getRandomName();
                    $this->image->withFile($img)->save('assets/img/produktif/' . $img_name, 60);
                } else {
                    $img_name = '';
                }
                $field = [
                    'nama_kontributor'  => $data['nama_kontributor'],
                    'email_kontributor' => $data['email_kontributor'],
                    'id_kategori'       => $data['id_kategori'],
                    'nama'              => $data['nama'],
                    'slug'              => $data['slug'],
                    'img'               => $img_name,
                    'tautan'            => $data['tautan'],
                    'deskripsi'         => $data['deskripsi'],
                ];

                $this->produktif_model->insert($field);
                $this->base_model->delete($id);
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
