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
                <h2>STAFFING</h2>
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
                            <h2>Staff Details</h2>
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
                                            <th>Staff EID</th>
                                            <th>Staff Name</th>
                                            <th>Role</th>
                                            <th>Contact No</th>
                                            <th>Profile Status</th>
                                            <th>Staff ID</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
<?php

	foreach ($staff_manager_fetch as $row)
	{
        		 $staff_mail=$row->eid;
        		 $staff_name=$row->name;
        		 $ruser_type=$row->user_type;
        		 $staff_contact=$row->admin_mobile;
        		 $status=$row->profile_status;
        		 if($status=='INACTIVE'){$bg='red';}
        		 elseif($status=='ACTIVE'){$bg='green';}
        		  else{$bg='blue';}
        		 $staff_id=$row->staff_id;
        		 
        		 
        		 echo'<tr>   
                                            <td>'.$staff_mail.'</td>
                                            <td>'.$staff_name.'</td>
                                            <td>'.$ruser_type.'</td>
                                             <td>'.$staff_contact.'</td>
                                            <td><span class="label bg-'.$bg.'">'.$status.'</span></td>
                                            <td>'.$staff_id.'</td>
                                          	<td><form action="#" method="post">
                                            <input type="hidden" name="oppid" value="'.$staff_mail.'">
                                            <input class="btn btn-info waves-effect" type="button" value="View"></form>
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
        </div>
                </div>
                
                
                
                
                <!-- #END# Task Info -->
               
                <!-- #END# Browser Usage -->
            </div>
        </div>
    </section>
