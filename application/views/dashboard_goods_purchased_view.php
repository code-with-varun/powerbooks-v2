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
					Goods Purchased
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
											
											<th>Entry No</th>
											<th>TZ Barcode</th>
                                            <th>SKU</th>
                                            <th>Cost Price</th>
                                            <th>MRP</th>
											<th>Retail Price</th>
											<th>Qty</th>
											<th>Gross Amount</th>
											<th>Tax Slab</th>
											<th>Tax Amount</th>
											<th>Net Amount</th>
											<th>Entry Date</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
										<tr>
											<th>Entry No</th>
											<th>TZ Barcode</th>
                                            <th>SKU</th>
                                            <th>Cost Price</th>
                                            <th>MRP</th>
											<th>Retail Price</th>
											<th>Qty</th>
											<th>Gross Amount</th>
											<th>Tax Slab</th>
											<th>Tax Amount</th>
											<th>Net Amount</th>
											<th>Entry Date</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
										<?php foreach ($goods_purchased_fetch as $row) 
										{
									
										$TZ_barcode=$row->TZ_barcode;
										$entry_no=$row->entry_no;
										$sku=$row->sku;
										$cost_price=$row->cost_price;
										$mrp=$row->mrp;
										$retail_price=$row->retail_price;
										$entry_pos_date=$row->entry_pos_date;
										$qty=$row->qty;
										$gross_amount=$row->gross_amount;
										$tax_amount=$row->tax_amount;
										$tax_slab=$row->tax_slab;
										$net_amount=$row->net_amount;
										echo' <tr>
										
										<td>'.$entry_no.'</td>
										<td>'.$TZ_barcode.'</td>
										<td>'.$sku.'</td>
										<td>'.$cost_price.'</td>
										<td>'.$mrp.'</td>
										<td>'.$retail_price.'</td>
										<td>'.$qty.'</td>
										<td>'.$gross_amount.'</td>
										<td>'.$tax_slab.'</td>
										<td>'.$tax_amount.'</td>
										<td>'.$net_amount.'</td>
										<td>'.$entry_pos_date.'</td>
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

            <!-- #END# Exportable Table -->
        </div>
    </section>
