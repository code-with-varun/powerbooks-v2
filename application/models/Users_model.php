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

	public function merchant_stock_balance_fetch($data)
	{

		return $this->db->select('*')
			->where('merchant_id', $data['merchant_id'])
			->from('stock_balance')
			->get()
			->result();
	}

	public function merchant_tax_register_fetch($data)
	{

		return $this->db->select('*')
			->where('merchant_id', $data['merchant_id'])
			->from('tax_register')
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

	public function specific_multi_mrp_fetch($data)
	{

		return $this->db->select('*')
			->where('TZ_barcode', $data['TZ_barcode'])
			->where('merchant_id', $data['merchant_id'])
			->from('multiple_price')
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

	public function current_day_item_wise_sales($data)
	{

		return $this->db->select('TZ_barcode, item_name, SUM(qty) as total_qty')
			->where('pos_bill_date', $data['current_pos_date'])
			->where('merchant_id', $data['merchant_id'])
			->from('itemwise_sales')
			->group_by('TZ_barcode')
			->order_by('total_qty', 'DESC')
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

	public function specific_day_wise_sales($data)
	{

		return $this->db->select('*')
			->where('pos_bill_date', $data['current_pos_date'])
			->where('merchant_id', $data['merchant_id'])
			->from('daywise_sales')
			->get()
			->result();
	}

	public function pos_last_bill_fetch($data)
	{
		return $this->db->select('*')
						->where('merchant_id', $data['merchant_id'])
						->order_by('sino', 'DESC')
						->limit(1)
						->get('billwise_sales')
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

	public function temp_bill_summary_fetch($data)
	{

		return $this->db->select('sum(qty) AS TOTQTY, sum(gross_amount) AS TOTGROSS,
		 sum(tax_amount) AS TOTTAX, sum(net_amount) AS TOTNET')
			->where('merchant_id', $data['merchant_id'])
			->from('temp_bill')
			->get()
			->result();
	}

	public function pos_month_summary_fetch($data)
	{
		$data['current_pos_date'] = substr($data['current_pos_date'],0,7);
		
		return $this->db->select('SUM(net_qty) AS TOTQTY, SUM(net_bills) AS TOTBILLS, SUM(net_value) AS TOTVALUE')
			->where('pos_bill_date LIKE "' . $data['current_pos_date'] . '%"')
			->where('merchant_id', $data['merchant_id'])
			->from('daywise_sales')
			->get()
			->result();
	}

	public function pos_full_month_fetch($data)
	{
		$data['current_pos_date'] = substr($data['current_pos_date'],0,7);
		
		return $this->db->select('*')
			->where('pos_bill_date LIKE "' . $data['current_pos_date'] . '%"')
			->where('merchant_id', $data['merchant_id'])
			->from('daywise_sales')
			->get()
			->result();
	}

	public function pos_year_summary_fetch($data)
{
    $current_year = substr($data['current_pos_date'], 0, 4);
    $data['fy_cy'] = strtoupper($data['fy_cy']); // Ensure it is uppercase (FY or CY)

    // Set the start and end dates based on fy_cy parameter
    if ($data['fy_cy'] === 'FY') {
        // Financial Year: April 1st to March 31st (inclusive)
        $start_date = ($current_year - 1) . '-04-01';
        $end_date = $current_year . '-03-31';
    } elseif ($data['fy_cy'] === 'CY') {
        // Calendar Year: January 1st to December 31st (inclusive)
        $start_date = $current_year . '-01-01';
        $end_date = $current_year . '-12-31';
    } else {
        // Default to the whole year
        $start_date = $current_year . '-01-01';
        $end_date = $current_year . '-12-31';
    }

    return $this->db->select('SUM(net_qty) AS TOTQTY, SUM(net_bills) AS TOTBILLS, SUM(net_value) AS TOTVALUE')
        ->where('pos_bill_date >=', $start_date)
        ->where('pos_bill_date <=', $end_date)
        ->where('merchant_id', $data['merchant_id'])
        ->from('daywise_sales')
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

	public function new_customer_check($data)
	{
		
		$result = $this->db->select('*')
			->where('cust_mobile', $data['cust_mobile'])
			// ->where('customer_name', $data['customer_name'])
			// ->where('customer_email', $data['customer_email'])
			// ->where('customer_address', $data['customer_address'])
			->where('merchant_id', $data['merchant_id'])
			->get('customer_base')
			->row();
		if (!empty($result)) {
			return true;
		} else {
			return false;
		}
	}

	public function specific_customer_fetch($data)
	{
		
		return $this->db->select('*')
			->where('cust_mobile', $data['cust_mobile'])
			->where('merchant_id', $data['merchant_id'])
			->get('customer_base')
			->result();		
	}

	public function specific_customer_by_id_fetch($data)
	{
		
		return $this->db->select('*')
			->where('rid', $data['customer_rid'])
			->where('merchant_id', $data['merchant_id'])
			->get('customer_base')
			->result();		
	}

	public function billwise_insights($data) {
		// Get cust_mobile from customer_base table using rid
		$this->db->select('cust_mobile');
		$this->db->where('rid', $data['customer_rid']);
		$query = $this->db->get('customer_base');
	
		if ($query->num_rows() > 0) {
			$customer_row = $query->row();
			$cust_mobile = $customer_row->cust_mobile;
	
			// Get insights summary from billwise_sales table
			$this->db->select('SUM(qty) AS total_qty, COUNT(bill_no) AS total_bills, SUM(to_pay) AS total_to_pay, AVG(to_pay) AS avg_to_pay')
			->where('cust_mobile', $cust_mobile)
			->where('isvoid', 0)
			->where('merchant_id', $data['merchant_id']);
			$query = $this->db->get('billwise_sales');
	
			if ($query->num_rows() > 0) {
				return $query->result();
			} else {
				// No data found
				return false;
			}
		} else {
			// No customer found with given rid
			return false;
		}
	}
	
	public function itemwise_insights($data) {
		// Fetch cust_mobile using rid from customer_base table
		$this->db->select('cust_mobile');
		$this->db->where('rid', $data['customer_rid']);
		$query = $this->db->get('customer_base');
	
		if ($query->num_rows() > 0) {
			$customer_row = $query->row();
			$cust_mobile = $customer_row->cust_mobile;
	
			// Fetch bill_no using cust_mobile from billwise_sales table
			$this->db->select('bill_no')
			->where('cust_mobile', $cust_mobile)
			->where('isvoid', 0)
			->where('merchant_id', $data['merchant_id']);
			$bill_query = $this->db->get('billwise_sales');
	
			if ($bill_query->num_rows() > 0) {
				$bill_numbers = $bill_query->result_array();
	
				// Fetch insights summary from itemwise_sales table
				$this->db->select('TZ_barcode,item_name, SUM(qty) AS itotal_qty, SUM(net_amount) AS itotal_net_amount')
				->where_in('bill_no', array_column($bill_numbers, 'bill_no'))
				->where('merchant_id', $data['merchant_id'])
				->group_by('TZ_barcode')
				->order_by('net_amount desc');
				
				$query = $this->db->get('itemwise_sales');
	
				if ($query->num_rows() > 0) {
					return $query->result();
				} else {
					// No data found for insights summary
					return false;
				}
			} else {
				// No bill numbers found for the customer
				return false;
			}
		} else {
			// No customer found with the given rid
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

	public function temp_bill_check($data)
	{
		
		$result = $this->db->select('*')
			->where('TZ_barcode', $data['TZ_barcode'])
			->where('retail_price', $data['retail_price'])
			->where('merchant_id', $data['merchant_id'])
			->get('temp_bill')
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
			->where('merchant_id', $data['merchant_id'])
			->group_start()
			->where('user_type', "MANAGER")
			->or_where('user_type', "STAFF")
			->group_end()
			->from('user_details')
			->get()
			->result();
	}

	public function active_staff_manager_fetch($data)
	{

		return $this->db->select('*')
			->where('profile_status', 'ACTIVE')
			->where('merchant_id', $data['merchant_id'])
			->group_start()
			->where('user_type', "MANAGER")
			->or_where('user_type', "STAFF")
			->group_end()
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

	public function specific_category_byid_fetch($data)
	{

		return $this->db->select('*')
			->where('rid', $data['category_id'])
			->where('merchant_id', $data['merchant_id'])
			->from('category_details')
			->get()
			->result();
	}

	public function specific_division_byid_fetch($data)
	{

		return $this->db->select('*')
			->where('rid', $data['division_id'])
			->where('merchant_id', $data['merchant_id'])
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

	public function product_fetch_by_division_category($data)
	{
    return $this->db->select('*')
        ->where('merchant_id', $data['merchant_id'])
        ->from('item_master')
        // ->group_by('division') // Group by both division and category
        ->order_by('category','asc') // Optional: Order the results by division and category
        ->get()
        ->result();
	}

	public function top_10_products($data)
	{
		return $this->db->select('TZ_barcode, item_name, SUM(qty) as total_qty')
			->where('merchant_id', $data['merchant_id'])
			->from('itemwise_sales')
			->group_by('TZ_barcode')
			->order_by('total_qty', 'DESC')
			->limit(10)
			->get()
			->result();
	}

	public function category_wise_product_fetch($data)
	{

		return $this->db->select('*')
			->where('merchant_id', $data['merchant_id'])
			->where('category', $data['category'])
			->from('item_master')
			->get()
			->result();
	}
	public function division_wise_category_fetch($data)
	{

		return $this->db->select('*')
			->where('merchant_id', $data['merchant_id'])
			->where('division_code', $data['division_code'])
			->from('category_details')
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

	
	public function temp_bill_fetch($data)
	{

		return $this->db->select('*')
			->where('merchant_id', $data['merchant_id'])
			->from('temp_bill')
			->get()
			->result();
	}

	public function specific_temp_bill_fetch($data)
	{

		return $this->db->select('*')
			->where('TZ_barcode', $data['TZ_barcode'])
			->where('retail_price', $data['retail_price'])
			->where('merchant_id', $data['merchant_id'])
			->from('temp_bill')
			->get()
			->result();
	}

	public function month_on_month_sales($data) {
		$this->db->select('YEAR(pos_bill_date) AS year, MONTH(pos_bill_date) AS month, SUM(net_qty) AS total_net_qty, SUM(net_value) AS total_net_value');
		$this->db->from('daywise_sales');
		$this->db->where('merchant_id', $data['merchant_id']); // Filter by merchant_id
		$this->db->group_by('merchant_id, YEAR(pos_bill_date), MONTH(pos_bill_date)');
		$query = $this->db->get();
		return $query->result();
	}
	
	public function all_customer_fetch($data)
	{

		return $this->db->select('*')
			->where('merchant_id', $data['merchant_id'])
			->from('customer_base')
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
	public function options_customer_source($data)
	{

		return $this->db->select('*')
			->where('option_key', 'CUSTOMER SOURCE')
			->where('merchant_id', $data['merchant_id'])
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

	public function offer_category_fetch()
	{

		return $this->db->select('DISTINCT(option_key)')
			->where('category', 'OFFER TYPE')
			->from('options_master')
			->get()
			->result();
	}

	public function all_offers_fetch()
	{

		return $this->db->select('*')
			->where('category', 'OFFER TYPE')
			->from('options_master')
			->get()
			->result();
	}

	public function merchant_promo_offers_fetch($data)
	{

		return $this->db->select('*')
			->where('merchant_id', $data['merchant_id'])
			->from('promo_offers')
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

public function temp_inward_delete($data)
	{

		return $this->db->where('merchant_id', $data['merchant_id'])
			->delete('temp_inward_master');
		
	}

	public function temp_bill_item_all_delete($data)
	{

		return $this->db->where('merchant_id', $data['merchant_id'])
			->delete('temp_bill');
		
	}
	
	
	public function temp_bill_item_delete($data)
	{
		return $this->db->where('TZ_barcode', $data['TZ_barcode'])
		->where('qty', $data['qty'])
		->where('retail_price', $data['retail_price'])
		->where('net_amount', $data['net_amount'])
		->where('gross_amount', $data['gross_amount'])
		->where('tax_amount', $data['tax_amount'])
		->where('merchant_id', $data['merchant_id'])
		->delete('temp_bill');
	
	}

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

	public function temp_bill_item_update($data)
	{
		return $this->db->set('net_amount', $data['new_net_amount'])
			->set('gross_amount', $data['new_gross_amount'])
			->set('tax_amount', $data['new_tax_amount'])
			->set('retail_price', $data['new_retail_price'])
			->set('qty', $data['new_qty'])
			->where('gross_amount', $data['gross_amount'])
			->where('net_amount', $data['net_amount'])
			->where('tax_amount', $data['tax_amount'])
			->where('retail_price', $data['retail_price'])
			->where('qty', $data['qty'])
			->where('TZ_barcode', $data['TZ_barcode'])
			->where('merchant_id', $data['merchant_id'])
			->update('temp_bill');
	}
	public function new_customer_update($data)
	{
		return $this->db->set('cust_name', $data['cust_name'])
			->set('cust_email', $data['cust_email'])
			->set('cust_address', $data['cust_address'])
			->set('source', $data['customer_source'])
			->where('cust_mobile', $data['cust_mobile'])
			->where('merchant_id', $data['merchant_id'])
			->update('customer_base');
	}
	public function temp_bill_item_update2($data)
	{
		return $this->db->set('net_amount', $data['new_net_amount'])
			->set('gross_amount', $data['new_gross_amount'])
			->set('tax_amount', $data['new_tax_amount'])
			->set('retail_price', $data['new_retail_price'])
			->set('qty', $data['new_qty'])
			->where('retail_price', $data['retail_price'])
			->where('TZ_barcode', $data['TZ_barcode'])
			->where('merchant_id', $data['merchant_id'])
			->update('temp_bill');
	}

	public function staff_status_update($data)
	{
		return $this->db->set('profile_status', $data['profile_status'])
			->where('staff_id', $data['staff_id'])
			->update('user_details');
	}
	
	public function void_status_update($data)
	{
		return $this->db->set('isvoid', $data['isvoid'])
			->where('bill_no', $data['bill_no'])
			->where('merchant_id', $data['merchant_id'])
			->update('billwise_sales');
	}

	public function specific_staff_manager_fetch($data)
	{

		return $this->db->select('*')
			->where('staff_id', $data['staff_id'])
			->from('user_details')
			->get()
			->result();
	}

	public function current_posdate_update($data)
	{
		return $this->db->set('current_pos_date', $data['current_pos_date'])
		->set('pos_status', $data['pos_status'])
			->where('merchant_id', $data['merchant_id'])
			->update('config_master');
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


	public function updateDaywiseSummary($merchantId) {
		$this->db->trans_start(); // Start transaction
	
		$this->db->select("
			COUNT(*) AS gross_bills,
			SUM(qty) AS gross_qty,
			SUM(to_pay) AS gross_value,
			SUM(CASE WHEN bill_no LIKE 'R%' THEN 1 ELSE 0 END) AS return_bills,
			SUM(CASE WHEN bill_no LIKE 'R%' THEN qty ELSE 0 END) AS return_qty,
			SUM(CASE WHEN bill_no LIKE 'R%' THEN to_pay ELSE 0 END) AS return_value,
			COUNT(CASE WHEN bill_no LIKE 'S%' THEN 1 ELSE NULL END) AS net_bills,
			SUM(CASE WHEN bill_no LIKE 'S%' THEN qty ELSE 0 END) AS net_qty,
			SUM(CASE WHEN bill_no LIKE 'S%' THEN to_pay ELSE 0 END) AS net_value,
			SUM(cash_pay) AS cash_pay,
			SUM(card_pay) AS card_pay,
			SUM(other_pay) AS other_pay,
			merchant_id,
			pos_bill_date
		");
		$this->db->from('billwise_sales');
		$this->db->where('pos_bill_date IS NOT NULL', null, false);
		$this->db->where('merchant_id', $merchantId);
		$this->db->where('isvoid', 0);
		$this->db->group_by('merchant_id, pos_bill_date');
	
		$query = $this->db->get();
	
		// Check if there are no records in billwise_sales
		// if ($query->num_rows() == 0) {
			// Handle the case where there are no records
			// For example, you may want to insert default values into daywise_sales
			// You can insert default values here and then exit the method
			// For now, I'll just return true to indicate success
		// 	return true;
		// }
	
		// Iterate through the results and update or insert into daywise_sales
		foreach ($query->result_array() as $data) {
			$this->db->where('merchant_id', $data['merchant_id']);
			$this->db->where('pos_bill_date', $data['pos_bill_date']);
	
			// Check if a record already exists for the given merchant_id and pos_bill_date
			$this->db->where('merchant_id', $data['merchant_id']);
			$this->db->where('pos_bill_date', $data['pos_bill_date']);
			$existingRecord = $this->db->get('daywise_sales')->row_array();
	
			if ($existingRecord) {
				// Update existing record
				$this->db->where('merchant_id', $data['merchant_id']);
				$this->db->where('pos_bill_date', $data['pos_bill_date']);
				$this->db->update('daywise_sales', $data);
			} else {
				// Insert a new record
				$this->db->insert('daywise_sales', $data);
			}
		}
	
		$this->db->trans_complete(); // Complete transaction
	
		if ($this->db->trans_status() === FALSE) {
			// Handle transaction failure if needed
			return false;
		}
	
		return true;
	}
	

	

	public function updateTaxRegister($merchantId) {
        $this->db->trans_start(); // Start transaction

        $this->db->select("
            bill_no,
            SUM(qty) AS total_qty,
            tax_slab,
            SUM(gross_amount) AS total_gross_amount,
            SUM(tax_amount) AS total_tax_amount,
            SUM(net_amount) AS total_net_amount,
            merchant_id,
            pos_bill_date
        ");
        $this->db->from('itemwise_sales');
        $this->db->where('merchant_id', $merchantId);
        $this->db->group_by('bill_no, tax_slab, merchant_id, pos_bill_date');

        $query = $this->db->get();

        foreach ($query->result_array() as $data) {
            $existingRecord = $this->db
                ->where('bill_no', $data['bill_no'])
                ->where('tax_slab', $data['tax_slab'])
                ->where('merchant_id', $data['merchant_id'])
                ->where('pos_bill_date', $data['pos_bill_date'])
                ->get('tax_register')
                ->row_array();

            if ($existingRecord) {
                // Update existing record
                $this->db
                    ->where('bill_no', $data['bill_no'])
                    ->where('tax_slab', $data['tax_slab'])
                    ->where('merchant_id', $data['merchant_id'])
                    ->where('pos_bill_date', $data['pos_bill_date'])
                    ->update('tax_register', $data);
            } else {
                // Insert a new record
                $this->db->insert('tax_register', $data);
            }
        }

        $this->db->trans_complete(); // Complete transaction

        if ($this->db->trans_status() === FALSE) {
            // Handle transaction failure if needed
            return false;
        }

        return true;
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

	public function max_bill_rid_fetch($data)
	{
		$bill_prefix = '%'.$data['bill_prefix'].'%';
		$merchantid=$data['merchant_id'];

		$my_query = "SELECT MAX(rsino) AS MRID FROM  `billwise_sales` WHERE `bill_no` LIKE '$bill_prefix' AND `merchant_id`='$merchantid'";
		
		return $this->db->query($my_query);
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

	public function new_temp_bill_insert($data)
	{

		return $this->db->insert('temp_bill', $data);
	}
	public function new_customer_insert($data)
	{

		return $this->db->insert('customer_base', $data);
	}

	public function new_promo_insert($data)
	{

		return $this->db->insert('promo_offers', $data);
	}


	public function new_bill_insert($data)
	{

		return $this->db->insert('billwise_sales', $data);
	}
	public function new_walkin_insert($data)
	{

		return $this->db->insert('walkin_details', $data);
	}
	public function new_itemwise_insert($data)
	{
		$merchantid = $data['merchant_id'];
		$bill_no = $data['bill_no'];
		$pos_bill_date = $data['pos_bill_date'];
	
		$my_query = "INSERT INTO itemwise_sales (
			bill_no, TZ_barcode, sku, item_name, item_description, qty, retail_price, tax_slab,
			gross_amount, tax_amount, net_amount, merchant_id, pos_bill_date)
			SELECT '$bill_no', TZ_barcode, sku, item_name, item_description, qty, retail_price, tax_slab,
			gross_amount, tax_amount, net_amount, merchant_id, '$pos_bill_date'
			FROM temp_bill WHERE `merchant_id` = '$merchantid'";
	
		return $this->db->query($my_query);
	}

	

	// modal ends here
}
