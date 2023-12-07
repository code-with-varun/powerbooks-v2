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
					Goods Register
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
                                            <th>Vendor</th>
                                            <th>Invoice No</th>
                                            <th>Invoice Date</th>
											<th>Entry Date</th>
											<th>Qty</th>
											<th>Gross Amount</th>
											<th>Tax Amount</th>
											<th>Net Amount</th>
											<th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
										<tr>
											
											<th>Entry No</th>
                                            <th>Vendor</th>
                                            <th>Invoice No</th>
                                            <th>Invoice Date</th>
											<th>Entry Date</th>
											<th>Qty</th>
											<th>Gross Amount</th>
											<th>Tax Amount</th>
											<th>Net Amount</th>
											<th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
										<?php foreach ($goods_register_fetch as $row) 
										{
									
										$entry_no=$row->entry_no;
										$vendor_id=$row->vendor_id;
										$invoice_no=$row->invoice_no;
										$invoice_date=$row->invoice_date;
										$pos_entry_date=$row->pos_entry_date;
										$qty=$row->qty;
										$gross_amount=$row->gross_amount;
										$tax_amount=$row->tax_amount;
										$net_amount=$row->net_amount;
										echo' <tr>
										
										<td>'.$entry_no.'</td>
										<td>'.$vendor_id.'</td>
										<td>'.$invoice_no.'</td>
										<td>'.$invoice_date.'</td>
										<td>'.$pos_entry_date.'</td>
										<td>'.$qty.'</td>
										<td>'.$gross_amount.'</td>
										<td>'.$tax_amount.'</td>
										<td>'.$net_amount.'</td>
										<td> view </td>
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
