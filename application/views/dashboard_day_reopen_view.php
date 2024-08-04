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
                <h2>DAY REOPEN</h2>
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
						<h2>DAY REOPEN</h2>
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

echo '<center>';


    // Add date input form
    echo '<br><br>
    <form id="dateForm" action="reopen-pos" method="POST" style="max-width: 600px; margin: 0 auto; padding: 20px; background-color: #f9f9f9; border-radius: 10px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">
    <div class="form-group" style="display: flex; flex-wrap: wrap; justify-content: space-between; align-items: center;">
        <label for="reopen_date" style="font-weight: bold; color: #333; flex: 1; margin-right: 10px; min-width: 150px;">Select Date to Reopen:</label>
        <input type="date" class="form-control" id="reopen_date" max="'.date("Y-m-d").'" name="reopen_date" required style="flex: 2; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
    </div>
    <div class="form-group" style="text-align: center; margin-top: 20px;">
        <button type="button" class="btn bg-green waves-effect" onclick="submitReopenForm()" style="background-color: #28a745; color: #fff; padding: 10px 20px; border: none; border-radius: 5px; font-size: 16px; cursor: pointer;">Reopen POS</button>
    </div>
</form>';


echo '</h4></center>';
?>

<script>

function submitReopenForm() {
    var reopenDate = document.getElementById('reopen_date').value;
    if (reopenDate) {
        var confirmationMessage = "Are you sure you want to reopen the POS for date " + reopenDate + "?";
        if (confirm(confirmationMessage)) {
            document.getElementById("dateForm").submit();
        }
    } else {
        alert('Please select a date to reopen the POS.');
    }
}
</script>


                          
                            
                        </div>
                    </div>
                </div>
                <!-- #END# Task Info -->
