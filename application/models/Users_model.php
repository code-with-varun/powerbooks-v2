<?php

class Users_model extends CI_Model
{

	function __construct()
	{
		parent::__construct();
		//load our second db and put in $db2
		// $this->ugl01 = $this->load->database('database1', TRUE);
		//load our second db and put in $db2
		// $this->ecm03 = $this->load->database('database3', TRUE);
		
	}

	public function check_mail_exists($data)
	{
		
		$result = $this->db->select('*')
			->where('eid', $data['eid'])
			->get('user_details')
			->row();
		if (!empty($result)) {
			return true;
		} else {
			return false;
		}
	}

	public function get_user_list($data)
	{
		
		$result = $this->db->select('*')
			->where('pass', $data['pass'])
			//->group_start()
			->where('eid', $data['eid'])
			//->or_where('mobile', $data['login_id'])
			//->group_end()
			//		->where("(email=$data['loginid'] OR mobile=$data['loginid'])", NULL, FALSE)
			->where('profile_status', 'ACTIVE')
			->get('user_details')
			->row();
		if (!empty($result)) {
			return true;
		} else {
			return false;
		}
	}

	
	public function check_merchant_config($data)
	{
		
		$result = $this->db->select('*')
			->where('merchant_id', $data['merchant_id'])
			->get('config_master')
			->row();
		if (!empty($result)) {
			return true;
		} else {
			return false;
		}
	}

	public function check_merchant_otp($data)
	{
		
		$result = $this->db->select('*')
			->where('otp', $data['otp'])
			->where('merchant_id', $data['merchant_id'])
			->get('user_details')
			->row();
		if (!empty($result)) {
			return true;
		} else {
			return false;
		}
	}

	public function check_otp_expiry($data)
	{

		return $this->db->select('*')
			->where('otp', $data['otp'])
			->where('merchant_id', $data['merchant_id'])
			->from('user_details')
			->get()
			->result();
	}
	
	public function specific_user_fetch_login($data)
	{

		return $this->db->select('*')
			->where('eid', $data['eid'])
			->or_where('merchant_id', $data['merchant_id'])
			->from('user_details')
			->get()
			->result();
	}

	
	public function specific_stock_balance_fetch($data)
	{

		return $this->db->select('*')
			->where('TZ_barcode', $data['TZ_barcode'])
			->where('merchant_id', $data['merchant_id'])
			->from('stock_balance')
			->get()
			->result();
	}

	
	public function config_master_fetch($data)
	{

		return $this->db->select('*')
			->where('merchant_id', $data['merchant_id'])
			->from('config_master')
			->get()
			->result();
	}

	
	
	public function item_wise_sales($data)
	{

		return $this->db->select('*')
		->where('pos_bill_date BETWEEN "' . $data['sdate'] . '" and "' . $data['edate'] . '"')
			->where('merchant_id', $data['merchant_id'])
			->from('itemwise_sales')
			->get()
			->result();
	}

	public function bill_wise_sales($data)
	{

		return $this->db->select('*')
		->where('pos_bill_date BETWEEN "' . $data['sdate'] . '" and "' . $data['edate'] . '"')
			->where('merchant_id', $data['merchant_id'])
			->from('billwise_sales')
			->get()
			->result();
	}

	public function day_wise_sales($data)
	{

		return $this->db->select('*')
		->where('pos_bill_date BETWEEN "' . $data['sdate'] . '" and "' . $data['edate'] . '"')
			->where('merchant_id', $data['merchant_id'])
			->from('daywise_sales')
			->get()
			->result();
	}

	public function inventory_summary($data)
	{

		return $this->db->select('sum(qty) AS SQTY, sum(gross_amount) AS SGROSS,
		 sum(tax_amount) AS STAX, sum(net_amount) AS SNET')
			->where('merchant_id', $data['merchant_id'])
			->where('entry_no', $data['entry_no'])
			->from('goods_purchased')
			->get()
			->result();
	}

	public function check_division_exists($data)
	{
		
		$result = $this->db->select('*')
			->where('division_name', $data['division_name'])
			->where('merchant_id', $data['merchant_id'])
			->get('division_details')
			->row();
		if (!empty($result)) {
			return true;
		} else {
			return false;
		}
	}
	
	public function check_category_exists($data)
	{
		
		$result = $this->db->select('*')
			->where('category_name', $data['category_name'])
			->where('merchant_id', $data['merchant_id'])
			->get('category_details')
			->row();
		if (!empty($result)) {
			return true;
		} else {
			return false;
		}
	}

	
	public function check_classification_exists($data)
	{
		
		$result = $this->db->select('*')
			->where('classification_name', $data['classification_name'])
			->where('merchant_id', $data['merchant_id'])
			->get('classification_details')
			->row();
		if (!empty($result)) {
			return true;
		} else {
			return false;
		}
	}

	public function multiple_price_check($data)
	{
		
		$result = $this->db->select('*')
			->where('TZ_barcode', $data['TZ_barcode'])
			->where('cost_price', $data['cost_price'])
			->where('mrp', $data['mrp'])
			->where('retail_price', $data['retail_price'])
			->where('tax_slab', $data['tax_slab'])
			->where('merchant_id', $data['merchant_id'])
			->get('multiple_price')
			->row();
		if (!empty($result)) {
			return true;
		} else {
			return false;
		}
	}

	public function stock_balance_check($data)
	{
		
		$result = $this->db->select('*')
			->where('TZ_barcode', $data['TZ_barcode'])
			->where('merchant_id', $data['merchant_id'])
			->get('stock_balance')
			->row();
		if (!empty($result)) {
			return true;
		} else {
			return false;
		}
	}
	
	public function item_wise_check($data)
	{
		
		$result = $this->db->select('*')
			->where('pos_bill_date BETWEEN "' . $data['sdate'] . '" and "' . $data['edate'] . '"')
			->where('merchant_id', $data['merchant_id'])
			->get('itemwise_sales')
			->row();
		if (!empty($result)) {
			return true;
		} else {
			return false;
		}
	}

	public function bill_wise_check($data)
	{
		
		$result = $this->db->select('*')
			->where('pos_bill_date BETWEEN "' . $data['sdate'] . '" and "' . $data['edate'] . '"')
			->where('merchant_id', $data['merchant_id'])
			->get('billwise_sales')
			->row();
		if (!empty($result)) {
			return true;
		} else {
			return false;
		}
	}

	public function day_wise_check($data)
	{
		
		$result = $this->db->select('*')
			->where('pos_bill_date BETWEEN "' . $data['sdate'] . '" and "' . $data['edate'] . '"')
			->where('merchant_id', $data['merchant_id'])
			->get('daywise_sales')
			->row();
		if (!empty($result)) {
			return true;
		} else {
			return false;
		}
	}

	public function staff_manager_fetch($data)
	{

		return $this->db->select('*')
			->where('user_type', "MANAGER")
			->or_where('user_type', "STAFF")
			->where('merchant_id', $data['merchant_id'])
			->from('user_details')
			->get()
			->result();
	}

	
	public function goods_register_fetch($data)
	{

		return $this->db->select('*')
			->where('merchant_id', $data['merchant_id'])
			->from('goods_register')
			->get()
			->result();
	}

	public function goods_purchased_fetch($data)
	{

		return $this->db->select('*')
			->where('merchant_id', $data['merchant_id'])
			->where('entry_no', $data['entry_no'])
			->from('goods_purchased')
			->get()
			->result();
	}
	
	public function division_fetch($data)
	{

		return $this->db->select('*')
			->where('merchant_id', $data['merchant_id'])
			->from('division_details')
			->get()
			->result();
	}

	public function specific_division_fetch($data)
	{

		return $this->db->select('*')
			->where('division_code', $data['division_code'])
			->from('division_details')
			->get()
			->result();
	}

	public function specific_item_fetch($data)
	{

		return $this->db->select('*')
			->where('TZ_barcode', $data['TZ_barcode'])
			->where('merchant_id', $data['merchant_id'])
			->from('item_master')
			->get()
			->result();
	}

	public function category_fetch($data)
	{

		return $this->db->select('*')
			->where('merchant_id', $data['merchant_id'])
			->from('category_details')
			->get()
			->result();
	}

	public function classification_fetch($data)
	{

		return $this->db->select('*')
			->where('merchant_id', $data['merchant_id'])
			->from('classification_details')
			->get()
			->result();
	}

	public function product_fetch($data)
	{

		return $this->db->select('*')
			->where('merchant_id', $data['merchant_id'])
			->from('item_master')
			->get()
			->result();
	}

	public function temp_inward_master_fetch($data)
	{

		return $this->db->select('*')
			->where('merchant_id', $data['merchant_id'])
			->from('temp_inward_master')
			->get()
			->result();
	}

	public function vendor_supplier_fetch($data)
	{

		return $this->db->select('*')
			->where('merchant_id', $data['merchant_id'])
			->from('vendor_supplier_master')
			->get()
			->result();
	}
	
	


	public function distinct_option_key()
	{

		return $this->db->select('DISTINCT (option_key)')
			->from('options_master')
			->get()
			->result();
	}

	public function distinct_option_value()
	{

		return $this->db->select('DISTINCT (option_value)')
			->from('options_master')
			->get()
			->result();
	}

	public function distinct_option_category()
	{

		return $this->db->select('DISTINCT (category)')
			->from('options_master')
			->get()
			->result();
	}

	public function all_options_fetch()
	{

		return $this->db->select('*')
			->from('options_master')
			->get()
			->result();
	}

	public function specific_options_fetch($data)
	{

		return $this->db->select('*')
		->where('option_id',$data['option_id'])
			->from('options_master')
			->get()
			->result();
	}

// options master


	public function options_business_structure()
	{

		return $this->db->select('*')
			->where('option_key', 'Business Structure')
			// ->where('category', 'Education')
			->from('options_master')
			->get()
			->result();
	}

	public function options_industry()
	{

		return $this->db->select('*')
			->where('option_key', 'Industry')
			// ->where('category', 'Education')
			->from('options_master')
			->get()
			->result();
	}
	public function options_business_category()
	{

		return $this->db->select('*')
			->where('option_key', 'Business Category')
			// ->where('category', 'Education')
			->from('options_master')
			->get()
			->result();
	}
	public function options_business_model()
	{

		return $this->db->select('*')
			->where('option_key', 'Business Model')
			// ->where('category', 'Education')
			->from('options_master')
			->get()
			->result();
	}
	public function options_invoice_print_type()
	{

		return $this->db->select('*')
			->where('option_key', 'Invoice Print Type')
			// ->where('category', 'Education')
			->from('options_master')
			->get()
			->result();
	}
	
	public function options_group_billing()
	{

		return $this->db->select('*')
			->where('option_key', 'Group Billing')
			// ->where('category', 'Education')
			->from('options_master')
			->get()
			->result();
	}

	public function options_vendor_type()
	{

		return $this->db->select('*')
			->where('option_key', 'Vendor Type')
			// ->where('category', 'Education')
			->from('options_master')
			->get()
			->result();
	}

	public function options_membership()
	{

		return $this->db->select('*')
			->where('option_key', 'Membership')
			// ->where('category', 'Education')
			->from('options_master')
			->get()
			->result();
	}

	public function options_membership_billed()
	{

		return $this->db->select('*')
			->where('option_key', 'Membership Billed')
			->from('options_master')
			->order_by('rid')
			->get()
			->result();
	}

	
	public function options_user_type()
	{

		return $this->db->select('*')
			->where('option_key', 'Membership Billed')
			->from('options_master')
			->order_by('rid')
			->get()
			->result();
	}

	public function options_tax_slab()
	{

		return $this->db->select('*')
			->where('option_key', 'Tax Slab')
			->from('options_master')
			->order_by('rid')
			->get()
			->result();
	}

	public function options_inventory_item_type()
	{

		return $this->db->select('DISTINCT(option_value)')
			->where('option_key', 'Inventory Item Type')
			->from('options_master')
			->order_by('rid')
			->get()
			->result();
	}
//ALL DELETE


	

// ALL UPDATE QUERIES

	public function account_activation_update($data)
	{
		return $this->db->set('profile_status', 'ACTIVE')
			->where('merchant_id', $data['merchant_id'])
			->where('otp', $data['otp'])
			->update('user_details');
	}

	public function onboarding_update($data)
	{
		return $this->db->set('onboarding', 'YES')
			->set('admin_mobile', $data['admin_mobile'])
			->where('merchant_id', $data['merchant_id'])
			->update('user_details');
	}

	
	public function new_stock_balance_update($data)
	{
		return $this->db->set('current_balance_qty', $data['current_balance_qty'])
			->where('TZ_barcode', $data['TZ_barcode'])
			->where('merchant_id', $data['merchant_id'])
			->update('stock_balance');
	}

	public function onboard_config_update($data)
	{
		return $this->db->set('company_name', $data['company_name'])
			->set('brand_name', $data['brand_name'])
			->set('business_structure', $data['business_structure'])
			->set('industry', $data['industry'])
			->set('business_model', $data['business_model'])
			->set('business_category', $data['business_category'])
			->set('door_no', $data['door_no'])
			->set('street', $data['street'])
			->set('landmark', $data['landmark'])
			->set('area', $data['area'])
			->set('city', $data['city'])
			->set('state', $data['state'])
			->set('pincode', $data['pincode'])
			->set('business_phone', $data['business_phone'])
			->set('business_email', $data['business_email'])
			->set('company_web', $data['company_web'])
			->set('pan', $data['pan'])
			->set('gstin', $data['gstin'])
			->set('auto_day_end', $data['auto_day_end'])
			->set('staging_invoice', $data['staging_invoice'])
			->set('billing_group', $data['billing_group'])
			->set('gst_tax_invoice', $data['gst_tax_invoice'])
			->set('direct_billing', $data['direct_billing'])
			->set('gstin', $data['gstin'])
			->set('invoice_print_type', $data['invoice_print_type'])
			->set('manage_stocks', $data['manage_stocks'])
			->where('merchant_id', $data['merchant_id'])
			->update('config_master');
	}

// ALL MAX ID FETCH


	public function min_merchant_id_fetch()
	{
		return $this->db->select('MIN(merchant_id) AS min_merchant')
			->from('user_details')
			->get()
			->result();
	}

	public function min_staff_id_fetch()
	{
		return $this->db->select('MIN(staff_id) AS min_staff')
			->from('user_details')
			->get()
			->result();
	}

	public function min_TZ_barcode_fetch()
	{
		return $this->db->select('MIN(TZ_barcode) AS min_TZ_barcode')
			->from('item_master')
			->get()
			->result();
	}
	
	public function max_division_id_fetch()
	{
		return $this->db->select('MAX(rid) AS max_division')
			->from('division_details')
			->get()
			->result();
	}

	public function max_category_id_fetch()
	{
		return $this->db->select('MAX(rid) AS max_category')
			->from('category_details')
			->get()
			->result();
	}

	public function max_classification_id_fetch()
	{
		return $this->db->select('MAX(rid) AS max_classification')
			->from('classification_details')
			->get()
			->result();
	}

	public function max_options_rid_fetch()
	{
		$my_query = "SELECT MAX(rid) AS MRID FROM `options_master`";

		return $this->db->query($my_query);
	}

	public function max_vendor_rid_fetch()
	{
		return $this->db->select('MAX(vendor_id) AS MRID')
			->from('vendor_supplier_master')
			->get()
			->result();
	}

	public function max_entry_rid_fetch($data)
	{
		return $this->db->select('MAX(rid) AS MRID')
			->where('merchant_id', $data['merchant_id'])
			->from('goods_register')
			->get()
			->result();
	}
	

	// counts

	public function tickets_stage_count_fetch($data)
	{
		$my_query = "SELECT stage,count(*)AS COUNTSTAGE FROM  `opportunity_tickets` WHERE merchant_id='".$data['merchant_id']."' GROUP BY stage";

		return $this->db->query($my_query);
	}

	public function bill_template_fetch($data)
	{
		$my_query = "SELECT * FROM `bill_template` WHERE merchant_id='".$data['merchant_id']."'";

		return $this->db->query($my_query);
	}

	public function next_bill_fetch($data)
	{
		$my_query = "SELECT MAX(sino) AS NBILL FROM  `billwise_sales` WHERE bill_no LIKE '".$data['bnt']."' AND merchant_id='".$data['merchant_id']."'";

		return $this->db->query($my_query);
	}

	

	// public function max_options_rid_fetch()
	// {
	// 	$my_query = "SELECT MAX(rid) AS MRID FROM `options_master`";

	// 	return $this->db->query($my_query);
	// }


//import commands

// public function import_attendump($import_data)
// 	{
// 		$this->db->empty_table('attendance_dump');
// 		//	$this->db->truncate('utr_mis');
// 		$this->db->insert_batch('attendance_dump', $import_data);

	
// 	}





// all insert commands

	public function new_user_details_insert($data)
	{

		return $this->db->insert('user_details', $data);
	}

	public function new_onboard_config_insert($data)
	{

		return $this->db->insert('config_master', $data);
	}	
	public function new_division_insert($data)
	{

		return $this->db->insert('division_details', $data);
	}	
	public function new_category_insert($data)
	{

		return $this->db->insert('category_details', $data);
	}
	public function new_classification_insert($data)
	{

		return $this->db->insert('classification_details', $data);
	}

	public function new_option_insert($data)
	{

		return $this->db->insert('options_master', $data);
	}

	public function new_product_insert($data)
	{

		return $this->db->insert('item_master', $data);
	}
	public function new_temp_goods_insert($data)
	{

		return $this->db->insert('temp_inward_master', $data);
	}

	public function new_vendor_insert($data)
	{

		return $this->db->insert('vendor_supplier_master', $data);
	}

	public function new_goods_purchased_insert($data)
	{

		return $this->db->insert('goods_purchased', $data);
	}

	public function new_goods_register_insert($data)
	{

		return $this->db->insert('goods_register', $data);
	}
	
	public function new_multiple_price_insert($data)
	{

		return $this->db->insert('multiple_price', $data);
	}

	public function new_stock_balance_insert($data)
	{

		return $this->db->insert('stock_balance', $data);
	}
	// modal ends here
}
