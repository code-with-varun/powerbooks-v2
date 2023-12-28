<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$base=base_url()."public/";

$sessdata = $this->session->userdata('pbk_sess');
$user_type= $sessdata['pbk_user_type'];
$onboarding= $sessdata['pbk_onboarding'];
$merchant_id= $sessdata['pbk_merchant_id'];
$data['merchant_id']=$merchant_id;
?>
<section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>Billing Area</h2>
            </div>
    
            <div class="row clearfix">
                <!-- Task Info -->
                
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

				<!--billing area starts-->
        
         <!-- product starts -->
				
		 <div class="card">
            <div class="body">

			<!-- heading buttons -->
			<form id="new_bill_form" action="new-bill" method="POST"> </form>
						<button type="button" onclick="newbill_submit();" class="btn bg-blue waves-effect" data-type="prompt" >
                                    <i class="material-icons">receipt</i>
                                    <span>New Bill</span>
                            </button>
							<button type="button" class="btn bg-red waves-effect" data-type="prompt" onclick="showSuccessMessage()">
                                    <i class="material-icons">report_problem</i>
                                    <span>Void Bill</span>
                            </button>
                            <a href="return-billing">
							<button type="button" class="btn bg-orange waves-effect" data-type="prompt" >
                                    <i class="material-icons">assignment_return</i>
                                    <span>Return</span>
                            </button></a>
			 
			                <button type="button" class="btn bg-pink waves-effect" data-type="prompt" data-toggle="modal" data-target="#reprintModal">
                                    <i class="material-icons">print</i>
                                    <span>Reprint</span>
                             </button>
                             <div class="modal fade" id="reprintModal" tabindex="-1" role="dialog">
                	<div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="defaultModalLabel">Reprint Documents</h4>
                        </div>
                        <div class="modal-body">
                            
                            <?php
                             echo'<form action="reprint"   method="post">
                           <table class="table table-hover dashboard-task-infos" >
                            <tr>
                            <td>
                            Document  Type
                            <select class="form-control" name="docpfx" >
                            <option value="S">SALES BILL -- (S)</option>
                            <option value="R"> RETURN BILL -- (R)</option>
                            <option value="ES"> ESTIMATE -- (ES)</option>
                            <option value="DO"> DELIVERY ORDER -- (DO)</option>
                            
                            </select>
                          
                             </td>
                            <td>
                            Financial Year
                            <input class="form-control"type="text" id="dvpfx"  placeholder="Financial Year"  name="docfy" >
                            </td>
                            <td>
                            Document Number 
                            <input class="form-control"type="text" required placeholder="Document No"  name="docno" >
                            </td>
                            
                          
                            </tr>
                            </table>
                            
                           
                            
                        </div>
                        <div class="modal-footer">
                                                       
                            <input type="hidden" value="merchant id" name="rmerchantid">
                            <button type="submit" class="btn bg-green waves-effect" data-type="prompt" >
                            <i class="material-icons">check</i> <span>View</span>
                            </button>
                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                            </form>';
                            ?>
				
                            
                        </div>
                    </div>
                </div>
            </div>
                            <br><br><br>
							<!-- heading buttons -->
				<form id="form_advanced_validation" action="" method="POST">
					<div class="form-group form-float">
								<div class="col-sm-3">
									<div class="form-line">
                                        <input type="text" list="sku" id="TZ_barcode" onchange="Change_barcode();" name="TZ_barcode" class="form-control" value="0" autofocus required>
                                        <label class="form-label">SKU / Barcode*</label>
										<datalist id="sku">
													<?php 
														foreach ($product_fetch as $row) 
														{

														$TZ_barcode=$row->TZ_barcode;
														$barcode=$row->barcode;
														$sku=$row->sku;
														echo '<option value="'.$TZ_barcode.'">'.$sku.' | '.$TZ_barcode.'</option>';
														}
													?>
										</datalist>
                                    </div>
                                </div>
								
								<div class="col-sm-3">
                                   <div class="form-line">
                                        <select id="retail_price" name="retail_price" class="form-control" required>
										<option value="" selected disabled>Please Select</option>
										</select>
										<label class="form-label">Retail Price*</label>
                                    </div>
                                </div>
								
								<div class="col-sm-3">
                                    <div class="form-line">
                                        <input type="number" value="1" min="1"  name="quantity" id="quantity"  class="form-control" required>
                                        <label class="form-label">Qty*</label>
										
                                    </div>
                                </div>
								<button class="btn btn-lg bg-blue waves-effect" onclick="SubmitFormData();" type="button">Add Item</button>
								<button type="button" class="btn bg-green waves-effect" onclick="payment_submit();" data-toggle="modal" id="payment_button" data-target="#defaultModal">
									 <i class="material-icons">attach_money</i> <span>Payments</span></button>
								

					</div>
					


                  
                </form>
            
<script>

function Change_barcode() {
var TZ_barcode = $("#TZ_barcode").val();

$.post("<?php echo base_url()."multi-mrp";?>", { TZ_barcode: TZ_barcode  },
function(data) {
 $('#retail_price').html(data);
});
}

function SubmitFormData() {
    // Get input values
    var TZ_barcode = $("#TZ_barcode").val();
    var retail_price = $("#retail_price").val();
    var quantity = $("#quantity").val();

    // Perform basic form validation
    if (!TZ_barcode || !retail_price || !quantity) {
        // Display an error message or handle validation failure as needed
        alert("All fields are required");
        return;
    }

    // If validation passes, proceed with AJAX request
    $.post(
        "<?php echo base_url()."temp-bill-inward";?>",
        { TZ_barcode: TZ_barcode, retail_price: retail_price, quantity: quantity },
        function(data) {
            $('#results').html(data);
            $('#myForm')[0].reset();
        }
    );
}



function payment_submit() {
var TZ_barcode = $("#TZ_barcode").val();

$.post("<?php echo base_url()."bill-summary";?>", { TZ_barcode: TZ_barcode},
function(data) {
 $('#defaultModal').html(data);
 
});
}
function newbill_submit() {
var form = document.getElementById("new_bill_form");

  form.submit();

}

</script>


				<!-- product ends  -->
        
    
        
     
             
                
          <!--billing area ends -->  
                        
                        <div class="body">
                            <div class="table-responsive">
                            		
								<table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
											
											
											<th>Barcode</th>
                                            <th>Item SKU - Description</th>
                                            <th>Rate</th>
											<th>Qty</th>
											<th>Tax %</th>
											<th>Gross</th>
											<th>Tax</th>
											<th>Net</th>
											<th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
										<tr>
											
											
                                            <th>Barcode</th>
                                            <th>Item SKU - Description</th>
                                            <th>Rate</th>
											<th>Qty</th>
											<th>Tax %</th>
											<th>Gross</th>
											<th>Tax</th>
											<th>Net</th>
											<th>Action</th>
											
                                        </tr>
                                    </tfoot>
                                    <tbody id="results" >
										<?php
				foreach ($temp_bill_fetch as $row)
				{	
					$TZ_barcode = $row->TZ_barcode;
					$qty = $row->qty;
					$sku = $row->sku;
					$item_description = $row->item_description;
					$retail_price = $row->retail_price;
					$tax_slab = $row->tax_slab;
					$gross_amount = $row->gross_amount;
					$net_amount = $row->net_amount;
					$tax_amount = $row->tax_amount;
					
					
					echo '
					<tr>   
					
					<td>'.$TZ_barcode.'</td>
					<td>'.$sku.'<br><small>'.$item_description.'</small></td>
					<td>'.$retail_price.'</td>
					<td>'.$qty.'</td>
					<td>'.$tax_slab.'</td>
					<td>'.$gross_amount.'</td>
					<td>'.$tax_amount.'</td>
					<td>'.$net_amount.'</td>
					<td><form action="remove-item" method="POST">
					<input type="hidden"name="TZ_barcode" value="'.$TZ_barcode.'">
					<input type="hidden"name="retail_price" value="'.$retail_price.'">
					<input type="hidden"name="net_amount" value="'.$net_amount.'">
					<input type="hidden"name="gross_amount" value="'.$gross_amount.'">
					<input type="hidden"name="tax_amount" value="'.$tax_amount.'">
					<input type="hidden"name="qty" value="'.$qty.'">
					<button type="submit" style="border-radius:25px;width:25px; padding:0px; height:25px" class="btn bg-pink waves-effect" data-type="prompt" >
					<i class="material-icons">cancel</i> 
				</button> </form>
				
				</td>
					
					
				</tr>';
				 
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
				echo '
				<tr style="color:Crimson; font-weight:bold; font-size:large">    
			   
				<td>Total</td>
				<td>-</td>
				<td>-</td>
				<td>'.$TOTQTY.'</td>
				<td>-</td>
				<td>'.$TOTGROSS.'</td>
				<td>'.$TOTTAX.'</td>
				<td>'.round($TOTNET,0).'</td>
				<td>-</td>
				
				
			</tr>';}
                     ?>                 
                                    </tbody>
                                </table>
                            </div>
						</div>
                    </div>
 
					
                
                
                <!-- #END# Task Info -->
               
                <!-- #END# Browser Usage -->
            </div>
        </div>
    </section>

	<div class="modal fade" id="defaultModal" tabindex="-1" role="dialog">


	</div>

	
