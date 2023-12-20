<?php
defined('BASEPATH') or exit('No direct script access allowed');

	
// require_once APPPATH.'../vendor/autoload.php';
// require_once '../secrets.php';

class Payments extends CI_Controller {
   
	public function index()
	{
		$this->load->library('stripe-payment');
		$this->load->view('payments_view');
	}



}
