<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$base=base_url()."public/";

?>

<section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>DASHBOARD</h2>
            </div>
<?php
$result3 = mysqli_query($pbcon,"SELECT stage,count(*)AS COUNTSTAGE FROM  `opportunity_tickets` WHERE merchant_id='$merchantid' GROUP BY stage");
	  while($row = mysqli_fetch_array($result3))
		    {
		         $stagecountname=$row['stage'];
        		 $stagecount=$row['COUNTSTAGE'];
        		if($stagecountname=='BILLING'){$billingstage=$stagecount;}
        		if($stagecountname=='DO'){$dostage=$stagecount;}
        		if($stagecountname=='ESTIMATE'){$estimatestage=$stagecount;}
        		if($stagecountname=='OPPORTUNITY'){$opportunitystage=$stagecount;}
        		
        }
?>
            <!-- Widgets -->
            <div class="row clearfix">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-pink hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">face</i>
                        </div>
                        <div class="content">
                            <div class="text">OPPORTUNITIES</div>
                            <div class="number count-to" data-from="0" data-to="<?php echo$opportunitystage;?>" data-speed="15" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-cyan hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">assignment</i>
                        </div>
                        <div class="content">
                            <div class="text">ESTIMATES</div>
                            <div class="number count-to" data-from="0" data-to="<?php echo$estimatestage;?>" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-light-green hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">forum</i>
                        </div>
                        <div class="content">
                            <div class="text">DELIVERY ORDERS</div>
                            <div class="number count-to" data-from="0" data-to="<?php echo$dostage;?>" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-orange hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">shopping_cart</i>
                        </div>
                        <div class="content">
                            <div class="text">BILLS</div>
                            <div class="number count-to" data-from="0" data-to="<?php echo$billingstage;?>" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Widgets -->
            <!-- CPU Usage -->
            <div class="row clearfix">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                   
                </div>
            </div>
            <!-- #END# CPU Usage -->
            <div class="row clearfix">
                
               <!-- Answered Tickets -->
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                    <div class="card">
                        <div class="body bg-pink">
                            <div class="font-bold m-b--35">Status</div>
                            <ul class="dashboard-stat-list">
                                <li>
                                    TOTAL BILLS
                                    <span class="pull-right"><b>12</b> <small>BILLS</small></span>
                                </li>
                                <li>
                                    TOTAL QTY
                                    <span class="pull-right"><b>15</b> <small>QTY</small></span>
                                </li>
                                <li>
                                    MTD VALUE
                                    <span class="pull-right"><b>14500</b> <small>Value in MRP</small></span>
                                </li>
                                                                <li>
                                    YTD VALUE
                                    <span class="pull-right"><b>14500</b> <small>Value in MRP</small></span>
                                </li>
                                
                               
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- #END# Answered Tickets -->
              <!-- Answered Tickets -->
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                    <div class="card">
                        <div class="body bg-cyan">
                            <div class="font-bold m-b--35">Statistics</div>
                            <ul class="dashboard-stat-list">
                                <li>
                                    TOP SELLER
                                    <span class="pull-right"><b>12</b> <small>QTY</small></span>
                                </li>
                                <li>
                                    CUSTOMER
                                    <span class="pull-right"><b>15</b> <small>TICKETS</small></span>
                                </li>
                                <li>
                                    LAST WEEK
                                    <span class="pull-right"><b>90</b> <small>TICKETS</small></span>
                                </li>
                                <li>
                                    LAST MONTH
                                    <span class="pull-right"><b>342</b> <small>TICKETS</small></span>
                                </li>
                                
                                
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- #END# Answered Tickets -->
                <!-- Answered Tickets -->
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                    <div class="card">
                        <div class="body bg-green">
                            <div class="font-bold m-b--35">Utility</div>
                            <ul class="dashboard-stat-list">
                                <li>
                                    DOCUMENTATION 
                                    <span class="pull-right"> <input class="btn btn-warning waves-effect" type="button" value="Click To Go"></span>
                                </li>
                                <li>
                                    CUSTOMER CARE
                                    <span class="pull-right"> <a href="https://lavishdreamers.com/helpdesk/" target="helpdesk"><input class="btn btn-info waves-effect" type="button" value="Click To Go"></a></span>
                                </li>
                                <li>
                                    APP SETTINGS
                                    <span class="pull-right"> <a href="onboarding"><input class="btn btn-danger waves-effect" type="button" value="Click To Go"></a></span>
                                </li>
                                <li>
                                    TAX SETTINGS
                                    <span class="pull-right"> <input class="btn bg-pink waves-effect" type="button" value="Click To Go"></span>
                                </li>
                                
                                
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- #END# Answered Tickets -->
            
			</div>

            <div class="row clearfix">
                <!-- Task Info -->
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>PROCESSING Opportunities</h2>
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
                                            <th>Opportunity ID</th>
                                            <th>Customer Name</th>
                                            <th>items</th>
                                            <th>Status</th>
                                            <th>Staff</th>
                                            <th>Progress</th>
                                            <th>Stage</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
<?php


$result2 = mysqli_query($pbcon,"SELECT * FROM  `opportunity_tickets` WHERE merchant_id='$merchantid' AND status='PROCESSING' ORDER BY stage");
	  while($row = mysqli_fetch_array($result2))
		    {
        		 $opportunity_id=$row['opportunity_id'];
        		 $cust_name=$row['cust_name'];
        		 $purchase_item=$row['purchase_item'];
        		 $status=$row['status'];
        		 if($status=='ON HOLD'){$bg='red';}
        		 elseif($status=='FINISHED'){$bg='green';}
        		 elseif($status=='PROCESSING'){$bg='orange';}
        		 else{$bg='blue';}
        		 $stage=$row['stage'];
        		 if($stage=='BILLING'){$stbg='success';$stpct='100';}
        		 elseif($stage=='DO'){$stbg='info';$stpct='75';}
        		 elseif($stage=='ESTIMATE'){$stbg='warning';$stpct='50';}
        		 elseif($stage=='OPPORTUNITY'){$stbg='danger';$stpct='25';}
        		 $opportunity_owner=$row['opportunity_owner'];
        		 
        		 
        		 echo'<tr>   
                                            <td>'.$opportunity_id.'</td>
                                            <td>'.$cust_name.'</td>
                                            <td>'.$purchase_item.'</td>
                                            <td><span class="label bg-'.$bg.'">'.$status.'</span></td>
                                            <td>'.$opportunity_owner.'</td>
                                            <td>
                                            
                                                <div class="progress">
                                                    <div class="progress-bar progress-bar-'.$stbg.' progress-bar-striped active" role="progressbar" aria-valuenow="'.$stpct.'" aria-valuemin="0" aria-valuemax="100" style="width: '.$stpct.'%"></div>
                                                </div>
                                               <br> <center>'.$stpct.'%</center>
                                            </td>
                                            <td>'.$stage.'</td>
                                            
                                            <td>';
                                           
                                            echo'<form action="staging" method="post">
                                            
                                            <input type="hidden" value="'.$opportunity_id.'" name="optid">
                                            <input class="btn btn-info waves-effect" type="submit" value="View Ticket"></form>';
                                        
                                           echo' </td>
                                        </tr>';
        		 
        		 
		    }
?>  
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- #END# Task Info -->
         
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>CREATED Opportunities</h2>
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
                                            <th>Opportunity ID</th>
                                            <th>Customer Name</th>
                                            <th>items</th>
                                            <th>Status</th>
                                            <th>Staff</th>
                                            <th>Progress</th>
                                            <th>Stage</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
<?php


$result2 = mysqli_query($pbcon,"SELECT * FROM  `opportunity_tickets` WHERE merchant_id='$merchantid' AND status='CREATED' ORDER BY stage");
	  while($row = mysqli_fetch_array($result2))
		    {
        		 $opportunity_id=$row['opportunity_id'];
        		 $cust_name=$row['cust_name'];
        		 $purchase_item=$row['purchase_item'];
        		 $status=$row['status'];
        		 if($status=='ON HOLD'){$bg='red';}
        		 elseif($status=='FINISHED'){$bg='green';}
        		 elseif($status=='PROCESSING'){$bg='orange';}
        		 else{$bg='blue';}
        		 $stage=$row['stage'];
        		 if($stage=='BILLING'){$stbg='success';$stpct='100';}
        		 elseif($stage=='DO'){$stbg='info';$stpct='75';}
        		 elseif($stage=='ESTIMATE'){$stbg='warning';$stpct='50';}
        		 elseif($stage=='OPPORTUNITY'){$stbg='danger';$stpct='25';}
        		 $opportunity_owner=$row['opportunity_owner'];
        		 
        		 
        		 echo'<tr>   
                                            <td>'.$opportunity_id.'</td>
                                            <td>'.$cust_name.'</td>
                                            <td>'.$purchase_item.'</td>
                                            <td><span class="label bg-'.$bg.'">'.$status.'</span></td>
                                            <td>'.$opportunity_owner.'</td>
                                            <td>
                                            
                                                <div class="progress">
                                                    <div class="progress-bar progress-bar-'.$stbg.' progress-bar-striped active" role="progressbar" aria-valuenow="'.$stpct.'" aria-valuemin="0" aria-valuemax="100" style="width: '.$stpct.'%"></div>
                                                </div>
                                               <br> <center>'.$stpct.'%</center>
                                            </td>
                                            <td>'.$stage.'</td>
                                            
                                            <td>';
                                           
                                            echo'<form action="staging" method="post">
                                            
                                            <input type="hidden" value="'.$opportunity_id.'" name="optid">
                                            <input class="btn btn-info waves-effect" type="submit" value="View Ticket"></form>';
                                        
                                           echo' </td>
                                        </tr>';
        		 
        		 
		    }
?>  
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- #END# Task Info -->
                
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>HOLDED Opportunities</h2>
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
                                            <th>Opportunity ID</th>
                                            <th>Customer Name</th>
                                            <th>items</th>
                                            <th>Status</th>
                                            <th>Staff</th>
                                            <th>Progress</th>
                                            <th>Stage</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
<?php


$result2 = mysqli_query($pbcon,"SELECT * FROM  `opportunity_tickets` WHERE merchant_id='$merchantid' AND status='ON HOLD' ORDER BY stage");
	  while($row = mysqli_fetch_array($result2))
		    {
        		 $opportunity_id=$row['opportunity_id'];
        		 $cust_name=$row['cust_name'];
        		 $purchase_item=$row['purchase_item'];
        		 $status=$row['status'];
        		 if($status=='ON HOLD'){$bg='red';}
        		 elseif($status=='FINISHED'){$bg='green';}
        		 elseif($status=='PROCESSING'){$bg='orange';}
        		 else{$bg='blue';}
        		 $stage=$row['stage'];
        		 if($stage=='BILLING'){$stbg='success';$stpct='100';}
        		 elseif($stage=='DO'){$stbg='info';$stpct='75';}
        		 elseif($stage=='ESTIMATE'){$stbg='warning';$stpct='50';}
        		 elseif($stage=='OPPORTUNITY'){$stbg='danger';$stpct='25';}
        		 $opportunity_owner=$row['opportunity_owner'];
        		 
        		 
        		 echo'<tr>   
                                            <td>'.$opportunity_id.'</td>
                                            <td>'.$cust_name.'</td>
                                            <td>'.$purchase_item.'</td>
                                            <td><span class="label bg-'.$bg.'">'.$status.'</span></td>
                                            <td>'.$opportunity_owner.'</td>
                                            <td>
                                            
                                                <div class="progress">
                                                    <div class="progress-bar progress-bar-'.$stbg.' progress-bar-striped active" role="progressbar" aria-valuenow="'.$stpct.'" aria-valuemin="0" aria-valuemax="100" style="width: '.$stpct.'%"></div>
                                                </div>
                                               <br> <center>'.$stpct.'%</center>
                                            </td>
                                            <td>'.$stage.'</td>
                                            
                                            <td>';
                                           
                                            echo'<form action="staging" method="post">
                                            
                                            <input type="hidden" value="'.$opportunity_id.'" name="optid">
                                            <input class="btn btn-info waves-effect" type="submit" value="View Ticket"></form>';
                                        
                                           echo' </td>
                                        </tr>';
        		 
        		 
		    }
?>  
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- #END# Task Info -->
                
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>FINISHED Opportunities</h2>
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
                                            <th>Opportunity ID</th>
                                            <th>Customer Name</th>
                                            <th>items</th>
                                            <th>Status</th>
                                            <th>Staff</th>
                                            <th>Progress</th>
                                            <th>Stage</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
<?php


$result2 = mysqli_query($pbcon,"SELECT * FROM  `opportunity_tickets` WHERE merchant_id='$merchantid' AND status='FINISHED'");
	  while($row = mysqli_fetch_array($result2))
		    {
        		 $opportunity_id=$row['opportunity_id'];
        		 $cust_name=$row['cust_name'];
        		 $purchase_item=$row['purchase_item'];
        		 $status=$row['status'];
        		 if($status=='ON HOLD'){$bg='red';}
        		 elseif($status=='FINISHED'){$bg='green';}
        		 elseif($status=='PROCESSING'){$bg='orange';}
        		 else{$bg='blue';}
        		 $stage=$row['stage'];
        		 if($stage=='BILLING'){$stbg='success';$stpct='100';}
        		 elseif($stage=='DO'){$stbg='info';$stpct='75';}
        		 elseif($stage=='ESTIMATE'){$stbg='warning';$stpct='50';}
        		 elseif($stage=='OPPORTUNITY'){$stbg='danger';$stpct='25';}
        		 $opportunity_owner=$row['opportunity_owner'];
        		 
        		 
        		 echo'<tr>   
                                            <td>'.$opportunity_id.'</td>
                                            <td>'.$cust_name.'</td>
                                            <td>'.$purchase_item.'</td>
                                            <td><span class="label bg-'.$bg.'">'.$status.'</span></td>
                                            <td>'.$opportunity_owner.'</td>
                                            <td>
                                            
                                                <div class="progress">
                                                    <div class="progress-bar progress-bar-'.$stbg.' progress-bar-striped active" role="progressbar" aria-valuenow="'.$stpct.'" aria-valuemin="0" aria-valuemax="100" style="width: '.$stpct.'%"></div>
                                                </div>
                                               <br> <center>'.$stpct.'%</center>
                                            </td>
                                            <td>'.$stage.'</td>
                                            
                                            <td>';
                                           
                                            echo'<form action="staging" method="post">
                                            
                                            <input type="hidden" value="'.$opportunity_id.'" name="optid">
                                            <input class="btn btn-info waves-effect" type="submit" value="View Ticket"></form>';
                                        
                                           echo' </td>
                                        </tr>';
        		 
        		 
		    }
?>  
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- #END# Task Info -->
               
               
                <!-- #END# Browser Usage -->
            </div>
        </div>
    </section>
