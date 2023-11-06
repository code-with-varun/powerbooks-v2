<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$base=base_url()."public/";

?>
<section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>Billing</h2>
            </div>
         
<?php


$optid=$this->input->post('optid');

foreach ($bill_template_fetch->result() as $row) 
{
					$sfy=$row['sfy'];
					$sales_pfx=$row['sales_pfx'];
				
				    
				}
				$data['bnt']=$sales_pfx.$sfy.'%';
				$next_bill_fetch = $this->Users_model->next_bill_fetch($data);
				foreach ($next_bill_fetch as $row) 
				{
        		 $billno=$row['NBILL'];
        		 $tbill=$billno+1;
        		 $nbill=$sales_pfx.$sfy.'/'.$tbill;	
        	}
         $staging1= "INSERT INTO temp_bill (sino, bill_no, LD_Barcode,SKU,Product_Name,Item_Description,qty,mrp,amount,merchant_id,pos_bill_date) SELECT sino, '$nbill', LD_Barcode,SKU,Product_Name,Item_Description,qty,mrp,amount,merchant_id,pos_bill_date
            				FROM itemwise_sales  WHERE bill_no='$optid' AND merchant_id='$merchantid'";
				if (!mysqli_query($pbcon,$staging1))
				{
					die('Error: ' . mysqli_error($pbcon));
					
				}
?>	
         <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                               Bill No: <?php echo$nbill;?> | Billed Items 
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
	$memstat = mysqli_query($pbcon,"SELECT * FROM `temp_bill` WHERE bill_no='$nbill' AND merchant_id='$merchantid' ORDER BY sino ");
	while($row = mysqli_fetch_array($memstat))
{

                                echo "<tr><td>"; 
								echo $sino=$row['sino'];
								echo "</td><td>";
								echo $icode=$row['LD_Barcode'];
								echo'<br><small>';
								echo $tskue=$row['SKU'];
								echo "</small></td><td>";
								echo $productname=$row['Product_Name'];
								echo'<br><small>';
								echo $idesc=$row['Item_Description'];
								echo "</small></td><td>";
								echo $rate=$row['mrp'];
								echo "</td><td>";
								echo $qty=$row['qty'];
								echo "</td><td>";
								echo $amount=$row['amount'];
								echo "</td><td>";
								echo '<form action="cancel-bill-item" method="POST"> 
								<input type="hidden" name="cnbarcode" value="'.$icode.'">
								<input type="hidden" name="cnbillno" value="'.$nbill.'">
								<input type="hidden" name="cnmrp" value="'.$rate.'">
								<input type="hidden" name="cnmerchantid" value="'.$merchantid.'">
								<button type="submit" class="btn bg-pink waves-effect" data-type="prompt" >
                                    <i class="material-icons">cancel</i> <span>Cancel</span>
                                </button> </form> ';
								echo "</td></tr>";
							
}
$memstat = mysqli_query($pbcon,"SELECT SUM(qty) AS totqty, SUM(amount) AS totamt FROM `temp_bill` WHERE bill_no='$nbill' AND merchant_id='$merchantid' ORDER BY sino ");
	while($row = mysqli_fetch_array($memstat))
{
     $totqty=$row['totqty'];
     $totamt=$row['totamt'];
}
?>
                                     
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th>Total</th>
                                            <th><?php echo $totqty;?></th>
                                            <th><?php echo $totamt;?></th>
											<th></th>
                                        </tr>
                                    </tfoot>
                                </table>
								
								
								
								
								
								
								
								
								
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Exportable Table -->
         
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
							<button type="button" class="btn bg-green waves-effect" data-type="prompt" >
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
                           
                            
                            <input type="hidden" value="'.$merchantid.'" name="rmerchantid">
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
                            </h2><br><br><h2>Billing Area</h2>
                     <?php if($c2=='checked')
                     { echo 'auto inward';} 
                     else 
                     { echo 'sys calc';
                     
                       
                     } 
                     ?>
  
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
                        
                      
                     <?php	
                     
				$memstat2 = mysqli_query($pbcon,"SELECT *, MAX(rid) AS ENNO FROM `goods_register` WHERE merchant_id='$merchantid'");
				while($row = mysqli_fetch_array($memstat2))
				{
					$entryno=$row['ENNO'];
					$nentryno=$entryno+1;	
				
				}	
				$memstat2 = mysqli_query($pbcon,"SELECT * FROM `bill_template` WHERE merchant_id='$merchantid'");
				while($row = mysqli_fetch_array($memstat2))
				{
					$sfy=$row['sfy'];
					$purchase_pfx=$row['purchase_pfx'];
					$new_entry_no=$purchase_pfx.$sfy.'/'.$nentryno;	
					
				
				}
				
				?> 	
                        
                        <div class="body">
                            <div class="table-responsive">
                            
                                <table class="table table-hover dashboard-task-infos">
                                    <thead>
                                        <tr>
                                            
                                            <th>BARCODE</th>
                                            <th>SKU</th>
                                            <th>MRP</th>
                                            <th>QTY</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>




        		 
        		 <tr>   <form action="" method="" >
                                <td><input class="form-control"  type="text"  autofocus > </td>
                                <td>
                                
                                 <input list="browsers"  class="form-control" id="vendors" name="barcode2"  placeholder="SKU Search" onchange="myFunction();">
                              <datalist id="browsers">
                                  
                                  <option value="NA">NA</option>

                            
                <?php		
				$memstat2 = mysqli_query($pbcon,"SELECT * FROM `item_master` WHERE merchant_id='$merchantid'");
				while($row = mysqli_fetch_array($memstat2))
				{
					$sku=$row['SKU'];
					$ldbarcode=$row['LD_Barcode'];	
								
				echo '<option value="'.$ldbarcode.'">'.$sku.'</option>';
				
				
				}		
				
				
				?> 
                              </datalist>
                               

</form>

                                </td>
                                 <td>
              
                                     <form action="temp-bill" method="post" > 
           
                                     <select class="form-control" id="mrp" name="mrp" >
       

                
                                       </select>
                                 	
<script>
function myFunction() {
    var x = document.getElementById("vendors").value;
    
       <?php	
       
       //var clqty =".$Closing_Qty.";
		//	
          //                                 if(clqty==0)
            //                               {
              //                                 document.getElementById('addbutton').disabled = true; 
                //                               document.getElementById('reqiredqty').disabled = true; 
                  //                             document.getElementById('reqiredqty').value ='Out of Stock'; 
                    //                       }
                      //                     else
                        //                   
                          //                 {
                            //                   document.getElementById('addbutton').enabled = true; 
                              //                 document.getElementById('reqiredqty').enabled = true; 
                                //              
                                  //         }
       
				$memstat2 = mysqli_query($pbcon,"SELECT * FROM `item_master` WHERE merchant_id='$merchantid'");
				while($row = mysqli_fetch_array($memstat2))
				{
					$ldsku=$row['SKU'];
					$ldbarcode=$row['LD_Barcode'];
					$vname=$row['Category'];
					$vdescr=$row['Product_Name'];
					$Closing_Qty=$row['Current_Balance_Quantity'];
					$vclassif=$row['Classification'];
					$vdivision=$row['Division'];
					
								
				echo "if (x=='".$ldbarcode."'){document.getElementById('demo1').value = '".$vname."';
				document.getElementById('demo2').value = '".$vdescr."';
				document.getElementById('closingqty').value = '".$Closing_Qty."';
					document.getElementById('classification').value = '".$vclassif."';
						document.getElementById('division').value = '".$vdivision."';
				document.getElementById('codetobill').value = '".$ldbarcode."'; }  
				
				
				
				
				";
				
				
              
	
				}		
				
				
				?> 	

	if (x=='NA')
	{
    document.getElementById("demo1").value = "NA";    document.getElementById("demo2").value = "NO Product Selected";
	}


	
}


</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

<script>

    $("#vendors").change(function () {
        var val = $(this).val();
        
        <?php
        $memstat5 = mysqli_query($pbcon,"SELECT DISTINCT (LD_Barcode)AS LDBC FROM `multiple_price`WHERE merchant_id='$merchantid' ");
				while($row = mysqli_fetch_array($memstat5))
				{
				    
					$ldbc=$row['LDBC'];
				  
      echo'  if (val == "'.$ldbc.'") { ';
      echo'      $("#mrp").html("';
        
				     $memstat6 = mysqli_query($pbcon,"SELECT * FROM `multiple_price` WHERE LD_Barcode='$ldbc' AND merchant_id='$merchantid' ORDER BY new_price DESC");
				while($row = mysqli_fetch_array($memstat6))
				{
				    $mrps=$row['new_price'];
				    $effect_date=$row['effect_date'];
      echo '<option ';
      echo "value='".$mrps."'>Rs. ".$mrps." ----- ".$effect_date." ";
      echo '</option>';
			    	}
			    echo'");}';
				}
        ?>
        
         else if (val == "NA") {
            $("#mrp").html("<option value='NA'>--select one--</option>");
        }
       
});


</script>
                                 	
                                 </td>
                                <td>
                                  <input class="form-control"type="text" value="1" id="reqiredqty" selected="selected" name="qty">
                                  <input type="checkbox" id="nostock" name="nostock" >
                                </td>
                                
                                            <td>
                                            <input type="hidden" name="barcodetopost" id="codetobill">
                                            <input type="hidden" name="billno" value="<?php echo $nbill;?>">
                                            <input type="hidden" name="merchantid" value="<?php echo $merchantid;?>">
                                             <?php 
                            
                          //  echo $flag; echo $dstatus; echo$dayid;
                            if($dstatus=='OPENED')
                            {
                                          echo' 
                                          
                                          <input class="form-control" type="hidden" id="closingqty" disabled placeholder="closingqty" name="closingqty" >
                                           
                                         
                                          <button class="btn btn-info waves-effect" type="submit" id="addbutton" name="import" value="Add Item"> <i class="material-icons">add</i> <span>Add Item</span></button>
                                          
                                           
                                          
                                          </form>';
                            }
                            else
                            {
                                echo'System Day Not Opened Yet';
                            }
                            ?>
                             
                                            </td>
                                        </tr>
                                        <thead><tr>
                                            
                                            <th>Division</th>
                                            <th>Category</th>
                                            <th>Product Name</th>
                                            <th>Contact Number</th>
                                            <th>Classification</th>
                                        </tr></thead>
        		                <tr>   
                                
                                 <td><input class="form-control"type="text" id="division" disabled placeholder="Division"  name="division"></td>
                                <td><input class="form-control" type="text" id="demo1" disabled placeholder="Category" name="category"  ></td>
                                <td><input class="form-control"  type="text" id="demo2" disabled placeholder="Product Name" name="productname"></td>
                                <td><input class="form-control"type="text"  id="classification" disabled placeholder="Classification" name="classification" required></td>
                                
                                            <td>
                                          <?php 

                          //  echo $flag; echo $dstatus; echo$dayid;
                            if($dstatus=='OPENED')
                            {
                                          
                                echo'<button type="button" class="btn bg-pink waves-effect m-r-20" data-toggle="modal" data-target="#defaultModal"> <i class="material-icons">attach_money</i> <span>Payments</span></button>';
                                
                                echo'   <div class="modal fade" id="defaultModal" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="defaultModalLabel">PAYMENT MODE & CUSTOMER DETAILS </h4>
                        </div>
                        <div class="modal-body">';
                        
                             $payments2 = mysqli_query($pbcon,"SELECT * FROM `bill_payments` WHERE bill_no='$nbill' AND merchant_id='$merchantid'");   
                    while($row = mysqli_fetch_array($payments2))

                            {
                             $dpayamt=$row['pay_amt'];
                             
                            $totalpay=$totalpay+$dpayamt;
                               
                                
                            }
                             if($totalpay==''){$totalpay=0;}
                            
                          echo' <h4>Bill Number : <bold style="color:red;"> '.$nbill.'</bold> | Bill Value : <bold style="color:red;"> '.$totamt.'</bold>  | Total Pay : <bold style="color:Green;"> '.$totalpay.'</bold>   </h4> 
                            
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
                             <input type="hidden" id="paybillno" value="'.$nbill.'">
                             <input type="hidden" id="billamt" value="'.$totamt.'">
                             <input type="hidden" id="pmerchantid" value="'.$merchantid.'">
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
                            <input type="hidden" value="'.$nbill.'" name="cbillno">
                            <input type="hidden" value="'.$totamt.'" name="cbillamt">
                            <input type="hidden" value="'.$merchantid.'" name="cmerchantid">
                            <button type="submit" class="btn bg-green waves-effect" data-type="prompt" >
                            <i class="material-icons">check</i> <span>Checkout</span>
                            </button>
                            
                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                            </form>
                            
                        </div>
                    </div>
                </div>
            </div>';
                                
                            }
                            else
                            {
                                echo'System Day Not Opened Yet';
                            }
                            ?>
<script>
    function SubmitFormData() {
    var name = $("#paymode").val();
    var email = $("#payvalue").val();
    var phone = $("#paynotes").val();
    var gender = $("#paybillno").val();
    var pmerchantid = $("#pmerchantid").val();
    
    var billamt = $("#billamt").val();
   
    $.post("add-payment.php", { name: name, email: email, phone: phone, gender: gender, pmerchantid: pmerchantid,billamt: billamt  },
    function(data) {
	 $('#results').html(data);
	 $('#myForm')[0].reset();
    });
}
</script>
                                        
                                            </td>
                                        </tr>
        		                        
                                    </tbody>
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
