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
                <h2>
					Supplier Master
                </h2>
            </div>
            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                EXPORTABLE TABLE
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:void(0);">Action</a></li>
                                        <li><a href="javascript:void(0);">Another action</a></li>
                                        <li><a href="javascript:void(0);">Something else here</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
											<th>Vendor Id</th>
											<th>Vendor Type</th>
											<th>Vendor Name</th>
                                            <th>Vendor Description</th>
                                            <th>Email</th>
                                            <th>Contact No</th>
										</tr>
                                    </thead>
                                    <tfoot>
										<tr>
											<th>Vendor Id</th>
											<th>Vendor Type</th>
											<th>Vendor Name</th>
                                            <th>Vendor Description</th>
                                            <th>Email</th>
                                            <th>Contact No</th>
										</tr>
                                    </tfoot>
                                    <tbody id="results" >
										<?php
				foreach ($vendor_supplier_fetch as $row)
				{	
					$vendor_id = $row->vendor_id;
					$vendor_type = $row->vendor_type;
					$vendor_name = $row->vendor_name;
					$vendor_descr = $row->vendor_descr;
					$vendor_email = $row->vendor_email;
					$vendor_contact = $row->vendor_contact;
					
				
					echo '
					<tr>   

					<td>'.$vendor_id.'</td>
					<td>'.$vendor_type.'</td>
					<td>'.$vendor_name.'</td>
					<td>'.$vendor_descr.'</td>
					<td>'.$vendor_email.'</td>
					<td>'.$vendor_contact.'</td>
					
					
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

			


			<!-- product starts -->
				
                <div class="card">
            <div class="body">
                <form id="myForm" action="" method="POST">
				<h4>Add Vendor</h4><hr>

					<div class="form-group form-float">
								<div class="col-sm-2">
									<div class="form-line">
                                        <select id="vendor_type" name="vendor_type" class="form-control" required>
										<option value="" selected disabled>Please Select</option>
										
										<?php 
                                                        foreach ($options_vendor_type as $row) 
                                                        {

                                                        $value=$row->option_value;
                                                        echo '<option value="'.$value.'">'.$value.'</option>'; 
                                                        }
                                                        ?>
										</select>
										<label class="form-label">Vendor Type*</label>
                                    </div>
                                </div>

								<div class="col-sm-2">
                                    <div class="form-line">
                                        <input type="text"  name="vendor_name" id="vendor_name" class="form-control" required>
                                        <label class="form-label">Vendor Name*</label>
										
                                    </div>
                                </div>
								<div class="col-sm-4">
                                    <div class="form-line">
                                        <input type="text"  name="vendor_descr" id="vendor_descr" class="form-control" required>
                                        <label class="form-label">Vendor Description*</label>
										
                                    </div>
                                </div>
								<div class="col-sm-2">
                                    <div class="form-line">
                                        <input type="email"  name="vendor_email" id="vendor_email" class="form-control" required>
                                        <label class="form-label">Email*</label>
										
                                    </div>
                                </div>
								<div class="col-sm-2">
                                    <div class="form-line">
                                        <input type="text"  name="vendor_contact" id="vendor_contact" maxlength="10" minlength="10" class="form-control" required>
										<label class="form-label">Contact No*</label>
										
                                    </div>
                                </div>
					</div>

                    <button class="btn btn-lg bg-pink waves-effect" onclick="SubmitFormData();" type="button">Add Vendor</button>
					

                  
                </form>
            </div>
<script>

function SubmitFormData() {
var vendor_type = $("#vendor_type").val();
var vendor_name = $("#vendor_name").val();
var vendor_descr = $("#vendor_descr").val();
var vendor_email = $("#vendor_email").val();
var vendor_contact = $("#vendor_contact").val();


$.post("<?php echo base_url()."add-vendor";?>", { vendor_type: vendor_type, vendor_name: vendor_name, vendor_descr: vendor_descr, vendor_email: vendor_email, vendor_contact: vendor_contact },
function(data) {
 $('#results').html(data);
 $('#myForm')[0].reset();
});
}
</script>


				<!-- product ends  -->
				
            <!-- #END# Exportable Table -->
        </div>
    </section>
