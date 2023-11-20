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

	
	public function specific_user_fetch_login($data)
	{

		return $this->db->select('*')
			->where('eid', $data['eid'])
			//->or_where('mobile', $data['login_id'])
			->from('user_details')
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

	
	

// options master

	public function options_business_structure()
	{

		return $this->db->select('*')
			->where('option_key', 'business_structure')
			// ->where('category', 'Education')
			->from('options_master')
			->get()
			->result();
	}
	
	// public function options_employee_type()
	// {

	// 	return $this->db->select('*')
	// 		->where('OPTION_KEY', 'EMPLOYEE TYPE')
	// 		// ->where('category', 'Education')
	// 		->from('options_master')
	// 		->get()
	// 		->result();
	// }

	
// ALL MAX ID FETCH


	public function min_merchant_id_fetch()
	{
		return $this->db->select('MIN(merchant_id) AS min_merchant')
			->from('user_details')
			->get()
			->result();
	}

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
	// public function new_profile_kyc_insert($data)
	// {

	// 	return $this->db->insert('kyc_details', $data);
	// }
	
	


	// modal ends here
}
