<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$base=base_url()."public/";
$sessdata = $this->session->userdata('pbk_sess');
$user_type= $sessdata['pbk_user_type'];
$onboarding= $sessdata['pbk_onboarding'];



?>


<section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>PRODUCT CREATION</h2>
            </div>
            <!-- CPU Usage -->
            <div class="row clearfix">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                   
                </div>
            </div>
         
            <div class="row clearfix">
                <!-- Task Info -->
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>DIVISION</h2>
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
											<th>Division Name</th>
                                            <th>Division Id</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
								<?php

									foreach ($division_fetch as $row)
									{
												$division_name=$row->division_name;
												$division_code=$row->division_code;
												
												
												echo'<tr>   
																			
																			<td>'.$division_name.'</td>
																			<td>'.$division_code.'</td>
																			

																		</tr>
																		
																		
																			';
												
												
											}
											
								?>  									
										<tr>
										<form class="form-horizontal" action="add-division" method="POST">
										<div class="form-group">
											
                                                <div class="col-sm-4">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" id="division_name" name="division_name" placeholder="Product Division Name" required>
													</div>
                                                </div>
												<div class="col-sm-4">
                                                    <div >
													<button type="submit" class="btn btn-success">ADD</button>
													</div>
                                                </div>
												
										</div>
										</form>
										</tr>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

					<div class="card">
                        <div class="header">
                            <h2>CATEGORY</h2>
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
											<th>Category Name</th>
											<th>Division Name</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
								<?php

									foreach ($category_fetch as $row)
									{
										$category_name=$row->category_name;
										$division_code=$row->division_code;
										$data['division_code']=$row->division_code;
										$specific_division_fetch = $this->Users_model->specific_division_fetch($data);
										foreach ($specific_division_fetch as $row)
										{
											$division_name=$row->division_name;
										}	
												
												echo'<tr>   
																			
																			<td>'.$category_name.'</td>
																			<td>'.$division_name.'</td>
																			
																		</tr>
																		
																		
																			';
												
												
											}
											
								?>  									
										<tr>
										<form class="form-horizontal" action="add-category" method="POST">
										<div class="form-group">
											
                                                <div class="col-sm-4">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" id="category_name" name="category_name" placeholder="Product Category Name" required>
													</div>
                                                </div>
												<div class="col-sm-4">
                                                    <div class="form-line">
													<select  name="division_code" id="division_code" class="form-control" required>
                                                        <option value="" selected disabled>Please Select</option>
                                                        <?php 
                                                        foreach ($division_fetch as $row) 
                                                        {

															$division_name=$row->division_name;
															$division_code=$row->division_code;

                                                        echo '<option value="'.$division_code.'">'.$division_name.'</option>'; 
                                                        }
                                                        ?>
                                                        </select>  
													</div>
                                                </div>
												<div class="col-sm-4">
                                                    <div >
													<button type="submit" class="btn btn-success">ADD</button>
													</div>
                                                </div>
												
										</div>
										</form>
										</tr>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

					<div class="card">
                        <div class="header">
                            <h2>CLASSIFICATION</h2>
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
											<th>Classification Name</th>
											
                                        </tr>
                                    </thead>
                                    <tbody>
								<?php

									foreach ($classification_fetch as $row)
									{
										$classification_name=$row->classification_name;
										
										echo'<tr>   
																			
																			<td>'.$classification_name.'</td>
																			
																			
																		</tr>
																		
																		
																			';
												
												
											}
											
								?>  									
										<tr>
										<form class="form-horizontal" action="add-classification" method="POST">
										<div class="form-group">
											
                                                <div class="col-sm-4">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" id="classification_name" name="classification_name" placeholder="Classification Name" required>
													</div>
                                                </div>
												<div class="col-sm-4">
                                                    <div >
													<button type="submit" class="btn btn-success">ADD</button>
													</div>
                                                </div>
												
										</div>
										</form>
										</tr>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

				<!-- product starts -->
				<div class="card">
                        <div class="header">
                            <h2>Product Details</h2>
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
                                            <th>TZ Barcode</th>
											<th>Product Name</th>
                                            <th>Item Type</th>
                                            <th>Division</th>
                                            <th>Category</th>
                                            <th>Classification</th>
                                            <th>SKU</th>
											<th>Retail Price</th>
											<th>Product Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
<?php

	foreach ($product_fetch as $row)
	{
        		 $TZ_barcode=$row->TZ_barcode;
        		 $product_name=$row->product_name;
        		 $item_type=$row->item_type;
        		 $division=$row->division;
				 $category=$row->category;
				 $classification=$row->classification;
				 $sku=$row->sku;
				 $current_retail_price=$row->current_retail_price;

        		 $status=$row->product_status;
        		 if($status=='INACTIVE'){$bg='red';}
        		 elseif($status=='ACTIVE'){$bg='green';}
        		  else{$bg='blue';}
        		 
        		 
        		 
        		 echo'<tr>   
                                            <td>'.$TZ_barcode.'</td>
                                            <td>'.$product_name.'</td>
                                            <td>'.$item_type.'</td>
                                             <td>'.$division.'</td>
											 <td>'.$category.'</td>
											 <td>'.$classification.'</td>
											 <td>'.$sku.'</td>
											 <td>'.$current_retail_price.'</td>
                                            <td><span class="label bg-'.$bg.'">'.$status.'</span></td>
											<td >
												<a href="delete-product">
												<i class="material-icons">delete</i>
												</a>
												<a href="delete-product">
												<i class="material-icons">edit</i>
												</a>

                                            </td>
                                        </tr>';
        		 
        		 
		    }
?>  
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
				
                <div class="card">
            <div class="body">
                <form id="sign_up" action="new-staff" method="POST">
                    <div class="msg">Register a New Staff</div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="name" placeholder="Name" required autofocus>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">phone</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="mobile" maxlength="10" minlength="10" placeholder="Mobile Number" required >
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">login</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="user_id" placeholder="User Id" required>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="password" minlength="6" placeholder="Password" required>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="confirm" minlength="6" placeholder="Confirm Password" required>
                        </div>
                    </div>
                     <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">user</i>
                        </span>
                        <div class="form-group">
                            <?php
                            if($user_type=='ADMIN')
                            {
                                echo'<input type="radio" name="usertype" id="male" class="with-gap" value="STAFF" checked>
                                    <label for="male">STAFF</label>

                                    <input type="radio" name="usertype" id="female" class="with-gap" VALUE="MANAGER">
                                    <label for="female" class="m-l-20">MANAGER</label>';  
                            }
                            else
                            {
                             echo'<input type="radio" name="usertype" id="male" class="with-gap" value="STAFF" checked>
                                    <label for="male">STAFF</label>';   
                            }
                            
                            ?>
                                    
                                </div>
                    </div>
                    

                    <button class="btn btn-lg bg-pink waves-effect" type="submit">Create User</button>

                  
                </form>
            </div>


				<!-- product ends  -->

                <!-- #END# Task Info -->
               
                <!-- #END# Browser Usage -->
            </div>
        </div>
    </section>
