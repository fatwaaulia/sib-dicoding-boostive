<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Auth extends BaseController
{
    public function __construct()
    {
        $this->base_model = model('Users');
    }

    public function login()
    {
        if (session()->isLogin) return redirect()->to(base_url() . 'dashboard');
        $data['title'] = 'Login';

        $data['content'] = view('auth/login', $data);
        return view('dashboard/header', $data);
        
    }

    public function loginProcess()
    {
        $rules = [
            'email'     => 'required|valid_email',
            'password'  => 'required',
        ];
        if (!$this->validate($rules)) {
            return redirect()->back()->withInput();
        } else {
            $where = [
                'email'         => $this->request->getVar('email', FILTER_SANITIZE_EMAIL),
                'password'      => $this->base_model->password_hash(trim($this->request->getVar('password'))),
            ];
            
            $user = $this->base_model->where($where)->first();
            $cek = $this->base_model->getWhere($where)->getNumRows();
            if ($cek > 0) {
                if ($user['activated_at'] != '') { // SUDAH AKTIVASI
                    $session = [
                        'isLogin' => true,
                        'user'    => $user,
                    ];
                    session()->set($session);
                    return redirect()->to(base_url() . 'dashboard');
                }else { // BELUM AKTIVASI, KIRIM EMAIL EMAIL AKTIVASI
                    $where = [
                        'email' => $this->request->getVar('email', FILTER_SANITIZE_EMAIL)
                    ];
                    $user = $this->base_model->where($where)->first();
                    if ($user['email']) :
                        for (;;) {
                            $get_token = random_string('alnum', 32);
                            $cek_token = $this->base_model->getWhere(['token' => $get_token])->getNumRows();
                            if ($cek_token == 0) {
                                $this->base_model->update($user['id'], ['token' => $get_token]);
                                break;
                            }
                        }
                        $toEmail   = $user['email'];
                        $toName    = $user['nama'];
                        $subject   = 'Aktivasi Akun';
                        
                        $data['name'] = $toName;
                        $data['text'] = 'Terima kasih telah bergabung ' . model('Env')->webName() . '. Silakan aktivasi akun Anda agar dapat digunakan.';
                        $data['button_link'] = base_url() . 'account-activation/' . $get_token;
                        $data['button_name'] = 'Aktivasi Sekarang';
                        $message = view('auth/email_template', $data);

                        $email = service('email');
                        $email->setFrom($email->fromEmail, $email->fromName);
                        $email->setTo($toEmail);
                        $email->setSubject($subject);
                        $email->setMessage($message);

                        if ($email->send()) {
                            return redirect()->to(base_url() . 'login')
                            ->with('message',
                            "<script>
                                Swal.fire({
                                icon: 'info',
                                title: 'Periksa email Anda untuk aktivasi akun!',
                                })
                            </script>");
                        } else {
                            return redirect()->to(base_url() . 'login')
                            ->with('message',
                            "<script>
                                Swal.fire({
                                icon: 'info',
                                title: 'Permintaan gagal diproses, silakan coba lagi!',
                                })
                            </script>");
                        }
                    endif;
                }
            } else {
                return redirect()->to(base_url() . 'login')
                ->with('message',
                "<script>
                    Swal.fire({
                    icon: 'error',
                    title: 'Email atau password salah!',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    })
                </script>");
            }
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url() . 'login');
    }

    public function forgotPassword()
    {
        if (session()->isLogin) return redirect()->to(base_url() . 'dashboard');
        $data['title'] = 'Lupa Password';

        $data['content'] = view('auth/lupa_password', $data);
        return view('dashboard/header', $data);
    }

    public function forgotPasswordProcess()
    {
        if (!$this->validate(['email' => 'required|valid_email'])) {
            return redirect()->to(base_url() . 'forgot-password')
                ->withInput();
        } else {
            $where = [
                'email' => $this->request->getVar('email', FILTER_SANITIZE_EMAIL)
            ];
            $cek = $this->base_model->getWhere($where)->getNumRows();
            $user = $this->base_model->where($where)->first();
            if ($cek > 0) {
                for (;;) {
                    $get_token = random_string('alnum', 32);
                    $cek_token = $this->base_model->getWhere(['token' => $get_token])->getNumRows();
                    if ($cek_token == 0) {
                        $this->base_model->update($user['id'], ['token' => $get_token]);
                        break;
                    }
                }
                $toEmail    = $user['email'];
                $toName     = $user['nama'];
                $subject    = 'Permintaan Reset Password';

                $data['name'] = $toName;
                $data['text'] = 'Kata sandi Anda dapat diatur ulang dengan klik tombol di bawah. Jika Anda tidak meminta kata sandi baru, abaikan email ini.';
                $data['button_link'] = base_url() . 'reset-password/' . $get_token;
                $data['button_name'] = 'Reset Password';
                $message = view('auth/email_template', $data);

                $email = service('email');
                $email->setFrom($email->fromEmail, $email->fromName);   
                $email->setTo($toEmail);
                $email->setSubject($subject);
                $email->setMessage($message);

                if ($email->send()) {
                    return redirect()->to(base_url() . 'forgot-password')
                    ->with('message',
                    "<script>
                        Swal.fire({
                        icon: 'info',
                        title: 'Permintaan telah dikirim, Silakan periksa email Anda!',
                        })
                    </script>");
                } else {
                    return redirect()->to(base_url() . 'forgot-password')
                    ->with('message',
                    "<script>
                        Swal.fire({
                        icon: 'info',
                        title: 'Permintaan gagal diproses, silakan coba lagi!',
                        })
                    </script>");
                }
            } else {
            return redirect()->to(base_url() . 'forgot-password')
                ->with('message',
                "<script>
                    Swal.fire({
                    icon: 'error',
                    title: 'Email tidak ditemukan!',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    })
                </script>");
            }
        }
    }

    public function resetPassword($token = null)
    {
        if (session()->isLogin) return redirect()->to(base_url() . 'dashboard');
        $data['title'] = 'Reset Password';

        $cek = $this->base_model->getWhere(['token' => $token])->getNumRows();
        if ($cek > 0) {
            $data['user'] = $this->base_model->where('token', $token)->first();
            $data['content'] = view('auth/reset_password', $data);
            return view('dashboard/header', $data);
        } else {
            $data['error_msg'] = 'KODE KADALUARSA ATAU TIDAK DITEMUKAN!';
            $data['title'] = '404';
            $data['content'] = view('errors/e404', $data);
            return view('dashboard/header', $data);
        }
    }

    public function resetPasswordProcess($token = null)
    {
        $rules = [
            'password'      => 'required|min_length[8]',
            'passconf'      => 'required|min_length[8]|matches[password]',
        ];
        if (!$this->validate($rules)) {
            return redirect()->back()->withInput();
        } else {
            $user = $this->base_model->where('token', $token)->first();
            $data = [
                'password' => $this->base_model->password_hash(trim($this->request->getVar('password'))),
                'token'    => '',
            ];
            $this->base_model->update($user['id'], $data);

            $toEmail    = $user['email'];
            $toName     = $user['nama'];
            $subject    = 'Informasi Reset Password';

            $data['name'] = $toName;
            $data['text'] = 'Kata sandi Anda berhasil diatur ulang. Silakan login menggunakan kata sandi baru.';
            $data['button_link'] = base_url() . 'login';
            $data['button_name'] = 'Login';
            $message = view('auth/email_template', $data);

            $email = service('email');
            $email->setFrom($email->fromEmail, $email->fromName);   
            $email->setTo($toEmail);
            $email->setSubject($subject);
            $email->setMessage($message);
            $email->send();

            return redirect()->to(base_url() . 'login')
            ->with('message',
            "<script>
                Swal.fire({
                icon: 'success',
                title: 'Password berhasil diubah, silakan login',
                })
            </script>");
        }
    }

    public function template() 
    {
        $data['name'] = 'Kamu siapa?';
        $data['text'] = 'Ini adalah template atau layout email.';
        $data['button_link'] = base_url();
        $data['button_name'] = 'Tombol';

        return view('auth/email_template', $data);
    }

    public function SendEmail($email, $id) 
    {
        $password = '123';
        if ($id == $password) {
            $toEmail    = $email;
            $toName     = 'Kamu siapa?';
            $subject    = 'Kirim Email Berhasil';

            $data['name'] = $toName;
            $data['text'] = 'Kirim email berfungsi dengan baik, jangan lupa senyum dulu yaa:)';
            $data['button_link'] = base_url();
            $data['button_name'] = 'Tombol';
            $message = view('auth/email_template', $data);

            $email = service('email');
            $email->setFrom($email->fromEmail, $email->fromName);   
            $email->setTo($toEmail);
            $email->setSubject($subject);
            $email->setMessage($message);

            if ($email->send()) {
                return redirect()->to(base_url())
                ->with('message',
                "<script>
                    Swal.fire({
                    icon: 'info',
                    title: 'Permintaan telah dikirim, silakan periksa email Anda!',
                    })
                </script>");
            } else {
                return redirect()->to(base_url())
                ->with('message',
                "<script>
                    Swal.fire({
                    icon: 'info',
                    title: 'Permintaan gagal diproses, silakan coba lagi!',
                    })
                </script>");
            }
        } else {
            return redirect()->to(base_url())
            ->with('message',
            "<script>
                Swal.fire({
                icon: 'error',
                title: 'Gagal validasi!',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                })
            </script>");
        }
    }
}
