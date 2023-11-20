<?php
defined('BASEPATH') or exit('No direct script access allowed');

require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;


class Dashboard extends CI_Controller
{

	public function __construct()
	{

		parent::__construct();


		// $this->load->library('session');
		if (!$this->session->has_userdata('pbk_sess')) {

			redirect('home', 'location');

			exit;
		} 
		
		
	}

	// public function blank()
	// {

	//     $this->load->view('dashboard_header_view');
	//     $this->load->view('dashboard_menus_view');
	//     $this->load->view('dashboard_top_view');
	//     $this->load->view('dashboard_blank_view');
	//     $this->load->view('dashboard_bottom_view');
	//     $this->load->view('dashboard_footer_view');
	// }

	public function error404()
	{

		$this->load->view('dashboard_header_view');
		$this->load->view('dashboard_top_view');
		$this->load->view('dashboard_menus_view');
		$this->load->view('dashboard_error404_view');
		$this->load->view('dashboard_bottom_view');
		$this->load->view('dashboard_footer_view');
	}

	public function index()
	{

		$sessdata = $this->session->userdata('pbk_sess');
		$data['eid'] = $sessdata['pbk_eid'];
		$data['merchant_id'] = $sessdata['pbk_merchant_id'];
		$data['onboarding'] = $sessdata['pbk_onboarding'];
	
		if($data['onboarding']=='NO'){
			redirect('onboarding', 'location');
			}
		else{
		$this->load->view('dashboard_header_view');
		$this->load->view('dashboard_top_view');
		$this->load->view('dashboard_menus_view');
		$this->load->view('dashboard_panel_view');
		$this->load->view('dashboard_bottom_view');
		$this->load->view('dashboard_footer_view');
		}
	}

	
	public function billing()
	{

		$sessdata = $this->session->userdata('pbk_sess');
		$data['eid'] = $sessdata['pbk_eid'];
		$data['merchant_id'] = $sessdata['pbk_merchant_id'];

		$bill_template_fetch = $this->Users_model->bill_template_fetch($data);
		
		
		$this->load->view('dashboard_header_view');
		$this->load->view('dashboard_top_view');
		$this->load->view('dashboard_menus_view');
		$this->load->view('dashboard_billing_view',[
		'bill_template_fetch'=>$bill_template_fetch,
		
		]);
		$this->load->view('dashboard_bottom_view');
		$this->load->view('dashboard_footer_view');
	}

	
	public function onboarding()
	{

		$sessdata = $this->session->userdata('pbk_sess');
		$data['eid'] = $sessdata['pbk_eid'];
		$data['merchant_id'] = $sessdata['pbk_merchant_id'];


		$options_business_structure = $this->Users_model->options_business_structure();
		$options_industry = $this->Users_model->options_industry();
		$options_business_category = $this->Users_model->options_business_category();
		$options_business_model = $this->Users_model->options_business_model();
		$options_invoice_print_type = $this->Users_model->options_invoice_print_type();
		$options_membership = $this->Users_model->options_membership();

		$this->load->view('dashboard_header_view');
		$this->load->view('dashboard_top_view');
		$this->load->view('dashboard_menus_view');
		$this->load->view('dashboard_onboarding_view',[
		'options_business_structure'=>$options_business_structure,
		'options_industry'=>$options_industry,
		'options_business_category'=>$options_business_category,
		'options_business_model'=>$options_business_model,
		'options_invoice_print_type'=>$options_invoice_print_type,
		'options_membership'=>$options_membership,	
		]);
		$this->load->view('dashboard_bottom_view');
		$this->load->view('dashboard_footer_view');
	}

	public function settings()
	{

		$sessdata = $this->session->userdata('pbk_sess');
		$data['eid'] = $sessdata['pbk_eid'];
		$data['merchant_id'] = $sessdata['pbk_merchant_id'];

		$config_master_fetch = $this->Users_model->config_master_fetch($data);

		$this->load->view('dashboard_header_view');
		$this->load->view('dashboard_top_view');
		$this->load->view('dashboard_menus_view');
		$this->load->view('dashboard_settings_view',[
		'config_master_fetch'=>$config_master_fetch,
		
		]);
		$this->load->view('dashboard_bottom_view');
		$this->load->view('dashboard_footer_view');
	}
	


	// Dashboard controller class ends
}
