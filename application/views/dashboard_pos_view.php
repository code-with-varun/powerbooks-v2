<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$base=base_url()."public/";

$sessdata = $this->session->userdata('pbk_sess');
$user_type= $sessdata['pbk_user_type'];
$onboarding= $sessdata['pbk_onboarding'];
$merchant_id= $sessdata['pbk_merchant_id'];
$data['merchant_id']=$merchant_id;
?>
<style>
/* Add this to your CSS stylesheet */
.product-container {
    display: flex;
    flex-wrap: wrap;
    justify-content: flex-start;
    margin: 0 -15px; /* Adjust the margin based on your layout */
}

.product-container .card {
    width: 100%; /* Adjust the width based on your layout */
    margin: 15px 0; /* Adjust the margin based on your layout */
}

.product-container h2 {
    width: 100%;
    margin-bottom: 10px; /* Adjust the margin based on your layout */
}

/* Optional: Adjust other styles as needed */

</style>
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
                             <!-- <a href="billing-pos"> -->
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
                <form id="new_pos_checkout" action="pos-summary" method="POST"> <input type="hidden" value="<?= $TOTNET ?>" id="cart_value" name="TZ_barcode"> </form>		
                
                
       
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
        <div class="row product-container">

<?php 

 // Display top 10 products first
 echo '<h2> Top 10 Items </h2>';
 echo '<hr>';
 foreach ($top_10_products as $top_product) {
    //$item_img = base_url() . 'uploads/pos-thumbs/' . $top_product->item_img_path;
    $data['TZ_barcode'] = $top_product->TZ_barcode;
    $specific_item_fetch = $this->Users_model->specific_item_fetch($data);
        foreach ($specific_item_fetch as $row)
        {
            $category = $row->category;
            $item_img_path = $row->item_img_path;
            $item_img = base_url().'uploads/pos-thumbs/'.$item_img_path;
            $item_name = $row->item_name;
            $sku = $row->sku;
            $data['TZ_barcode']=$rid = $row->TZ_barcode;
            $specific_multi_mrp_fetch = $this->Users_model->specific_multi_mrp_fetch($data);
            foreach ($specific_multi_mrp_fetch as $row)
            {
                $retail_price=$row->retail_price;
                $tax_slab=$row->tax_slab;
            }
            
        }
       
    echo '
    <div class="col-md-3">
        <div class="card" onclick="loadProducts(\'' . $item_img . '\')">
            <center>
                <a href="#">
                    <img class="card-img-top" src="' . $item_img . '" alt="' . $item_name . '" style="max-width: 100%; height: auto; display: block; margin: 0 auto;">
                </a>
            </center>
            <div class="card-body">
                <h5 class="card-title" style="padding: 10px;">' . $rid . '<br> <small> ' . $sku . '</small><br>
                    <strong style="color: green; font-size: 18px; padding-top: 5px;">₹' . $retail_price . '</strong>
                    <form action="' . base_url() . 'add-to-cart" method="POST">
                        <input type="hidden" value="' . $retail_price . '|-|' . $tax_slab . '" name="retail_price">
                        <input type="hidden" value="' . $rid . '" name="TZ_barcode">
                        <div>
                            <button type="button" onclick="changeQuantity(-1)">-</button>
                            <input type="number" min="1" style="width: 50px;" name="quantity" id="quantity" value="1" required>
                            <button type="button" onclick="changeQuantity(1)">+</button>
                            <button type="submit" class="btn bg-green waves-effect">Add Item</button>
                        </div>
                    </form>
                </h5>
            </div>
        </div>
    </div>';
}


$currentCategory = ''; // Variable to keep track of the current category

if (!empty($product_fetch_by_division_category)) {
    foreach ($product_fetch_by_division_category as $row) {
        $category = $row->category;
        $item_img_path = $row->item_img_path;
        $item_img = base_url().'uploads/pos-thumbs/'.$item_img_path;
        $item_name = $row->item_name;
        $sku = $row->sku;
        $data['TZ_barcode']=$rid = $row->TZ_barcode;
        $specific_multi_mrp_fetch = $this->Users_model->specific_multi_mrp_fetch($data);
        foreach ($specific_multi_mrp_fetch as $row)
        {
            $retail_price=$row->retail_price;
            $tax_slab=$row->tax_slab;
        }
        
        // Check if the category has changed
        if ($currentCategory !== $category) {
            // If it has changed, display the heading and <hr>
            echo '<h2>' . $category . '</h2>';
            echo '<hr>';
            $currentCategory = $category;
        }

         // Rest of your code for displaying product card
         echo '
         <div class="col-md-3">
             <div class="card" onclick="loadProducts(\'' . $item_img . '\')">
                 <center>
                     <a href="#">
                         <img class="card-img-top" src="' . $item_img . '" alt="' . $item_name . '" style="max-width: 100%; height: auto; display: block; margin: 0 auto;">
                     </a>
                 </center>
                 <div class="card-body">
                     <h5 class="card-title" style="padding: 10px;">' . $rid . '<br> <small> ' . $sku . '</small><br>
                         <strong style="color: green; font-size: 18px; padding-top: 5px;">₹' . $retail_price . '</strong>
                         <form action="' . base_url() . 'add-to-cart" method="POST">
                             <input type="hidden" value="' . $retail_price . '|-|' . $tax_slab . '" name="retail_price">
                             <input type="hidden" value="' . $rid . '" name="TZ_barcode">
                             <div>
                                 <button type="button" onclick="changeQuantity(-1)">-</button>
                                 <input type="number" min="1" style="width: 50px;" name="quantity" id="quantity" value="1" required>
                                 <button type="button" onclick="changeQuantity(1)">+</button>
                                 <button type="submit" class="btn bg-green waves-effect">Add Item</button>
                             </div>
                         </form>
                     </h5>
                 </div>
             </div>
         </div>';
     
    
        
    }
   
}
?>

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






	
