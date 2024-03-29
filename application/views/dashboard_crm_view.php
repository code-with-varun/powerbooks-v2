<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$base=base_url()."public/";


if ($billwise_insights) {                            
    foreach ($billwise_insights as $row) {
        
        $service_count = $row->total_qty;
         $store_visits = $row->total_bills;
        $paid = $row->total_to_pay;
        $avg_paid = $row->avg_to_pay;
        
    }}
    else{
        $store_visits = 0; 
        $service_count = 0; 
        $paid = 0; 
        $avg_paid = 0; 
    }
    
       

?>

<section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>CRM</h2>
            </div>

            <!-- Widgets -->
            <div class="row clearfix">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-pink hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">face</i>
                        </div>
                        <div class="content">
                            <div class="text">STORE VISITS</div>
                            <div class="number count-to" data-from="0" data-to="<?php echo $store_visits;?>" data-speed="15" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-cyan hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">assignment</i>
                        </div>
                        <div class="content">
                            <div class="text">SERVICE COUNTS</div>
                            <div class="number count-to" data-from="0" data-to="<?php echo $service_count;?>" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-light-green hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">forum</i>
                        </div>
                        <div class="content">
                            <div class="text">SALES</div>
                            <div class="number count-to" data-from="0" data-to="<?php echo $paid;?>" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-orange hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">shopping_cart</i>
                        </div>
                        <div class="content">
                            <div class="text">AVG PAID</div>
                            <div class="number count-to" data-from="0" data-to="<?php echo $avg_paid;?>" data-speed="1000" data-fresh-interval="20"></div>
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
            <!-- <div class="row clearfix"> -->
                
             <!-- #END# Answered Tickets -->
             <!-- <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                    <div class="card">
                        <div class="body bg-pink">
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
                </div> -->
               
              <!-- Answered Tickets -->
              <!-- <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                    <div class="card">
                        <div class="body bg-orange">
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
                </div> -->
                <!-- #END# Answered Tickets -->
                <!-- Answered Tickets -->
                <!-- <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
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
                                    <span class="pull-right"> <a href="https://helpdesk.thamizhanda.in/" target="helpdesk"><input class="btn btn-info waves-effect" type="button" value="Click To Go"></a></span>
                                </li>
                                <li>
                                    APP SETTINGS
                                    <span class="pull-right"> <a href="settings"><input class="btn btn-danger waves-effect" type="button" value="Click To Go"></a></span>
                                </li>
                                <li>
                                    SALES REPORT
                                    <span class="pull-right"> <a href="daywise-sales"><input class="btn bg-pink waves-effect" type="button" value="Click To Go"></a></span>
                                </li>
                                
                                
                            </ul>
                        </div>
                    </div>
                </div>
               

            </div> -->

<!-- list group starts -->

            <div class="row clearfix">
                <!-- Basic Examples -->
                <!-- Badges -->
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                ITEM WISE INSIGHTS
                                <small>Here you can see the itemwise insights for the customer.</small>
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
                            <ul class="list-group">
                            <?php
// Array of colors
$colors = array('pink', 'cyan', 'teal', 'orange', 'purple');

if ($itemwise_insights) {                            
    foreach ($itemwise_insights as $row) {
        $item_name = $row->item_name;
        $itotal_qty = $row->itotal_qty;
        $itotal_net_amount = $row->itotal_net_amount;

        // Randomly select a color from the array
        $random_color_index1 = array_rand($colors);
        $badge_col1 = $colors[$random_color_index1];
        $random_color_index2 = array_rand($colors);
        $badge_col2 = $colors[$random_color_index2];
        

        // Output the list item with the randomly selected color
        echo '<li class="list-group-item">' . $item_name . ' <span class="badge bg-' . $badge_col1 . '">' . $itotal_net_amount . ' Value</span> <span class="badge bg-' . $badge_col2 . '">' . $itotal_qty . ' Qty</span> </li>';
    }
}
?>

                               </ul>
                        </div>
                    </div>
                </div>
                <!-- #END# Badges -->
            </div>

<!-- list group ends -->
        </div>
       



       
    </section>
