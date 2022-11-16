<?php

namespace App\Controllers;

use App\Libraries\Midtrans;
use App\Models\UsersModel;
use App\Models\MitraModel;

header('Access-Controll-Allow-Origin: *');
header('Access-Controll-Allow-Methods: GET, OPTIONS');

class snap extends BaseController
{
    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -  
     * 		http://example.com/index.php/welcome/index
     *	- or -
     * Since this controller is set as the default controller in 
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see http://codeigniter.com/user_guide/general/urls.html
     */


    public function __construct()
    {
        $params = ['server_key' => 'SB-Mid-server-DkcnfBaZymRatOLBvKkLnyCt', 'production' => false];
        $this->libraries = new Midtrans;
        $this->config = Midtrans::config($params);
        helper(['url', 'form']);
        $this->userModel = new UsersModel();
        $this->mitraModel = new MitraModel();
        $this->loggedUserID = session()->get('loggedUser');
        $this->userInfo = $this->userModel->find($this->loggedUserID);
    }

    // -------------------BENSIN----------------------//

    public function bensinDetail($slug)
    {
        $data = [
            'title' => 'Detail',
            'userInfo' => $this->userInfo,
            'bensin' => $this->mitraModel->getBensin($slug),
            'detailBensin' => $this->mitraModel->detailBensin($slug),
        ];

        if ($this->request->getMethod() == 'post') {
            $validation = $this->validate([
                'jmlliter' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Please enter how many liters you want'
                    ]
                ]
            ]);

            if (!$validation) {
                $data['validation'] = $this->validator;
            } else {

                $jenis = $this->request->getVar('jenis');
                $liter = $this->request->getVar('jmlliter');
                $harga = $this->request->getVar('harga');
                $totalHarga = intval($liter) * intval($harga) + 2500;

                $newData = [
                    'id' => $this->userInfo['id'],
                    'id_mitra' => $this->request->getVar('idmitra'),
                    'jenis' => $jenis,
                    'liter' => $liter,
                    'harga' => $totalHarga,
                    'hargaSatuan' => $harga,
                    'title' => 'Isi Bensin',
                ];

                if ($jenis == 'Choose your fuel' || $totalHarga == 0) {
                    return redirect()->to('/isi-bensin/detail/' . $slug)->with('fail', 'Please choose your fuel');
                } else {
                    if ($liter > 999) {
                        return redirect()->to('/isi-bensin/detail/' . $slug)->with('fail', 'The number of liters exceeds the maximum limit');
                    } else {
                        session()->set(['userOrder' => $newData, 'slug' => $slug]);
                        return $this->infoPembelian($slug);
                    }
                }
            }
        }

        return view('users/detailBensin', $data);
    }

    public function infoPembelian($slug)
    {
        $data = [
            'title' => 'Informasi Pembelian',
            'userInfo' => $this->userInfo,
            'bensin' => $this->mitraModel->getBensin($slug),
            'detailBensin' => $this->mitraModel->detailBensin($slug),
        ];

        return view('users/informasiPembelian', $data);
    }

    //---------------TAMBAL BAN----------------//

    public function tambalDetail($slug)
    {
        $data = [
            'title' => 'Detail',
            'userInfo' => $this->userInfo,
            'tambal' => $this->mitraModel->getTambal($slug),
            'detailTambal' => $this->mitraModel->detailTambal($slug),
        ];


        if ($this->request->getMethod() == 'post') {
            $jenis = $this->request->getVar('jenis');
            $liter = $this->request->getVar('tambalban');
            $harga = $this->request->getVar('harga');
            $totalHarga = intval($harga) + 2500;

            $newData = [
                'id' => $this->userInfo['id'],
                'id_mitra' => $this->request->getVar('idmitra'),
                'jenis' => $jenis,
                'tambalban' => $liter,
                'harga' => $totalHarga,
                'hargaSatuan' => $harga,
                'liter' => '1',
                'title' => 'Tambal Ban',
            ];

            if ($jenis == 'Choose your tire type' || $totalHarga == 0) {
                return redirect()->to('/tambal-ban/detail/' . $slug)->with('fail', 'Please choose your tire type');
            } else {
                session()->set(['userOrder' => $newData, 'slug' => $slug]);
                return $this->infoPembelianTambal($slug);
            }
        }

        return view('users/detailTambal', $data);
    }

    public function infoPembelianTambal($slug)
    {
        $data = [
            'title' => 'Informasi Pembelian',
            'userInfo' => $this->userInfo,
            'tambal' => $this->mitraModel->getTambal($slug),
            'detailTambal' => $this->mitraModel->detailTambal($slug),
        ];

        return view('users/informasiPembelianTambal', $data);
    }

    //-----------------------------TOKEN--------------------------//

    public function token()
    {
        $dataOrder = session()->get('userOrder');
        $userInfo = $this->userInfo;

        $totalHarga = $dataOrder['harga'];
        $jmlLiter = $dataOrder['liter'];
        $jenis = $dataOrder['jenis'];
        $hargaSatuan = $dataOrder['hargaSatuan'];

        $name = $userInfo['name'];
        $email = $userInfo['email'];

        // Required
        $transaction_details = [
            'order_id' => rand(),
            'gross_amount' => $totalHarga, // no decimal allowed for creditcard
        ];

        // Optional
        $item1_details = [
            'id' => 'a1',
            'price' => $hargaSatuan,
            'quantity' => $jmlLiter,
            'name' => $jenis
        ];

        $item2_details = [
            'id' => 'a1',
            'price' => 2500,
            'quantity' => 1,
            'name' => 'Admin'
        ];

        // Optional
        $item_details = [$item1_details, $item2_details];

        // Optional
        // $billing_address = [
        //     'first_name'    => "Andri",
        //     'last_name'     => "Litani",
        //     'address'       => "Mangga 20",
        //     'city'          => "Jakarta",
        //     'postal_code'   => "16602",
        //     'phone'         => "081122334455",
        //     'country_code'  => 'IDN'
        // ];

        // // Optional
        // $shipping_address = [
        //     'first_name'    => "Obet",
        //     'last_name'     => "Supriadi",
        //     'address'       => "Manggis 90",
        //     'city'          => "Jakarta",
        //     'postal_code'   => "16601",
        //     'phone'         => "08113366345",
        //     'country_code'  => 'IDN'
        // ];

        // // Optional
        $customer_details = [
            'first_name'    => $name,
            'email'         => $email,
        ];

        // Data yang akan dikirim untuk request redirect_url.
        $credit_card['secure'] = true;
        //ser save_card true to enable oneclick or 2click
        //$credit_card['save_card'] = true;

        $time = time();
        $custom_expiry = [
            'start_time' => date("Y-m-d H:i:s O", $time),
            'unit' => 'hours',
            'duration'  => 2
        ];

        $transaction_data = [
            'transaction_details' => $transaction_details,
            'item_details'       => $item_details,
            'customer_details'   => $customer_details,
            'credit_card'        => $credit_card,
            'expiry'             => $custom_expiry
        ];

        error_log(json_encode($transaction_data));
        $snapToken = Midtrans::getSnapToken($transaction_data);
        error_log($snapToken);
        echo $snapToken;
    }

    public function finish()
    {
        $dataOrder = session()->get('userOrder');
        $userInfo = $this->userInfo;

        $result = json_decode($this->request->getVar('result_data'), true);
        $dataPayment = [
            'order_id' => $result['order_id'],
            'gross_amount' => $result['gross_amount'],
            'payment_type' => $result['payment_type'],
            'transaction_time' => $result['transaction_time'],
            'bank' => $result['va_numbers'][0]['bank'],
            'va_number' => $result['va_numbers'][0]['va_number'],
            'pdf_url' => $result['pdf_url'],
            'status_code' => $result['status_code'],
        ];

        // dd($dataPayment);
        $userPayment = new \App\Models\UserPayment();
        $userPaymentTambal = new \App\Models\UserPaymentTambal();
        $payment = new \App\Models\Payment();

        if ($dataOrder['title'] == 'Tambal Ban') {
            $newDataOrder = [
                'id' => $dataOrder['id'],
                'id_mitra' => $dataOrder['id_mitra'],
                'jenis' => $dataOrder['jenis'],
                'tambalban' => $dataOrder['tambalban'],
                'tgl' => time(),
                'order_id' => $result['order_id'],
            ];

            $queryUser = $userPaymentTambal->insert($newDataOrder);
            $queryPayment = $payment->insert($dataPayment);

            if (!$queryUser && !$queryPayment) {
                return redirect()->back()->with('fail', 'Something went wrong');
            } else {
                return redirect()->to('/history/' . $result['order_id'])->with('success', 'Silahkan selesaikan pembayaran');
            }
        } elseif ($dataOrder['title'] == 'Isi Bensin') {
            $newData = [
                'id' => $dataOrder['id'],
                'id_mitra' => $dataOrder['id_mitra'],
                'jenis' => $dataOrder['jenis'],
                'liter' => $dataOrder['liter'],
                'tgl' => time(),
                'order_id' => $result['order_id'],
            ];

            $queryUser = $userPayment->insert($newData);
            $queryPayment = $payment->insert($dataPayment);

            if (!$queryUser && !$queryPayment) {
                return redirect()->back()->with('fail', 'Something went wrong');
            } else {
                return redirect()->to('/history/' . $result['order_id'])->with('success', 'Silahkan selesaikan pembayaran');
            }
        }
    }
}
