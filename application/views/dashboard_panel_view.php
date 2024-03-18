<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$base=base_url()."public/";


foreach ($pos_month_summary_fetch as $row) {
	
	$TOTBILLS = $row->TOTBILLS;
	$TOTQTY = $row->TOTQTY;
	$TOTVALUE = $row->TOTVALUE;
}

foreach ($pos_year_summary_fetch as $row) {
	
	$YTOTBILLS = $row->TOTBILLS;
	$YTOTQTY = $row->TOTQTY;
	$YTOTVALUE = $row->TOTVALUE;
}


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
                            <div class="number count-to" data-from="0" data-to="<?php echo $YTOTBILLS;?>" data-speed="1000" data-fresh-interval="20"></div>
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
                
             <!-- #END# Answered Tickets -->
             <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                    <div class="card">
                        <div class="body bg-light-green">
                            <div class="font-bold m-b--35">LAST BILL</div>
                            
<?php
                            
foreach ($pos_last_bill_fetch as $row) {
	
	$cust_name = $row->cust_name;
    $cust_mobile = $row->cust_mobile;
    $qty = $row->qty;
    $to_pay = $row->to_pay;
    $cash_pay = $row->cash_pay;
    $other_pay = $row->other_pay;
    $bill_no = $row->bill_no;
}
?>
                            <ul class="dashboard-stat-list">
                                <li>
                                    BILL NO QTY | (<?php echo $qty;?>)
                                    <span class="pull-right"><b><?php echo $bill_no;?></b></span>
                                </li>
                                <li>
                                    CUSTOMER 
                                    <span class="pull-right"><b><?php echo $cust_mobile.' | '.$cust_name;?></b></span>
                                </li>
                                <li>
                                    NET BILL AMOUNT
                                    <span class="pull-right"><b><?php echo $to_pay;?></b></span>
                                </li>
                                <li>
                                    PAYMENT
                                    <span class="pull-right"><b><?php echo 'Cash: '.$cash_pay.' | Online: '.$other_pay;?></b></span>
                                </li>
                                
                                
                            </ul>
                        </div>
                    </div>
                </div>
               
              <!-- Answered Tickets -->
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
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
                <!-- Answered Tickets -->
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                    <div class="card">
                        <div class="body bg-red">
                            <div class="font-bold m-b--35">Status - POS Month</div>
                            <ul class="dashboard-stat-list">
                                <?php echo'<li>
                                    TOTAL BILLS
                                    <span class="pull-right"><b>'.$TOTBILLS.'</b> <small>BILLS</small></span>
                                </li>
                                <li>
                                    TOTAL QTY
                                    <span class="pull-right"><b>'.$TOTQTY.'</b> <small>QTY</small></span>
                                </li>
                                <li>
                                    MTD VALUE
                                    <span class="pull-right"><b>₹'.number_format($TOTVALUE, 0, '.', ',').'</b> <small>Retail Price</small></span>
                                </li>
                                                                <li>
                                    YTD VALUE
                                    <span class="pull-right"><b>₹'.number_format($YTOTVALUE, 0, '.', ',').'</b> <small>Retail Price</small></span>
                                </li>';
								?>
                                
                               
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- #END# Answered Tickets -->
               

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

                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                    <div class="card">
                        <div class="body bg-pink">
                            <div class="font-bold m-b--35">Utility</div>
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

                
                <!-- Include Chart.js library -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
            
                <!-- #END# Browser Usage -->
            </div>
        </div>
       
        <div class="container-fluid">
            <div class="row clearfix">
                <!-- Line Chart -->
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>MONTHLY SALES</h2>
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
                            <canvas id="current_month_line_chart" height="150"></canvas>
                        </div>
                    </div>
                </div>
                <!-- #END# Line Chart -->
                <!-- Bar Chart -->
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>MONTHLY BILLS</h2>
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
                            <canvas id="current_month_bar_chart" height="150"></canvas>
                        </div>
                    </div>
                </div>
                <!-- #END# Bar Chart -->
            </div>

           
        </div>
    </section>


    <?php
// Initialize arrays to store labels and data
$labels = [];
$data = [];

// Loop through your database fetched data and populate the arrays
foreach ($pos_full_month_fetch as $row) {
    // Assuming $row->pos_bill_date contains the month name (e.g., "January")
    $labels[] = substr($row->pos_bill_date,8,7);
    // Assuming $row->net_value contains the corresponding net value
    $data[] = $row->net_value;
}
?>

<script>
    // Get the canvas element
    var ctx = document.getElementById('current_month_line_chart').getContext('2d');

    // Data fetched from PHP
    var data = {
        labels: <?php echo json_encode($labels); ?>,
        datasets: [{
            label: 'Net Value',
            borderColor: 'rgba(233, 30, 99, 0.75)',
            backgroundColor: 'rgba(233, 30, 99, 0.2)',
            pointBorderColor: 'rgba(233, 30, 99, 0)',
            pointBackgroundColor: 'rgba(233, 30, 99, 0.9)',
            fill: 'origin',
            tension: 0.4,
            // backgroundColor: 'rgb(255, 99, 132)',
            // borderColor: 'rgb(255, 99, 132)',
            data: <?php echo json_encode($data); ?>
          
           
        }]
    };

    // Chart configuration
    var config = {
        type: 'line',
        data: data,
        options: {
            responsive: true,
                legend: false
        }
    };

    // Create a new Chart instance
    var myChart = new Chart(ctx, config);
</script>


<?php
// Initialize arrays to store labels and data
$labels = [];
$data = [];

// Loop through your database fetched data and populate the arrays
foreach ($pos_full_month_fetch as $row) {
    // Assuming $row->pos_bill_date contains the month name (e.g., "January")
    $labels[] = substr($row->pos_bill_date, 8, 7);
    // Assuming $row->net_value contains the corresponding net value
    $data[] = $row->net_bills;
}
?>

<script>
    // Get the canvas element
    var ctx = document.getElementById('current_month_bar_chart').getContext('2d');

    // Data fetched from PHP
    var data = {
        labels: <?php echo json_encode($labels); ?>,
        datasets: [{
            label: 'Net Bills',
            borderColor: 'rgba(0, 0, 255, 0.75)',
            backgroundColor: 'rgba(0, 0, 255, 0.2)',
            borderWidth: 1,
            data: <?php echo json_encode($data); ?>
        }]
    };

    // Chart configuration
var config = {
    type: 'bar',
    data: data,
    options: {
        responsive: true,
        legend: {
            display: false
        },
        scales: {
            xAxes: [{
                display: true,
                scaleLabel: {
                    display: true,
                    labelString: 'Month'
                }
            }],
            yAxes: [{
                display: true,
                scaleLabel: {
                    display: true,
                    labelString: 'Net Bills'
                },
                ticks: {
                    beginAtZero: true,
                    suggestedMax: Math.max.apply(null, <?php echo json_encode($data); ?>) // Calculate suggested max from your data
                }
            }]
        }
    }
};

    // Create a new Chart instance
    var myChart = new Chart(ctx, config);
</script>
