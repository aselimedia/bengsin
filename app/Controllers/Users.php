<?php

namespace App\Controllers;

use App\Models\MitraModel;
use App\Models\UsersModel;
use App\Models\UserPayment;
use App\Models\UserPaymentTambal;

class Users extends BaseController
{
    public function __construct()
    {
        helper(['url', 'form']);
        $this->userModel = new UsersModel();
        $this->mitraModel = new MitraModel();
        $this->userPayment = new UserPayment();
        $this->userPaymentTambal = new UserPaymentTambal();
        $this->loggedUserID = session()->get('loggedUser');
        $this->userInfo = $this->userModel->find($this->loggedUserID);
    }

    public function index()
    {        
        $data = [
            'title' => 'Dashboard',
            'userInfo' => $this->userInfo,
        ];
        
        return view('users/dashboard', $data);
    }

    public function bensin()
    {
        $data = [
            'title' => 'Isi Bensin',
            'userInfo' => $this->userInfo,
            'jenisUsaha' => $this->mitraModel->jenisUsaha('Bensin'),
        ];

        if ($this->request->getMethod() == 'post') {
            $daerah = $this->request->getVar('daerah');

            if ($daerah == null) {
                return redirect()->back();
            } else {
                session()->set('daerah', $daerah);
                return $this->filter();
            }
        }

        return view('users/bensin', $data);
    }

    public function filter()
    {
        $daerah = session()->get('daerah');
        $data = [
            'title' => 'Isi Bensin',
            'userInfo' => $this->userInfo,
            'filterDaerah' => $this->mitraModel->filterDaerah($daerah, 'Bensin'),
        ];

        if ($this->mitraModel->filterDaerah($daerah, 'Bensin') == null) {
            return redirect()->to('/isi-bensin')->with('fail', 'Tidak Terdapat Bensin Yang Terdaftar Pada Daerah ' . $daerah);
        }

        return view('users/filterBensin', $data);
    }

    public function tambal()
    {
        $data = [
            'title' => 'Tambal Ban',
            'userInfo' => $this->userInfo,
            'jenisUsaha' => $this->mitraModel->jenisUsaha('Tambal Ban'),
        ];

        if ($this->request->getMethod() == 'post') {
            $daerah = $this->request->getVar('daerah');

            if ($daerah == null) {
                return redirect()->back();
            } else {
                session()->set('daerah', $daerah);
                return $this->filterTambal();
            }
        }

        return view('users/tambal', $data);
    }

    public function filterTambal()
    {
        $daerah = session()->get('daerah');
        $data = [
            'title' => 'Tambal Ban',
            'userInfo' => $this->userInfo,
            'filterDaerah' => $this->mitraModel->filterDaerah($daerah, 'Tambal Ban'),
        ];

        if ($this->mitraModel->filterDaerah($daerah, 'Tambal Ban') == null) {
            return redirect()->to('/tambal-ban')->with('fail', 'Tidak Terdapat Tambal Ban Yang Terdaftar Pada Daerah ' . $daerah);
        }

        return view('users/filterTambalBan', $data);
    }

    public function history()
    {
        $id = $this->userInfo['id'];

        $data = [
            'title' => 'History',
            'userInfo' => $this->userInfo,
            'history' => $this->userPayment->historySelect($id),
            'historyTambal' => $this->userPaymentTambal->historySelect($id),
        ];

        return view('users/history', $data);
    }

    public function account()
    {
        $data = [
            'title' => 'My Account',
            'userInfo' => $this->userInfo,
        ];

        return view('users/account', $data);
    }

    public function setting()
    {
        $data = [
            'title' => 'Setting',
            'userInfo' => $this->userInfo,
        ];

        if ($this->request->getMethod() == 'post') {
            $validation = $this->validate([
                'sampul' => [
                    'rules' => 'max_size[sampul,1024]|is_image[sampul]|mime_in[sampul,image/png,image/jpg,image/jpeg]',
                    'errors' => [
                        'max_size' => 'Ukuran gambar terlalu besar',
                        'is_image' => 'Yang anda pilih bukan gambar',
                        'mime_in' => 'Yang anda pilih bukan gambar',
                    ]
                ]
            ]);

            if (!$validation) {
                $data['validation'] = $this->validator;
            } else {
                $fileSampul = $this->request->getFile('sampul');

                if ($fileSampul->getError() == 4) {
                    $namaSampul = 'default-pict.png';
                } else {
                    $namaSampul = $fileSampul->getRandomName();
                    $fileSampul->move('assets/image', $namaSampul);
                }

                $newData = [
                    'id' => $this->userInfo['id'],
                    'name' => $this->userInfo['name'],
                    'email' => $this->userInfo['email'],
                    'image' => $namaSampul,
                ];

                $query = $this->userModel->save($newData);
                if (!$query) {
                    return redirect()->back()->with('fail', 'Something went wrong');
                } else {
                    return redirect()->to('/account/setting')->with('success', 'Uploaded Success');
                }
            }
        }

        return view('users/setting', $data);
    }

    public function historyDetail($order_id)
    {
        $data = [
            'title' => 'Detail History',
            'userHistory' => $this->userPayment->getIdHistory($order_id),
            'detailTransaction' => $this->userPayment->getDetailHistory($order_id),
            'userHistoryTambal' => $this->userPaymentTambal->getIdHistory($order_id),
            'detailTransactionTambal' => $this->userPaymentTambal->getDetailHistory($order_id),
        ];

        return view('users/historyDetail', $data);
    }

    public function tips()
    {
        $data = [
            'title' => 'Tips',
            'userInfo' => $this->userInfo,
        ];

        return view('users/tips', $data);
    }
}