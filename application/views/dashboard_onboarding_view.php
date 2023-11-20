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
									   <form class="form-horizontal" action="company-details-update" method="POST">
										   <h4>Basic Details</h4><hr>
                                            <div class="form-group">
                                                <label for="NameSurname" class="col-sm-2 control-label">Merchant ID</label>
                                                <div class="col-sm-2">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" id="NameSurname" name="companyname"  value="<?php echo $merchant_id;?>" disabled >
                                                        <input type="hidden" class="form-control" id="NameSurname" name="merchantid"  value="<?php echo $merchant_id;?>" >
                                                    </div>
                                                </div>
												<label for="admin_name" class="col-sm-2 control-label">Admin Name</label>
												<div class="col-sm-2">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" id="admin_name" name="admin_name" placeholder="Admin Name" autofocus required>
                                                    </div>
                                                </div>
												<label for="admin_name" class="col-sm-2 control-label">Business Structure</label>
												<div class="col-sm-2">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" id="admin_name" name="admin_name" placeholder="Admin Name" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="NameSurname" class="col-sm-2 control-label">Company Name</label>
                                                <div class="col-sm-3">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" id="NameSurname" name="companyname" placeholder="Company Name" required>
                                                    </div>
                                                </div>
												<label for="NameSurname" class="col-sm-1 control-label">PAN</label>
                                                <div class="col-sm-2">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" id="NameSurname" name="companyname" placeholder="Company Name" >
                                                    </div>
                                                </div>
												<label for="brandname" class="col-sm-1 control-label">GSTIN</label>
												<div class="col-sm-3">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" id="brandname" name="brandname" placeholder="Brand Name" >
                                                    </div>
                                                </div>
                                            </div>

                                            <h4>Contact Details</h4><hr>
											<div class="form-group">
                                                <label for="NameSurname" class="col-sm-2 control-label">Company Name</label>
                                                <div class="col-sm-3">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" id="NameSurname" name="companyname" placeholder="Company Name" required>
                                                    </div>
                                                </div>
												<label for="NameSurname" class="col-sm-1 control-label">PAN</label>
                                                <div class="col-sm-2">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" id="NameSurname" name="companyname" placeholder="Company Name" >
                                                    </div>
                                                </div>
												<label for="brandname" class="col-sm-1 control-label">GSTIN</label>
												<div class="col-sm-3">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" id="brandname" name="brandname" placeholder="Brand Name" >
                                                    </div>
                                                </div>
                                            </div>
                                         
                                            
                                            <div class="form-group">
                                                <label for="InputExperience" class="col-sm-2 control-label">Company Address</label>

                                                <div class="col-sm-10">
                                                    <div class="form-line">
                                                        <textarea class="form-control" id="InputExperience" name="storeaddress" rows="3" placeholder="company Address"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            
										
											
                                           
                                            <div class="form-group">
                                                <div class="col-sm-offset-2 col-sm-10">
                                                    <button type="submit" class="btn btn-danger">Onboard</button>
                                                </div>
                                            </div>
                                        </form>

                            
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
