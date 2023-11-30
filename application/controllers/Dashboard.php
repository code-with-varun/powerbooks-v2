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
		$data['user_type'] = $sessdata['pbk_user_type'];
		$onboarding = $sessdata['pbk_onboarding'];
	
		$specific_user_fetch_login = $this->Users_model->specific_user_fetch_login($data);
		foreach ($specific_user_fetch_login as $row) {
			$onboarding = $row->onboarding;
		}

		$config_master_fetch = $this->Users_model->config_master_fetch($data);
		foreach ($config_master_fetch as $row) {
			$direct_billing = $row->direct_billing;
		}

		if($onboarding=='NO')
		{
			redirect('onboarding', 'location');
		}
		elseif($direct_billing=='YES' && ($data['user_type']!="ADMIN"))
		{
			redirect('billing', 'location');
		}
		else
		{
		$this->load->view('dashboard_header_view');
		$this->load->view('dashboard_top_view');
		$this->load->view('dashboard_menus_view');
		$this->load->view('dashboard_panel_view');
		$this->load->view('dashboard_bottom_view');
		$this->load->view('dashboard_footer_view');
		}
	}


	
	public function options_master()
	{

		$sessdata = $this->session->userdata('pbk_sess');
		$data['user_type'] = $sessdata['pbk_user_type'];
		
		if($data['user_type']!="SUPER ADMIN")
		{
			redirect('dashboard', 'location');
		}

		$all_options_fetch = $this->Users_model->all_options_fetch();
		$distinct_option_key = $this->Users_model->distinct_option_key();
		$distinct_option_value = $this->Users_model->distinct_option_value();
		$distinct_option_category = $this->Users_model->distinct_option_category();

		$this->load->view('dashboard_header_view');
		$this->load->view('dashboard_menus_view');
		$this->load->view('dashboard_top_view');
		$this->load->view('dashboard_options_master_view',['all_options_fetch' => $all_options_fetch,
		'distinct_option_category' => $distinct_option_category,
		'distinct_option_value' => $distinct_option_value,
		'distinct_option_key' => $distinct_option_key
		]);
		$this->load->view('dashboard_bottom_view');
		$this->load->view('dashboard_table_footer_view');
	}
		
	public function add_new_options()
	{


		 $max_options_rid_fetch = $this->Users_model->max_options_rid_fetch();
		foreach ($max_options_rid_fetch->result() as $row) {

			$MRID = $row->MRID;
		}
		$data['rid'] = $MRID + 1;
		$data['option_id']= md5($data['rid']);
		$data['option_key'] = $this->input->post('option_key');
		$data['option_value'] = $this->input->post('option_value');
		$data['category'] = $this->input->post('option_category');
		$data['merchant_id'] = 'Default';
		

		$new_option_insert = $this->Users_model->new_option_insert($data);

		redirect('options-master', 'location');

		
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

	
	public function staffing()
	{

		$sessdata = $this->session->userdata('pbk_sess');
		$data['eid'] = $sessdata['pbk_eid'];
		$data['merchant_id'] = $sessdata['pbk_merchant_id'];

		$staff_manager_fetch = $this->Users_model->staff_manager_fetch($data);
		
		
		$this->load->view('dashboard_header_view');
		$this->load->view('dashboard_top_view');
		$this->load->view('dashboard_menus_view');
		$this->load->view('dashboard_staffing_view',[
		'staff_manager_fetch'=>$staff_manager_fetch,
		
		]);
		$this->load->view('dashboard_bottom_view');
		$this->load->view('dashboard_footer_view');
	}

	public function item_master()
	{

		$sessdata = $this->session->userdata('pbk_sess');
		$data['eid'] = $sessdata['pbk_eid'];
		$data['merchant_id'] = $sessdata['pbk_merchant_id'];

		$staff_manager_fetch = $this->Users_model->staff_manager_fetch($data);
		$division_fetch = $this->Users_model->division_fetch($data);
		$category_fetch = $this->Users_model->category_fetch($data);
		$classification_fetch = $this->Users_model->classification_fetch($data);
		$product_fetch = $this->Users_model->product_fetch($data);
		$options_inventory_item_type = $this->Users_model->options_inventory_item_type();
		
		$this->load->view('dashboard_header_view');
		$this->load->view('dashboard_top_view');
		$this->load->view('dashboard_menus_view');
		$this->load->view('dashboard_item_master_view',[
		'division_fetch'=>$division_fetch,
		'category_fetch'=>$category_fetch,
		'classification_fetch'=>$classification_fetch,
		'product_fetch'=>$product_fetch,
		'options_inventory_item_type'=>$options_inventory_item_type,
		
		]);
		$this->load->view('dashboard_bottom_view');
		$this->load->view('dashboard_footer_view');
	}

	public function new_division()
	{

		$sessdata = $this->session->userdata('pbk_sess');
		$data['merchant_id'] = $sessdata['pbk_merchant_id'];

		$data['division_name']= $_POST['division_name'];
		

		$check_division_exists = $this->Users_model->check_division_exists($data);
				if ($check_division_exists == 0) 
				{
					// echo 'Unique staff';
					$max_division_id_fetch = $this->Users_model->max_division_id_fetch();
					foreach ($max_division_id_fetch as $row) 
					{
						$rid= $row->max_division;					//merchant id
						$data['rid']=$rid+1;
						$data['division_code']='DIV'.$data['rid'];
					}	

					$new_division_insert = $this->Users_model->new_division_insert($data);
				}
				redirect('item-master', 'location');
	}

	public function new_category()
	{

		$sessdata = $this->session->userdata('pbk_sess');
		$data['merchant_id'] = $sessdata['pbk_merchant_id'];

		$data['category_name']= $_POST['category_name'];
		$data['division_code']= $_POST['division_code'];
		

		$check_category_exists = $this->Users_model->check_category_exists($data);
				if ($check_category_exists == 0) 
				{
					// echo 'Unique staff';
					$max_category_id_fetch = $this->Users_model->max_category_id_fetch();
					foreach ($max_category_id_fetch as $row) 
					{
						$rid= $row->max_category;					//merchant id
						$data['rid']=$rid+1;

					}	

					$new_category_insert = $this->Users_model->new_category_insert($data);
				}
				redirect('item-master', 'location');
	}

	public function new_classification()
	{

		$sessdata = $this->session->userdata('pbk_sess');
		$data['merchant_id'] = $sessdata['pbk_merchant_id'];

		$data['classification_name']= ucwords($_POST['classification_name']);
		
		$check_classification_exists = $this->Users_model->check_classification_exists($data);
				if ($check_classification_exists == 0) 
				{
					// echo 'Unique staff';
					$max_classification_id_fetch = $this->Users_model->max_classification_id_fetch();
					foreach ($max_classification_id_fetch as $row) 
					{
						$rid= $row->max_classification;					//merchant id
						$data['rid']=$rid+1;

					}	

					$new_classification_insert = $this->Users_model->new_classification_insert($data);
				}
				redirect('item-master', 'location');
	}

	public function new_staff()
	{

		$sessdata = $this->session->userdata('pbk_sess');
		$data['eid'] = $sessdata['pbk_eid'];
		$data['merchant_id'] = $sessdata['pbk_merchant_id'];

		$username= $_POST['name'];
		 $mdata['name'] = preg_replace("/[^a-zA-Z\s]/", " ", $username);
		 $mdata['admin_mobile']=$_POST['mobile'];
		 $mdata['eid'] =$_POST['user_id'];
		 $userpass=$_POST['password'];
		 $userrepass=$_POST['confirm'];
		 $mdata['user_type']=$_POST['usertype'];		
		 $mdata['merchant_id']=$data['merchant_id'];
		 $mdata['onboarding']="YES";
		
		if($userpass==$userrepass)
		{
		    $mdata['pass']=md5($userpass);
		    
		}

		$check_mail_exists = $this->Users_model->check_mail_exists($mdata);
				if ($check_mail_exists == 0) 
				{
					// echo 'Unique staff';
					$min_staff_id_fetch = $this->Users_model->min_staff_id_fetch();
					foreach ($min_staff_id_fetch as $row) 
					{
						$rid= $row->min_staff;					//merchant id
						$mdata['staff_id']=$rid-1;
					}	
					$mdata['otp']=md5(rand(1000,9999));	
					$mdata['otp_expiry']=date('Y-m-d H:i:s',strtotime('+15 minutes',strtotime(date('Y-m-d H:i:s'))));	
					

					$new_user_details_insert = $this->Users_model->new_user_details_insert($mdata);
				}
				redirect('staffing', 'location');
	}

	
	public function item_wise_sales()
	{

		$sessdata = $this->session->userdata('pbk_sess');
		$data['eid'] = $sessdata['pbk_eid'];
		$data['merchant_id'] = $sessdata['pbk_merchant_id'];
		
		$this->load->view('dashboard_header_view');
		$this->load->view('dashboard_top_view');
		$this->load->view('dashboard_menus_view');
		$this->load->view('dashboard_itemwise_sales_view');
		$this->load->view('dashboard_bottom_view');
		$this->load->view('dashboard_footer_view');
	}

	public function IWS_reporter()
	{

		$sessdata = $this->session->userdata('pbk_sess');
		$data['eid'] = $sessdata['pbk_eid'];
		$data['merchant_id'] = $sessdata['pbk_merchant_id'];
		
		if (isset($_POST['rmerchantid'])) {
		 	$data['sdate'] = $this->input->post('sdate');
			$data['edate'] = $this->input->post('edate');

		$item_wise_check = $this->Users_model->item_wise_check($data);
		if ($item_wise_check == 1) 
		{

				echo ' <table class="table table-hover dashboard-task-infos">
				<thead>
					<tr>
						<th>SI NO</th>
						<th>DATE</th>
						<th>BILL NO</th>
						<th>BARCODE</th>
						<th>SKU</th>
						<th>PRODUCT</th>
						<th>ITEM DESCRIPTION</th>
						<th>MRP</th>
						<th>QTY</th>
						<th>AMOUNT</th>
					  
					</tr>
				</thead>
				<tbody>';



				$item_wise_sales = $this->Users_model->item_wise_sales($data);
				//var_dump($item_wise_sales);
				// echo $this->db->last_query();
				foreach ($item_wise_sales as $row) {

					$rbill_no = $row->bill_no;
					$rbarcode = $row->LD_Barcode;
					$rqty = $row->qty;
					$rsku = $row->SKU;
					$ramount = $row->amount;
					$rmrp = $row->mrp;
					$rproduct = $row->Product_Name;
					$ridiscr = $row->Item_Description;
					$rposdate = $row->pos_bill_date;

					$i=1;
					echo '
					<tr>   
					<td>'.$i.'</td>
					<td>'.$rposdate.'</td>
					<td>'.$rbill_no.'</td>
					<td>'.$rbarcode.'</td>
					<td>'.$rsku.'</td>
					<td>'.$rproduct.'</td>
					<td>'.$ridiscr.'</td>
					<td>'.$rmrp.'</td>
					<td>'.$rqty.'</td>
					<td>'.$ramount.'</td>
					
					
					
				</tr>';
$i=$i+1;	 

						echo '</div>';
				}


				echo '</tbody>
				</table>';
			}
			else
			{
				echo 'NO DATA FOUND';
			}
		} else {
			echo '<span style="color:red;"> SOMTHING WENT WRONG</span>';
		}
		
		
	 
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
		$options_group_billing = $this->Users_model->options_group_billing();
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
		'options_group_billing'=>$options_group_billing,
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
		$data['billing_group'] = $this->input->post('billing_group');
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
