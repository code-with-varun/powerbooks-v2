<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$base=base_url()."public/";
$sessdata = $this->session->userdata('pbk_sess');
$user_type= $sessdata['pbk_user_type'];
$onboarding= $sessdata['pbk_onboarding'];
$data['merchant_id']= $sessdata['pbk_merchant_id'];

?>

<section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>DAY OPEN/CLOSE</h2>
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
						<h2>DAY OPEN/CLOSE</h2>
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
                        <?php 
    $config_master_fetch = $this->Users_model->config_master_fetch($data);
    foreach ($config_master_fetch as $row) {
        $auto_day_end = $row->auto_day_end;
        $pos_status = $row->pos_status;
        $current_pos_date = $row->current_pos_date;
    }

    if ($pos_status == "OPENED") {
        $change_status = "CLOSED";
        $pos_status = "OPENED";
        $btn_color = "pink";
    } else {
        $change_status = "OPENED";
        $pos_status = "CLOSED";
        $btn_color = "green";
    }
    
    echo '<center><h4> Billing ' . $pos_status . ' for date ( ' . date('d-M-Y - l', strtotime($current_pos_date)) . ' )<br><br>';
    
    if ($auto_day_end != 'YES') {    
        echo '<form id="posForm" action="update-pos" method="POST"><input type="hidden" name="change_status" value="'.$change_status.'">';
        echo '<button type="button" class="btn bg-'.$btn_color.' waves-effect" onclick="confirmPosStatusChange()">Click Here</button> to '.$change_status.' POS.</h4></center></form>';
    }
?>

<script>
    function confirmPosStatusChange() {
        if (confirm("Are you sure you want to change the POS status to <?php 
            echo $change_status.
            ' for date ( ' . date('d-M-Y - l', strtotime($current_pos_date)).' )';
            ?>?")) {
            document.getElementById("posForm").submit();
        }
    }
</script>

                          
                            
                        </div>
                    </div>
                </div>
                <!-- #END# Task Info -->
