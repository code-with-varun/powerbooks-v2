<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$base=base_url()."public/";

?>
<section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>Billing Area</h2>
            </div>
    
            <div class="row clearfix">
                <!-- Task Info -->
                
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                             <button type="button" class="btn bg-blue waves-effect" data-type="prompt" >
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
                            </h2><br><br><h2>Bill No: 1 | Billed Items </h2>
                  
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:void(0);">Action</a></li>
                                       
                                    </ul>
                                </li>
                            </ul>
                        </div>
                       
                        
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
					<td><button type="button" class="btn bg-pink waves-effect" data-type="prompt" >
					<i class="material-icons">remove</i> 
				</button> 
				
				<button type="button" class="btn bg-green waves-effect" data-type="prompt" >
				<i class="material-icons">add</i> 
				</button></td>
					
					
				</tr>';
				 
				}
                     ?>                 
                                    </tbody>
                                </table>
                            </div>
						</div>
                    </div>
 
 
       <!--billing area starts-->
        
         <!-- product starts -->
				
		 <div class="card">
            <div class="body">
                
				<h4>Add Item</h4><hr>
				<form id="myForm" action="" method="POST">
					<div class="form-group form-float">
								<div class="col-sm-3">
									<div class="form-line">
                                        <input type="text" list="sku" id="TZ_barcode" onchange="Change_barcode();" name="TZ_barcode" class="form-control" autofocus required>
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
								<button type="button" class="btn bg-green waves-effect" data-toggle="modal" data-target="#defaultModal">
									 <i class="material-icons">attach_money</i> <span>Payments</span></button>
								

					</div>
					


                  
                </form>
            </div>
<script>

function Change_barcode() {
var TZ_barcode = $("#TZ_barcode").val();

$.post("<?php echo base_url()."multi-mrp";?>", { TZ_barcode: TZ_barcode  },
function(data) {
 $('#retail_price').html(data);
});
}

function SubmitFormData() {
var TZ_barcode = $("#TZ_barcode").val();
var retail_price = $("#retail_price").val();
var quantity = $("#quantity").val();




$.post("<?php echo base_url()."temp-bill-inward";?>", { TZ_barcode: TZ_barcode, retail_price: retail_price, quantity: quantity },
function(data) {
 $('#results').html(data);
 $('#myForm')[0].reset();
});
}
</script>


				<!-- product ends  -->
        
     <!--billing area ends -->  
        
     
                </div>
                
                
                
                
                <!-- #END# Task Info -->
               
                <!-- #END# Browser Usage -->
            </div>
        </div>
    </section>

	<?php 
                                          

                                
										  echo'   <div class="modal fade" id="defaultModal" tabindex="-1" role="dialog">
						  <div class="modal-dialog" role="document">
							  <div class="modal-content">
								  <div class="modal-header">
									  <h4 class="modal-title" id="defaultModalLabel">PAYMENT MODE & CUSTOMER DETAILS </h4>
								  </div>
								  <div class="modal-body">';
								  
									  
									echo' <h4>Bill Number : <bold style="color:red;"> next bill</bold> | Bill Value : <bold style="color:red;"> total amount </bold>  | Total Pay : <bold style="color:Green;"> total pay </bold>   </h4> 
									  
									  <form action=""  id="myForm" method="post">
									  <table class="table table-hover dashboard-task-infos" >
									  
									  ';
			   echo'<div id="results">
			 <!-- All data will display here  -->
			 </div>';
									  
						  
									  
									  echo'<tr> 
									  
									  <td>
									  
									  Mode
									  <select class="form-control" id="paymode" name="paymode">
									  <option value="CASH">CASH</option>
									  <option value="CARD"> CARD </option>
									  <option value="UPI"> UPI </option>
									  <option value="CHEQUE"> CHEQUE </option>
									  <option value="NEFT"> NEFT </option>
									  <option value="CRNOTE"> CREDIT NOTE </option>
									  </select>
									  </td>
									  <td>
									  Payment Amount
									  <input class="form-control"type="text"   placeholder="Bill Value"  id="payvalue" name="billvalue" >
									  </td>
									  <td>
									  Card No/Notes
									  <input class="form-control"type="text"  placeholder="Notes" id="paynotes" name="billvalue" >
									  </td>
									  <td>
									   Add Payment
									   <input type="hidden" id="paybillno" value="next bill">
									   <input type="hidden" id="billamt" value="totalamt">
									   <input type="hidden" id="pmerchantid" value="merchant id">
									  <button type="button" id="submitFormData" onclick="SubmitFormData();" class="btn bg-green waves-effect" data-type="prompt" >
									  <i class="material-icons">check</i> <span>Add Payment</span>
									  </button>
									  </td>
									  
									  </tr></table></form>';
									  
									  
									 echo'<form action="checkout"   method="post">
									 <table class="table table-hover dashboard-task-infos" > <tr>
									  
									   
									  Customer Address
									 <textarea placeholder="Customer Address" class="form-control" cols="250" rows="3"    name="custaddress"></textarea>
									  
									  </tr>
									  <tr> 
									  <td>
									  Customer Mobile
									  <input class="form-control"type="text" required placeholder="Customer No"  name="custno" >
									  </td>
									  <td>
									  Customer Name
									  <input class="form-control"type="text" required placeholder="Customer Name"  name="custname" >
									  </td>
									  <td>
									  Customer Mail
									  <input class="form-control"type="text"  placeholder="Customer Mail"  name="custmail" >
									  </td>
									
									  </tr>
									  </table>
									  
									  
								  </div>
								  <div class="modal-footer">
									  <input type="hidden" value="next bill" name="cbillno">
									  <input type="hidden" value="" name="cbillamt">
									  <input type="hidden" value="merchant id" name="cmerchantid">
									  <button type="submit" class="btn bg-green waves-effect" data-type="prompt" >
									  <i class="material-icons">check</i> <span>Checkout</span>
									  </button>
									  
									  <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
									  </form>
									  
								  </div>
							  </div>
						  </div>
					  </div>';
								
									  ?>
