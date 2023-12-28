<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$base=base_url()."public/";
$sessdata = $this->session->userdata('pbk_sess');
$eid = $sessdata['pbk_eid'];
$name = $sessdata['pbk_name'];
$data['merchant_id']=$merchant_id= $sessdata['pbk_merchant_id'];
$user_type= $sessdata['pbk_user_type'];
$onboarding= $sessdata['pbk_onboarding'];



?>

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>
					Tax Register
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
											<th>Bill No</th>
											<th>Tax Slab</th>
											<th>Qty</th>
                                            <th>Gross Amount</th>
											<th>Tax Amount</th>
											<th>Net Amount</th>
                                         
										</tr>
                                    </thead>
                                    <tfoot>
										<tr>
											<th>Bill No</th>
											<th>Tax Slab</th>
											<th>Qty</th>
                                            <th>Gross Amount</th>
											<th>Tax Amount</th>
											<th>Net Amount</th>
										</tr>
                                    </tfoot>
                                    <tbody id="results" >
										<?php
				foreach ($merchant_tax_register_fetch as $row)
				{	
					$bill_no=$row->bill_no;
					$tax_slab = $row->tax_slab;
					$total_qty = $row->total_qty;
					$total_net_amount = $row->total_net_amount;
					$total_gross_amount = $row->total_gross_amount;
					$total_tax_amount = $row->total_tax_amount;
				
					
					echo '
					<tr>   

					<td>'.$bill_no.'</td>
					<td>'.$tax_slab.'</td>
					<td>'.$total_qty.'</td>
					<td>'.$total_gross_amount.'</td>
					<td>'.$total_tax_amount.'</td>
					<td>'.$total_net_amount.'</td>
					
					
					
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

			
    </section>
