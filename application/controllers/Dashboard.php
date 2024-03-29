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
			$data['current_pos_date'] = $row->current_pos_date;
			$data['fy_cy'] = $row->fy_cy;
			
			
		}

		if($onboarding=='NO')
		{
			redirect('onboarding', 'location');
		}
		
		else
		{

		$pos_month_summary_fetch = $this->Users_model->pos_month_summary_fetch($data);
		$pos_year_summary_fetch = $this->Users_model->pos_year_summary_fetch($data);
		$pos_full_month_fetch = $this->Users_model->pos_full_month_fetch($data);
		$pos_last_bill_fetch = $this->Users_model->pos_last_bill_fetch($data);
		$specific_day_wise_sales = $this->Users_model->specific_day_wise_sales($data);
		$top_10_products = $this->Users_model->top_10_products($data);
		
		$month_on_month_sales = $this->Users_model->month_on_month_sales($data);
		$current_day_item_wise_sales = $this->Users_model->current_day_item_wise_sales($data);
		
        
		//echo $this->db->last_query();
		$this->load->view('dashboard_header_view');
		$this->load->view('dashboard_top_view');
		$this->load->view('dashboard_menus_view');
		$this->load->view('dashboard_panel_view',['pos_month_summary_fetch' => $pos_month_summary_fetch,
		'pos_year_summary_fetch' => $pos_year_summary_fetch,
		'pos_full_month_fetch' => $pos_full_month_fetch,
		'pos_last_bill_fetch' => $pos_last_bill_fetch,
		'specific_day_wise_sales' => $specific_day_wise_sales,
		'top_10_products' => $top_10_products,
		'month_on_month_sales' => $month_on_month_sales,
		'current_day_item_wise_sales' => $current_day_item_wise_sales,
		]);
		$this->load->view('dashboard_bottom_view');
		$this->load->view('dashboard_footer_view');
		}
	}


	public function customers()
	{

		$sessdata = $this->session->userdata('pbk_sess');
		$data['user_type'] = $sessdata['pbk_user_type'];
		$data['merchant_id'] = $sessdata['pbk_merchant_id'];
		
		if($data['user_type']=="STAFF")
		{
			redirect('dashboard', 'location');
		}


		$all_customer_fetch = $this->Users_model->all_customer_fetch($data);
		

		$this->load->view('dashboard_header_view');
		$this->load->view('dashboard_menus_view');
		$this->load->view('dashboard_top_view');
		$this->load->view('dashboard_customer_base_view',['all_customer_fetch' => $all_customer_fetch,
		
		]);
		$this->load->view('dashboard_bottom_view');
		$this->load->view('dashboard_table_footer_view');
	}
	
	public function customer_crm($one=null)
	{
		$data['customer_rid']=$customer_rid=$one;
		if($customer_rid=='')
		{
			redirect('customers', 'location');
		}
		$sessdata = $this->session->userdata('pbk_sess');
		$data['user_type'] = $sessdata['pbk_user_type'];
		$data['merchant_id'] = $sessdata['pbk_merchant_id'];
		
		if($data['user_type']=="STAFF")
		{
			redirect('dashboard', 'location');
		}


		$specific_customer_by_id_fetch = $this->Users_model->specific_customer_by_id_fetch($data);
		$billwise_insights = $this->Users_model->billwise_insights($data);
		$itemwise_insights = $this->Users_model->itemwise_insights($data);
		
		$this->load->view('dashboard_header_view');
		$this->load->view('dashboard_menus_view');
		$this->load->view('dashboard_top_view');
		$this->load->view('dashboard_crm_view',['specific_customer_by_id_fetch' => $specific_customer_by_id_fetch,
		'billwise_insights' => $billwise_insights,
		'itemwise_insights' => $itemwise_insights,
		]);
		$this->load->view('dashboard_bottom_view');
		$this->load->view('dashboard_footer_view');
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

	public function promo_offers()
	{

		$sessdata = $this->session->userdata('pbk_sess');
		$data['user_type'] = $sessdata['pbk_user_type'];
		$data['merchant_id'] = $sessdata['pbk_merchant_id'];

		$merchant_promo_offers_fetch = $this->Users_model->merchant_promo_offers_fetch($data);
		$all_offers_fetch = $this->Users_model->all_offers_fetch();
		$offer_category_fetch = $this->Users_model->offer_category_fetch();
		
		
		
		$this->load->view('dashboard_header_view');
		$this->load->view('dashboard_menus_view');
		$this->load->view('dashboard_top_view');
		$this->load->view('dashboard_promo_offers_view',['merchant_promo_offers_fetch' => $merchant_promo_offers_fetch,
		'all_offers_fetch' => $all_offers_fetch,
		'offer_category_fetch' => $offer_category_fetch,
		
		]);
		$this->load->view('dashboard_bottom_view');
		$this->load->view('dashboard_table_footer_view');
	}

	public function stock_balance()
	{

		$sessdata = $this->session->userdata('pbk_sess');
		$data['user_type'] = $sessdata['pbk_user_type'];
		$data['merchant_id'] = $sessdata['pbk_merchant_id'];

		$merchant_stock_balance_fetch = $this->Users_model->merchant_stock_balance_fetch($data);
		
		
		
		$this->load->view('dashboard_header_view');
		$this->load->view('dashboard_menus_view');
		$this->load->view('dashboard_top_view');
		$this->load->view('dashboard_stock_balance_view',['merchant_stock_balance_fetch' => $merchant_stock_balance_fetch,
		'merchant_stock_balance_fetch' => $merchant_stock_balance_fetch,
		
		]);
		$this->load->view('dashboard_bottom_view');
		$this->load->view('dashboard_table_footer_view');
	}

	public function tax_register()
	{

		$sessdata = $this->session->userdata('pbk_sess');
		$data['user_type'] = $sessdata['pbk_user_type'];
		$merchantId=$data['merchant_id'] = $sessdata['pbk_merchant_id'];
		$updateTaxRegister = $this->Users_model->updateTaxRegister($merchantId);
		$merchant_tax_register_fetch = $this->Users_model->merchant_tax_register_fetch($data);
		
		
		
		$this->load->view('dashboard_header_view');
		$this->load->view('dashboard_menus_view');
		$this->load->view('dashboard_top_view');
		$this->load->view('dashboard_tax_register_view',['merchant_tax_register_fetch' => $merchant_tax_register_fetch,
		'merchant_tax_register_fetch' => $merchant_tax_register_fetch,
		
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

	public function add_new_walkin()
	{
	
		echo$data['name'] = $this->input->post('name',true);
		$data['email'] = $this->input->post('email',true);
		$data['mobile'] = $this->input->post('mobile',true);
		$data['msg_subject'] = $this->input->post('msg_subject',true);
		$data['message'] = $this->input->post('message',true);
		
		$new_walkin_insert = $this->Users_model->new_walkin_insert($data);

		//redirect('home', 'location');

		
	}
	
	public function billing()
	{

		$sessdata = $this->session->userdata('pbk_sess');
		$data['eid'] = $sessdata['pbk_eid'];
		$data['merchant_id'] = $sessdata['pbk_merchant_id'];
		$data['current_pos_date']=date('Y-m-d');
		
		$bill_template_fetch = $this->Users_model->bill_template_fetch($data);
		$temp_bill_fetch = $this->Users_model->temp_bill_fetch($data);
		$product_fetch = $this->Users_model->product_fetch($data);
		$config_master_fetch = $this->Users_model->config_master_fetch($data);
		foreach ($config_master_fetch as $row)
		{
			$auto_day_end = $row->auto_day_end;
			$pos_status = $row->pos_status;
			$current_pos_date = $row->current_pos_date;
		}
		// $pos_mode = $row->pos_mode;
		// if($pos_mode=='YES'){redirect('pos-billing', 'location');}

		if($auto_day_end=='YES'&& $pos_status=='OPENED')
		{
			$data['pos_status']='OPENED';
		$current_posdate_update = $this->Users_model->current_posdate_update($data);
		$this->load->view('dashboard_header_view');
		$this->load->view('dashboard_top_view');
		$this->load->view('dashboard_menus_view');
		$this->load->view('dashboard_billing_view',[
		'bill_template_fetch'=>$bill_template_fetch,
		'temp_bill_fetch'=>$temp_bill_fetch,
		'product_fetch'=>$product_fetch,
		
		]);
		$this->load->view('dashboard_bottom_view');
		$this->load->view('dashboard_table_footer_view');
		}
		elseif($auto_day_end!='YES'&& $pos_status=='OPENED')
		{
		$this->load->view('dashboard_header_view');
		$this->load->view('dashboard_top_view');
		$this->load->view('dashboard_menus_view');
		$this->load->view('dashboard_billing_view',[
		'bill_template_fetch'=>$bill_template_fetch,
		'temp_bill_fetch'=>$temp_bill_fetch,
		'product_fetch'=>$product_fetch,
		
		]);
		$this->load->view('dashboard_bottom_view');
		$this->load->view('dashboard_table_footer_view');
		}
		elseif($pos_status=='CLOSED')
		{
			redirect('day-open-close', 'location');
		}
	}

	public function pos_billing()
	{
		$sessdata = $this->session->userdata('pbk_sess');
		$data['eid'] = $sessdata['pbk_eid'];
		$data['merchant_id'] = $sessdata['pbk_merchant_id'];

		$product_fetch_by_division_category = $this->Users_model->product_fetch_by_division_category($data);
		$top_10_products = $this->Users_model->top_10_products($data);
		
		$this->load->view('dashboard_header_view');
		$this->load->view('dashboard_top_view');
		$this->load->view('dashboard_menus_view');
		$this->load->view('dashboard_pos_view',[
			 'product_fetch_by_division_category'=>$product_fetch_by_division_category,
			 'top_10_products'=>$top_10_products,
			
			]);
			
		$this->load->view('dashboard_bottom_view');
		$this->load->view('dashboard_table_footer_view');
	}

	public function billing_pos($one=null,$two=null)
	{
		$paramKey=$one;
		$paramValue=$two;

		$sessdata = $this->session->userdata('pbk_sess');
		$data['eid'] = $sessdata['pbk_eid'];
		$data['merchant_id'] = $sessdata['pbk_merchant_id'];
		$data['current_pos_date']=date('Y-m-d');
		
		$bill_template_fetch = $this->Users_model->bill_template_fetch($data);
		$temp_bill_fetch = $this->Users_model->temp_bill_fetch($data);
		$product_fetch = $this->Users_model->product_fetch($data);
		$category_fetch = $this->Users_model->category_fetch($data);
		$config_master_fetch = $this->Users_model->config_master_fetch($data);
		foreach ($config_master_fetch as $row)
		{
			$auto_day_end = $row->auto_day_end;
			$pos_status = $row->pos_status;
			$current_pos_date = $row->current_pos_date;
		}
		if($auto_day_end=='YES'&& $pos_status=='OPENED')
		{
			$data['pos_status']='OPENED';
		
		$current_posdate_update = $this->Users_model->current_posdate_update($data);
		$this->load->view('dashboard_header_view');
		$this->load->view('dashboard_top_view');
		$this->load->view('dashboard_menus_view');

		if($paramKey=='division')
		{
			$data['division_id']=$paramValue;
			$specific_division_byid_fetch = $this->Users_model->specific_division_byid_fetch($data);
			foreach ($specific_division_byid_fetch as $row) 
			{
				$data['division_code'] = $row->division_code;
			}
			if($data['division_code']=='')
			{
				redirect('pos-billing', 'location');	
			}

			$division_wise_category_fetch = $this->Users_model->division_wise_category_fetch($data);
			$this->load->view('dashboard_billing_pos_view',[
				'division_wise_category_fetch'=>$division_wise_category_fetch,
				
				]);
		}

		if($paramKey=='category')
		{
			
			 $data['category_id']=$paramValue;
			$specific_category_byid_fetch = $this->Users_model->specific_category_byid_fetch($data);
			foreach ($specific_category_byid_fetch as $row) 
			{
				$data['category'] = $row->category_name;
			}
			if($data['category']=='')
			{
				redirect('pos-billing', 'location');	
			}

			$category_wise_product_fetch = $this->Users_model->category_wise_product_fetch($data);
			$this->load->view('dashboard_billing_pos_view',[
				'category_wise_product_fetch'=>$category_wise_product_fetch,
				
				]);
		}

		elseif($paramKey=='product')
		{
			$data['TZ_barcode']=$paramValue;
			$specific_item_fetch = $this->Users_model->specific_item_fetch($data);
			$this->load->view('dashboard_billing_pos_view',[
				'specific_item_fetch'=>$specific_item_fetch,
				
				]);
		}
		else
		{
			$division_fetch = $this->Users_model->division_fetch($data);
			$this->load->view('dashboard_billing_pos_view',[
				'division_fetch'=>$division_fetch,
				
				]);

		}

		

		$this->load->view('dashboard_bottom_view');
		$this->load->view('dashboard_table_footer_view');
		}
		elseif($auto_day_end!='YES'&& $pos_status=='OPENED')
		{
			$this->load->view('dashboard_header_view');
			$this->load->view('dashboard_top_view');
			$this->load->view('dashboard_menus_view');
	
			if($paramKey=='division')
			{
				$data['division_id']=$paramValue;
				$specific_division_byid_fetch = $this->Users_model->specific_division_byid_fetch($data);
				foreach ($specific_division_byid_fetch as $row) 
				{
					$data['division_code'] = $row->division_code;
				}
				if($data['division_code']=='')
				{
					redirect('pos-billing', 'location');	
				}
	
				$division_wise_category_fetch = $this->Users_model->division_wise_category_fetch($data);
				$this->load->view('dashboard_billing_pos_view',[
					'division_wise_category_fetch'=>$division_wise_category_fetch,
					
					]);
			}
	
			if($paramKey=='category')
			{
				
				 $data['category_id']=$paramValue;
				$specific_category_byid_fetch = $this->Users_model->specific_category_byid_fetch($data);
				foreach ($specific_category_byid_fetch as $row) 
				{
					$data['category'] = $row->category_name;
				}
				if($data['category']=='')
				{
					redirect('pos-billing', 'location');	
				}
	
				$category_wise_product_fetch = $this->Users_model->category_wise_product_fetch($data);
				$this->load->view('dashboard_billing_pos_view',[
					'category_wise_product_fetch'=>$category_wise_product_fetch,
					
					]);
			}
	
			elseif($paramKey=='product')
			{
				$data['TZ_barcode']=$paramValue;
				$specific_item_fetch = $this->Users_model->specific_item_fetch($data);
				$this->load->view('dashboard_billing_pos_view',[
					'specific_item_fetch'=>$specific_item_fetch,
					
					]);
			}
			else
			{
				$division_fetch = $this->Users_model->division_fetch($data);
				$this->load->view('dashboard_billing_pos_view',[
					'division_fetch'=>$division_fetch,
					
					]);
	
			}
	
			
	
			$this->load->view('dashboard_bottom_view');
			$this->load->view('dashboard_table_footer_view');
		}
		elseif($pos_status=='CLOSED')
		{
			redirect('day-open-close', 'location');
		}

		

		
	}

	public function pos_update()
	{

		$sessdata = $this->session->userdata('pbk_sess');
		$data['eid'] = $sessdata['pbk_eid'];
		$data['merchant_id'] = $sessdata['pbk_merchant_id'];
		
		$data['pos_status'] = $this->input->post('change_status');

		$config_master_fetch = $this->Users_model->config_master_fetch($data);
		foreach ($config_master_fetch as $row)
		{
			$auto_day_end = $row->auto_day_end;
			$pos_status = $row->pos_status;
			$current_pos_date = $row->current_pos_date;
		}
		if($auto_day_end!='YES' && $data['pos_status']=='OPENED')
		{

			$next_day_timestamp = strtotime($current_pos_date . ' +1 day');
			$data['current_pos_date'] = date('Y-m-d', $next_day_timestamp);
		
		 	$current_posdate_update = $this->Users_model->current_posdate_update($data);
		
		}
		else
		{
		$sessdata = $this->session->userdata('pbk_sess');
		$data['eid'] = $sessdata['pbk_eid'];
		$merchantId=$data['merchant_id'] = $sessdata['pbk_merchant_id'];
		$updateDaywiseSummary= $this->Users_model->updateDaywiseSummary($merchantId);
		
			$data['current_pos_date']=$current_pos_date;
			$current_posdate_update = $this->Users_model->current_posdate_update($data);
			if($data['pos_status']=='CLOSED'){redirect('send-sales-summary', 'location');}
		}
		redirect('day-open-close', 'location');
		
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
		$this->load->view('dashboard_table_footer_view');
	}
	public function day_open_close()
	{

		$sessdata = $this->session->userdata('pbk_sess');
		$data['eid'] = $sessdata['pbk_eid'];
		$data['merchant_id'] = $sessdata['pbk_merchant_id'];
	
		$this->load->view('dashboard_header_view');
		$this->load->view('dashboard_top_view');
		$this->load->view('dashboard_menus_view');
		$this->load->view('dashboard_day_open_close_view');
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
		$this->load->view('dashboard_table_footer_view');
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

	public function remove_item_temp_bill()
	{

		$sessdata = $this->session->userdata('pbk_sess');
		$data['merchant_id'] = $sessdata['pbk_merchant_id'];

		$data['TZ_barcode'] = $this->input->post('TZ_barcode');
		$data['retail_price'] = $this->input->post('retail_price');
		$data['net_amount'] = $this->input->post('net_amount');
		$data['gross_amount'] = $this->input->post('gross_amount');
		$data['tax_amount'] = $this->input->post('tax_amount');
		$data['qty'] = $this->input->post('qty');
		
		if($data['qty']==1){

			$temp_bill_item_delete = $this->Users_model->temp_bill_item_delete($data);

		}
		else
		{ 
			$data['new_qty']=$data['qty']-1;
			$data['new_retail_price']=$data['retail_price'];
			$data['new_net_amount']=($data['net_amount']/$data['qty'])*$data['new_qty'];
			$data['new_tax_amount']=($data['tax_amount']/$data['qty'])*$data['new_qty'];
			$data['new_gross_amount']=($data['gross_amount']/$data['qty'])*$data['new_qty'];
			$temp_bill_item_update = $this->Users_model->temp_bill_item_update($data);
		}

		
				redirect('billing', 'location');
	}

	public function remove_all_temp_bill()
	{

		$sessdata = $this->session->userdata('pbk_sess');
		$data['merchant_id'] = $sessdata['pbk_merchant_id'];

		$temp_bill_item_all_delete = $this->Users_model->temp_bill_item_all_delete($data);
		redirect('billing', 'location');
	}

	public function staffing_status()
	{

		$sessdata = $this->session->userdata('pbk_sess');
		$data['merchant_id'] = $sessdata['pbk_merchant_id'];

		$data['staff_id'] = $this->input->post('staff_id');
		$specific_staff_manager_fetch = $this->Users_model->specific_staff_manager_fetch($data);
		foreach ($specific_staff_manager_fetch as $row) 
		{
			$profile_status = $row->profile_status;
		}	

		if($profile_status=='INACTIVE')
		{$data['profile_status']='ACTIVE';}
		else{$data['profile_status']='INACTIVE';}

		$staff_status_update = $this->Users_model->staff_status_update($data);

		redirect('staffing', 'location');
			
	}

	public function bill_checkout()
	{
		$sessdata = $this->session->userdata('pbk_sess');
		$merchantId=$idata['merchant_id']=$data['merchant_id'] = $sessdata['pbk_merchant_id'];
		
		if (isset($_POST['customer_mobile'])) {
			$idata['cust_mobile']=$data['cust_mobile'] = ucwords($this->input->post('customer_mobile'));
			$idata['cust_name']=$data['cust_name'] = strtoupper($this->input->post('customer_name'));
			$data['source'] = strtoupper($this->input->post('customer_source'));
			$data['cust_email'] = strtolower($this->input->post('customer_email'));
			$data['cust_address'] = ucwords($this->input->post('customer_address'));
			$idata['card_pay'] = $this->input->post('card');
			$idata['other_pay'] = $this->input->post('online');
			$idata['cash_tendered'] = $this->input->post('cash');
			$idata['qty'] = $this->input->post('qty');
			$idata['balance_return'] = $this->input->post('balance_return');
			$idata['cash_pay'] = $idata['cash_tendered']+$idata['balance_return'];
			$idata['bill_amt'] = $this->input->post('bill_amt');
			$idata['discount_logic'] = $this->input->post('discount_logic');
			$idata['promo_offer'] = $this->input->post('promo_offer');
			$idata['discount'] = $this->input->post('discount');
			$idata['to_pay'] = $idata['bill_amt']-$idata['discount'];
			$idata['staff_id'] = $this->input->post('staff_id');

			

			$new_customer_check = $this->Users_model->new_customer_check($data);
		if ($new_customer_check == 1) 
		{
			$new_customer_update = $this->Users_model->new_customer_update($data);
		}
		else
		{
			$new_customer_insert = $this->Users_model->new_customer_insert($data);
		}
			//billing insert logic
			
		$config_master_fetch = $this->Users_model->config_master_fetch($data);
		foreach ($config_master_fetch as $row)
		{	
		  $sales_pfx = $row->sales_pfx;
		  $pos_mode = $row->pos_mode;
		  $fy_cy = $row->fy_cy;
		  $idata['pos_bill_date'] = $row->current_pos_date;
		}
		 
		if($fy_cy=='FY')
		{
			if(date('m')<=3)
			{$fy=date('y')-1;}
			else
			{
				$fy=date('y');
			}
		}
		else{$fy=date('y');}

		$data['bill_prefix']=$sales_pfx.$fy.'/';

		$max_bill_rid_fetch = $this->Users_model->max_bill_rid_fetch($data);
			foreach ($max_bill_rid_fetch->result() as $row) {
	
				$MRID = $row->MRID;
				
			}
			// if($idata['rsino']==''){$idata['rsino']=1;}
			$idata['rsino'] = $MRID + 1;
			
			$idata['bill_no'] = $data['bill_prefix'].$idata['rsino'];
				
			$new_bill_insert = $this->Users_model->new_bill_insert($idata);
			$new_itemwise_insert = $this->Users_model->new_itemwise_insert($idata);
			$updateTaxRegister = $this->Users_model->updateTaxRegister($merchantId);
			$updateDaywiseSummary= $this->Users_model->updateDaywiseSummary($merchantId);
			$temp_bill_item_all_delete = $this->Users_model->temp_bill_item_all_delete($data);
			
			
			if($pos_mode=='YES'){redirect('pos-billing', 'location');}
			else{redirect('billing', 'location');}
			
		}
		else{
			echo'Something Went Wrong';
		}
	
			
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
		$merchantId=$data['merchant_id'] = $sessdata['pbk_merchant_id'];
		$updateDaywiseSummary= $this->Users_model->updateDaywiseSummary($merchantId);
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
			echo ' <table class="table table-bordered table-striped table-hover dataTable js-exportable">
			<thead>
				<tr>
					<th>SI NO</th>
					<th>DATE</th>
					<th>BILL NO</th>
					<th>BARCODE</th>
					<th>SKU</th>
					<th>PRODUCT</th>
					<th>ITEM DESCRIPTION</th>
					<th>RATE</th>
					<th>QTY</th>
					<th>AMOUNT</th>
				  
				</tr>
			</thead>
			<tbody>';

				$item_wise_sales = $this->Users_model->item_wise_sales($data);
				//var_dump($item_wise_sales);
				// echo $this->db->last_query();
				$i=1;
				foreach ($item_wise_sales as $row) {

					$rbill_no = $row->bill_no;
					$rbarcode = $row->TZ_barcode;
					$rqty = $row->qty;
					$rsku = $row->sku;
					$ramount = $row->net_amount;
					$rmrp = $row->retail_price;
					$rproduct = $row->item_name;
					$ridiscr = $row->item_description;
					$rposdate = $row->pos_bill_date;

					
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
				$this->load->view('dashboard_table_footer_view');
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
			echo ' <table class="table table-bordered table-striped table-hover dataTable js-exportable">
			<thead>
				<tr>
					<th>SI NO</th>
					<th>DATE</th>
					<th>BILL NO</th>
					<th>QTY</th>
					<th>AMOUNT</th>
					<th>PROMO</th>
					<th>OFFER</th>
					<th>DISCOUNT</th>
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
				$i=1;
				foreach ($bill_wise_sales as $row) {

					$rbill_no = $row->bill_no;
					$rqty = $row->qty;
					$bill_amt = $row->bill_amt;
					$promo_offer = $row->promo_offer;
					$discount_logic = $row->discount_logic;
					$discount = $row->discount;
					$cash_pay = $row->cash_pay;
					$staff_id = $row->staff_id;
					$card_pay = $row->card_pay;
					$other_pay = $row->other_pay;
					$cash_tendered = $row->cash_tendered;
					$balance_return = $row->balance_return;
					$cust_name = $row->cust_name;
					$cust_mobile = $row->cust_mobile;
					$rposdate = $row->pos_bill_date;

					
					echo '
					<tr>   
					<td>'.$i.'</td>
					<td>'.$rposdate.'</td>
					<td>'.$rbill_no.'</td>
					<td>'.$rqty.'</td>
					<td>'.$bill_amt.'</td>
					<td>'.$promo_offer.'</td>
					<td>'.$discount_logic.'</td>
					<td>'.$discount.'</td>
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
				$this->load->view('dashboard_table_footer_view');
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
			echo ' <table class="table table-bordered table-striped table-hover dataTable js-exportable">
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
				$i=1;
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
				$this->load->view('dashboard_table_footer_view');
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
			if($data['quantity']==""){$data['quantity']=0;}
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

	public function temp_bill_inward()
	{

		$sessdata = $this->session->userdata('pbk_sess');
		$data['merchant_id'] = $sessdata['pbk_merchant_id'];
		
		if (isset($_POST['TZ_barcode']))
		{
		 	$data['TZ_barcode'] = $this->input->post('TZ_barcode');
			$specific_item_fetch = $this->Users_model->specific_item_fetch($data);
			foreach ($specific_item_fetch as $row)
			{
				$data['sku']=$row->sku;
				$data['item_name']=$row->item_name;
				$data['item_description']=$row->item_description;
			}
			if($this->input->post('retail_price')!=''){
				$cat_div = explode('|-|',$this->input->post('retail_price'));
				$data['retail_price'] = $cat_div[0];
				$data['tax_slab'] = $cat_div[1];
			}
			
			$data['qty'] = $this->input->post('quantity');
			$data['gross_amount']=$data['retail_price']*$data['qty'];
			$data['tax_amount']=$data['retail_price']*($data['tax_slab']/100);
			$data['net_amount']=$data['gross_amount']+$data['tax_amount'];
			
			$temp_bill_check = $this->Users_model->temp_bill_check($data);
		if ($temp_bill_check == 1) 
		{
			
			$specific_temp_bill_fetch = $this->Users_model->specific_temp_bill_fetch($data);
				 foreach ($specific_temp_bill_fetch as $row)
				 {	
					$TZ_barcode = $row->TZ_barcode;
					$qty = $row->qty;
					$retail_price = $row->retail_price;
					$gross_amount = $row->gross_amount;
					$tax_amount = $row->tax_amount;
					$net_amount = $row->net_amount;
				 }
				 
			$data['new_qty']=$qty+$data['qty'];
			$data['new_retail_price']=$data['retail_price'];
			$data['new_net_amount']=$net_amount+$data['net_amount'];
			$data['new_tax_amount']=$tax_amount+$data['tax_amount'];
			$data['new_gross_amount']=$gross_amount+$data['gross_amount'];

			$temp_bill_item_update2 = $this->Users_model->temp_bill_item_update2($data);
			
		}
		else{
			$new_temp_bill_insert = $this->Users_model->new_temp_bill_insert($data);
		
		}
			

				$temp_bill_fetch = $this->Users_model->temp_bill_fetch($data);
				//var_dump($item_wise_sales);
				// echo $this->db->last_query();
				 foreach ($temp_bill_fetch as $row)
				 {	
					 $TZ_barcode = $row->TZ_barcode;
					 $qty = $row->qty;
					 $sku = $row->sku;
					 $item_description = $row->item_description;
					 $retail_price = $row->retail_price;
					 $tax_slab = $row->tax_slab;
					 $gross_amount = $row->gross_amount;
					 $net_amount = $row->net_amount;
					 $tax_amount = $row->tax_amount;
					 
					
					 echo '
					 <tr>   
					
					 <td>'.$TZ_barcode.'</td>
					 <td>'.$sku.'<br><small>'.$item_description.'</small></td>
					 <td>'.$retail_price.'</td>
					 <td>'.$qty.'</td>
					 <td>'.$tax_slab.'</td>
					 <td>'.$gross_amount.'</td>
					 <td>'.$tax_amount.'</td>
					 <td>0</td>
					 <td>'.$net_amount.'</td>
					 <td><form action="remove-item" method="POST">
					<input type="hidden"name="TZ_barcode" value="'.$TZ_barcode.'">
					<input type="hidden"name="retail_price" value="'.$retail_price.'">
					<input type="hidden"name="net_amount" value="'.$net_amount.'">
					<input type="hidden"name="gross_amount" value="'.$gross_amount.'">
					<input type="hidden"name="tax_amount" value="'.$tax_amount.'">
					<input type="hidden"name="qty" value="'.$qty.'">
					<button type="submit" style="border-radius:25px;width:25px; padding:0px; height:25px" class="btn bg-pink waves-effect" data-type="prompt" >
					<i class="material-icons">cancel</i> 
				</button> </form>
				
				</td>
					 
					 
				 </tr>';
			 
				 }
				 $temp_bill_summary_fetch = $this->Users_model->temp_bill_summary_fetch($data);
			
				 if(!empty($temp_bill_summary_fetch))
				 {
					 foreach ($temp_bill_summary_fetch as $row)
				 {	
					 $TOTQTY = $row->TOTQTY;
					 $TOTGROSS = $row->TOTGROSS;
					 $TOTTAX = $row->TOTTAX;
					 $TOTNET = $row->TOTNET;
 
				 }
				 echo '
				 <tr style="color:Crimson; font-weight:bold; font-size:large">    
				
				 <td>Total</td>
				 <td>-</td>
				 <td>-</td>
				 <td>'.$TOTQTY.'</td>
				 <td>-</td>
				 <td>'.$TOTGROSS.'</td>
				 <td>'.$TOTTAX.'</td>
				 <td></td>
				 <td>'.round($TOTNET,0).'</td>
				 <td>-</td>
				 
				 
			 </tr>';}
		}
		else
		{
				echo '<span style="color:red;"> SOMTHING WENT WRONG</span>';
		}
		
		
	 
	}

	public function add_to_cart()
	{

		$sessdata = $this->session->userdata('pbk_sess');
		$data['merchant_id'] = $sessdata['pbk_merchant_id'];
		
		if (isset($_POST['TZ_barcode']))
		{
		 	$data['TZ_barcode'] = $this->input->post('TZ_barcode');
			$specific_item_fetch = $this->Users_model->specific_item_fetch($data);
			foreach ($specific_item_fetch as $row)
			{
				$data['sku']=$row->sku;
				$data['item_name']=$row->item_name;
				echo $data['item_description']=$row->item_description;
			}
			if($this->input->post('retail_price')!=''){
				$cat_div = explode('|-|',$this->input->post('retail_price'));
				$data['retail_price'] = $cat_div[0];
				$data['tax_slab'] = $cat_div[1];
			}
			
			$data['qty'] = $this->input->post('quantity');
			$data['gross_amount']=$data['retail_price']*$data['qty'];
			$data['tax_amount']=$data['retail_price']*($data['tax_slab']/100);
			$data['net_amount']=$data['gross_amount']+$data['tax_amount'];
			
			$temp_bill_check = $this->Users_model->temp_bill_check($data);
		if ($temp_bill_check == 1) 
		{
			
			$specific_temp_bill_fetch = $this->Users_model->specific_temp_bill_fetch($data);
				 foreach ($specific_temp_bill_fetch as $row)
				 {	
					$TZ_barcode = $row->TZ_barcode;
					$qty = $row->qty;
					$retail_price = $row->retail_price;
					$gross_amount = $row->gross_amount;
					$tax_amount = $row->tax_amount;
					$net_amount = $row->net_amount;
				 }
				 
			$data['new_qty']=$qty+$data['qty'];
			$data['new_retail_price']=$data['retail_price'];
			$data['new_net_amount']=$net_amount+$data['net_amount'];
			$data['new_tax_amount']=$tax_amount+$data['tax_amount'];
			$data['new_gross_amount']=$gross_amount+$data['gross_amount'];

			$temp_bill_item_update2 = $this->Users_model->temp_bill_item_update2($data);
			
		}
		else{
			$new_temp_bill_insert = $this->Users_model->new_temp_bill_insert($data);
		
		}

	}	
	redirect('pos-billing', 'location');
	}
	public function pos_summary()
	{
		$this->load->view('dashboard_header_view');
		$this->load->view('dashboard_top_view');
		$this->load->view('dashboard_menus_view');
		$this->load->view('dashboard_pos_summary_view');
		$this->load->view('dashboard_bottom_view');
		$this->load->view('dashboard_table_footer_view');
	
	}


	public function bill_summary()
	{
		$this->load->view('dashboard_header_view');

		$sessdata = $this->session->userdata('pbk_sess');
		$data['merchant_id'] = $sessdata['pbk_merchant_id'];
		
		if (isset($_POST['TZ_barcode']))
		{
		 	$data['TZ_barcode'] = $this->input->post('TZ_barcode');
			 $temp_bill_summary_fetch = $this->Users_model->temp_bill_summary_fetch($data);
			
				if(!empty($temp_bill_summary_fetch))
				{
					foreach ($temp_bill_summary_fetch as $row)
				{	
					$TOTQTY = $row->TOTQTY;
					$TOTGROSS = $row->TOTGROSS;
					$TOTTAX = $row->TOTTAX;
					$TOTNET = $row->TOTNET;

				}
				$TOTNET=round($TOTNET,0);
			
			$temp_bill_fetch = $this->Users_model->temp_bill_fetch($data);
			
				 foreach ($temp_bill_fetch as $row)
				 {	
					 $TZ_barcode = $row->TZ_barcode;
					 
				 }

				
				 echo'  
						  <div class="modal-dialog" role="document">
							  <div class="modal-content">
								  <div class="modal-header">
									  <h4 class="modal-title" id="defaultModalLabel">PAYMENT MODE & CUSTOMER DETAILS </h4>
								  </div>
								  <div class="modal-body">';
								  
									  
									echo' <h4>
									Bill Value : <bold style="color:green;"><input type="number" id="bill_value" value="'.$TOTNET.'" style="width:15%" disabled>  </bold> 
									 | Total Pay : <bold  style="color:red;"><input type="text" id="to_pay" value="'.$TOTNET.'" style="width:15%" disabled>  </bold>  
									 | Discount : <bold  style="color:red;"><input type="text" id="discount" value="0" style="width:15%" disabled>  </bold>   
									</h4> 
									  
									<div class="tab-content">
								    <div role="tabpanel" class="tab-pane fade in active" id="home">
									   <form class="form-horizontal" id="payment_form" action="bill-checkout" method="POST">
									   <input type="hidden" id="bill_value2" name="bill_amt" value="'.$TOTNET.'">
									   <input type="hidden" id="to_pay2" name="balance_return" >
									   <input type="hidden" name="qty" value="'.$TOTQTY.'">
									   <input type="hidden" id="discount2" name="discount" >
                                            <h4>Payment Details</h4><hr>
											<!-- modal body starts -->
											<div class="form-group form-float">
											<div class="col-sm-4">
											<div class="form-line">
												
												<input type="text" list="customer" id="customer_mobile" name="customer_mobile" value="1000000000" onfocus="this.select(); onchange="customer_found();" class="form-control" autofocus required>
												
												<datalist id="customer">';
												$all_customer_fetch = $this->Users_model->all_customer_fetch($data);
			
												foreach ($all_customer_fetch as $row)
												{	
													$cust_mobile = $row->cust_mobile;
													$cust_name = $row->cust_name;
													$cust_address = $row->cust_address;
													$cust_email = $row->cust_email;

												echo '<option value="'.$cust_mobile.'|-|'.$cust_name.'|-|'.$cust_email.'|-|'.$cust_address.'">'.$cust_mobile.' | '.$cust_name.'</option>';
												}
															
												echo '</datalist>
												<label class="form-label">Customer Mobile</label>
												<script>
    // Automatically select the input value when the field gains focus
    document.getElementById("customer_mobile").addEventListener("focus", function() {
        this.select();
    });
</script>
											</div>
										</div>
			
											<div class="col-sm-4">
												<div class="form-line">
													<input type="text" id="customer_name" name="customer_name" onkeyup="newcust_name();" class="form-control" required>
													<label class="form-label">Customer Name</label>
													
												</div>
											</div>
											<div class="col-sm-4">
												<div class="form-line">
													<input type="email" id="customer_email" name="customer_email" onkeyup="newcust_email();" class="form-control">
													<label class="form-label">Customer Email</label>
													
												</div>
											</div>
											</div>
											<br>

											<div class="form-group form-float">
											<div class="col-sm-12">
												<div class="form-line">
													<textarea class="form-control" id="customer_address" name="customer_address" onkeyup="newcust_address();" maxlength="250" ></textarea>
													<label class="form-label">Customer Address (max 250char)</label>
													
												</div>
											</div>
											</div>
			
											
											<br><br>

											<div class="form-group form-float">
											
											<div class="col-sm-4">
												<div class="form-line">
												<select  id="staff_id" name="staff_id" class="form-control" required>
																	<option value="" selected disabled>Please Select</option>';
																	$active_staff_manager_fetch = $this->Users_model->active_staff_manager_fetch($data);
																	foreach ($active_staff_manager_fetch as $row)
																	{
																		$staff_id=$row->staff_id;
																		$name=$row->name;
																	echo '<option value="'.$staff_id.'">'.$name.'-'.$staff_id.'</option>'; 
																	}
																	
																	
																	echo'
																
																	</select> 
			
													<label class="form-label">Billing Staff*</label>
													
												</div>
											</div>

											<div class="col-sm-4">
												<div class="form-line">
												<select  id="promo_offer" name="promo_offer" onchange="update_discount();" class="form-control">
																	<option value="" selected disabled>Please Select</option>';
																	$merchant_promo_offers_fetch = $this->Users_model->merchant_promo_offers_fetch($data);
																	foreach ($merchant_promo_offers_fetch as $row)
																	{
																		
																		$offer_type=$row->offer_type;
																	echo '<option value="'.$offer_type.'">'.$offer_type.'</option>'; 
																	}
																	
																	
																	echo'
																
																	</select> 
			
													<label class="form-label">Promo/Offer</label>
													
												</div>
											</div>
											<div class="col-sm-4">
												<div class="form-line">
													<input type="number" name="discount_logic" id="discount_logic" onkeyup="update_discount();" class="form-control" min="0" value="0" disabled>
													<label class="form-label">Discount</label>
													
												</div>
											</div>
			
											
											</div>
											<br><br>
											<div class="form-group form-float">
											<div class="col-sm-4">
												<div class="form-line">
													<input type="number" name="card" id="card" onkeyup="update_payment();" class="form-control" min="0" value="0">
													<label class="form-label">Card</label>
													
												</div>
											</div>
											<div class="col-sm-4">
												<div class="form-line">
													<input type="number" name="online" id="online" onkeyup="update_payment();" class="form-control" min="0" value="0">
													<label class="form-label">Online</label>
													
												</div>
											</div>

											<div class="col-sm-4">
												<div class="form-line">
													<input type="number" name="cash" id="cash" onkeyup="update_payment();" class="form-control" min="0" value="0">
													<label class="form-label">Cash</label>
													
												</div>
											</div>
			
											
											</div>
											<br>

											<script>
											function update_payment(){
												let to_pay = document.getElementById("to_pay").value;
												let bill_value = document.getElementById("bill_value").value;
												let cash = document.getElementById("cash").value;
												let card = document.getElementById("card").value;
												let online = document.getElementById("online").value;
												let discount = document.getElementById("discount").value;
												
												document.getElementById("to_pay").value = bill_value - discount - card - online - cash;
												document.getElementById("to_pay2").value = bill_value - discount - card - online - cash;
												
																							
											}

											function update_discount(){
												document.getElementById("discount_logic").disabled=false;
												let discount_logic = document.getElementById("discount_logic").value;
												let promo_offer = document.getElementById("promo_offer").value;
												let bill_value = document.getElementById("bill_value").value;
												
	
												if(promo_offer==="Flat Discount (% off)")
												{
													bill_discount = Math.round(bill_value * discount_logic/100);
													if (isNaN(bill_discount)) {bill_discount = 0;}
													document.getElementById("discount").value = bill_discount;
													document.getElementById("discount2").value = bill_discount;
													document.getElementById("to_pay").value= bill_value - document.getElementById("discount").value ;
													update_payment();
													
												}
												else if(promo_offer==="Flat Discount (Amount off)")
												{
													bill_discount = Math.round(discount_logic);
													if (isNaN(bill_discount)) {bill_discount = 0;}
													document.getElementById("discount").value = bill_discount;
													document.getElementById("discount2").value = bill_discount;
													document.getElementById("to_pay").value= bill_value - document.getElementById("discount").value ;
													update_payment();
												}
												
																								
												}
											function customer_found(){
												let cust_data = document.getElementById("customer_mobile").value;
												let customer_mobile,customer_name,customer_email,customer_address="";
												cust_data = cust_data.split("|-|");
												if(cust_data.length===4)
												{
													customer_mobile =cust_data[0];
													customer_name =cust_data[1];
													customer_email =cust_data[2];
													customer_address =cust_data[3];

													document.getElementById("customer_name").value=customer_name;
													document.getElementById("customer_email").value=customer_email;
													document.getElementById("customer_address").value=customer_address;
													document.getElementById("customer_mobile").value=customer_mobile;

												}
												else
												{
													document.getElementById("customer_name").value="";
													document.getElementById("customer_email").value="";
													document.getElementById("customer_address").value="";

												
													
												
												}

												
												
																							
											}

											</script>
											
                                         									

											<!-- modal body ends  -->
                                	</div>
                 
								  </div>
								
								  <div class="modal-footer">
									<hr>  
									  <button type="button" onclick="submit_payment();" class="btn bg-green waves-effect" >
									  <i class="material-icons">check</i> <span>Checkout</span>
									  </button>
									  
									  </form>
									  <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
									
									  
								  </div>
							  </div>
						  </div>

						  <script>

						  function submit_payment() {
							// Get input values
							var customerMobile = document.getElementById("customer_mobile").value;
							var customerName = document.getElementById("customer_name").value;
							var staffId = document.getElementById("staff_id").value;
							var to_pay = parseFloat(document.getElementById("to_pay").value);
						
							// Perform basic form validation
							if (!customerMobile || !customerName || !staffId || to_pay > 0) {
								// Display an error message or handle validation failure as needed
								if (to_pay > 0) {
									alert("Collect proper bill amount");
								} else {
									alert("Customer Mobile, Name, Staff are required");
								}
								return;
							}
						
							// If validation passes, proceed with form submission
							document.forms["payment_form"].submit();
						}
						
						
						  </script>
					 ';
				

					}
		}
		else
		{
				echo '<span style="color:red;"> SOMTHING WENT WRONG</span>';
		}

		
		
		
		$this->load->view('dashboard_table_footer_view');
	}

	public function check_customer()
	{
		// Get merchant ID from session
		$sessdata = $this->session->userdata('pbk_sess');
		$data['merchant_id'] = $sessdata['pbk_merchant_id'];
	
		// Initialize variables
		$response = array('customerFound' => false);
	
		if ($this->input->post('customerMobile'))
		{
			$data['cust_mobile'] = $this->input->post('customerMobile');
	
			// Fetch specific customer details
			$specific_customer_fetch = $this->Users_model->specific_customer_fetch($data);
	
			// Check if customer data exists
			if (!empty($specific_customer_fetch))
			{
				$row = $specific_customer_fetch[0];
				$response = array(
					'customerFound' => true,
					'customerName' => $row->cust_name,
					'customerEmail' => $row->cust_email,
					'customerAddress' => $row->cust_address
				);
			}
		}
	
		// Send JSON response
		echo json_encode($response);
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

	public function multi_mrp()
	{

		$sessdata = $this->session->userdata('pbk_sess');
		$data['merchant_id'] = $sessdata['pbk_merchant_id'];
		
		if (isset($_POST['TZ_barcode']))
		{
		 	$data['TZ_barcode'] = $this->input->post('TZ_barcode');
			echo '<option value="" selected disabled>Please Select</option>';
			$specific_multi_mrp_fetch = $this->Users_model->specific_multi_mrp_fetch($data);
			foreach ($specific_multi_mrp_fetch as $row)
			{
				$retail_price=$row->retail_price;
				$tax_slab=$row->tax_slab;
				echo '<option value="'.$retail_price.'|-|'.$tax_slab.'">'.$retail_price.'</option>'; 
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

	public function add_new_offer()
	{

		$sessdata = $this->session->userdata('pbk_sess');
		$data['merchant_id'] = $sessdata['pbk_merchant_id'];
		
		if (isset($_POST['offer_type']))
		{
		 	$data['offer_type'] = $this->input->post('offer_type');
			$data['item_bill_wise'] = $this->input->post('item_bill');
			$data['offer_descr'] = $this->input->post('offer_descr');
			$data['offer_logic'] = $this->input->post('offer_logic');
			$data['promo_code'] = $this->input->post('promo_code');
			$data['scheduled'] = $this->input->post('scheduled');
			$data['offer_start_date'] = $this->input->post('offer_start_date');
			$data['offer_end_date'] = $this->input->post('offer_end_date');
		
			$new_promo_insert = $this->Users_model->new_promo_insert($data);

			$merchant_promo_offers_fetch = $this->Users_model->merchant_promo_offers_fetch($data);
				//var_dump($item_wise_sales);
				 //echo $this->db->last_query();
				 foreach ($merchant_promo_offers_fetch as $row)
				 {	
					$offer_type = $row->offer_type;
					$item_bill_wise = $row->item_bill_wise;
					$promo_code = $row->promo_code;
					$offer_logic = $row->offer_logic;
					$scheduled = $row->scheduled;
					 
					 
				 
					 echo '
					 <tr>   
 
					 <td>'.$offer_type.'</td>
					 <td>'.$item_bill_wise.'</td>
					 <td>'.$promo_code.'</td>
					 <td>'.$offer_logic.'</td>
					 <td>'.$scheduled.'</td>
					 <td>Action</td>
					 
					 
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
