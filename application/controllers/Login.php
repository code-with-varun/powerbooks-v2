<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{


	function __construct()
	{
		parent::__construct();
		// $this->load->model('Login_model');
	}

	function user_login()
	{
		$this->load->model('Users_model');
		$data['eid'] = $this->input->post('eid');
		$tpass = $this->input->post('pass');
		$tpass = md5($tpass);
		$data['pass'] = $tpass;

		$check_user = $this->Users_model->get_user_list($data);
		if ($check_user == 1) {
			//echo 'one use found';
			$specific_user_fetch_login = $this->Users_model->specific_user_fetch_login($data);
			foreach ($specific_user_fetch_login as $row) {

				$eid = $row->eid;
				$user_type = $row->user_type;
				$name = $row->name;
				$data['merchant_id']=$merchant_id = $row->merchant_id;
				$onboarding = $row->onboarding;
				

				$sesdata = array(
					'pbk_eid'  => $eid,
					'pbk_name'  => $name,
					'pbk_merchant_id'  => $merchant_id,
					'pbk_onboarding'  => $onboarding,
					'pbk_user_type' => $user_type

				);


				$this->session->set_userdata('pbk_sess', $sesdata);

				$config_master_fetch = $this->Users_model->config_master_fetch($data);
				foreach ($config_master_fetch as $row)
				{
					$direct_billing = $row->direct_billing;
				}

				if($direct_billing=='YES' && ($data['user_type']!="ADMIN"))
				{
					redirect('billing', 'location');
				}
				elseif($onboarding=='NO')
				{
					redirect('onboarding', 'location');
				}
				else{
					redirect('dashboard', 'location');
				}
				
			}
		} else {
			//echo 'no user found';
			redirect('sign-in', 'location');
		}
	}

	function user_logout()
	{
		$this->session->unset_userdata('pbk_sess');
		redirect('sign-in', 'location');
	}

	

}
