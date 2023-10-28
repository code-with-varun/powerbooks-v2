<?php

class Users_model extends CI_Model
{

	public function get_user_list($data)
	{
		$profile_status = 'ACTIVE';
		$result = $this->db->select('*')
			->where('pass', $data['pass'])
			->where('status', $profile_status)
			->get('user_details')
			->row();
		if (!empty($result)) {
			return true;
		} else {
			return false;
		}
	}

	public function specific_user_fetch($data)
	{

		return $this->db->select('*')
			->where('user_id', $data['user_id'])
			->from('user_details')
			->get()
			->result();
	}


}
