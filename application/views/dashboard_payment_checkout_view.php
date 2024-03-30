<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$base=base_url()."public/";
$sessdata = $this->session->userdata('pbk_sess');
$user_type= $sessdata['pbk_user_type'];
$onboarding= $sessdata['pbk_onboarding'];
$eid= $sessdata['pbk_eid'];
$data['merchant_id']= $sessdata['pbk_merchant_id'];



?>
	 echo'  
						  <div class="modal-dialog" role="document">
							  <div class="modal-content">
								  <div class="modal-header">
									  <h4 class="modal-title" id="defaultModalLabel">PAYMENT MODE & CUSTOMER DETAILS </h4>
								  </div>
								  <div class="modal-body">';
								  
									  
									echo' <h4>
									Bill No : <bold style="color:blue;"> Next Bill </bold> | Bill Value : <bold style="color:green;"><input type="number" id="bill_value" value="'.$TOTNET.'" style="width:15%" disabled>  </bold>  | Total Pay : <bold  style="color:red;"><input type="text" id="to_pay" value="'.$TOTNET.'" style="width:15%" disabled>  </bold>   
									</h4> 
									  
									<form action="bill-checkout" id="hidden_form" method="POST">
									<input type="text" id="customer_mobile2" name="customer_mobile" >
									<input type="text" id="customer_name2" name="customer_name" >
									<input type="text" id="customer_email2" name="customer_email" >
									<input type="text" id="customer_address2" name="customer_address" >
									<input type="text" id="staff_id2" name="staff_id" >
									<input type="submit">
									</form>
									<div class="tab-content">
								    <div role="tabpanel" class="tab-pane fade in active" id="home">
									   <form class="form-horizontal" id="checkout" action="bill-checkout" method="POST">
									   
                                            <h4>Payment Details</h4><hr>
											<!-- modal body starts -->
											<div class="form-group form-float">
											<div class="col-sm-4">
											<div class="form-line">
												
												<input type="text" list="customer" id="customer_mobile" name="customer_mobile"  onchange="customer_found();" class="form-control" autofocus required>
												
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
												
											</div>
										</div>
			
											<div class="col-sm-4">
												<div class="form-line">
													<input type="text" id="customer_name" name="customer_name" onkeyup="newcust_name();" class="form-control">
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
			
											
											<br>

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

											<br><br>

											<div class="form-group form-float">
											
											<div class="col-sm-4">
												<div class="form-line">
												
			
													<label class="form-label">Promo Codes</label>
													
												</div>
											</div>

											<div class="col-sm-4">
												<div class="form-line">
												<select  id="staff_id" name="staff_id" onchange="staff_id_change();" class="form-control" required>
																	<option value="" selected disabled>Please Select</option>';
																	$active_staff_manager_fetch = $this->Users_model->active_staff_manager_fetch($data);
																	foreach ($active_staff_manager_fetch as $row)
																	{
																		$staff_id=$row->staff_id;
																		$name=$row->name;
																	echo '<option value="'.$staff_id.'">'.$name.'</option>'; 
																	}
																	
																	
																	echo'
																	<option value="se">opt</option>
																	</select> 
			
													<label class="form-label">Billing Staff*</label>
													
												</div>
											</div>
			
											
											</div>

											<script>
											function update_payment(){
												let to_pay = document.getElementById("to_pay").value;
												let bill_value = document.getElementById("bill_value").value;
												let cash = document.getElementById("cash").value;
												let card = document.getElementById("card").value;
												let online = document.getElementById("online").value;
												
												
												
												document.getElementById("to_pay").value = bill_value - card - online - cash;
												
																							
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

													document.getElementById("customer_name2").value=customer_name;
													document.getElementById("customer_email2").value=customer_email;
													document.getElementById("customer_address2").value=customer_address;
													document.getElementById("customer_mobile2").value=customer_mobile;
												
												}
												else
												{
													document.getElementById("customer_name").value="";
													document.getElementById("customer_email").value="";
													document.getElementById("customer_address").value="";

													document.getElementById("customer_name2").value="";
													document.getElementById("customer_email2").value="";
													document.getElementById("customer_address2").value="";
												
													
													
												
												}

												function staff_id_change(){
													document.getElementById("staff_id2").value=document.getElementById("staff_id").value
												}
											
												function newcust_mobile(){
													document.getElementById("customer_mobile2").value=document.getElementById("customer_mobile").value
												}

												function newcust_name(){
													document.getElementById("customer_name2").value=document.getElementById("customer_name").value
												}
												function newcust_email(){
													document.getElementById("customer_email2").value=document.getElementById("customer_email").value
												}
												function newcust_address(){
													document.getElementById("customer_address2").value=document.getElementById("customer_address").value
												}

												
												
																							
											}

											</script>
											
                                         									

											<!-- modal body ends  -->
                                	</div>
                 
								  </div>
								
								  <div class="modal-footer">
									<hr>  
									<button type="button" onclick="checkoutNow();" class="btn bg-green waves-effect" id="checkoutButton">
        <i class="material-icons">check</i> <span>Checkout</span>
    </button>
									  </form>
									  <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
									
									  
								  </div>
							  </div>
						  </div>
					 ';
					 echo '<script>
    function checkoutNow() {
        var button = document.getElementById("checkoutButton");
        button.disabled = true; // Disable the button to prevent multiple clicks
        document.getElementById("checkout").submit();
    }
</script>';

		  echo "<script>
		var customer_mobile = document.getElementById('customer_mobile');
		var customer_mobile2 = document.getElementById('customer_mobile2');
		customer_mobile.addEventListener('input', function() {
			
			customer_mobile2.value = customer_mobile.value;
		});
        var customer_name = document.getElementById('customer_name');
        var customer_name2 = document.getElementById('customer_name2');
		customer_name.addEventListener('input', function() {
            
            customer_name2.value = customer_name.value;
        });
		var customer_email = document.getElementById('customer_email');
        var customer_email2 = document.getElementById('customer_email2');
		customer_email.addEventListener('input', function() {
            
            customer_email2.value = customer_email.value;
        });
		var customer_address = document.getElementById('customer_address');
        var customer_address2 = document.getElementById('customer_address2');
        customer_address.addEventListener('input', function() {
            
            customer_address2.value = customer_address.value;
        });
    </script>";
