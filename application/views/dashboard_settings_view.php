<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$base=base_url()."public/";

foreach ($config_master_fetch as $row) 
{
echo $config_key=$row->config_key;
echo $config_value=$row->config_value;
$merchant_id=$row->merchant_id;
if($config_key=='brand_name'){$brand_name=$config_value;}
}

?>
 <section class="content">
        <div class="container-fluid">
            <div class="row clearfix">
               
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"">
                    <div class="card">
                        <div class="body">
                            <div>
							<img src="<?php echo $base;?>images/brand-logo.jpg" alt="brand Logo image " />
							<?php echo $brand_name." | ".$brand_name." | ".$brand_name." | ".$brand_name;?> 
                                <ul class="nav nav-tabs" role="tablist">
                                    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Company Details</a></li>
                                    <li role="presentation"><a href="#invoice_settings" aria-controls="settings" role="tab" data-toggle="tab">Invoice Settings</a></li>
                                    <li role="presentation"><a href="#division_settings" aria-controls="settings" role="tab" data-toggle="tab">Product Divisions</a></li>
                                    <li role="presentation"><a href="#change_password_settings" aria-controls="settings" role="tab" data-toggle="tab">Profile Settings</a></li>
                                </ul>

                                <div class="tab-content">
								    <div role="tabpanel" class="tab-pane fade in active" id="home">
									   <form class="form-horizontal" action="company-details-update" method="POST">
                                            <div class="form-group">
                                                <label for="NameSurname" class="col-sm-2 control-label">Merchant ID</label>
                                                <div class="col-sm-10">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" id="NameSurname" name="companyname"  value="merchant id" disabled >
                                                        <input type="hidden" class="form-control" id="NameSurname" name="merchantid"  value="merchant id" >
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="NameSurname" class="col-sm-2 control-label">Company Name</label>
                                                <div class="col-sm-10">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" id="NameSurname" name="companyname" placeholder="Company Name" value="company name" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="NameSurname" class="col-sm-2 control-label">Brand Name</label>
                                                <div class="col-sm-10">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" id="NameSurname" name="brandname" placeholder="Brand Name" value="brand name" required>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="InputExperience" class="col-sm-2 control-label">Store Address</label>

                                                <div class="col-sm-10">
                                                    <div class="form-line">
                                                        <textarea class="form-control" id="InputExperience" name="storeaddress" rows="3" placeholder="company Address">Company address</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="InputSkills" class="col-sm-2 control-label">PAN/GST</label>

                                                <div class="col-sm-10">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" id="InputSkills" name="pangst" placeholder="PAN/GST" value="PAN GST">
                                                    </div>
                                                </div>
                                            </div>
											<div class="form-group">
                                                <label for="logofile" class="col-sm-2 control-label">Brand Logo</label>

                                                <div class="col-sm-10">
                                                    <div class="form-line">
                                                        <input type="file" class="form-control" id="logofile" name="logofile" placeholder="Logo FIle">
														
													</div>
													
                                                </div>
                                            </div>
											
                                           
                                            <div class="form-group">
                                                <div class="col-sm-offset-2 col-sm-10">
                                                    <button type="submit" class="btn btn-danger">UPDATE</button>
                                                </div>
                                            </div>
                                        </form>

                                        
                                    </div>
                                    <div role="tabpanel" class="tab-pane fade in" id="invoice_settings">
                                        <form class="form-horizontal" action="invoice-settings-updator" method="POST">
                                             <input type="hidden" class="form-control" id="NameSurname" name="merchantid"  value="merchant id" >
                                                   
                                            <div class="form-group">
                                                <label for="NameSurname" class="col-sm-2 control-label">Phone Number</label>
                                                <div class="col-sm-10">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" id="NameSurname" name="phone_no" placeholder="Phone Number"  value="company phone" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="Email" class="col-sm-2 control-label">Brand Email</label>
                                                <div class="col-sm-10">
                                                    <div class="form-line">
                                                        <input type="email" class="form-control" id="Email" name="brand_email" placeholder="Brand Email" value="company mail" required>
                                                    </div>
                                                </div>
                                            </div>
                                           
                                            <div class="form-group">
                                                <label for="InputSkills" class="col-sm-2 control-label">Website</label>

                                                <div class="col-sm-10">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" id="InputSkills" name="Website" placeholder="Website" value="company website">
                                                    </div>
                                                </div>
                                            </div>

                                           
                                            <div class="form-group">
                                                <div class="col-sm-offset-2 col-sm-10">
                                                    <button type="submit" class="btn btn-danger">UPDATE</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    
<div role="tabpanel" class="tab-pane fade in" id="division_settings">
                                        
<h5> Divisions</h5><br>

<br><br>
                                           
                                            <div class="form-group">
                                                <div class="col-sm-10">
                                                   
                                                    <div class="col-sm-3">   
                                                     <form class="form-horizontal" action="DCC-updator" method="POST">
                                                        <input type="text" class="form-control" name="brand_division" placeholder="Division Name "  required>
                                                    </div>
                                                    <div class="col-sm-5">
                                                       
                                                        <input type="text" class="form-control" name="brand_div_desc" placeholder="Enter Division Description "  required>
                                                       
                                                    </div>
                                                    <div class="col-sm-2">
                                                        
                                                        <input type="hidden" class="form-control" name="mode"  value="NewDivision" >
                                                        <input type="hidden" class="form-control" name="merchantid"  value="merchant id" >
                                                        <button type="submit" class="btn btn-danger">Add Division</button>
                                                       </form>
                                                    </div>
                                                     
                                                </div>
                                            </div>
                                            <br><br>
<h5> Categories</h5><br>
                                            

<br><br>
                                              <div class="form-group">
                                                <div class="col-sm-10">
                                                   
                                                    <div class="col-sm-3">
                                                        <form class="form-horizontal" action="DCC-updator" method="POST">
                                                        <select class="form-control" name="category_division">
                                                   
                                                       </select>
                                                    </div>
                                                    <div class="col-sm-5">
                                                        
                                                        <input type="text" class="form-control" name="brand_category" placeholder="Enter Category Name "  required>
                                                       
                                                    </div>
                                                    <div class="col-sm-2">
                                                         <input type="hidden" class="form-control" name="mode"  value="NewCategory" >
                                                        <input type="hidden" class="form-control" name="merchantid"  value="merchant id" >
                                                        
                                                        <button type="submit" class="btn btn-danger">Add Category</button>
                                                       </form>
                                                    </div>
                                                     
                                                </div>
                                            </div>
                                            <br><br>
                                            
<h5> Classification</h5><br>
                                            

<br><br>
                                           
                                              <div class="form-group">
                                                <div class="col-sm-10">
                                                   
                                                    <div class="col-sm-5">
                                                        <form class="form-horizontal" action="DCC-updator" method="POST">
                                                        <input type="text" class="form-control" name="brand_classification" placeholder="Enter Classification Name "  required>
                                                       
                                                    </div>
                                                    <div class="col-sm-2">
                                                        
                                                        <input type="hidden" class="form-control" name="mode"  value="NewClassification" >
                                                        <input type="hidden" class="form-control" name="merchantid"  value="merchant id" >
                                                        
                                                        <button type="submit" class="btn btn-danger">Add Classification</button>
                                                       </form>
                                                    </div>
                                                     
                                                </div>
                                            </div>

                                          
                                        
</div>
                                    
                                    
                                    <div role="tabpanel" class="tab-pane fade in" id="change_password_settings">
                                        <form class="form-horizontal" action="password-update" method="POST">
                                            <div class="form-group">
                                                <label for="NameSurname" class="col-sm-2 control-label">Merchant ID</label>
                                                <div class="col-sm-10">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" id="NameSurname" name="companyname"  value="merchant id" disabled >
                                                        <input type="hidden" class="form-control" id="NameSurname" name="merchantid"  value="merchant id" >
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="OldPassword" class="col-sm-2 control-label">Old Password</label>
                                                <div class="col-sm-10">
                                                    <div class="form-line">
                                                        <input type="password" class="form-control" id="OldPassword" name="oldpass" placeholder="Old Password" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="NewPassword" class="col-sm-2 control-label">New Password</label>
                                                <div class="col-sm-10">
                                                    <div class="form-line">
                                                        <input type="password" class="form-control" id="NewPassword" name="newpass1" placeholder="New Password" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="NewPasswordConfirm" class="col-sm-2 control-label">New Password (Confirm)</label>
                                                <div class="col-sm-10">
                                                    <div class="form-line">
                                                        <input type="password" class="form-control" id="NewPasswordConfirm" name="newpass2" placeholder="New Password (Confirm)" required>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-sm-offset-3 col-sm-9">
                                                    <button type="submit" class="btn btn-danger">UPDATE</button>
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
        </div>
    </section>
