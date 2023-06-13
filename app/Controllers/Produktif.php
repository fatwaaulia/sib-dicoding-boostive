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
        $data['data'] = $this->base_model->orderBy('id','DESC')->findAll();
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
            'img'           => 'max_size[img,1024]|ext_in[img,png,jpg,jpeg]',
            'tautan'        => 'required',
            'deskripsi'     => 'required',
        ];
        if (! $this->validate($rules)) {
            return redirect()->back()->withInput();
        }else {
            $img = $this->request->getFile('img');
            if ($img != '') {
                $img_name = $img->getRandomName();
                $this->image->withFile($img)->save('assets/img/' . $this->base_name . '/' . $img_name, 60);
            } else {
                $img_name = '';
            }
            $nama = trim($this->request->getVar('nama', $this->filter));
            $slug = $this->env_model->slug($nama);
            $field = [
                'nama_kontributor'  => $this->user_session['nama'],
                'email_kontributor' => $this->user_session['email'],
                'id_kategori'       => $this->request->getVar('id_kategori', $this->filter),
                'nama'              => $nama,
                'slug'              => $slug,
                'img'               => $img_name,
                'tautan'            => trim($this->request->getVar('tautan', $this->filter)),
                'deskripsi'         => $this->request->getVar('deskripsi', $this->filter),
            ];
            
            // dd($field);
            $this->base_model->insert($field);
            return redirect()->to($this->base_route)
                ->with('message',
                "<script>
                    Swal.fire({
                    icon: 'success',
                    title: 'Data berhasil ditambahkan',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    })
                </script>");
        }
    }

    public function edit($id_encode = null)
    {
        $id = $this->env_model->decode($id_encode);
        $data['data'] = $this->base_model->find($id);
        $data['base_name'] = $this->base_name;
        $data['base_route'] = $this->base_route;
        $data['title'] = 'Edit ' . ucwords(str_replace('_', ' ', $this->base_name));
        
        $data['content']   = view($this->base_name . '/edit', $data);
        $data['sidebar'] = view('dashboard/sidebar', $data);
        return view('dashboard/header', $data);

    }

    public function update($id_encode = null)
    {
        $id = $this->env_model->decode($id_encode);
        $data = $this->base_model->find($id);

        $rules = [
            'id_kategori'   => 'required',
            'nama'          => "required|is_unique[$this->base_name.nama,id,$id]",
            'img'           => 'max_size[img,1024]|ext_in[img,png,jpg,jpeg]',
            'tautan'        => 'required',
            'deskripsi'     => 'required',
        ];
        if (! $this->validate($rules)) {
            return redirect()->back()->withInput();
        }else {
            $img = $this->request->getFile('img');
            if ($img != '') {
                $file = 'assets/img/' . $this->base_name . '/' . $data['img'];
                if (is_file($file)) unlink($file);
                $img_name = $img->getRandomName();
                $this->image->withFile($img)->save('assets/img/' . $this->base_name . '/' . $img_name, 60);
            } else {
                $img_name = $data['img'];
            }
            $nama = trim($this->request->getVar('nama', $this->filter));
            $slug = $this->env_model->slug($nama);
            $field = [
                'id_kategori'       => $this->request->getVar('id_kategori', $this->filter),
                'nama'              => $nama,
                'slug'              => $slug,
                'img'               => $img_name,
                'tautan'            => trim($this->request->getVar('tautan', $this->filter)),
                'deskripsi'         => $this->request->getVar('deskripsi', $this->filter),
            ];
            
            // dd($field);
            $this->base_model->update($id, $field);
            return redirect()->to($this->base_route)
                ->with('message',
                "<script>
                    Swal.fire({
                    icon: 'success',
                    title: 'Perubahan disimpan',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    })
                </script>");
        }
    }

    public function delete($id_encode = null)
    {
        $id = $this->env_model->decode($id_encode);
        $data = $this->base_model->find($id);

        $this->base_model->delete($id);
        return redirect()->to($this->base_route)
        ->with('message',
        "<script>
            Swal.fire({
            icon: 'success',
            title: 'Data berhasil dihapus',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            })
        </script>");
    }

    public function deleteImg($id_encode = null)
    {
        $id_decode = $this->env_model->decode($id_encode);
        $data = $this->base_model->find($id_decode);

        $file = 'assets/img/' . $this->base_name . '/' . $data['img'];
        if (is_file($file)) unlink($file);

        $this->base_model->update($id_decode, ['img' => '']);
        return redirect()->to($this->base_route . '/edit/' . $id_encode)
        ->with('message',
        "<script>
            Swal.fire({
            icon: 'success',
            title: 'Gambar dihapus',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            })
        </script>");
    }
}
