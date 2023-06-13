<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Users extends BaseController
{
    public function __construct()
    {
        $this->base_name = 'users';
        $this->base_model = model('Users');
        $this->env_model = model('Env');
    }

    public function index()
    {
        $data['data'] = $this->base_model->orderBy('id_role','ESC')->findAll();
        $data['base_name'] = $this->base_name;
        $data['base_route'] = $this->base_route;
        $data['title'] = 'Data Pengguna';

        $data['content'] = view($this->base_name . '/index', $data);
        $data['sidebar'] = view('dashboard/sidebar', $data);
        return view('dashboard/header', $data);
    }

    public function edit($id_encode = null)
    {
        $id = $this->env_model->decode($id_encode);
        $data['data'] = $this->base_model->find($id);
        $data['base_name'] = $this->base_name;
        $data['base_route'] = $this->base_route;
        $data['title'] = 'Edit Pengguna';

        $data['content'] = view($this->base_name . '/edit', $data);
        $data['sidebar'] = view('dashboard/sidebar', $data);
        return view('dashboard/header', $data);
    }

    public function update($id_encode = null)
    {
        $id = $this->env_model->decode($id_encode);
        $data = $this->base_model->find($id);

        $password = trim($this->request->getVar('password'));
        $passconf = trim($this->request->getVar('passconf'));
        if ($password == '' && $passconf == '') {
            $matches = 'string';
        } elseif ($password == '' || $passconf == '') {
            $matches = 'required|min_length[8]|matches[password]';
        } elseif ($password != '' && $passconf != '') {
            $matches = 'required|min_length[8]|matches[password]';
        }
        $telp = $this->request->getVar('telp', $this->filter);
        if ($telp) {
            $rule_telp = "numeric|min_length[10]|max_length[15]|is_unique[$this->base_name.telp,id,$id]";
        } else {
            $rule_telp = 'string';
        }
        $rules = [
            'id_role'       => 'required',
            'nama'          => 'required',
            'passconf'      => $matches,
            'jenis_kelamin' => 'required',
            'img'           => 'max_size[img,1024]|ext_in[img,png,jpg,jpeg]',
            'alamat'        => 'max_length[255]',
            'telp'          => $rule_telp,
        ];
        if (!$this->validate($rules)) {
            return redirect()->back()->withInput();
        } else {
            $img = $this->request->getFile('img');
            if ($img != '') {
                $file = 'assets/img/' . $this->base_name . '/' . $data['img'];
                if (is_file($file)) unlink($file);
                $img_name = $img->getRandomName();
                $this->image->withFile($img)->save('assets/img/' . $this->base_name . '/' . $img_name, 60);
            } else {
                $img_name = $data['img'];
            }

            $field = [
                'id_role'       => $this->request->getVar('id_role', $this->filter),
                'nama'          => trim($this->request->getVar('nama', $this->filter)),
                'password'      => $password != '' ? $this->base_model->password_hash($password) : $data['password'],
                'jenis_kelamin' => $this->request->getVar('jenis_kelamin', $this->filter),
                'img'           => $img_name,
                'alamat'        => trim($this->request->getVar('alamat', $this->filter)),
                'telp'          => $this->request->getVar('telp', $this->filter),
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

        $file = 'assets/img/' . $this->base_name . '/' . $data['img'];
        if (is_file($file)) unlink($file);

        // die;
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
        $id = $this->env_model->decode($id_encode);
        $data = $this->base_model->find($id);

        $file = 'assets/img/' . $this->base_name . '/' . $data['img'];
        if (is_file($file)) unlink($file);

        $this->base_model->update($id, ['img' => '']);
        return redirect()->to($this->base_route . '/edit/' . $id_encode)
        ->with('message',
        "<script>
            Swal.fire({
            icon: 'success',
            title: 'Foto profil dihapus',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            })
        </script>");
    }

    // PROFILE
    public function profile()
    {
        $id = $this->user_session['id'];
        $data['data'] = $this->base_model->find($id);
        $data['base_name'] = $this->base_name;
        $data['base_route'] = $this->base_route;
        $data['title'] = 'Profil - ' . $data['data']['nama'];

        $data['content'] = view($this->base_name . '/profile', $data);
        $data['sidebar'] = view('dashboard/sidebar', $data);
        return view('dashboard/header', $data);
    }

    public function updateProfile()
    {
        $id = $this->user_session['id'];
        $data = $this->base_model->find($id);

        $telp = $this->request->getVar('telp', $this->filter);
        if ($telp) {
            $rule_telp = "numeric|min_length[10]|max_length[15]|is_unique[$this->base_name.telp,id,$id]";
        } else {
            $rule_telp = 'string';
        }
        $rules = [
            'nama'          => 'required',
            'jenis_kelamin' => 'required',
            'img'           => 'max_size[img,1024]|ext_in[img,png,jpg,jpeg]',
            'alamat'        => 'max_length[255]',
            'telp'          => $rule_telp,
        ];
        if (!$this->validate($rules)) {
            return redirect()->back()->withInput();
        } else {
            $img = $this->request->getFile('img');
            if ($img != '') {
                $file = 'assets/img/' . $this->base_name . '/' . $data['img'];
                if (is_file($file)) unlink($file);
                $img_name = $img->getRandomName();
                $this->image->withFile($img)->save('assets/img/' . $this->base_name . '/' . $img_name, 60);
            } else {
                $img_name = $data['img'];
            }

            $field = [
                'nama'          => trim($this->request->getVar('nama', $this->filter)),
                'jenis_kelamin' => $this->request->getVar('jenis_kelamin', $this->filter),
                'img'           => $img_name,
                'alamat'        => trim($this->request->getVar('alamat', $this->filter)),
                'telp'          => $this->request->getVar('telp', $this->filter),
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

    public function updatePassword($id_encode = null)
    {
        $id = $this->user_session['id'];
        $data = $this->base_model->find($id);

        $oldpass = trim($this->request->getVar('oldpass'));
        $password = trim($this->request->getVar('password'));
        $passconf = trim($this->request->getVar('passconf'));
        if (
            !empty($oldpass && $password && $passconf)
            && strlen($password) >= 8
            && strlen($passconf) >= 8
        ) {
            // Tidak ada yang kosong dan >= 8
            if (($data['password'] == $this->base_model->password_hash($oldpass)) && ($password == $passconf)) {
                // True
                $field = [
                    'password'   => $this->base_model->password_hash($password),
                ];
                $this->base_model->update($id, $field);
                session()->remove(['isLogin', 'user']);
                return redirect()->to(base_url('login'))
                ->with('message',
                "<script>
                    Swal.fire({
                    icon: 'success',
                    title: 'Password berhasil diubah, silahkan login kembali',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    })
                </script>");
            } else {
                // False
                return redirect()->to($this->base_route)
                ->with('message',
                "<script>
                    Swal.fire({
                    icon: 'error',
                    title: 'Password saat ini salah!',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    })
                </script>");
            }
        } else {
            // Tidak memenuhi ketentuan
            return redirect()->to($this->base_route)
            ->with('message',
            "<script>
                Swal.fire({
                icon: 'error',
                title: 'Password setidaknya harus berisi 8 karakter!',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                })
            </script>");
        }
    }

    public function deleteProfileImg()
    {
        $id = $this->user_session['id'];
        $data = $this->base_model->find($id);

        $file = 'assets/img/' . $this->base_name . '/' . $data['img'];
        if (is_file($file)) unlink($file);

        // die;
        $this->base_model->update($id, ['img' => '']);
        return redirect()->to($this->base_route)
        ->with('message',
        "<script>
            Swal.fire({
            icon: 'success',
            title: 'Foto profil dihapus',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            })
        </script>");
    }
}
