<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$base=base_url()."public/";

$sessdata = $this->session->userdata('pbk_sess');
$data['merchant_id'] = $sessdata['pbk_merchant_id'];
$data['eid'] = $sessdata['pbk_eid'];

$specific_user_fetch_login = $this->Users_model->specific_user_fetch_login($data);
	foreach ($specific_user_fetch_login as $row)
	{
	$onboarding = $row->onboarding;
	}
if($onboarding=='YES')

{
	$config_master_fetch = $this->Users_model->config_master_fetch($data);
	foreach ($config_master_fetch as $row)
	{
	$brand_name = $row->brand_name;
	$company_name = $row->company_name;
	$current_pos_date = $row->current_pos_date;
	$pos_status = $row->pos_status;
	}

}

else{
	$brand_name = "Brand Name";
	$company_name = "Company Name";
	$current_pos_date = "";
	$pos_status="";
}

?>

			
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
                <a href="#" class="bars"></a>
                <a class="navbar-brand" href="#"> <?php echo $company_name." - ".$brand_name; ?></a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <!-- Call Search -->
                    <li><a href="#" class="js-search" > <?php echo 'Billing '.$pos_status.' for date ( '.date('d-M-Y - l',strtotime($current_pos_date)).' )';?></a></li>
                    <!-- #END# Call Search -->
                    <!-- Notifications -->
                   
                    <!-- #END# Tasks -->
                    <li class="pull-right"><a href="javascript:void(0);" class="js-right-sidebar" data-close="true"><i class="material-icons">more_vert</i></a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- #Top Bar -->
