<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$base=base_url()."public/";
$sessdata = $this->session->userdata('pbk_sess');
$eid = $sessdata['pbk_eid'];
$name = $sessdata['pbk_name'];
$merchant_id= $sessdata['pbk_merchant_id'];
$user_type= $sessdata['pbk_user_type'];
$onboarding= $sessdata['pbk_onboarding'];



?>
 <section class="content">
        <div class="container-fluid">

			<div class="block-header">
                <h2>Onboarding Form</h2>
            </div>

            <div class="row clearfix">
               
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"">
                    <div class="card">
                        <div class="body">
                            <div>
							    <div class="tab-content">
								    <div role="tabpanel" class="tab-pane fade in active" id="home">
									   <form class="form-horizontal" action="merchant-onboard" method="POST">
									   
										   <h4>Basic Details</h4><hr>
                                            <div class="form-group">
                                                <label for="merchant_id" class="col-sm-2 control-label">Merchant ID</label>
                                                <div class="col-sm-4">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" id="merchant_id" name="merchant_id"  value="<?php echo $merchant_id;?>" disabled >
                                                    </div>
                                                </div>
												<label for="admin_name" class="col-sm-2 control-label">Admin Name</label>
												<div class="col-sm-4">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" id="admin_name" name="admin_name" value="<?php echo $name;?>" placeholder="Admin Name"  disabled>
                                                    </div>
                                                </div>
												
                                            </div>
											<div class="form-group">
											<label for="admin_email" class="col-sm-2 control-label">Admin Email</label>
                                                <div class="col-sm-4">
                                                    <div class="form-line">
                                                        <input type="email" class="form-control" id="admin_email" name="admin_email" placeholder="Admin Email" value="<?php echo$eid;?>" disabled>
                                                    </div>
                                                </div>
												<label for="admin_mobile" class="col-sm-2 control-label">Admin Mobile</label>
                                                <div class="col-sm-4">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" id="admin_mobile" maxlength="10" name="admin_mobile" placeholder="Admin Mobile" autofocus required>
                                                    </div>
                                                </div>
											</div>
											<div class="form-group">
											<label for="company_name" class="col-sm-2 control-label">Company Name</label>
                                                <div class="col-sm-4">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" id="company_name" name="company_name" placeholder="Company Name" required>
                                                    </div>
                                                </div>
												<label for="brand_name" class="col-sm-2 control-label">Brand Name</label>
                                                <div class="col-sm-4">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" id="brand_name" name="brand_name" placeholder="Brand Name" >
                                                    </div>
                                                </div>
											</div>
                                            <div class="form-group">
											<label for="business_structure" class="col-sm-2 control-label">Business Structure</label>
												<div class="col-sm-4">
                                                    <div class="form-line">
                                                        <select  name="business_structure" id="business_structure" class="form-control" required>
                                                        <option value="" selected disabled>Please Select</option>
                                                        <?php 
                                                        foreach ($options_business_structure as $row) 
                                                        {

                                                        $value=$row->option_value;
                                                        echo '<option value="'.$value.'">'.$value.'</option>'; 
                                                        }
                                                        ?>
                                                        </select>   
                                                    </div>
                                                </div>
                                                <label for="industry" class="col-sm-2 control-label">Industry</label>
                                                <div class="col-sm-4">
                                                    <div class="form-line">
													<input type="text"  name="industry" list="industry" placeholder="Industry" class="form-control" required>
                                                       
													<datalist id="industry">
													<option value="" selected disabled>Please Select</option>
                                                        <?php 
                                                        foreach ($options_industry as $row) 
                                                        {

                                                        $value=$row->option_value;
                                                        echo '<option value="'.$value.'">'.$value.'</option>'; 
                                                        }
                                                        ?>
                                                        </datalist>   
                                                    </div>
                                                </div>
												
												
                                            </div>
											<div class="form-group">
											<label for="business_model" class="col-sm-2 control-label">Business Model</label>
                                                <div class="col-sm-4">
                                                    <div class="form-line">
													<select  name="business_model" id="business_model" class="form-control" required>
                                                        <option value="" selected disabled>Please Select</option>
                                                        <?php 
                                                        foreach ($options_business_model as $row) 
                                                        {

                                                        $value=$row->option_value;
                                                        echo '<option value="'.$value.'">'.$value.'</option>'; 
                                                        }
                                                        ?>
                                                        </select>   
                                                    </div>
                                                </div>
												<label for="business_category" class="col-sm-2 control-label">Business Category</label>
                                                <div class="col-sm-4">
                                                    <div class="form-line">
													<select  name="business_category" id="business_category" class="form-control" required>
                                                        <option value="" selected disabled>Please Select</option>
                                                        <?php 
                                                        foreach ($options_business_category as $row) 
                                                        {

                                                        $value=$row->option_value;
                                                        echo '<option value="'.$value.'">'.$value.'</option>'; 
                                                        }
                                                        ?>
                                                        </select>   
                                                    </div>
                                                </div>

												</div>


                                            <h4>Contact Details</h4><hr>
											<div class="form-group">
                                                <label for="door_no" class="col-sm-2 control-label">Door No</label>
                                                <div class="col-sm-3">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" id="door_no" name="door_no" placeholder="Door No" required>
                                                    </div>
                                                </div>
												<label for="street" class="col-sm-1 control-label">Street</label>
                                                <div class="col-sm-2">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" id="street" name="street" placeholder="Street" required>
                                                    </div>
                                                </div>
												<label for="landmark" class="col-sm-1 control-label">Landmark</label>
												<div class="col-sm-3">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" id="landmark" name="landmark" placeholder="Landmark" required>
                                                    </div>
                                                </div>
                                            </div>
                                         
                                            
											<div class="form-group">
                                                <label for="area" class="col-sm-2 control-label">Area</label>
                                                <div class="col-sm-3">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" id="area" name="area" placeholder="Area" required>
                                                    </div>
                                                </div>
												<label for="city" class="col-sm-1 control-label">City</label>
                                                <div class="col-sm-2">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" id="city" name="city" placeholder="City" required>
                                                    </div>
                                                </div>
												<label for="state" class="col-sm-1 control-label">State</label>
												<div class="col-sm-3">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" id="state" name="state" placeholder="State" required>
                                                    </div>
                                                </div>
                                            </div>
											<div class="form-group">
                                                <label for="pincode" class="col-sm-2 control-label">Pincode</label>
                                                <div class="col-sm-3">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" id="pincode" minlength="6" maxlength="6" name="pincode" placeholder="Pincode" required>
                                                    </div>
                                                </div>
												<label for="business_phone" class="col-sm-1 control-label">Phone</label>
                                                <div class="col-sm-2">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" id="business_phone" maxlength="10" name="business_phone" placeholder="Business Phone" >
                                                    </div>
                                                </div>
												<label for="business_email" class="col-sm-1 control-label">Email</label>
												<div class="col-sm-3">
                                                    <div class="form-line">
                                                        <input type="email" class="form-control" id="business_email"  name="business_email" placeholder="Business Email">
                                                    </div>
                                                </div>
                                            </div>

											<h4>Membership Details</h4><hr>
                                            <div class="form-group">
                                                <label for="membership" class="col-sm-2 control-label">Membership</label>
                                                <div class="col-sm-4">
                                                    <div class="form-line">
													<select  name="membership" id="membership" class="form-control" required>
                                                        <option value="" selected disabled>Please Select</option>
                                                        <?php 
                                                        foreach ($options_membership as $row) 
                                                        {

                                                        $value=$row->option_value;
                                                        echo '<option value="'.$value.'">'.$value.'</option>'; 
                                                        }
                                                        ?>
                                                        </select>   
                                                    </div>
                                                </div>
												<label for="membership_billed" class="col-sm-2 control-label">Membership Billed</label>
                                                <div class="col-sm-4">
                                                    <div class="form-line">
													<select  name="membership_billed" id="membership_billed" class="form-control" required>
                                                        <option value="" selected disabled>Please Select</option>
                                                        <?php 
                                                        foreach ($options_membership_billed as $row) 
                                                        {

                                                        $value=$row->option_value;
                                                        echo '<option value="'.$value.'">'.$value.'</option>'; 
                                                        }
                                                        ?>
                                                        </select>   
                                                    </div>
                                                </div>
												
                                            </div>
											
											<h4>POS Configurations</h4><hr>
											<div class="form-group">
											<label for="invoice_print_type" class="col-sm-2 control-label">Invoice Print Type</label>
                                                <div class="col-sm-4">
                                                    <div class="form-line">
													<select  name="invoice_print_type" id="invoice_print_type" class="form-control" required>
                                                        <option value="" selected disabled>Please Select</option>
                                                        <?php 
                                                        foreach ($options_invoice_print_type as $row) 
                                                        {

                                                        $value=$row->option_value;
                                                        echo '<option value="'.$value.'">'.$value.'</option>'; 
                                                        }
                                                        ?>
                                                        </select>  
                                                    </div>
                                                </div>
												<label for="auto_day_end" class="col-sm-2 control-label">Auto Day End</label>
                                                <div class="col-sm-4">
													<div class="switch">
														<label><input type="checkbox" name="auto_day_end" value="YES"><span class="lever"></span></label>
													</div>
                                                </div>
											</div>
											<div class="form-group">
												<label for="pos_start_date" class="col-sm-2 control-label">POS Start Date</label>
												<div class="col-sm-4">
													<div class="form-line">
														<input type="date" class="form-control" value="<?php echo date('Y-m-d')?>" name="pos_start_date" max="<?php echo date('Y-m-d')?>" >
													</div>
                                                </div>
												<label for="direct_billing" class="col-sm-2 control-label">Direct Billing</label>
                                                <div class="col-sm-4">
												<div class="switch">
														<label><input type="checkbox" checked onchange="direct_stage()" id="direct_billing" name="direct_billing" value="YES"><span class="lever"></span></label>
													</div>
                                                </div>
											</div>
											<div class="form-group">
											<label for="billing_group" class="col-sm-2 control-label">Billing Group</label>
                                                <div class="col-sm-4">
												<div class="form-line">
												<select  name="invoice_print_type" id="invoice_print_type" class="form-control" required>
                                                        <option value="" selected disabled>Please Select</option>
                                                        <?php 
                                                        foreach ($options_invoice_print_type as $row) 
                                                        {

                                                        $value=$row->option_value;
                                                        echo '<option value="'.$value.'">'.$value.'</option>'; 
                                                        }
                                                        ?>
                                                        </select> 
													</div>
                                                </div>
												<label for="staging_invoice" class="col-sm-2 control-label">Staging Invoice</label>
                                                <div class="col-sm-4">
												<div class="switch">
												<label><input type="checkbox" onchange="stage_direct()" id="staging_invoice" name="staging_invoice" value="YES"><span class="lever"></span></label>
													</div>
                                                </div>
												
											</div>
											<div class="form-group">

											<label for="gst_tax_invoice" class="col-sm-2 control-label">GST/TAX Invoice</label>
                                                <div class="col-sm-4">
												<div class="switch">
														<label><input type="checkbox" onchange="check_gstin()" id="gst_tax_invoice" name="gst_tax_invoice" value="YES"><span class="lever"></span></label>
													</div>
                                                </div>

												<label for="inventory" class="col-sm-2 control-label">Inventory</label>
                                                <div class="col-sm-4">
												<div class="switch">
												<label><input type="checkbox"  id="inventory" name="inventory" value="YES"><span class="lever"></span></label>
													</div>
                                                </div>
												
											</div>

											<h4>KYC</h4><hr>
											<div class="form-group">
                                                <label for="pan" class="col-sm-2 control-label">PAN</label>
                                                <div class="col-sm-4">
                                                    <div class="form-line">
													<input type="text" class="form-control" id="pan" name="pan" placeholder="PAN NO" required>
                                                    </div>
                                                </div>
												<label for="gstin" class="col-sm-2 control-label">GSTIN</label>
                                                <div class="col-sm-4">
                                                    <div class="form-line">
													<input type="text" class="form-control" id="gstin" name="gstin" placeholder="GSTIN">
													</div>
                                                </div>
												
                                            </div>

                                            <div class="form-group">
                                                <div class="col-sm-offset-2 col-sm-10">
                                                    <button type="submit" class="btn btn-success">Save</button>
													<button type="reset" class="btn btn-danger">Clear</button>
                                                </div>
                                            </div>
                                        </form>


										<script>
											function direct_stage(){
												document.getElementById("staging_invoice").checked = false;
												document.getElementById("direct_billing").checked = true;
												
											}
											function stage_direct(){
												document.getElementById("staging_invoice").checked = true;
												document.getElementById("direct_billing").checked = false;
												
											}
											function check_gstin(){
												let tax_invoice = document.getElementById("gst_tax_invoice").checked; 
												if(tax_invoice)
												{
													document.getElementById("gstin").placeholder="GSTIN Required";
													document.getElementById("gstin").required = true;
												}
												else
												{
													document.getElementById("gstin").placeholder="GSTIN Optional";
													document.getElementById("gstin").required = false;
												}

																							
											}
										</script>
                            
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
