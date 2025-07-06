<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class AuthController extends BaseController
{
    protected $user;

    public function __construct()
    {
        helper(['form']);
        $this->user = new UserModel();
    }

    public function login()
    {
        if (session()->get('isLoggedIn')) {
            return redirect()->to('/admin/dashboard');
        }

        if ($this->request->getMethod() === 'post') {
            $rules = [
                'username' => 'required|min_length[3]',
                'password' => 'required|min_length[3]'
            ];

            if ($this->validate($rules)) {
                $username = $this->request->getPost('username');
                $password = $this->request->getPost('password');

                $user = $this->user->where('username', $username)->first();

                if ($user && password_verify($password, $user['password'])) {
                    // set session login
                    session()->set([
                        'id_user' => $user['id_user'],
                        'username' => $user['username'],
                        'nama_lengkap' => $user['nama_lengkap'],
                        'level' => $user['level'],
                        'isLoggedIn' => true
                    ]);
                    return redirect()->to('/admin/dashboard');
                } else {
                    session()->setFlashdata('failed', 'Username atau Password salah.');
                    return redirect()->back()->withInput();
                }
            } else {
                session()->setFlashdata('failed', $this->validator->listErrors());
                return redirect()->back()->withInput();
            }
        }

        return view('auth/v_login');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login'); // sesuaikan route login jika berbeda
    }
}
