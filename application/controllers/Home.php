<?php

class Home extends CI_Controller {

	
	public function index()
	{
		$this->load->view('home-view');
	}

	public function sign_in()
	{
		$this->load->view('signin-view');
	}

	public function sign_up()
	{
		$this->load->view('signup-view');
	}

	public function account_activate($one,$two)
	{
		echo $one;
		echo $two;


	}

	public function messages()
	{
		$this->load->view('messages');
	}


	public function add_new_merchant()
	{
	
	$username= $_POST['name'];
		 $mdata['name'] = preg_replace("/[^a-zA-Z\s]/", " ", $username);
		 $useremail=$_POST['email'];
		 $mdata['eid'] = filter_var($useremail, FILTER_SANITIZE_EMAIL);
		 $userpass=$_POST['password'];
		 $userrepass=$_POST['confirm'];
		
		if($userpass==$userrepass)
		{
		    $mdata['pass']=md5($userpass);
		    
		}

		$check_mail_exists = $this->Users_model->check_mail_exists($mdata);
				if ($check_mail_exists == 0) 
				{
					// echo 'Unique mechant';
					$min_merchant_id_fetch = $this->Users_model->min_merchant_id_fetch();
					foreach ($min_merchant_id_fetch as $row) 
					{
						$rid= $row->min_merchant;					//merchant id
						$mdata['merchant_id']=$rid-1;
					}	
					$mdata['otp']=md5(rand(1000,9999));	
					$mdata['otp_expiry']=date('Y-m-d H:i:s',strtotime('+15 minutes',strtotime(date('Y-m-d H:i:s'))));	
					$mdata['user_type']='ADMIN';			
				
					$new_user_details_insert = $this->Users_model->new_user_details_insert($mdata);

// welcome mail STARTS
$to =$mdata['eid'];

//email subject
$subject = 'Powerbook Account Activation Merchant ID - '.$mdata['merchant_id']; 

$htmlContent = '

<CENTER><br>

<form style="padding:10px; background-color:#fe702e; width:776px; height:auto;">
<table border="0" style="padding:40px; text-align:center; background-color:white; width:100%; height:auto;">


<tr>
<td style="float:left;">
<a href="#"> <img src="https://cdn.1lybio.in/images/logos/powerbooks-logo.png" ></a>
</td>
</tr>

<tr>
<td style="background-image: url(https://thamizhanda.in/ispark/ldpromo/templates/uni-imgs/footer-powerbook-mail.png);background-repeat: no-repeat;  background-size: 776px 435px;   width:776px; height:435px;  padding-left:310px; text-align:left; ">

Congratulations!,<br><br> Your Powerbook Account has been Created.<br> Please click the below  link to activate your account.<br><br>

 
 <a  href="'.base_url().'activate/'.$mdata['merchant_id'].'/'.$mdata['otp'].'">
  <input type="button" style="color:white; 
  text-decoration:none;
  width:190px; height:80px; 
  
  background-color: #4CAF50;
  border: none;
  padding: 15px 32px;
  text-align: center;
  display: inline-block;
  font-size: 16px;" value="Activate" ></a>
  <br><br><br> 


<br><br><br><br><br><br>
<h5 style="color:black; text-align:center;padding-right:-20px">
All-in-one Small &  Medium Business Accounting software Solution. </h5>
</td>
</tr>
<tr>
<td>
<a href="#" style="text-align:right; padding-left:130px;"> <img src="https://cdn.1lybio.in/images/logos/thamizhanda.png" width="200px" height="70px"></a><br>
You have received this email because you are registered at Thamizhanda.in.<br>

&#169;'.$today=date("Y").' Thamizhanda.in <a href=#" target="new">Unsubscribe</a>
</td>
</tr>
</table>
</form>

</CENTER>';

$this->load->config('email');
        $this->load->library('email');
        
        $from = $this->config->item('smtp_user');
        $message = $htmlContent;

        $this->email->set_newline("\r\n");
        $this->email->from($from,'Powerbooks Team');
        $this->email->to($to);
        $this->email->subject($subject);
        $this->email->message($message);

        if ($this->email->send()) {
			$this->session->set_flashdata('registration_status','Your Email has successfully been sent.');
            //echo 'Your Email has successfully been sent.';
        } else {
            show_error($this->email->print_debugger());
        }
							
//email message ends
	
				redirect('messages', 'location');
  

				}
				else
				{
					//echo 'Email Already exists';
					$this->session->set_flashdata('registration_status','Email Already exists');
					redirect('messages', 'location');
				}

		

	}
}




 
