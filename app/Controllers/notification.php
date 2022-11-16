<?php

namespace App\Controllers;

use App\Libraries\Veritrans;
use App\Models\Payment;
use CodeIgniter\HTTP\RequestInterface;

class notification extends BaseController
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
        $this->libraries = new Veritrans;
        $this->config = Veritrans::config($params);
        helper(['url', 'form']);
        $this->payment = new \App\Models\Payment();
    }

    public function index()
    {
        echo 'test notification handler';
        $json_result = file_get_contents('php://input');
        $result = json_decode($json_result, true);

        if ($result) {
            $notif = Veritrans::status($result['order_id']);
        }

        $transaction = $notif->transaction_status;
        $status_code = $notif->status_code;
        $order_id = $notif->order_id;
        $data = [
            'order_id' => $order_id,
            'status_code' => $status_code,
        ];

        if ($transaction == 'settlement') {
            if ($status_code == '200') {
                return $this->payment->save($data);
            }
        } else if ($transaction == 'pending') {
            if ($status_code == '201') {
                return $this->payment->save($data);
            }
        } else if ($transaction == 'deny') {
            if ($status_code == '202') {
                return $this->payment->save($data);
            }
        }

        error_log(print_r($result, TRUE));
    }
}
