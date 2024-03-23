<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$base=base_url()."public/";


foreach ($pos_month_summary_fetch as $row) {
	
	$MTOTBILLS = $row->TOTBILLS;
	$MTOTQTY = $row->TOTQTY;
	$MTOTVALUE = $row->TOTVALUE;
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

if ($specific_day_wise_sales) {
    foreach ($specific_day_wise_sales as $row) {
        $net_bills = $row->net_bills;
        $net_qty = $row->net_qty;
        $net_value = $row->net_value;
        $cash_pay = $row->cash_pay;
        $card_pay = $row->card_pay;
        $other_pay = $row->other_pay;
    }
} else {
    // No rows returned, set all values to 0
    $net_bills = 0;
    $net_qty = 0;
    $net_value = 0;
    $cash_pay = 0;
    $card_pay = 0;
    $other_pay = 0;
}
?>
                            <ul class="dashboard-stat-list">
                                <li>
                                QTY : (<?php echo $qty;?>) | BILL NO 
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
                            <div class="font-bold m-b--35">Current Day</div>
                            <ul class="dashboard-stat-list">
                                <li>
                                 NET BILLS | QTY 
                                    <span class="pull-right"><b><?php echo $net_bills.' Bills | '.$net_qty.' Qty'; ?></b></span>
                                </li>
                                <li>
                                    NET VALUE
                                    <span class="pull-right"><b><?php echo $net_value;?></b></span>
                                </li>
                                <li>
                                    NET CASH
                                    <span class="pull-right"><b><?php echo $cash_pay ;?></b></span>
                                </li>
                                
                                <li>
                                    OTHERS
                                    
                                    <span class="pull-right"><b><?php echo 'Card: '.$card_pay.' | Online: '.$other_pay;?></b></span>
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
                                MONTH BILLS
                                    <span class="pull-right"><b>'.$MTOTBILLS.'</b> <small>BILLS</small></span>
                                </li>
                                <li>
                                    MONTH QTY
                                    <span class="pull-right"><b>'.$MTOTQTY.'</b> <small>QTY</small></span>
                                </li>
                                <li>
                                    MTD VALUE
                                    <span class="pull-right"><b>₹'.number_format($MTOTVALUE, 0, '.', ',').'</b> <small>Retail Price</small></span>
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
                <!-- Answered Tickets -->
<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
    <div class="card">
        <div class="body bg-pink">
            <div class="font-bold m-b--35">Top Sellers</div>
            <table class="table">

                <tbody>
                    <tr>
                        <td>
                            <div class="dashboard-stat-list" style="padding-bottom: 12px;">
                                <?php
                                if ($top_10_products) {
                                    $left_products = array_slice($top_10_products, 0, 5); // Get the first 5 products for the left side
                                    foreach ($left_products as $row) {
                                        $TZ_barcode = $row->TZ_barcode;
                                        $item_name = $row->item_name;
                                        $total_qty = $row->total_qty;
                                        echo '<span class="barcode" data-toggle="tooltip" title="'.$item_name.'">'.$TZ_barcode.' ('.$total_qty.')</span><br>';
                                    }
                                }
                                ?>
                            </div>
                        </td>
                        <td>
                            <div class="dashboard-stat-list" style="padding-bottom: 12px;">
                                <?php
                                if ($top_10_products) {
                                    $right_products = array_slice($top_10_products, 5, 5); // Get the next 5 products for the right side
                                    foreach ($right_products as $row) {
                                        $TZ_barcode = $row->TZ_barcode;
                                        $item_name = $row->item_name;
                                        $total_qty = $row->total_qty;
                                        echo '<span class="barcode" data-toggle="tooltip" title="'.$item_name.'">'.$TZ_barcode.' ('.$total_qty.')</span><br>';
                                    }
                                }
                                ?>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>


<!-- Include jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Include Bootstrap library for tooltips -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
$(document).ready(function(){
    // Initialize tooltips
    $('[data-toggle="tooltip"]').tooltip();

    // Handle click event on barcode
    $('.barcode').click(function(){
        // Toggle tooltip display
        $(this).tooltip('toggle');
    });
});
</script>

                
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

        <div class="container-fluid">
            <div class="row clearfix">
                <!-- Bar Chart -->
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>MONTH ON MONTH</h2>
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
                            <canvas id="mom_line_chart" height="50"></canvas>
                        </div>
                    </div>
                </div>
                <!-- #END# Bar Chart -->
            </div>

           
        </div>

        <div class="container-fluid">
            <div class="row clearfix">
                <!-- Line Chart -->
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>TOP SELLERS</h2>
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
                            <canvas id="topseller_pie_chart" height="150"></canvas>
                        </div>
                    </div>
                </div>
                <!-- #END# Line Chart -->
                <!-- Bar Chart -->
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>TODAYS ITEMS</h2>
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
                            <canvas id="current_day_items_donut_chart" height="150"></canvas>
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

<?php
// Initialize arrays to store labels and data
$labels = [];
$data = [];

// Loop through your database fetched data and populate the arrays
foreach ($top_10_products as $row) {
    // Assuming $row->pos_bill_date contains the month name (e.g., "January")
    $labels[] = $row->item_name;
    // Assuming $row->net_value contains the corresponding net value
    $data[] = $row->total_qty;
}
?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>

<canvas id="topseller_pie_chart" width="150" height="150"></canvas>

<script>
    // Get the canvas element
    var ctx = document.getElementById('topseller_pie_chart').getContext('2d');

    // Data fetched from PHP
    var data = {
        labels: <?php echo json_encode($labels); ?>,
        datasets: [{
            label: 'Net Qty',
            backgroundColor: [
                '#ff6384',
                '#36a2eb',
                '#ffce56',
                '#4bc0c0',
                '#9966ff',
                '#ff9f40',
                '#ff6384',
                '#36a2eb',
                '#ffce56',
                '#4bc0c0'
            ],
            borderColor: '#fff',
            borderWidth: 1,
            data: <?php echo json_encode($data); ?>
        }]
    };

    // Chart configuration
    var config = {
        type: 'pie',
        data: data,
        options: {
            responsive: true,
            animation: {
                animateScale: true,
                animateRotate: true
            },
            plugins: {
                title: {
                    display: true,
                    text: 'Top Selling Products'
                },
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            var label = context.label || '';
                            if (label) {
                                label += ': ';
                            }
                            if (context.parsed) {
                                label += context.parsed.toLocaleString();
                            }
                            return label;
                        }
                    }
                },
                legend: {
                    display: false,
                    position: 'bottom',
                    labels: {
                        font: {
                            size: 12
                        }
                    }
                }

            }
        }
    };

    // Create a new Chart instance
    var myChart = new Chart(ctx, config);
</script>

<?php
// Initialize arrays to store labels and data
$labels = [];
$dataNetValue = [];
$dataNetQty = [];

// Loop through your database fetched data and populate the arrays
foreach ($month_on_month_sales as $row) {
    // Assuming $row->year and $row->month contain the year and month data
    $labels[] = $row->year . '-' . str_pad($row->month, 2, '0', STR_PAD_LEFT); // Format year and month (e.g., "2024-03")
    // Assuming $row->total_net_value contains the corresponding net value
    $dataNetValue[] = $row->total_net_value;
    // Assuming $row->total_net_qty contains the corresponding net quantity
    $dataNetQty[] = $row->total_net_qty;
}
?>

<script>
    // Get the canvas element
    var ctx = document.getElementById('mom_line_chart').getContext('2d');

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
            data: <?php echo json_encode($dataNetValue); ?>
        },
        {
            label: 'Net Qty',
            borderColor: 'rgba(54, 162, 235, 0.75)',
            backgroundColor: 'rgba(54, 162, 235, 0.2)',
            pointBorderColor: 'rgba(54, 162, 235, 0)',
            pointBackgroundColor: 'rgba(54, 162, 235, 0.9)',
            fill: 'origin',
            tension: 0.4,
            data: <?php echo json_encode($dataNetQty); ?>
        }]
    };

    // Chart configuration
    var config = {
        type: 'line',
        data: data,
        options: {
            responsive: true,
            legend: true,
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
                        labelString: 'Net Value / Net Qty'
                    }
                }]
            }
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
foreach ($current_day_item_wise_sales as $row) {
    // Assuming $row->pos_bill_date contains the month name (e.g., "January")
    $labels[] = $row->item_name;
    // Assuming $row->net_value contains the corresponding net value
    $data[] = $row->total_qty;
}
?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>

<canvas id="topseller_pie_chart" width="150" height="150"></canvas>

<script>
    // Get the canvas element
    var ctx = document.getElementById('current_day_items_donut_chart').getContext('2d');

    // Data fetched from PHP
    var data = {
        labels: <?php echo json_encode($labels); ?>,
        datasets: [{
            label: 'Net Qty',
            backgroundColor: [
                '#ff6384',
                '#36a2eb',
                '#ffce56',
                '#4bc0c0',
                '#9966ff',
                '#ff9f40',
                '#ff6384',
                '#36a2eb',
                '#ffce56',
                '#4bc0c0'
            ],
            borderColor: '#fff',
            borderWidth: 5,
            data: <?php echo json_encode($data); ?>
        }]
    };


    // Chart configuration
var config = {
    type: 'doughnut', // Change chart type to doughnut
    data: data,
    options: {
        responsive: true,
        animation: {
            animateScale: true,
            animateRotate: true
        },
        plugins: {
            title: {
                display: true,
                text: 'Todays Items'
            },
            tooltip: {
                callbacks: {
                    label: function(context) {
                        var label = context.label || '';
                        if (label) {
                            label += ': ';
                        }
                        if (context.parsed) {
                            label += context.parsed.toLocaleString();
                        }
                        return label;
                    }
                }
            },
            legend: {
                display: false,
                position: 'bottom',
                labels: {
                    font: {
                        size: 12
                    }
                }
            }
        },
        cutout: 120 // Adjust the cutout size to make it a donut chart
    }
};


    // Create a new Chart instance
    var myChart = new Chart(ctx, config);
</script>