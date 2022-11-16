<?php

namespace App\Controllers;

use App\Libraries\Veritrans;

class transaction extends BaseController
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
		$params = ['server_key' => 'your_server_key', 'production' => false];
		$this->libraries = new Veritrans;
		$this->config = Veritrans::config($params);
		helper(['url', 'form']);
	}

	public function index()
	{
		return view('transaction');
	}

	public function process()
	{
		$order_id = $this->request->getVar('order_id');
		$action = $this->request->getVar('action');
		switch ($action) {
			case 'status':
				$this->status($order_id);
				break;
			case 'approve':
				$this->approve($order_id);
				break;
			case 'expire':
				$this->expire($order_id);
				break;
			case 'cancel':
				$this->cancel($order_id);
				break;
		}
	}

	public function status($order_id)
	{
		echo 'test get status </br>';
		print_r(Veritrans::status($order_id));
	}

	public function cancel($order_id)
	{
		echo 'test cancel trx </br>';
		echo Veritrans::cancel($order_id);
	}

	public function approve($order_id)
	{
		echo 'test get approve </br>';
		print_r(Veritrans::approve($order_id));
	}

	public function expire($order_id)
	{
		echo 'test get expire </br>';
		print_r(Veritrans::expire($order_id));
	}
}
