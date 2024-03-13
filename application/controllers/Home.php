<?php

class Home extends CI_Controller {

	
	public function index()
	{
		$this->load->view('home-view');
	}

	public function sign_in()
	{
		$this->load->view('signin-view');
		//this is in branch changes
	}

	public function sign_up()
	{
		$this->load->view('signup-view');
	}

	public function account_activate($one,$two)
	{
		$data['merchant_id']= $one;
		$data['otp']= $two;

		$check_merchant_otp = $this->Users_model->check_merchant_otp($data);
		if ($check_merchant_otp == 1) {

			$check_otp_expiry = $this->Users_model->check_otp_expiry($data);
			foreach ($check_otp_expiry as $row) {

				$otp_expiry = $row->otp_expiry;
				$otp_ago=strtotime($otp_expiry)-time();
				if($otp_ago<0)
				{
					$this->session->set_flashdata('registration_status','Verification Link Expired! Please Register again');
					redirect('messages', 'location');
				}
				else{

					$account_activation_update = $this->Users_model->account_activation_update($data);
					$this->session->set_flashdata('registration_status','Verified Succesfully! Please Login');
					redirect('messages', 'location');
				}

			}

		

		}
		else{
			$this->session->set_flashdata('registration_status','Merchant Not Registered');
			redirect('messages', 'location');
		}
		

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
					if($mdata['merchant_id']==-1){$mdata['merchant_id']==765431;}
						
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
<td>
<a href="#"> <img src="https://cdn.1lybio.in/images/logos/powerbooks-logo.png" style="float:left;width:30%; height:50%"> </a>
</td>
</tr>

<tr>
<td style="text-align:left; padding:50px;">

Congratulations!,<br><br> Your Powerbook Account has been Created.<br>
 Please click the below  link to activate your account.<br><br>

  
 <a  href="'.base_url().'activate/'.$mdata['merchant_id'].'/'.$mdata['otp'].'">
  <input type="button" style="color:white; 
  text-decoration:none;
  width:190px;
  height:45px; 
  border-radius:25px;
  
  background-color: #4CAF50;
  border: none;
  padding: 15px 32px;
  text-align: center;
  display: inline-block;
  font-size: 16px;" value="Activate" ></a>
  <br><br><br> 

  
<h5 style="color:black; text-align:left;padding-right:-20px">
All-in-one Small &  Medium Business Accounting software Solution. </h5>
</td>
</tr>
<tr>
<td>
  <center>
    <hr>
<a href="#"> 
<img src="https://cdn.1lybio.in/images/logos/thamizhanda.png" width="200px" height="70px"></a>
</center><br>
You have received this email because you are registered at Powerbooks.<br>

&#169;'.$today=date("Y").' Thamizhanda.in <a href="https://helpdesk.thamizhanda.in/" target="new">Unsubscribe</a>
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
	public function send_sales_summary()
	{
	
		$sessdata = $this->session->userdata('pbk_sess');
		$data['eid'] = $sessdata['pbk_eid'];
		$data['merchant_id'] = $sessdata['pbk_merchant_id'];
		
		$config_master_fetch = $this->Users_model->config_master_fetch($data);
		foreach ($config_master_fetch as $row)
		{
			$business_email = $row->business_email;
			$company_name = $row->company_name;
			$data['pos_status'] = $row->pos_status;
			$current_pos_date = $row->current_pos_date;
			
		}

$data['current_pos_date'] = $current_pos_date;

$specific_day_wise_sales = $this->Users_model->specific_day_wise_sales($data);

// Check if any rows are returned
if ($specific_day_wise_sales) {
    foreach ($specific_day_wise_sales as $row) {
        $net_bills = $row->net_bills;
        $net_qty = $row->net_qty;
        $net_value = $row->net_value;
        $cash_pay = $row->cash_pay;
        $card_pay = $row->card_pay;
        $other_pay = $row->other_pay;
    }
} else {
    // No rows returned, set all values to 0
    $net_bills = 0;
    $net_qty = 0;
    $net_value = 0;
    $cash_pay = 0;
    $card_pay = 0;
    $other_pay = 0;
}
//echo $this->db->last_query();
$avg_ticket_size = ($net_value / ($net_bills != 0 ? $net_bills : 1)); // Avoid division by zero

		

// summary mail STARTS
$to =$business_email;

//email subject
$subject = 'Powerbook Daily POS Summary for '.$data['merchant_id'].' - '.$company_name.' Dated on ('.$current_pos_date.')'; 

$htmlContent = '
<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            border-radius: 5px;
        }
        h2 {
            color: #333;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .center {
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="center">'.$company_name.' <br> Daily Summary</h2>

        <p><strong>POS Date:</strong> ' . $current_pos_date . '</p>
        <p><strong>Report Date:</strong> ' . date('Y-m-d') . '</p>
        
        <table>
            <tr>
                <th>Total Bills</th>
                <th>Total Qty</th>
                <th>Total Sales</th>
            </tr>
            <tr>
                <td>' . $net_bills . '</td>
                <td>' . $net_qty . '</td>
                <td>' . $net_value . '</td>
            </tr>
        </table>

        <table>
            <tr>
                <th>Total Cash</th>
                <th>Total Online</th>
                <th>Avg Ticket</th>
            </tr>
            <tr>
                <td>' . $cash_pay . '</td>
                <td>' . $other_pay . '</td>
                <td>' . $avg_ticket_size . '</td>
            </tr>
        </table>

        <p><strong>Daybook Expense (Dr)</strong></p>
        <p><strong>Petty cash/Sales Profit (Cr)</strong></p>
    </div>
</body>
</html>';


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
			// $this->session->set_flashdata('registration_status','Your Email has successfully been sent.');
           // echo 'Your Email has successfully been sent.';
        } else {
            //show_error($this->email->print_debugger());
        }
							
	//email message ends

	redirect('day-open-close', 'location');
  

	}

	// END OF CLASS

}




 
