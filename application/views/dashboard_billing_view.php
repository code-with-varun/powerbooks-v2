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
                            
                                <table class="table table-hover dashboard-task-infos">
                                    <thead>
                                        <tr>
                                            

                                            <th>SKU</th>
											<th>Product Name</th>
                                            <th>QTY</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>




        		 
        		 <tr>   <form action="" method="" >
                                
                                <td>
                                
                                 <input list="browsers"  class="form-control" id="vendors" name="barcode2"  placeholder="SKU Search" onchange="myFunction();" autofocus>
                              <datalist id="browsers">
                                  
                                  <option value="NA">NA</option>
                                  <option value="barcodes">Barcodes</option>

                              </datalist>
                               

</form>

                                </td>
                                 <td>
              
                                     <form action="temp-bill" method="post" > 
           
									<input class="form-control"  type="text" id="demo2" disabled placeholder="Product Name" name="productname">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

                                 	
                                 </td>
                                <td>
                                  <input class="form-control"type="text" value="1" id="reqiredqty" selected="selected" name="qty">
                                  <input type="checkbox" id="nostock" name="nostock" >
                                </td>
                                
                                            <td>
                                            <input type="hidden" name="barcodetopost" id="codetobill">
                                            <input type="hidden" name="billno" value="next bill">
                                            <input type="hidden" name="merchantid" value="merchant id">

											<input class="form-control" type="hidden" id="closingqty" disabled placeholder="closingqty" name="closingqty" >
                                           
                                         
										   <button class="btn btn-info waves-effect" type="submit" id="addbutton" name="import" value="Add Item"> <i class="material-icons">add</i> <span>Add Item</span></button>
										   
											
										   
										   </form>
                             
                                            </td>
                                        </tr>
										
										
                                        <thead><tr>
                                            
                                            <th>Division</th>
                                            <th>Category</th>
                                            
                                            <th>Classification</th>
                                        </tr></thead>
        		                <tr>   
                                
                                 <td><input class="form-control"type="text" id="division" disabled placeholder="Division"  name="division"></td>
                                <td><input class="form-control" type="text" id="demo1" disabled placeholder="Category" name="category"  ></td>
                                
                                <td><input class="form-control"type="text"  id="classification" disabled placeholder="Classification" name="classification" required></td>
                                
                                            <td>
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

                                        
                                            </td>
                                        </tr>
        		                        
                                    </tbody>

									<table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            <th>sino.</th>
                                            <th>Item code</th>
                                            <th>Item</th>
                                            <th>Rate</th>
											<th>Qty</th>
											<th>Amount</th>
											<th>Cancel</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
								<?php								
	

                                echo "<tr><td>"; 
								echo 'sino';
								echo "</td><td>";
								echo 'LD_Barcode';
								echo'<br><small>';
								echo 'SKU';
								echo "</small></td><td>";
								echo 'Product_Name';
								echo'<br><small>';
								echo 'Item_Description';
								echo "</small></td><td>";
								echo 'mrp';
								echo "</td><td>";
								echo 'qty';
								echo "</td><td>";
								echo 'amount';
								echo "</td><td>";
								echo '<form action="cancel-bill-item" method="POST"> 
								<input type="hidden" name="cnbarcode" value="icode">
								<input type="hidden" name="cnbillno" value="nextbillno">
								<input type="hidden" name="cnmrp" value="rate">
								<input type="hidden" name="cnmerchantid" value="merchant_id">
								<button type="submit" class="btn bg-pink waves-effect" data-type="prompt" >
                                    <i class="material-icons">cancel</i> <span>Cancel</span>
                                </button> </form> ';
								echo "</td></tr>";
							

								?>
                                     
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th>Total</th>
                                            <th>total qty</th>
                                            <th>total amount</th>
											<th><button type="button" class="btn bg-green waves-effect m-r-20" data-toggle="modal" data-target="#defaultModal"> <i class="material-icons">attach_money</i> <span>Payments</span></button></th>
                                        </tr>
                                    </tfoot>
                               

                                </table>
                            </div>
                        </div>
                    </div>
 
 
       <!--billing area starts-->
        
        
        
     <!--billing area ends -->  
        
     
                </div>
                
                
                
                
                <!-- #END# Task Info -->
               
                <!-- #END# Browser Usage -->
            </div>
        </div>
    </section>
