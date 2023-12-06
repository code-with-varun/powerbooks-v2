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
					Goods Inward
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
											
                                            <th>TZ Barcode</th>
											<th>SKU</th>
                                            <th>Cost Price</th>
                                            <th>MRP</th>
                                            <th>Retail Price</th>
											<th>Qty</th>
											<th>Tax Slab</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
										<tr>
											
											<th>TZ Barcode</th>
											<th>SKU</th>
                                            <th>Cost Price</th>
                                            <th>MRP</th>
                                            <th>Retail Price</th>
											<th>Qty</th>
											<th>Tax Slab</th>
                                        </tr>
                                    </tfoot>
                                    <tbody id="results" >
										<?php
				foreach ($temp_inward_master_fetch as $row)
				{	
					$TZ_barcode = $row->TZ_barcode;
					$quantity = $row->quantity;
					$sku = $row->sku;
					$tax_slab = $row->tax_slab;
					$retail_price = $row->retail_price;
					$mrp = $row->mrp;
					$cost_price = $row->cost_price;
				
					echo '
					<tr>   

					<td>'.$TZ_barcode.'</td>
					<td>'.$sku.'</td>
					<td>'.$cost_price.'</td>
					<td>'.$mrp.'</td>
					<td>'.$retail_price.'</td>
					<td>'.$quantity.'</td>
					<td>'.$tax_slab.'</td>
					
				</tr>';
					 
				}
                     ?>                 
                                    </tbody>
                                </table>
                            </div>
							<!-- ********** -->
				<form id="myForm" action="inward-items" method="POST">
				<h4>Supplier Details</h4><hr>

					<div class="form-group form-float">
								<div class="col-sm-4">
									<div class="form-line">
                                        <select id="vendor_id" name="vendor_id" class="form-control" required>
                                        <option value="" selected disabled>Please Select</option>
										
													<?php 
														foreach ($vendor_supplier_fetch as $row) 
														{

														$vendor_id=$row->vendor_id;
														$vendor_name=$row->vendor_name;
														echo '<option value="'.$vendor_name.' | '.$vendor_id.'">'.$vendor_name.' | '.$vendor_id.'</option>';
														}
													?>
										</select>
										<label class="form-label">Vendor ID*</label>
                                    </div>
                                </div>

								<div class="col-sm-2">
                                    <div class="form-line">
                                        <input type="text"  name="invoice_no" id="invoice_no" class="form-control" required>
										<label class="form-label">Invoice No*</label>
										
                                    </div>
                                </div>
					</div>

                    <button class="btn btn-lg bg-blue waves-effect" type="submit">Start Inventory</button>
					

                  
                </form>
							<!-- ********** -->
                        </div>
                    </div>
                </div>
            </div>

			<!-- product starts -->
				
                <div class="card">
            <div class="body">
                <form id="myForm" action="" method="POST">
				<h4>Add Item</h4><hr>

					<div class="form-group form-float">
								<div class="col-sm-3">
									<div class="form-line">
                                        <input type="text" list="sku" id="TZ_barcode" onchange="Change_barcode();" name="TZ_barcode" class="form-control" required>
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
                                        <input type="text"  name="cost_price" id="cost_price" class="form-control" required>
                                        <label class="form-label">Cost Price*</label>
										
                                    </div>
                                </div>
								<div class="col-sm-3">
                                    <div class="form-line">
                                        <input type="text"  name="mrp" id="mrp" class="form-control" required>
                                        <label class="form-label">MRP*</label>
										
                                    </div>
                                </div>
								<div class="col-sm-3">
                                    <div class="form-line">
                                        <input type="text"  name="retail_price" id="retail_price" class="form-control" required>
                                        <label class="form-label">Retail Price*</label>
										
                                    </div>
                                </div>

					</div>
					<div class="form-group form-float" id="qty_tax_results">
								
					</div>

                    <button class="btn btn-lg bg-pink waves-effect" onclick="SubmitFormData();" type="button">Add Item</button>
					

                  
                </form>
            </div>
<script>

function Change_barcode() {
var TZ_barcode = $("#TZ_barcode").val();

$.post("<?php echo base_url()."temp-qty-tax";?>", { TZ_barcode: TZ_barcode  },
function(data) {
 $('#qty_tax_results').html(data);
});
}

function SubmitFormData() {
var TZ_barcode = $("#TZ_barcode").val();
var cost_price = $("#cost_price").val();
var mrp = $("#mrp").val();
var retail_price = $("#retail_price").val();
var quantity = $("#quantity").val();
var tax_slab = $("#tax_slab").val();



$.post("<?php echo base_url()."temp-goods-inward";?>", { TZ_barcode: TZ_barcode, cost_price: cost_price, mrp: mrp, retail_price: retail_price, quantity: quantity, tax_slab: tax_slab },
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
