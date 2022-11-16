<?php

namespace App\Controllers;

use App\Libraries\Hash;
use App\Models\MitraModel;
use App\Models\UserPayment;
use App\Models\UserPaymentTambal;

class MitraLogReg extends BaseController
{
    public function __construct()
    {
        $this->mitraModel = new MitraModel();
        $this->userPayment = new UserPayment();
        $this->userPaymentTambal = new UserPaymentTambal();
        $this->loggedUserID = session()->get('loggedUser');
        $this->userInfo = $this->mitraModel->find($this->loggedUserID);
    }

    public function index()
    {
        $id = $this->userInfo['id_mitra'];

        $data = [
            'title' => 'Mitra | Dashboard',
            'userInfo' => $this->userInfo,
            'history' => $this->userPayment->historySelectMitra($id),
            'historyTambal' => $this->userPaymentTambal->historySelectMitra($id),
        ];

        return view('mitra/dashboard', $data);
    }

    public function login()
    {
        $data = [
            'title' => 'Login Mitra',
        ];

        if ($this->request->getMethod() == 'post') {
            $validation = $this->validate([
                'email' => [
                    'rules' => 'required|valid_email|is_not_unique[mitra.email]',
                    'errors' => [
                        'required' => 'Email is required',
                        'valid_email' => 'Enter a valid email address',
                        'is_not_unique' => 'This email is not registered on our service'
                    ]
                ],

                'password' => [
                    'rules' => 'required|min_length[6]|max_length[12]',
                    'errors' => [
                        'required' => 'password is required',
                        'min_length' => 'Password must have atleast 6 characters in length',
                        'max_length' => 'Password must not have characters more than 12 in length'
                    ]
                ],
            ]);

            if (!$validation) {
                $data['validation'] = $this->validator;
            } else {
                $email = $this->request->getPost('email');
                $password = $this->request->getPost('password');

                $mitraModel = new \App\Models\MitraModel();
                $user_info = $mitraModel->where('email', $email)->first();
                $check_password = Hash::check($password, $user_info['password']);

                if (!$check_password) {
                    session()->setFlashdata('fail', 'Incorrect password');
                    return redirect()->to('/login')->withInput();
                } else {
                    $user_id = $user_info['id_mitra'];
                    session()->set('loggedUser', $user_id);

                    $user = $mitraModel->where('email', $this->request->getVar('email'))->first();
                    $this->data($user);
                    return $this->isActive();
                }
            }
        }

        return view('logreg/mitra/login', $data);
    }

    public function isActive()
    {
        if (session()->get('is_active') == 1) {
            return redirect()->to('/mitra/dashboard')->with('success', 'Berhasil login');
        } else {
            session()->remove(['loggedUser', 'id', 'email', 'is_active']);
            return redirect()->to('/mitra/login')->with('fail', 'Your account has not been verified');
        }
    }

    public function data($user)
    {
        $data = [
            'id_mitra' => $user['id_mitra'],
            'email' => $user['email'],
            'is_active' => $user['is_active'],
        ];

        session()->set($data);
        return true;
    }

    public function register()
    {
        $data = [
            'title' => 'Register Mitra',
        ];

        return view('logreg/mitra/register');
    }
}
