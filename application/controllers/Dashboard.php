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

	public function goods_inward()
	{

		$sessdata = $this->session->userdata('pbk_sess');
		$data['user_type'] = $sessdata['pbk_user_type'];
		$data['merchant_id'] = $sessdata['pbk_merchant_id'];

		$product_fetch = $this->Users_model->product_fetch($data);
		$config_master_fetch = $this->Users_model->config_master_fetch($data);
		$vendor_supplier_fetch = $this->Users_model->vendor_supplier_fetch($data);
		$temp_inward_master_fetch = $this->Users_model->temp_inward_master_fetch($data);

		$this->load->view('dashboard_header_view');
		$this->load->view('dashboard_menus_view');
		$this->load->view('dashboard_top_view');
		$this->load->view('dashboard_goods_inward_view',['temp_inward_master_fetch' => $temp_inward_master_fetch,
		'product_fetch' => $product_fetch,
		'vendor_supplier_fetch' => $vendor_supplier_fetch,
		'config_master_fetch' => $config_master_fetch,
		]);
		$this->load->view('dashboard_bottom_view');
		$this->load->view('dashboard_table_footer_view');
	}

	public function vendor_supplier_master()
	{

		$sessdata = $this->session->userdata('pbk_sess');
		$data['user_type'] = $sessdata['pbk_user_type'];
		$data['merchant_id'] = $sessdata['pbk_merchant_id'];

		$vendor_supplier_fetch = $this->Users_model->vendor_supplier_fetch($data);
		$options_vendor_type = $this->Users_model->options_vendor_type();
		
		
		$this->load->view('dashboard_header_view');
		$this->load->view('dashboard_menus_view');
		$this->load->view('dashboard_top_view');
		$this->load->view('dashboard_vendor_supplier_view',['vendor_supplier_fetch' => $vendor_supplier_fetch,
		'options_vendor_type' => $options_vendor_type,
		
		]);
		$this->load->view('dashboard_bottom_view');
		$this->load->view('dashboard_table_footer_view');
	}

	public function new_product()
	{

		$sessdata = $this->session->userdata('pbk_sess');
		$data['merchant_id'] = $sessdata['pbk_merchant_id'];
		
		$min_TZ_barcode_fetch = $this->Users_model->min_TZ_barcode_fetch();
		foreach ($min_TZ_barcode_fetch as $row) {

			$TZ_barcode = $row->min_TZ_barcode;
		}
		$data['TZ_barcode'] = $TZ_barcode - 1;
		if($data['TZ_barcode']==- 1){$data['TZ_barcode']=987654;}
		$data['item_type'] = $this->input->post('inventory_item_type');
		$data['barcode'] = $this->input->post('barcode');
		$data['item_name'] = $this->input->post('item_name');
		$data['item_description'] = $this->input->post('item_description');
		$data['manage_stocks'] = $this->input->post('manage_stocks');
		$data['taxable'] = $this->input->post('taxable');
		$cat_div = explode('|-|',$this->input->post('category'));
		$data['category']=$cat_div[0];
		$data['division']=$cat_div[1];
		$data['classification'] = $this->input->post('classification');
		$data['hsn_sac_code'] = $this->input->post('hsn_sac_code');
		$data['pack_code'] = $this->input->post('pack_code');
		$data['style_model_no'] = $this->input->post('style_model_no');
		$data['color_variant'] = $this->input->post('color_variant');
		$data['size_weight'] = $this->input->post('size_weight');
		$data['product_status'] ='INACTIVE';
		$data['sku'] = $data['style_model_no'].'-'.$data['color_variant'].'-'.$data['size_weight'];
		

		$new_product_insert = $this->Users_model->new_product_insert($data);

		redirect('item-master', 'location');


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

	public function goods_register()
	{

		$sessdata = $this->session->userdata('pbk_sess');
		$data['eid'] = $sessdata['pbk_eid'];
		$data['merchant_id'] = $sessdata['pbk_merchant_id'];

		$goods_register_fetch = $this->Users_model->goods_register_fetch($data);
		
		
		$this->load->view('dashboard_header_view');
		$this->load->view('dashboard_top_view');
		$this->load->view('dashboard_menus_view');
		$this->load->view('dashboard_goods_register_view',[
		'goods_register_fetch'=>$goods_register_fetch,
		
		]);
		$this->load->view('dashboard_bottom_view');
		$this->load->view('dashboard_table_footer_view');
	}

	public function goods_purchased()
	{

		$sessdata = $this->session->userdata('pbk_sess');
		$data['eid'] = $sessdata['pbk_eid'];
		$data['merchant_id'] = $sessdata['pbk_merchant_id'];

		$data['entry_no'] = $this->input->post('entry_no');

		$goods_purchased_fetch = $this->Users_model->goods_purchased_fetch($data);
		
		
		$this->load->view('dashboard_header_view');
		$this->load->view('dashboard_top_view');
		$this->load->view('dashboard_menus_view');
		$this->load->view('dashboard_goods_purchased_view',[
		'goods_purchased_fetch'=>$goods_purchased_fetch,
		
		]);
		$this->load->view('dashboard_bottom_view');
		$this->load->view('dashboard_table_footer_view');
	}

	public function item_master()
	{

		$sessdata = $this->session->userdata('pbk_sess');
		$data['eid'] = $sessdata['pbk_eid'];
		$data['merchant_id'] = $sessdata['pbk_merchant_id'];

		$staff_manager_fetch = $this->Users_model->staff_manager_fetch($data);
		$config_master_fetch = $this->Users_model->config_master_fetch($data);
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
		'config_master_fetch'=>$config_master_fetch,
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
					if($mdata['staff_id']==-1){$mdata['staff_id']==654321;}
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

	public function bill_wise_sales()
	{

		$sessdata = $this->session->userdata('pbk_sess');
		$data['eid'] = $sessdata['pbk_eid'];
		$data['merchant_id'] = $sessdata['pbk_merchant_id'];
		
		$this->load->view('dashboard_header_view');
		$this->load->view('dashboard_top_view');
		$this->load->view('dashboard_menus_view');
		$this->load->view('dashboard_billwise_sales_view');
		$this->load->view('dashboard_bottom_view');
		$this->load->view('dashboard_footer_view');
	}

	public function day_wise_sales()
	{

		$sessdata = $this->session->userdata('pbk_sess');
		$data['eid'] = $sessdata['pbk_eid'];
		$data['merchant_id'] = $sessdata['pbk_merchant_id'];
		
		$this->load->view('dashboard_header_view');
		$this->load->view('dashboard_top_view');
		$this->load->view('dashboard_menus_view');
		$this->load->view('dashboard_daywise_sales_view');
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

	public function BWS_reporter()
	{

		$sessdata = $this->session->userdata('pbk_sess');
		$data['eid'] = $sessdata['pbk_eid'];
		$data['merchant_id'] = $sessdata['pbk_merchant_id'];
		
		if (isset($_POST['rmerchantid'])) {
		 	$data['sdate'] = $this->input->post('sdate');
			$data['edate'] = $this->input->post('edate');

		$bill_wise_check = $this->Users_model->bill_wise_check($data);
		if ($bill_wise_check == 1) 
		{
			echo ' <table class="table table-hover dashboard-task-infos">
			<thead>
				<tr>
					<th>SI NO</th>
					<th>DATE</th>
					<th>BILL NO</th>
					<th>QTY</th>
					<th>AMOUNT</th>
					<th>CASH</th>
					<th>CARD</th>
					<th>OTHER</th>
					<th>TENDERED</th>
					<th>BALANCE</th>
					<th>CUSTOMER</th>
					<th>MOBILE</th>
					<th>STAFF</th>
				  
				</tr>
			</thead>
			<tbody>';

				$bill_wise_sales = $this->Users_model->bill_wise_sales($data);
				//var_dump($item_wise_sales);
				// echo $this->db->last_query();
				foreach ($bill_wise_sales as $row) {

					$rbill_no = $row->bill_no;
					$rqty = $row->qty;
					$bill_amt = $row->bill_amt;
					$cash_pay = $row->cash_pay;
					$staff_id = $row->staff_id;
					$card_pay = $row->card_pay;
					$other_pay = $row->other_pay;
					$cash_tendered = $row->cash_tendered;
					$balance_return = $row->balance_return;
					$cust_name = $row->cust_name;
					$cust_mobile = $row->cust_mobile;
					$rposdate = $row->pos_bill_date;

					$i=1;
					echo '
					<tr>   
					<td>'.$i.'</td>
					<td>'.$rposdate.'</td>
					<td>'.$rbill_no.'</td>
					<td>'.$rqty.'</td>
					<td>'.$bill_amt.'</td>
					<td>'.$cash_pay.'</td>
					<td>'.$card_pay.'</td>
					<td>'.$other_pay.'</td>
					<td>'.$cash_tendered.'</td>
					<td>'.$balance_return.'</td>
					<td>'.$cust_name.'</td>
					<td>'.$cust_mobile.'</td>
					<td>'.$staff_id.'</td>
					
					
					
					
					
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

	public function DWS_reporter()
	{

		$sessdata = $this->session->userdata('pbk_sess');
		$data['eid'] = $sessdata['pbk_eid'];
		$data['merchant_id'] = $sessdata['pbk_merchant_id'];
		
		if (isset($_POST['rmerchantid'])) {
		 	$data['sdate'] = $this->input->post('sdate');
			$data['edate'] = $this->input->post('edate');

		$day_wise_check = $this->Users_model->day_wise_check($data);
		if ($day_wise_check == 1) 
		{
			echo ' <table class="table table-hover dashboard-task-infos">
			<thead>
				<tr>
					<th>SI NO</th>
					<th>DATE</th>
					<th>GROSS BILLS</th>
					<th>GROSS QTY</th>
					<th>GROSS VALUE</th>
					<th>RETURN BILLS</th>
					<th>RETURN QTY</th>
					<th>RETURN VALUE</th>
					<th>NET BILLS</th>
					<th>NET QTY</th>
					<th>NET VALUE</th>
					<th>CASH</th>
					<th>CARD</th>
					<th>OTHERS</th>
				  
				</tr>
			</thead>
			<tbody>';

				$day_wise_sales = $this->Users_model->day_wise_sales($data);
				//var_dump($item_wise_sales);
				// echo $this->db->last_query();
				foreach ($day_wise_sales as $row) {

					$gross_bills = $row->gross_bills;
					$gross_qty = $row->gross_qty;
					$gross_value = $row->gross_value;
					$return_bills = $row->return_bills;
					$return_qty = $row->return_qty;
					$return_value = $row->return_value;
					$net_qty = $row->net_qty;
					$net_value = $row->net_value;
					$net_bills = $row->net_bills;
					$cash_pay = $row->cash_pay;
					$card_pay = $row->card_pay;
					$other_pay = $row->other_pay;
					$rposdate = $row->pos_bill_date;

					$i=1;
					echo '
					<tr>   
					<td>'.$i.'</td>
					<td>'.$rposdate.'</td>
					<td>'.$gross_bills.'</td>
					<td>'.$gross_qty.'</td>
					<td>'.$gross_value.'</td>
					<td>'.$return_bills.'</td>
					<td>'.$return_qty.'</td>
					<td>'.$return_value.'</td>
					<td>'.$net_bills.'</td>
					<td>'.$net_qty.'</td>
					<td>'.$net_value.'</td>

					<td>'.$cash_pay.'</td>
					<td>'.$card_pay.'</td>
					<td>'.$other_pay.'</td>
					
					
					
					
				</tr>';
$i=$i+1;	 

						echo '</div>';
				}


				echo '</tbody>
				<thead>
				<tr>
					<th colspan="2">TOTAL</th>
					
					<th>GROSS BILLS</th>
					<th>GROSS QTY</th>
					<th>GROSS VALUE</th>
					<th>RETURN BILLS</th>
					<th>RETURN QTY</th>
					<th>RETURN VALUE</th>
					<th>NET BILLS</th>
					<th>NET QTY</th>
					<th>NET VALUE</th>
					<th>CASH</th>
					<th>CARD</th>
					<th>OTHERS</th>
				  
				</tr>
			</thead>
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

	public function temp_goods_inward()
	{

		$sessdata = $this->session->userdata('pbk_sess');
		$data['merchant_id'] = $sessdata['pbk_merchant_id'];
		
		if (isset($_POST['TZ_barcode']))
		{
		 	$data['TZ_barcode'] = $this->input->post('TZ_barcode');
			$specific_item_fetch = $this->Users_model->specific_item_fetch($data);
			foreach ($specific_item_fetch as $row)
			{
			$sku=$row->sku;
			}
			$data['sku']=$sku;
			$data['cost_price'] = $this->input->post('cost_price');
			$data['mrp'] = $this->input->post('mrp');
			$data['retail_price'] = $this->input->post('retail_price');
			$data['quantity'] = $this->input->post('quantity');
			$data['tax_slab'] = $this->input->post('tax_slab');
			if($data['tax_slab']==""){$data['tax_slab']=0;}
			$new_temp_goods_insert = $this->Users_model->new_temp_goods_insert($data);

			$temp_inward_master_fetch = $this->Users_model->temp_inward_master_fetch($data);
				//var_dump($item_wise_sales);
				 //echo $this->db->last_query();
				foreach ($temp_inward_master_fetch as $row)
				{	
					$TZ_barcode = $row->TZ_barcode;
					$quantity = $row->quantity;
					$sku = $row->sku;
					$tax_slab = $row->tax_slab;
					$retail_price = $row->retail_price;
					$mrp = $row->mrp;
					$cost_price = $row->cost_price;
				
					echo '
					<tr>   

					<td>'.$TZ_barcode.'</td>
					<td>'.$sku.'</td>
					<td>'.$cost_price.'</td>
					<td>'.$mrp.'</td>
					<td>'.$retail_price.'</td>
					<td>'.$quantity.'</td>
					<td>'.$tax_slab.'</td>
					
				</tr>';
					 
				}
		}
		else
		{
				echo '<span style="color:red;"> SOMTHING WENT WRONG</span>';
		}
		
		
	 
	}

	public function temp_qty_tax()
	{

		$sessdata = $this->session->userdata('pbk_sess');
		$data['merchant_id'] = $sessdata['pbk_merchant_id'];
		
		if (isset($_POST['TZ_barcode']))
		{
		 	$data['TZ_barcode'] = $this->input->post('TZ_barcode');
			 $manage_stocks='';
			 $taxable='';
			$specific_item_fetch = $this->Users_model->specific_item_fetch($data);
			foreach ($specific_item_fetch as $row)
			{
			$manage_stocks=$row->manage_stocks;
			$taxable=$row->taxable;
			}
			if($manage_stocks=="YES")
			{
				echo'<label for="quantity" class="col-sm-2 control-label">Quantity</label>
				<div class="col-sm-4">
						<div class="form-line">
							<input type="text"  name="quantity" id="quantity" placeholder="Quantity" class="form-control" required>
							
					
						</div>
					</div>';

			}				
			if($taxable=="YES")
			{
				echo'<label for="tax_slab" class="col-sm-2 control-label">Tax Slab</label>
						<div class="col-sm-4">
						<div class="form-line">
						<select id="tax_slab" name="tax_slab" class="form-control" required>
						<option value="" selected disabled>Please Select</option>';
						
						$options_tax_slab = $this->Users_model->options_tax_slab();
						foreach ($options_tax_slab as $row) 
						{

						$value=$row->option_value;
						echo '<option value="'.$value.'">'.$value.'</option>'; 
						
						}
								
						echo'</select>
							
							
						</div>
					</div>';
			}

			
		}
		else
		{
				echo '<span style="color:red;"> SOMTHING WENT WRONG</span>';
		}
		
		
	 
	}

	public function add_new_vendor()
	{

		$sessdata = $this->session->userdata('pbk_sess');
		$data['merchant_id'] = $sessdata['pbk_merchant_id'];
		
		if (isset($_POST['vendor_type']))
		{
		 	$data['vendor_type'] = $this->input->post('vendor_type');
			$data['vendor_name'] = $this->input->post('vendor_name');
			$data['vendor_descr'] = $this->input->post('vendor_descr');
			$data['vendor_email'] = $this->input->post('vendor_email');
			$data['vendor_contact'] = $this->input->post('vendor_contact');

			$max_vendor_rid_fetch = $this->Users_model->max_vendor_rid_fetch();
			foreach ($max_vendor_rid_fetch as $row) {
	
				$MRID = $row->MRID;
			}
			$data['vendor_id'] = $MRID + 1;
			$new_vendor_insert = $this->Users_model->new_vendor_insert($data);

			$vendor_supplier_fetch = $this->Users_model->vendor_supplier_fetch($data);
				//var_dump($item_wise_sales);
				 //echo $this->db->last_query();
				foreach ($vendor_supplier_fetch as $row)
				{	
					$vendor_id = $row->vendor_id;
					$vendor_type = $row->vendor_type;
					$vendor_name = $row->vendor_name;
					$vendor_descr = $row->vendor_descr;
					$vendor_email = $row->vendor_email;
					$vendor_contact = $row->vendor_contact;
					
				
					echo '
					<tr>   

					<td>'.$vendor_id.'</td>
					<td>'.$vendor_type.'</td>
					<td>'.$vendor_name.'</td>
					<td>'.$vendor_descr.'</td>
					<td>'.$vendor_email.'</td>
					<td>'.$vendor_contact.'</td>
					
					
				</tr>';
					 
				}
		}
		else
		{
				echo '<span style="color:red;"> SOMTHING WENT WRONG</span>';
		}
		
		
	 
	}

	public function inward_items()
	{

		$sessdata = $this->session->userdata('pbk_sess');
		// $data['eid'] = $sessdata['pbk_eid'];
		$stdata['merchant_id'] = $mdata['merchant_id'] = 
		$gdata['merchant_id'] = $data['merchant_id'] = $sessdata['pbk_merchant_id'];
		// Temp to stock purchased move 
		// Adding entry in goods register
		// Add price in multiple price
		// Update stock balance
		// temp inward delete
		$max_entry_rid_fetch = $this->Users_model->max_entry_rid_fetch($gdata);
		foreach ($max_entry_rid_fetch as $row) {

			$MRID = $row->MRID;
		}
		$data['rid']=$MRID +1;
		$data['entry_no']=$gdata['entry_no']='P'.date('y').'/'.$data['rid'];

		$config_master_fetch = $this->Users_model->config_master_fetch($gdata);
		foreach ($config_master_fetch as $row)
		{	
		  $mdata['effect_date']=$data['entry_pos_date']=$gdata['entry_pos_date'] = $row->current_pos_date;
		}

		$temp_inward_master_fetch = $this->Users_model->temp_inward_master_fetch($gdata);
		foreach ($temp_inward_master_fetch as $row)
				{
					 $stdata['TZ_barcode']=$mdata['TZ_barcode']=$gdata['TZ_barcode'] = $row->TZ_barcode;
					 $mdata['cost_price']=$gdata['cost_price'] = $row->cost_price;
					 $mdata['mrp']=$gdata['mrp'] = $row->mrp;
					 $mdata['retail_price']=$gdata['retail_price'] = $row->retail_price;
					 $mdata['tax_slab']=$gdata['tax_slab'] = $row->tax_slab;
					 $stdata['current_balance_qty']=$gdata['qty'] = $row->quantity;
					
					$specific_item_fetch = $this->Users_model->specific_item_fetch($gdata);
					foreach ($specific_item_fetch as $row)
					{
						$mdata['sku']=$gdata['sku'] = $row->sku;
					}
					 $gdata['gross_amount'] = $gdata['cost_price']*$gdata['qty'];
					 $gdata['tax_amount'] = $gdata['cost_price']*$gdata['qty']*($gdata['tax_slab']/100);
					 $gdata['net_amount'] = $gdata['gross_amount']+$gdata['tax_amount'];

					$new_goods_purchased_insert = $this->Users_model->new_goods_purchased_insert($gdata);
					
					$multiple_price_check = $this->Users_model->multiple_price_check($mdata);
					if ($multiple_price_check == 0)
					{
						$new_multiple_price_insert = $this->Users_model->new_multiple_price_insert($mdata);
					}

					$stock_balance_check = $this->Users_model->stock_balance_check($stdata);
					if ($stock_balance_check == 0)
					{
						$new_stock_balance_insert = $this->Users_model->new_stock_balance_insert($stdata);
					}
					else
					{
						$specific_stock_balance_fetch = $this->Users_model->specific_stock_balance_fetch($stdata);
							foreach ($specific_stock_balance_fetch as $row)
							{
								$existing_balance = $row->current_balance_qty;
							}
							$stdata['current_balance_qty']=$stdata['current_balance_qty']+$existing_balance;
						$new_stock_balance_update = $this->Users_model->new_stock_balance_update($stdata);
					}
					

				}

				$inventory_summary = $this->Users_model->inventory_summary($gdata);
				foreach ($inventory_summary as $row)
				{	
				 $data['qty'] = $row->SQTY;
				 $data['gross_amount'] = $row->SGROSS;
				 $data['tax_amount'] = $row->STAX;
				 $data['net_amount'] = $row->SNET;
				}

				$data['vendor_id'] = $this->input->post('vendor_id');
				$data['invoice_no'] = $this->input->post('invoice_no');
				$data['invoice_date'] = $this->input->post('invoice_date');

				$new_goods_register_insert = $this->Users_model->new_goods_register_insert($data);

				$temp_inward_delete = $this->Users_model->temp_inward_delete($data);
		
				redirect('goods-register', 'location');

	}

	
	public function onboarding()
	{

		$sessdata = $this->session->userdata('pbk_sess');
		$data['eid'] = $sessdata['pbk_eid'];
		$data['merchant_id'] = $sessdata['pbk_merchant_id'];

		$config_master_fetch = $this->Users_model->config_master_fetch($data);
		$specific_user_fetch_login = $this->Users_model->specific_user_fetch_login($data);
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
		'config_master_fetch'=>$config_master_fetch,
		'specific_user_fetch_login'=>$specific_user_fetch_login,
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
		if($data['gst_tax_invoice']==''){$data['gst_tax_invoice']='NO';}
		$data['auto_day_end'] = $this->input->post('auto_day_end');
		$data['direct_billing'] = $this->input->post('direct_billing');
		$data['pos_start_date'] = $this->input->post('pos_start_date');
		$data['current_pos_date'] = $this->input->post('pos_start_date');
		$data['manage_stocks'] = $this->input->post('manage_stocks');
		if($data['manage_stocks']==''){$data['manage_stocks']='NO';}

		$check_merchant_config = $this->Users_model->check_merchant_config($data);
		if ($check_merchant_config == 1)
		{
			$onboard_config_update = $this->Users_model->onboard_config_update($data);
			$onboarding_update = $this->Users_model->onboarding_update($mdata);
		}
		else
		{
			$new_onboard_config_insert = $this->Users_model->new_onboard_config_insert($data);
			$onboarding_update = $this->Users_model->onboarding_update($mdata);
		}
		

		redirect('dashboard', 'location');

		
	}



	// Dashboard controller class ends
}
