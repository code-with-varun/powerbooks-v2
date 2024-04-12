<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$base=base_url()."public/";

$sessdata = $this->session->userdata('pbk_sess');
$user_type= $sessdata['pbk_user_type'];
$onboarding= $sessdata['pbk_onboarding'];
$merchant_id= $sessdata['pbk_merchant_id'];
$data['merchant_id']=$merchant_id;


foreach ($config_master_fetch as $row)
{
    $due_date_billing = $row->due_date_billing;
    $current_pos_date = $row->current_pos_date;
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
$TOTNET=round($TOTNET,0);
}

?>
<style>
    /* Hide number input spinner in Chrome */
    input[type="number"]::-webkit-inner-spin-button,
    input[type="number"]::-webkit-outer-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }
</style>


<section class="content">
        <div class="container-fluid">

			<div class="block-header">
			<?php if(uri_string()=="onboarding"){echo '<h2>Onboarding Form</h2>';}else{echo '<h2>Payment Details</h2>';}?>
                
            </div>

            <div class="row clearfix">
               
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"">
                    <div class="card">
                        <div class="body">
                            <div>
							    <div class="tab-content">
								    <div role="tabpanel" class="tab-pane fade in active" id="home">
									   
										    <h4>PAYMENT MODE & CUSTOMER DETAILS</h4>
                                            <h4>
                                    <?php echo'Bill Value : <bold style="color:green;"><input type="number" id="bill_value" value="'.$TOTNET.'" style="width:15%" disabled>  </bold> 
									 | Total Pay : <bold  style="color:red;"><input type="text" id="to_pay" value="'.$TOTNET.'" style="width:15%" disabled>  </bold>  
									 | Discount : <bold  style="color:red;"><input type="text" id="discount" value="0" style="width:15%" disabled>  </bold>   
									</h4> <hr>
                                    
                                    <form class="form-horizontal" id="payment_form" action="bill-checkout" method="POST">
									   <input type="hidden" id="bill_value2" name="bill_amt" value="'.$TOTNET.'">
									   <input type="hidden" id="to_pay2" name="balance_return" >
									   <input type="hidden" name="qty" value="'.$TOTQTY.'">
									   <input type="hidden" id="discount2" name="discount" >';
                                       ?>
											 <div class="form-group">
                                                <label for="door_no" class="col-sm-2 control-label" data-toggle="modal"  data-target="#addressBookModal">
                                                Mobile
                                                </label>
                                                    <!-- Button to trigger modal -->
    
                                                <div class="col-sm-3">
                                                    <div class="form-line">
                                                    <input type="number" id="customer_mobile" name="customer_mobile" value="1000000000" onfocus="this.select();" onblur="customer_check();" class="form-control" autofocus required inputmode="numeric" pattern="\d*" style="-moz-appearance: textfield;">

                                                    </div>
                                                </div>
												<label for="street" class="col-sm-1 control-label">Name</label>
                                                <div class="col-sm-3">
                                                    <div class="form-line">
                                                    <input type="text" id="customer_name" name="customer_name" onkeyup="newcust_name();" class="form-control" required>
                                                    </div>
                                                </div>
												<label for="landmark" class="col-sm-1 control-label">Email</label>
												<div class="col-sm-2">
                                                    <div class="form-line">
                                                    <input type="email" id="customer_email" name="customer_email" onkeyup="newcust_email();" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="area" class="col-sm-2 control-label">Address</label>
                                                <div class="col-sm-10">
                                                    <div class="form-line">
                                                    <textarea class="form-control" id="customer_address" name="customer_address" onkeyup="newcust_address();" maxlength="250" ></textarea>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="area" class="col-sm-2 control-label">Source</label>
                                                <div class="col-sm-4">
                                                    <div class="form-line">
                                                    <select  id="customer_source" name="customer_source" class="form-control">
																	<option value="" selected disabled>Please Select</option>
                                                                    <option value="DIRECT">Direct</option>
                                                                    <?php
                                                                    $options_customer_source = $this->Users_model->options_customer_source($data);
																	foreach ($options_customer_source as $row) 
                                                        {

                                                        $value=$row->option_value;
                                                        echo '<option value="'.$value.'">'.$value.'</option>'; 
                                                        
                                                        }
                                                        
																	
																	
																	?>
																
																	</select> 
                                                    </div>
                                                </div>
                                                <label for="area" class="col-sm-2 control-label">Billing Staff</label>
                                                <div class="col-sm-4">
                                                    <div class="form-line">
                                                    <select  id="staff_id" name="staff_id" class="form-control" required>
																	<option value="" selected disabled>Please Select</option>';
																	<?php
                                                                    $active_staff_manager_fetch = $this->Users_model->active_staff_manager_fetch($data);
																	foreach ($active_staff_manager_fetch as $row)
																	{
																		$staff_id=$row->staff_id;
																		$name=$row->name;
																	echo '<option value="'.$staff_id.'">'.$name.'-'.$staff_id.'</option>'; 
																	}
																	
																	
																	?>
																
																	</select> 
                                                    </div>
                                                </div>
                                            </div>
                                            
											<div class="form-group">
                                               
												<label for="city" class="col-sm-2 control-label">Promo/Offer</label>
                                                <div class="col-sm-4">
                                                    <div class="form-line">
                                                    <select  id="promo_offer" name="promo_offer" onchange="update_discount();" class="form-control">
																	<option value="" selected disabled>Please Select</option>';
                                                                    <?php
																	$merchant_promo_offers_fetch = $this->Users_model->merchant_promo_offers_fetch($data);
																	foreach ($merchant_promo_offers_fetch as $row)
																	{
																		
																		$offer_type=$row->offer_type;
																	echo '<option value="'.$offer_type.'">'.$offer_type.'</option>'; 
																	}
																	?>
																
																	</select> 
                                                    </div>
                                                </div>
												<label for="state" class="col-sm-2 control-label">Discount</label>
												<div class="col-sm-4">
                                                    <div class="form-line">
                                                    <input type="number" name="discount_logic" id="discount_logic" onkeyup="update_discount();" class="form-control" min="0" value="0" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php if($due_date_billing == 1): ?>
                                                <div class="form-group">
                                                    <label for="due_date" class="col-sm-2 control-label">Due Date</label>
                                                    <div class="col-sm-4">
                                                        <div class="form-line">
                                                            <input type="date" name="due_date" id="due_date" min="<?= $current_pos_date ?>" class="form-control">
                                                        </div>
                                                    </div>
                                                    <label for="due_in_days" class="col-sm-2 control-label">Due Days</label>
                                                    <div class="col-sm-4">
                                                        <div class="form-line">
                                                            <input type="number" name="due_in_days" id="due_in_days" class="form-control" value="0" disabled>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endif; ?>


											<div class="form-group">
                                                <label for="pincode" class="col-sm-2 control-label">Card</label>
                                                <div class="col-sm-2">
                                                    <div class="form-line">
                                                    <input type="number" name="card" id="card" onkeyup="update_payment();" class="form-control" min="0" value="0">
                                                    </div>
                                                </div>
												<label for="business_phone" class="col-sm-1 control-label">Online</label>
                                                <div class="col-sm-3">
                                                    <div class="form-line">
                                                    <input type="number" name="online" id="online" onkeyup="update_payment();" class="form-control" min="0" value="0">
                                                    </div>
                                                </div>
												<label for="business_email" class="col-sm-1 control-label">Cash</label>
												<div class="col-sm-3">
                                                    <div class="form-line">
                                                    <input type="number" name="cash" id="cash" onkeyup="update_payment();" class="form-control" min="0" value="0">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-offset-2 col-sm-10">
                                                    <button type="button" onclick="submit_payment();" id="paysubmit_Button" class="btn btn-success">Checkout</button>
													<a href="billing-pos"><button type="button" class="btn btn-danger">Back</button></a>
                                                </div>
                                            </div>
                                           
                                        </form>



                                        <?php
                                    //      echo' <hr>Bill Value : <bold style="color:green;"><input type="number" id="bill_value" value="'.$TOTNET.'" style="width:15%" disabled>  </bold> 
									//  | Total Pay : <bold  style="color:red;"><input type="text" id="to_pay" value="'.$TOTNET.'" style="width:15%" disabled>  </bold>  
									//  | Discount : <bold  style="color:red;"><input type="text" id="discount" value="0" style="width:15%" disabled>  </bold>';
                                   
                                   ?>


										
                            
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<!-- Address Book Modal -->
<div class="modal fade" id="addressBookModal" tabindex="-1" role="dialog" aria-labelledby="addressBookModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addressBookModalLabel">Address Book</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- DataTable to display address book entries -->
                <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            <th>Mobile Number</th>
                                            <th>Customer Name</th>
                                            <th>Email</th>
                                            <th>Address</th>
                                            <th>Source</th>
                                            
											
                                        </tr>
                                    </thead>
                                    <tfoot>
										<tr>
											
                                        
                                            <th>Mobile Number</th>
                                            <th>Customer Name</th>
                                            <th>Email</th>
                                            <th>Address</th>
                                            <th>Source</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
										<?php foreach ($all_customer_fetch as $row) 
										{
                                            $cust_name=$row->cust_name;
                                            $cust_rid=$row->rid;
										$cust_mobile=$row->cust_mobile;
										$cust_email=$row->cust_email;
                                        $cust_address=$row->cust_address;
                                        $source=$row->source;
										echo' <tr>
										
                                        <td onclick="selectCustomer(\'' . $cust_mobile . '\', \'' . $cust_name . '\', \'' . $cust_email . '\', \'' . $cust_address . '\')">' . $cust_mobile . '</td>
										<td>'.$cust_name.'</td>
										<td>'.$cust_email.'</td>
										<td>'.$cust_address.'</td>
                                        <td>'.$source.'</td>
										</tr>';
										}

										?>
                                        
                                    </tbody>
                                </table>
                            </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Function to handle selection of a customer from address book
    function selectCustomer(customerMobile,customerName,customerEmail,customerAddress) {
        // Set the selected customer mobile as the value of customer_mobile input field
        document.getElementById("customer_mobile").value = customerMobile;
        document.getElementById("customer_name").value = customerName;
        document.getElementById("customer_email").value = customerEmail;
        document.getElementById("customer_address").value = customerAddress;

        // Close the modal
        $('#addressBookModal').modal('hide');
         // Set focus on the staff_id input field
    document.getElementById("staff_id").focus();
    }

   
</script>


<script>
document.getElementById("customer_mobile").addEventListener("focus", function() {
this.select();
});

function customer_check() {
        let customerMobile = document.getElementById("customer_mobile").value;
        
        // Validate the length
        if (customerMobile.length !== 10) {
            alert("Please enter a valid 10-digit mobile number.");
            return;
        }

        // AJAX call to server endpoint
        $.ajax({
            url: "<?php echo base_url()."check-customer";?>",
            method: 'POST',
            data: { customerMobile: customerMobile },
            success: function(response) {
                // Parse the response and update customer details
                let data = JSON.parse(response);
                if (data.customerFound) {
                    document.getElementById("customer_name").value = data.customerName;
                    document.getElementById("customer_email").value = data.customerEmail;
                    document.getElementById("customer_address").value = data.customerAddress;
                } else {
                    // Clear the fields if customer data not found
                    document.getElementById("customer_name").value = "";
                    document.getElementById("customer_email").value = "";
                    document.getElementById("customer_address").value = "";
                }
            },
            error: function() {
                alert("Error in AJAX request.");
            }
        });
    }

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

    var submittingPayment = false; // Flag to track whether payment submission is in progress

function submit_payment() {
    // Get input values
    var customerMobile = document.getElementById("customer_mobile").value;
    var customerName = document.getElementById("customer_name").value;
    var staffId = document.getElementById("staff_id").value;
    var to_pay = parseFloat(document.getElementById("to_pay").value);

    // Perform basic form validation
    if (!customerMobile || !customerName || !staffId) {
        // Display an error message or handle validation failure as needed
        alert("Customer Mobile, Name, and Staff are required");
        return;
    }

    // Check if due_date element exists
    var due_date = document.getElementById("due_date");
    if (due_date && !due_date.value) {
        alert("Enter proper Due Date");
        return;
    }

    // Check if to_pay > 0
    if (to_pay > 0) {
        // Proceed with form submission
        var button = document.getElementById("paysubmit_Button");
        button.disabled = true; // Disable the button to prevent multiple clicks
        submittingPayment = true; // Set flag to indicate payment submission is in progress
        document.getElementById("payment_form").submit();
    } else {
        alert("Collect proper bill amount");
    }
}



						

</script>


	
