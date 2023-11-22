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
		$onboarding = $sessdata['pbk_onboarding'];
	
		$specific_user_fetch_login = $this->Users_model->specific_user_fetch_login($data);
		foreach ($specific_user_fetch_login as $row) {
			$onboarding = $row->onboarding;
		}

		if($onboarding=='NO'){
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
		$options_membership_billed = $this->Users_model->options_membership_billed();

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
		'options_membership_billed'=>$options_membership_billed,	
		]);
		$this->load->view('dashboard_bottom_view');
		$this->load->view('dashboard_footer_view');
	}

	public function merchant_onboard()
	{

		$sessdata = $this->session->userdata('pbk_sess');
		
		$data['merchant_id'] = $sessdata['pbk_merchant_id'];
		$mdata['merchant_id'] = $sessdata['pbk_merchant_id'];

		$data['company_name'] = ucwords($this->input->post('company_name'));
		$data['brand_name'] = ucwords($this->input->post('brand_name'));
		$data['business_structure'] = $this->input->post('business_structure');
		$data['industry'] = $this->input->post('industry');
		$data['business_model'] = $this->input->post('business_model');
		$data['business_category'] = $this->input->post('business_category');

		$data['door_no'] = ucwords($this->input->post('door_no'));
		$data['street'] = ucwords($this->input->post('street'));
		$data['landmark'] = ucwords($this->input->post('landmark'));
		$data['area'] = ucwords($this->input->post('area'));
		$data['city'] = ucwords($this->input->post('city'));
		$data['state'] =ucwords($this->input->post('state'));
		$data['pincode'] = $this->input->post('pincode');
		$data['business_phone'] = $this->input->post('business_phone');
		$mdata['admin_mobile'] = $this->input->post('admin_mobile');
		$data['business_email'] = $this->input->post('business_email');
		$data['membership'] = $this->input->post('membership');
		$data['membership_billed'] = $this->input->post('membership_billed');

		$data['pan'] = strtoupper($this->input->post('pan'));
		$data['gstin'] = strtoupper($this->input->post('gstin'));
		
		$data['invoice_print_type'] = $this->input->post('invoice_print_type');
		$data['staging_invoice'] = $this->input->post('staging_invoice');
		$data['gst_tax_invoice'] = $this->input->post('gst_tax_invoice');
		$data['auto_day_end'] = $this->input->post('auto_day_end');
		$data['direct_billing'] = $this->input->post('direct_billing');
		$data['pos_start_date'] = $this->input->post('pos_start_date');

		$new_onboard_config_insert = $this->Users_model->new_onboard_config_insert($data);
		$onboarding_update = $this->Users_model->onboarding_update($mdata);

		redirect('dashboard', 'location');

		
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
