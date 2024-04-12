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
					<!-- Customer Base -->
                </h2>
            </div>
            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                               Powerbooks Subscriptions
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
					<th>Si No</th>
					
					<th>Merchant</th>
					<th>Bill No</th>
					<th>Bill Date</th>
					<th>Net Amount</th>
					<th>Due Date</th>
					
					<th>Status</th>
					
					
					
				  
				</tr>
			</thead>
			<tbody>
<?php
				$i=1;
				foreach ($all_subscriptions_fetch as $row) {

					$rbill_no = $row->bill_no;
					
					$bill_amt = $row->bill_amt;
					$to_pay = $row->to_pay;
					$cust_name = $row->cust_name;
					$rposdate = $row->pos_bill_date;
                    $due_date = $row->due_date;
					
					
					echo '
					<tr>   
					<td>'.$i.'</td>
					<td>'.$cust_name.'</td>
					<td>'.$rbill_no.'</td>
					<td>'.$rposdate.'</td>
					<td>'.$to_pay.'</td>
					<td>'.$due_date.'</td>
					
					<td> Pay Now </td>
					
					
					
					
				</tr>';
$i=$i+1;	 

						echo '</div>';
						
						
					
				}

?>
				</tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

			            <!-- Vertical Layout | With Floating Label -->
						<!-- <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Add New Options 
                                
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
							<form action="add-new-options" method="POST">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" list="option_key" name="option_key" class="form-control" required>
                                        <label class="form-label">Option Key*</label>
										<datalist id="option_key">
													<?php 
														foreach ($distinct_option_key as $row) 
														{

														$value=$row->option_key;
														echo '<option value="'.$value.'">'.$value.'</option>';
														}
														?>
													</datalist>
                                    </div>
                                </div>

                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" list="option_value" name="option_value" class="form-control" required>
                                        <label class="form-label">Option Value*</label>
										<datalist id="option_value">
													<?php 
														foreach ($distinct_option_value as $row) 
														{

														$value=$row->option_value;
														echo '<option value="'.$value.'">'.$value.'</option>';
														}
														?>
													</datalist>
                                    </div>
                                </div>

								<div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" list="option_category" name="option_category" class="form-control" required>
                                        <label class="form-label">Option Category*</label>
										<datalist id="option_category">
													<?php 
														foreach ($distinct_option_category as $row) 
														{

														$value=$row->category;
														echo '<option value="'.$value.'">'.$value.'</option>'; 
														}
														?>
													</datalist>
                                    </div>
                                </div>

                                <br>
                                <button type="submit" class="btn btn-primary m-t-15 waves-effect">Add Option</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div> -->
            <!-- Vertical Layout | With Floating Label -->

            <!-- #END# Exportable Table -->
        </div>
    </section>
