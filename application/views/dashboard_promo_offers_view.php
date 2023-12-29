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
					Promotions / Offers
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
											<th>Offer Type</th>
											<th>Item/Bill</th>
											<th>Promo Code</th>
                                            <th>Logic</th>
											<th>Scheduled</th>
                                            <th>Action</th>
										</tr>
                                    </thead>
                                    <tfoot>
										<tr>
											<th>Offer Type</th>
											<th>Item/Bill</th>
											<th>Promo Code</th>
                                            <th>Logic</th>
                                            <th>Scheduled</th>
											<th>Action</th>
										</tr>
                                    </tfoot>
                                    <tbody id="results" >
										<?php
				foreach ($merchant_promo_offers_fetch as $row)
				{	
					$offer_type = $row->offer_type;
					$item_bill_wise = $row->item_bill_wise;
					$promo_code = $row->promo_code;
					$offer_logic = $row->offer_logic;
					$scheduled = $row->scheduled;
					
					
				
					echo '
					<tr>   

					<td>'.$offer_type.'</td>
					<td>'.$item_bill_wise.'</td>
					<td>'.$promo_code.'</td>
					<td>'.$offer_logic.'</td>
					<td>'.$scheduled.'</td>
					<td>Action</td>
					
					
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
				<h4>Add Offer</h4><hr>

					<div class="form-group form-float">
								<div class="col-sm-3">
									<div class="form-line">
                                        <select id="item_bill" name="item_bill" class="form-control" required>
										<option value="" selected disabled>Please Select</option>
										
										<?php 
                                                        foreach ($offer_category_fetch as $row) 
                                                        {

                                                        $value=$row->option_key;
                                                        echo '<option value="'.$value.'">'.$value.'</option>'; 
                                                        }
                                                        ?>
										</select>
										<label class="form-label">Item/Bill*</label>
                                    </div>
                                </div>

								<div class="col-sm-3">
									<div class="form-line">
                                        <select id="offer_type" name="offer_type" class="form-control" required>
										<option value="" selected disabled>Please Select</option>
										
										<?php 
                                                        foreach ($all_offers_fetch as $row) 
                                                        {

                                                        $value=$row->option_value;
                                                        echo '<option value="'.$value.'">'.$value.'</option>'; 
                                                        }
                                                        ?>
										</select>
										<label class="form-label">Offer Type*</label>
                                    </div>
                                </div>
								<div class="col-sm-4">
                                    <div class="form-line">
                                        <input type="text"  name="offer_descr" id="offer_descr" class="form-control" >
                                        <label class="form-label">Offer Description</label>
										
                                    </div>
                                </div>
								<div class="col-sm-2">
                                    <div class="form-line">
                                        <input type="email"  name="offer_logic" id="offer_logic" class="form-control" >
                                        <label class="form-label">Logic</label>
										
                                    </div>
                                </div>
								
					</div>
					<div class="form-group form-float">
								<div class="col-sm-3">
                                    <div class="form-line">
                                        <input type="text"  name="promo_code" id="promo_code" class="form-control" >
                                        <label class="form-label">Promo Code</label>
										
                                    </div>
                                </div>
								<div class="col-sm-3">
									<div class="switch">
                                        
                                        <label class="form-label">Scheduled*</label>
										<label>
											<input type="checkbox" id="Scheduled"  name="Scheduled" value="YES" >
											<span class="lever"></span>
										</label>
													
                                                
                                    </div>
                                </div>

								<div class="col-sm-3">
                                    <div class="form-line">
                                        <input type="date"  name="offer_start_date" id="offer_start_date" class="form-control" value="<?php echo date('Y-m-d');?>" disabled>
                                        <label class="form-label">Start Date</label>
										
                                    </div>
                                </div>
								<div class="col-sm-3">
                                    <div class="form-line">
                                        <input type="date"  name="offer_end_date" id="offer_end_date" class="form-control" value="<?php echo date('Y-m-d');?>" disabled>
                                        <label class="form-label">End Date</label>
										
                                    </div>
                                </div>
								
								
					</div>

                    <button class="btn btn-lg bg-pink waves-effect" onclick="SubmitFormData();" type="button">Add Vendor</button>
					

                  
                </form>
            </div>
<script>

function SubmitFormData() {
var item_bill = $("#item_bill").val();
var offer_type = $("#offer_type").val();
var offer_descr = $("#offer_descr").val();
var offer_logic = $("#offer_logic").val();
var promo_code = $("#promo_code").val();
var scheduled = $("#scheduled").val();
var offer_start_date = $("#offer_start_date").val();
var offer_end_date = $("#offer_end_date").val();


$.post("<?php echo base_url()."add-offer";?>", { item_bill: item_bill,
 offer_type: offer_type,
  offer_descr: offer_descr, 
  offer_logic: offer_logic, 
  promo_code: promo_code,
  scheduled: scheduled, 
  offer_start_date: offer_start_date, 
  offer_end_date: offer_end_date, 
   },
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
