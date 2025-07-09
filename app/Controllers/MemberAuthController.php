<?php

namespace App\Controllers;

use App\Models\MemberModel;
use Google\Client as Google_Client;
use Google\Service\Oauth2 as Google_Service_Oauth2;

class MemberAuthController extends BaseController
{
    public function login()
    {
        return view('auth/v_login_member');
    }

    public function register()
    {
        return view('auth/v_register_member');
    }

    public function registerProses()
    {
        $model = new MemberModel();

        $data = [
            'nama' => $this->request->getPost('nama'),
            'email' => $this->request->getPost('email'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_BCRYPT),
            'no_hp' => $this->request->getPost('no_hp'),
            'alamat' => $this->request->getPost('alamat'),
            'foto' => 'default.jpg'
        ];

        // Validasi email sudah terdaftar
        if ($model->where('email', $data['email'])->first()) {
            return redirect()->back()->with('error', 'Email sudah terdaftar.');
        }

        $model->insert($data);
        return redirect()->to('/')->with('success', 'Registrasi berhasil. Silakan login.');
    }

    public function loginProses()
    {
        $session = session();
        $model = new MemberModel();
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $member = $model->where('email', $email)->first();

        if ($member) {
            if (password_verify($password, $member['password'])) {
                $session->set([
                    'id_member' => $member['id_member'],
                    'nama' => $member['nama'],
                    'email' => $member['email'],
                    'logged_in_member' => true
                ]);
                return redirect()->to('/'); // redirect ke halaman home
            } else {
                return redirect()->back()->with('error', 'Password salah.');
            }
        } else {
            return redirect()->back()->with('error', 'Email tidak ditemukan.');
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/'); // Redirect ke halaman home
    }


    // ===================== LOGIN GOOGLE =====================
    public function loginGoogle()
    {
        $client = new Google_Client();
        $client->setClientId('896655596211-d7ddaa0191o7gqsgkmfaf8jit261dael.apps.googleusercontent.com');
        $client->setClientSecret('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');
        $client->setRedirectUri(base_url('login-google-callback'));
        $client->addScope("email");
        $client->addScope("profile");

        return redirect()->to($client->createAuthUrl());
    }

    public function loginGoogleCallback()
    {
        $client = new Google_Client();
        $client->setClientId('896655596211-d7ddaa0191o7gqsgkmfaf8jit261dael.apps.googleusercontent.com');
        $client->setClientSecret('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');
        $client->setRedirectUri(base_url('login-google-callback'));

        if ($this->request->getGet('code')) {
            $token = $client->fetchAccessTokenWithAuthCode($this->request->getGet('code'));

            // Cek jika token error
            if (isset($token['error'])) {
                return redirect()->to('/login-member')->with('error', 'Login Google gagal.');
            }

            $client->setAccessToken($token['access_token']);

            // Ambil data user dari Google
            $google_oauth = new Google_Service_Oauth2($client);
            $google_account_info = $google_oauth->userinfo->get();

            // Simpan ke database jika belum ada
            $model = new MemberModel();
            $member = $model->where('email', $google_account_info->email)->first();

            if (!$member) {
                $data = [
                    'nama' => $google_account_info->name,
                    'email' => $google_account_info->email,
                    'password' => password_hash(bin2hex(random_bytes(5)), PASSWORD_BCRYPT),
                    'no_hp' => '-',
                    'alamat' => '-',
                    'foto' => $google_account_info->picture
                ];
                $model->insert($data);
                $member = $model->where('email', $google_account_info->email)->first();
            }

            // Set session
            session()->set([
                'id_member' => $member['id_member'],
                'nama' => $member['nama'],
                'email' => $member['email'],
                'logged_in_member' => true
            ]);

            return redirect()->to('/'); // redirect ke halaman home
        }
    }
}
