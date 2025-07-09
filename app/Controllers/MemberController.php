<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\MemberModel;

class MemberController extends BaseController
{
    public function profil()
    {
        $memberModel = new MemberModel();
        $member = $memberModel->find(session('id_member'));

        return view('member/profil', ['member' => $member]);
    }

    public function updatePassword()
    {
        $memberModel = new MemberModel();
        $id = session('id_member');

        $passwordLama = $this->request->getPost('password_lama');
        $passwordBaru = $this->request->getPost('password_baru');

        $member = $memberModel->find($id);

        if (!password_verify($passwordLama, $member['password'])) {
            return redirect()->back()->with('failed', 'Password lama salah.');
        }

        $memberModel->update($id, [
            'password' => password_hash($passwordBaru, PASSWORD_DEFAULT)
        ]);

        return redirect()->back()->with('success', 'Password berhasil diubah.');
    }
}
