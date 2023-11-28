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
// $result3 = mysqli_query($pbcon,"SELECT stage,count(*)AS COUNTSTAGE FROM  `opportunity_tickets` WHERE merchant_id='$merchantid' GROUP BY stage");
// 	  while($row = mysqli_fetch_array($result3))
// 		    {
// 		         $stagecountname=$row['stage'];
//         		 $stagecount=$row['COUNTSTAGE'];
//         		if($stagecountname=='BILLING'){$billingstage=$stagecount;}
//         		if($stagecountname=='DO'){$dostage=$stagecount;}
//         		if($stagecountname=='ESTIMATE'){$estimatestage=$stagecount;}
//         		if($stagecountname=='OPPORTUNITY'){$opportunitystage=$stagecount;}
        		
//         }
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
                            <div class="number count-to" data-from="0" data-to="25" data-speed="15" data-fresh-interval="20"></div>
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
                            <div class="number count-to" data-from="0" data-to="15" data-speed="1000" data-fresh-interval="20"></div>
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
                            <div class="number count-to" data-from="0" data-to="35" data-speed="1000" data-fresh-interval="20"></div>
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
                            <div class="number count-to" data-from="0" data-to="45" data-speed="1000" data-fresh-interval="20"></div>
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
            
                <!-- #END# Browser Usage -->
            </div>
        </div>
    </section>
