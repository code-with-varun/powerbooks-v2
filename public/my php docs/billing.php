<?php
require('global_dbconn.php');

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Powerus POS | Idly Corner</title>
    <!-- Favicon-->
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="plugins/animate-css/animate.css" rel="stylesheet" />
 <!-- Sweetalert Css -->
    <link href="plugins/sweetalert/sweetalert.css" rel="stylesheet" />
    <!-- Morris Chart Css-->
    <link href="plugins/morrisjs/morris.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="css/style.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="css/themes/all-themes.css" rel="stylesheet" />
</head>

<body class="theme-red">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Please wait...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Search Bar -->
 
    <!-- #END# Search Bar -->
    <!-- Top Bar -->
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="index.html">Lavish Enterprises - IDLY CORNER </a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <!-- Call Search -->
                    <li><a href="#" class="js-search" > Billing Opened for 08/12/2018</a></li>
                    <!-- #END# Call Search -->
                    <!-- Notifications -->
                    <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button">
                            <i class="material-icons">notifications</i>
                            <span class="label-count">7</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">NOTIFICATIONS</li>
                            <li class="body">
                                <ul class="menu">
                                    <li>
                                        <a href="javascript:void(0);">
                                            <div class="icon-circle bg-light-green">
                                                <i class="material-icons">person_add</i>
                                            </div>
                                            <div class="menu-info">
                                                <h4>12 new members joined</h4>
                                                <p>
                                                    <i class="material-icons">access_time</i> 14 mins ago
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                              
                                    <li>
                                        <a href="javascript:void(0);">
                                            <div class="icon-circle bg-purple">
                                                <i class="material-icons">settings</i>
                                            </div>
                                            <div class="menu-info">
                                                <h4>Settings updated</h4>
                                                <p>
                                                    <i class="material-icons">access_time</i> Yesterday
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="footer">
                                <a href="javascript:void(0);">View All Notifications</a>
                            </li>
                        </ul>
                    </li>
                    <!-- #END# Notifications -->
                    <!-- Tasks -->
                    <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button">
                            <i class="material-icons">flag</i>
                            <span class="label-count">9</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">TASKS</li>
                            <li class="body">
                                <ul class="menu tasks">
                                    <li>
                                        <a href="javascript:void(0);">
                                            <h4>
                                                Footer display issue
                                                <small>32%</small>
                                            </h4>
                                            <div class="progress">
                                                <div class="progress-bar bg-pink" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 32%">
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">
                                            <h4>
                                                Answer GitHub questions
                                                <small>92%</small>
                                            </h4>
                                            <div class="progress">
                                                <div class="progress-bar bg-purple" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 92%">
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="footer">
                                <a href="javascript:void(0);">View All Tasks</a>
                            </li>
                        </ul>
                    </li>
                    <!-- #END# Tasks -->
                    <li class="pull-right"><a href="javascript:void(0);" class="js-right-sidebar" data-close="true"><i class="material-icons">more_vert</i></a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- #Top Bar -->
    <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
           
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                  
                    <li >
                        <a href="dashboard.php">
                            <i class="material-icons">dashboard</i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li class="active">
                        <a href="billing.php">
                            <i class="material-icons">receipt</i>
                            <span>Billing</span>
                        </a>
                    </li>
                    <li>
                        <a href="inventory.php">
                            <i class="material-icons">layers</i>
                            <span>Inventory</span>
                        </a>
                    </li>
 <!-- multy level -->
                    <li>
                        <a href="#" class="menu-toggle">
                            <i class="material-icons">folder</i>
                            <span>Reports</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="billwise sales.php">
                                    <span>Billwise Sales</span>
                                </a>
                            </li>
                            <li>
                                <a href="itemwise sales.php">
                                    <span>Itemwise Sales</span>
                                </a>
                            </li>
							 <li>
                                <a href="daywise sales.php">
                                    <span>Daywise Sales</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="menu-toggle">
                                    <span>Analyse Report</span>
                                </a>
                                <ul class="ml-menu">
                                    <li>
                                        <a href="tax register.php">
                                            <span>Tax Register</span>
                                        </a>
                                    </li>
									 <li>
                                        <a href="report designer.php">
                                            <span>Report Designer</span>
                                        </a>
                                    </li>
                                   
                                </ul>
                            </li>
                        </ul>
                    </li>
      <!-- multy level end -->  
 <!-- multy level -->
                    <li>
                        <a href="#" class="menu-toggle">
                            <i class="material-icons">sync</i>
                            <span>Housekeeping</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="day close.php">
                                    <span>Day Close</span>
                                </a>
                            </li>
                            <li>
                                <a href="day open.php">
                                    <span>Day Open</span>
                                </a>
                            </li>
							<li>
                                <a href="manual sync.php">
                                    <span>Manual Sync</span>
                                </a>
                            </li>
                           
                        </ul>
                    </li>
      <!-- multy level end --> 	  
					<li>
                        <a href="logout.php">
                            <i class="material-icons">logout</i>
                            <span>Logout</span>
                        </a>
                    </li>

                </ul>
            </div>
            <!-- #Menu -->
            <!-- Footer -->
            <div class="legal">
                <div class="copyright">
                    &copy; 2018 <a href="#">POWERUS POS</a>.
                </div>
                <div class="version">
                    <b>Version: </b> 1.0.
                </div>
            </div>
            <!-- #Footer -->
        </aside>
        <!-- #END# Left Sidebar -->
        <!-- Right Sidebar -->
        <aside id="rightsidebar" class="right-sidebar">
            <ul class="nav nav-tabs tab-nav-right" role="tablist">
                <li role="presentation" class="active"><a href="#skins" data-toggle="tab">SKINS</a></li>
                <li role="presentation"><a href="#settings" data-toggle="tab">SETTINGS</a></li>
            </ul>
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane fade in active in active" id="skins">
                    <ul class="demo-choose-skin">
                        <li data-theme="red" class="active">
                            <div class="red"></div>
                            <span>Red</span>
                        </li>
                        <li data-theme="pink">
                            <div class="pink"></div>
                            <span>Pink</span>
                        </li>
                        <li data-theme="purple">
                            <div class="purple"></div>
                            <span>Purple</span>
                        </li>
                        <li data-theme="grey">
                            <div class="grey"></div>
                            <span>Grey</span>
                        </li>
                       
                    </ul>
                </div>
                <div role="tabpanel" class="tab-pane fade" id="settings">
                    <div class="demo-settings">
                        <p>GENERAL SETTINGS</p>
                        <ul class="setting-list">
                            <li>
                                <span>Report Panel Usage</span>
                                <div class="switch">
                                    <label><input type="checkbox" checked><span class="lever"></span></label>
                                </div>
                            </li>
                            <li>
                                <span>Email Redirect</span>
                                <div class="switch">
                                    <label><input type="checkbox"><span class="lever"></span></label>
                                </div>
                            </li>
                        </ul>
                        <p>SYSTEM SETTINGS</p>
                        <ul class="setting-list">
                            <li>
                                <span>Notifications</span>
                                <div class="switch">
                                    <label><input type="checkbox" checked><span class="lever"></span></label>
                                </div>
                            </li>
                            <li>
                                <span>Auto Updates</span>
                                <div class="switch">
                                    <label><input type="checkbox" checked><span class="lever"></span></label>
                                </div>
                            </li>
                        </ul>
                        <p>ACCOUNT SETTINGS</p>
                        <ul class="setting-list">
                            <li>
                                <span>Offline</span>
                                <div class="switch">
                                    <label><input type="checkbox"><span class="lever"></span></label>
                                </div>
                            </li>
                            <li>
                                <span>Location Permission</span>
                                <div class="switch">
                                    <label><input type="checkbox" checked><span class="lever"></span></label>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </aside>
        <!-- #END# Right Sidebar -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>Billing</h2>
            </div>

<?php
				$memstat5 = mysqli_query($glcon,"SELECT * FROM `bill_template` WHERE status='OPENED' ");
				while($row = mysqli_fetch_array($memstat5))
				{
						$sfy=$row['sfy'];
						
$memstat3 = mysqli_query($glcon,"SELECT Max(bill_suf)as mbillsuf FROM `billwise_sales` WHERE sfy='$sfy' ");
				while($row = mysqli_fetch_array($memstat3))
				{

								$tbill=$row['mbillsuf'];
								$nbill=$tbill+1;
								$newbillno='S'.$sfy.'/'.$nbill;
				}
				
				}
				
				$memstat3 = mysqli_query($glcon,"SELECT SUM(qty)as totalqty, sum(amount) as totalamount FROM `temp_bill`  ");
				while($row = mysqli_fetch_array($memstat3))
				{
									$totqty=$row['totalqty'];
									$totamt=$row['totalamount'];
				}
				
?>	
			
				

			 <div style="float:left;">
             
			 <button type="button" class="btn bg-blue waves-effect" data-type="prompt" >
                                    <i class="material-icons">receipt</i>
                                    <span>New Bill</span>
                                </button>
								<button type="button" class="btn bg-red waves-effect" data-type="prompt" onclick="showSuccessMessage()">
                                    <i class="material-icons">report_problem</i>
                                    <span>Void Bill</span>
                                </button>
								<button type="button" class="btn bg-green waves-effect" data-type="prompt" onclick="showPromptMessage()">
                                    <i class="material-icons">assignment_return</i>
                                    <span>Return</span>
                                </button>
			 
			      <button type="button" class="btn bg-pink waves-effect" data-type="prompt" onclick="showPromptMessage()">
                                    <i class="material-icons">print</i>
                                    <span>Reprint</span>
                                </button>
								<br><br>
             </div>
			<!-- billing menus ends -->			 
						 
						 
						 
						   <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                               Bill No: <?php echo$newbillno;?> | Billed Items 
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
                                            <th>Amount</th>
											<th>Qty</th>
											<th>Rate</th>
											<th>Cancel</th>
                                        </tr>
                                    </thead>
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
                                    <tbody>
<?php								
	$memstat = mysqli_query($glcon,"SELECT * FROM `temp_bill` ORDER BY sino ");
	while($row = mysqli_fetch_array($memstat))
{

                                echo "<tr><td>"; 
								echo $sino=$row['sino'];
								echo "</td><td>";
								echo $icode=$row['item_code'];
								echo "</td><td>";
								echo $idesc=$row['item_desc'];
								echo "</td><td>";
								echo $rate=$row['rate'];
								echo "</td><td>";
								echo $qty=$row['qty'];
								echo "</td><td>";
								echo $amount=$row['amount'];
								echo "</td><td>";
								echo '<form action="itemcancel.php" method="POST"> <input type="hidden" name="sino" value="'.$sino.'"> <button type="submit" class="btn bg-pink waves-effect" data-type="prompt" >
                                    <i class="material-icons">cancel</i> <span>Cancel</span>
                                </button> </form> ';
								echo "</td></tr>";
							
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
						 
						 
						 
						     <!-- Multi Column -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Billing Area
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
                           
				<form action="tempbill.php" method="POST">
                            <div class="row clearfix">
                                
								 <div class="col-md-2">
                                    <div class="form-group">
                                        
                                            <input type="text" class="form-control" value="<?php echo $newbillno;?>" disabled placeholder="Bill No">
											<input type="hidden" value="<?php echo $newbillno;?>" name="billno">
                                       
                                    </div>
                                </div>
								
								<div class="col-md-2">
                                    <div class="form-group">
										<div class="form-line">
				
								<select class="form-control" id="plan" name="icode" autofocus onchange="myFunction()">
								<option value="NA"> Select Item</option> 
<?php		
				$memstat2 = mysqli_query($glcon,"SELECT * FROM `menu_items` ");
				while($row = mysqli_fetch_array($memstat2))
				{
					$aname=$row['item_name'];
					$icode=$row['item_code'];	
					$mrp=$row['mrp'];				
				echo'<option value="'.$icode.'">'. $aname.' </option>';
				
				}		
				
				
				?> 		

</select>


<script>
function myFunction() {
    var x = document.getElementById("plan").value;
	if (x=='IC01')
	{
    document.getElementById("demo").value = "60";    document.getElementById("demo2").value = "60";
	}
	if (x=='NA')
	{
    document.getElementById("demo").value = "0";    document.getElementById("demo2").value = "0";
	}
	if (x=='IC02')
	{
    document.getElementById("demo").value = "15";document.getElementById("demo2").value = "15";
	}
	if (x=='IC03')
	{
    document.getElementById("demo").value = "45";document.getElementById("demo2").value = "45";
	}
	if (x=='IC04')
	{
    document.getElementById("demo").value = "70";document.getElementById("demo2").value = "70";
	}
	
}
</script>
	
		 
                                        </div>
                                    </div>
                                </div>
                                
								<div class="col-md-2">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text"  class="form-control" id="demo" disabled placeholder="Rate">
											<input type="hidden" name="rate" id="demo2">
                                        </div>
                                    </div>
                                </div>
								
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="qty" class="form-control" value="1" id="tqty" onfocus="myFunction2();" onchange="myFunction2();" placeholder="Qty">
                                        </div>
                                    </div>
                                </div>
<script>
function myFunction2() {
    var x = document.getElementById("tqty").value;
	var y = document.getElementById("demo").value;
	var z=x*y;
	
    document.getElementById("total").value = z;    document.getElementById("total2").value = z;
	
	
}
</script>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text"  id="total" class="form-control" placeholder="Amount" disabled>
											<input type="hidden" name="amount" id="total2" class="form-control" placeholder="Amount">
                                        </div>
                                    </div>
                                </div>
								
                                <div class="col-md-2">
                                    <div class="form-group">
                                        
                                           
								<button type="submit" class="btn bg-blue waves-effect" data-type="prompt" >
                                    <i class="material-icons">add</i> <span>Add Item</span>
                                </button>
								
			
											
			</form>								
                                     
                                    </div>
                                </div>
                               
                            </div>

	<form action="biller.php" method="POST">
                            <div class="row clearfix">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="mobileno" placeholder="Mobile No">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="custname" placeholder="Customer Name">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="form-line">
                                            
												<select class="form-control"  name="staff"  onchange="myFunction()">
								<option value="NA"> Please Select Staff </option> 
<?php		
				$memstat2 = mysqli_query($glcon,"SELECT * FROM `user_details` WHERE usertype='staff' ");
				while($row = mysqli_fetch_array($memstat2))
				{
					$staff=$row['username'];
					$staffid=$row['eid'];	
									
				echo'<option value="'.$staffid.'">'. $staff.'-----'.$staffid.' </option>';
				
				}		
				
				
				?> 		

</select>
                                        </div>
										
										
										
                                    </div>
                                </div>
                            </div>
									
                            <div class="row clearfix">
                                
								 <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Bill Amt</label>
                                            <input type="text" class="form-control" id="billamt" value="<?php echo $totamt;?>" disabled placeholder="Bill No">
											<input type="hidden" value="<?php echo $newbillno;?>" name="billno">
											<input type="hidden" value="<?php echo $totamt;?>" name="billamt">
                                       
                                    </div>
                                </div>
								
								<div class="col-md-2">
                                    <div class="form-group">
										<div class="form-line">
				<label>Payment Mode</label>
								<select class="form-control" id="cardplan" name="paymode"  onchange="myFunction3()">
								<option value="CASH"> CASH</option> 
								<option value="CARD"> CARD</option> 
								

</select>


<script>
function myFunction3() {
    var x = document.getElementById("cardplan").value;
	if (x=='CARD')
	{
    document.getElementById("cardno").disabled = false;
	document.getElementById("tcash").disabled = true;
	}
	if (x=='CASH')
	{
    document.getElementById("cardno").disabled = true;
	document.getElementById("tcash").disabled = false;

	}
	
}
</script>
	
		 
                                        </div>
                                    </div>
                                </div>
                                
								<div class="col-md-2">
                                    <div class="form-group">
                                        <div class="form-line">
										<label>Card No</label>
                                            <input type="text"  class="form-control" name="cardno" id="cardno" disabled placeholder="Card No.">
											
                                        </div>
                                    </div>
                                </div>
								
                                <div class="col-md-2">
                                    <div class="form-group">
										
										<label>Cash Tendered</label>
                                            <input type="text" name="tcash" class="form-control" value="<?php echo $totamt;?>" id="tcash" selected="selected" onfocus="myFunction4();" onchange="myFunction4();" placeholder="Cash Tendered">
                                       
                                    </div>
                                </div>
<script>
function myFunction4() {
    var x = document.getElementById("tcash").value;
	var y = document.getElementById("billamt").value;
	
	var z=y-x;
    document.getElementById("bcash").value = z;
	document.getElementById("bcash2").value = z;
	
}
</script>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <div class="form-line">
										<label>Balance </label>
                                            <input type="text" style="font-weight:bold;" id="bcash" class="form-control" placeholder="Balance Amount" disabled>
											<input type="hidden" name="bcash" id="bcash2" class="form-control" >
                                        </div>
                                    </div>
                                </div>
								
                                <div class="col-md-2">
                                    <div class="form-group">
                                        
                                           <label>Checkout</label><br>
								<button type="submit" class="btn bg-green waves-effect" data-type="prompt" >
                                    <i class="material-icons">check</i> <span>Checkout</span>
                                </button>
								
			
											
			</form>		
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Multi Column -->
				
                
                <!-- #END# Browser Usage -->
            </div>
        </div>
    </section>

    <!-- Jquery Core Js -->
    <script src="plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Select Plugin Js -->
 

    <!-- Slimscroll Plugin Js -->
    <script src="plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="plugins/node-waves/waves.js"></script>

    <!-- Jquery CountTo Plugin Js -->
    <script src="plugins/jquery-countto/jquery.countTo.js"></script>

    <!-- Morris Plugin Js -->
    <script src="plugins/raphael/raphael.min.js"></script>
    <script src="plugins/morrisjs/morris.js"></script>

    <!-- ChartJs -->
    <script src="plugins/chartjs/Chart.bundle.js"></script>

    <!-- Flot Charts Plugin Js -->
    <script src="plugins/flot-charts/jquery.flot.js"></script>
    <script src="plugins/flot-charts/jquery.flot.resize.js"></script>
    <script src="plugins/flot-charts/jquery.flot.pie.js"></script>
    <script src="plugins/flot-charts/jquery.flot.categories.js"></script>
    <script src="plugins/flot-charts/jquery.flot.time.js"></script>

    <!-- Sparkline Chart Plugin Js -->
    <script src="plugins/jquery-sparkline/jquery.sparkline.js"></script>

	<!-- Jquery DataTable Plugin Js -->
    <script src="plugins/jquery-datatable/jquery.dataTables.js"></script>
    <script src="plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>

	
    <!-- Custom Js -->
    <script src="js/admin.js"></script>
    <script src="js/pages/index.js"></script>

	  <!-- SweetAlert Plugin Js -->
    <script src="plugins/sweetalert/sweetalert.min.js"></script>

    <!-- Custom Js -->
    <script src="js/admin.js"></script>
    <script src="js/pages/ui/dialogs.js"></script>
 
    <script src="js/pages/forms/advanced-form-elements.js"></script>
    <!-- Demo Js -->
    <script src="js/demo.js"></script>

	
	
	
	</body>

 

</html>
