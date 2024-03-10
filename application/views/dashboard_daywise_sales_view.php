<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$base=base_url()."public/";
$sessdata = $this->session->userdata('pbk_sess');
$user_type= $sessdata['pbk_user_type'];
$onboarding= $sessdata['pbk_onboarding'];
$data['merchant_id']=$merchant_id= $sessdata['pbk_merchant_id'];
$config_master_fetch = $this->Users_model->config_master_fetch($data);
foreach ($config_master_fetch as $row)
{	
  $current_pos_date= $row->current_pos_date;
}

?>

<section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>DAY WISE SALES REPORT</h2>
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
                            <h2>DAY WISE SALES REPORT</h2>
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
                            
                           
                            <form action=""  id="myForm" method="post">
                            <div class="table-responsive">
                                <table  class="table table-hover dashboard-task-infos">
                                    <th> <input type="date" class="form-control" value="<?php echo $current_pos_date; ?>" id="sdate" name="sdate"  required></th>
                                    <th><input type="date" class="form-control" value="<?php echo date("Y-m-d"); ?>" id="edate"name="edate" required></th>
                                    <th><input type="hidden"class="form-control" id="rmerchantid" value="<?php echo $merchant_id;?>">
                                         <button type="button" id="submitFormData" onclick="SubmitFormData();" class="btn bg-green waves-effect" data-type="prompt" >
                                        <i class="material-icons">check</i> <span>View</span>
                                        </button></th>
                                </table>
                               
                                
                                 
                           
                            
                               
                                <div id="results">
                                   <!-- All data will display here  -->
                                </div>
                                                               
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- #END# Task Info -->
  <script>

    function SubmitFormData() {
    var sdate = $("#sdate").val();
    var edate = $("#edate").val();
    var rmerchantid = $("#rmerchantid").val();
    
   
    $.post("<?php echo base_url()."DWS-reporter";?>", { sdate: sdate, edate: edate, rmerchantid: rmerchantid  },
    function(data) {
	 $('#results').html(data);
	 $('#myForm')[0].reset();
    });
}
</script>             
                <!-- #END# Browser Usage -->
            </div>
        </div>
    </section>
