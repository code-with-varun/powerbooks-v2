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
            <h2>POS Billing</h2>
        </div>

        <div class="row clearfix">
            <!-- Task Info -->
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <!-- Billing Area Starts -->
                <div class="card">
            <div class="body">
            <?php 
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
            }
                ?>
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
                             <a href="billing-pos">
							<a href="billing">
							<button type="button" class="btn bg-blue waves-effect" data-type="prompt" >
                                    <i class="material-icons">shopping_cart</i>
                                    <span>View Cart</span>
                            </button></a>
                            
                            <button type="button" onclick="pos_checkout();" class="btn bg-green waves-effect" data-type="prompt" >
                            <i class="material-icons">currency_rupee</i>
                            <span>Checkout</span>
                            </button>
                            
                          
                            <br> <br>
                        
                
                    <h5>CART SUMMARY >>>
                        Total Quantity: <bold style="color:tomato;font-size:18px;"><?php echo isset($TOTQTY) ? $TOTQTY : 0; ?></bold> | 
                    Total Gross:<bold style="color:green;font-size:18px;"> <?php echo isset($TOTGROSS) ? $TOTGROSS : 0; ?></bold> | 
                   Total Tax: <bold style="color:red;font-size:18px;"><?php echo isset($TOTTAX) ? $TOTTAX : 0; ?></bold> | 
                    Total Net: <bold style="color:green; font-size:18px;"><?php echo isset($TOTNET) ? $TOTNET : 0; ?></bold>
                    
                   
                </h5>
                <form id="new_pos_checkout" action="bill-summary" method="POST"> <input type="hidden" value="<?= $TOTNET ?>" id="cart_value" name="TZ_barcode"> </form>		
                
                
       
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

                            <script>
                            function newbill_submit()
                            {
                            var form = document.getElementById("new_bill_form");
                            form.submit();

                            }
                            
                            function pos_checkout() {
    let form = document.getElementById("new_pos_checkout");
    let cart_value = document.getElementById("cart_value").value;
    if (cart_value !== 0 && cart_value !== '') {
        form.submit();
    } else {
        alert('Cart is Empty. Cannot Checkout.');
    }
}
                            </script>
				
                            
                        </div>
                    </div>
                </div>
            </div>
            </div>

                <div class="card">
                    <div class="body">
                   
        
                        <!-- Product Items Start -->
                        <div class="row">

                            <?php if(!empty($division_fetch))
				             {
                                foreach ($division_fetch as $row) {
                                $division_name = $row->division_name;
                                $rid = $row->rid;
                                $division_img_path = $row->division_img_path;
                                $division_img = base_url().'uploads/pos-thumbs/'.$division_img_path;
                            ?>

                                <div class="col-md-4">
                                    <div class="card" onclick="loadProducts('<?php echo $division_img; ?>')">
                                    <center> <a href="<?php echo base_url()."billing-pos/division/".$rid;?>"><img class="card-img-top" src="<?php echo $division_img; ?>" alt="<?php echo $division_name; ?>" ></a></center> 
                                        <div class="card-body">
                                            <h5 class="card-title" style="padding:10px;"><?php echo $division_name; ?></h5>
                                        </div>
                                    </div>
                                </div>

                            <?php }} ?>

                            <?php if(!empty($division_wise_category_fetch))
				             {
                                foreach ($division_wise_category_fetch as $row) {
                                $category_name = $row->category_name;
                                $rid = $row->rid;
                                $category_img_path = $row->category_img_path;
                                $category_img = base_url().'uploads/pos-thumbs/'.$category_img_path;
                            ?>

                                <div class="col-md-4">
                                    <div class="card" onclick="loadProducts('<?php echo $category_img; ?>')">
                                    <center> <a href="<?php echo base_url("billing-pos/category/").$rid;?>"><img class="card-img-top" src="<?php echo $category_img; ?>" alt="<?php echo $category_name; ?>" ></a></center> 
                                        <div class="card-body">
                                            <h5 class="card-title" style="padding:10px;"><?php echo $category_name; ?></h5>
                                        </div>
                                    </div>
                                </div>

                            <?php }} ?>

                            <?php if(!empty($category_wise_product_fetch))
				             {
                                foreach ($category_wise_product_fetch as $row) {
                                $item_name = $row->item_name;
                                $data['TZ_barcode']=$rid = $row->TZ_barcode;
                                $item_img_path = $row->item_img_path;
                                $item_img = base_url().'uploads/pos-thumbs/'.$item_img_path;
                                $sku = $row->sku;
                                $item_img = base_url().'uploads/pos-thumbs/'.$item_img_path;
                                $specific_multi_mrp_fetch = $this->Users_model->specific_multi_mrp_fetch($data);
                                foreach ($specific_multi_mrp_fetch as $row)
                                {
                                    $retail_price=$row->retail_price;
                                    $tax_slab=$row->tax_slab;
                            ?>

                                <div class="col-md-4">
                                    <div class="card" onclick="loadProducts('<?php echo $item_img; ?>')">
                                    <center> <a href="<?php echo base_url("billing-pos/product/").$rid;?>"><img class="card-img-top" src="<?php echo $item_img; ?>" alt="<?php echo $item_name; ?>" ></a></center> 
                                        <div class="card-body">
                                            
                                        <h5 class="card-title" style="padding:10px;"><?php echo $rid.' | '.$item_name.'<br> <small> '
                                             .$sku.'</small><br>
                                             <bold style="color:green; font-size:16px; padding-top:5px;">₹'. $retail_price.'</bold>
                                             <form action="'.base_url().'add-to-cart" method="POST">
                            
                                             <input type="hidden" value="'.$retail_price.'|-|'.$tax_slab.'" name="retail_price">
                                            <input type="hidden" value="'.$rid.'" name="TZ_barcode">
                                            <div>
  <button type="button" onclick="changeQuantity(-1)">-</button>
  <input type="number" min="1" style="width: 50px;" name="quantity" id="quantity" value="1" required>
  <button type="button" onclick="changeQuantity(1)">+</button>
  <button type="submit" class="btn bg-green waves-effect"> Add to Cart </button>
</div>


                                            </form>

                                            <script>

                                            function changeQuantity(amount) {
                                                var quantityInput = document.getElementById("quantity");
                                                var currentQuantity = parseInt(quantityInput.value);
                                              
                                                // Ensure the new quantity is at least 1
                                                var newQuantity = Math.max(1, currentQuantity + amount);
                                              
                                                // Update the quantity input
                                                quantityInput.value = newQuantity;
                                              }

                                              </script>
                                            
                                            '; ?></h5>
                                        </div>
                                    </div>
                                </div>

                            <?php }}} ?>

                            <?php if(!empty($specific_item_fetch))
				             {
                                foreach ($specific_item_fetch as $row) {
                                $item_name = $row->item_name;
                                $data['TZ_barcode']=$rid = $row->TZ_barcode;
                                $item_img_path = $row->item_img_path;
                                $sku = $row->sku;
                                $item_img = base_url().'uploads/pos-thumbs/'.$item_img_path;
                                $specific_multi_mrp_fetch = $this->Users_model->specific_multi_mrp_fetch($data);
                                foreach ($specific_multi_mrp_fetch as $row)
                                {
                                    $retail_price=$row->retail_price;
                                    $tax_slab=$row->tax_slab;
                                    
			
                            ?>

                                <div class="col-md-4">
                                    <div class="card" onclick="loadProducts('<?php echo $item_img; ?>')">
                                    <center> <a href="#"><img class="card-img-top" src="<?php echo $item_img; ?>" alt="<?php echo $item_name; ?>" ></a></center>
                                        <div class="card-body">
                                            <h5 class="card-title" style="padding:10px;"><?php echo $rid.' | '.$item_name.'<br> <small> '
                                             .$sku.'</small><br>
                                             <bold style="color:green; font-size:16px; padding-top:5px;">₹'. $retail_price.'</bold>
                                             <form action="'.base_url().'add-to-cart" method="POST">
                            
                                             <input type="hidden" value="'.$retail_price.'|-|'.$tax_slab.'" name="retail_price">
                                            <input type="hidden" value="'.$rid.'" name="TZ_barcode">
                                            <div>
  <button type="button" onclick="changeQuantity(-1)">-</button>
  <input type="number" min="1" style="width: 50px;" name="quantity" id="quantity" value="1" required>
  <button type="button" onclick="changeQuantity(1)">+</button>
  <button type="submit" class="btn bg-green waves-effect"> Add to Cart </button>
</div>


                                            </form>

                                            <script>

                                            function changeQuantity(amount) {
                                                var quantityInput = document.getElementById("quantity");
                                                var currentQuantity = parseInt(quantityInput.value);
                                              
                                                // Ensure the new quantity is at least 1
                                                var newQuantity = Math.max(1, currentQuantity + amount);
                                              
                                                // Update the quantity input
                                                quantityInput.value = newQuantity;
                                              }

                                              </script>
                                            
                                            '; ?></h5>
                                        </div>
                                    </div>
                                </div>

                            <?php }}} ?>

                           
                            
                        </div>
                        <!-- Product Items End -->

                    </div>
                </div>
                <!-- Billing Area Ends -->
            </div>
            <!-- #END# Task Info -->
        </div>
    </div>
</section>




	
