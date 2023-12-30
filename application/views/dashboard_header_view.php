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

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>POWERBOOKS - <?php echo $brand_name.' | '.ucwords(str_replace("-"," ",uri_string())); ?> </title>
    <!-- Favicon-->
    <link rel="icon" href="<?php echo $base;?>favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="<?php echo $base;?>plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="<?php echo $base;?>plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="<?php echo $base;?>plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Morris Chart Css-->
    <link href="<?php echo $base;?>plugins/morrisjs/morris.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="<?php echo $base;?>css/style.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="<?php echo $base;?>css/themes/all-themes.css" rel="stylesheet" />

    <!-- JQuery DataTable Css -->
    <link href="<?php echo $base;?>plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">
	
</head>
