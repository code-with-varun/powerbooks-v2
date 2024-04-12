<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$base=base_url();
$sessdata = $this->session->userdata('pbk_sess');
$eid = $sessdata['pbk_eid'];
$name = $sessdata['pbk_name'];
$merchant_id= $sessdata['pbk_merchant_id'];
$user_type= $sessdata['pbk_user_type'];
$onboarding= $sessdata['pbk_onboarding'];
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
	}

}

?> 

<section>
<!-- Left Sidebar -->
<aside id="leftsidebar" class="sidebar">
	<!-- User Info -->
   
	<!-- #User Info -->
	<!-- Menu -->
	<div class="menu">
		<ul class="list">
		  
			<li class="active">
				<a href="<?=$base?>dashboard">
					<i class="material-icons">dashboard</i>
					<span>Dashboard</span>
				</a>
			</li>
<?php

if($onboarding=='YES')
{echo '<!-- <li>
				<a href="'.$base.'opportunity">
					<i class="material-icons">face</i>
					<span>Opportunity</span>
				</a>
			</li>
			 <li>
				<a href="estimate">
					<i class="material-icons">assignment</i>
					<span>Estimates</span>
				</a>
			</li> -->';

		if($user_type=='MANAGER' || $user_type=='STAFF')
		{			
		echo '<li>
			<a href="'.$base.'billing">
				<i class="material-icons">shopping_cart</i>
				<span>Billing</span>
			</a>
		</li>';
		
		}
		if($user_type=='MANAGER' || $user_type=='ADMIN')
		{			
		echo '<li>
						<a href="'.$base.'customers">
						<i class="material-icons">people</i>
							<span>Customers</span>
							</a>
					</li>';
		
		}		if($user_type=='MANAGER' || $user_type=='ADMIN')
		{
		echo'<!-- multy level -->
			<li>
				<a href="#" class="menu-toggle">
					<i class="material-icons">layers</i>
					<span>Inventory</span>
				</a>
				<ul class="ml-menu">
					<li>
						<a href="'.$base.'vendor-supplier">
							<span>Vendors/Suppliers</span>
						</a>
					</li>
					<li>
						<a href="'.$base.'item-master">
							<span>Item Master</span>
						</a>
					</li>
					<li>
					<a href="'.$base.'goods-inward">
						<span>Goods Inward</span>
					</a>
					</li>
					<li>
					<a href="'.$base.'promo-offers">
						<span>Promo/Offers</span>
					</a>
					</li>

					<li>
						<a href="'.$base.'staffing">
							<span>Staffing</span>
							</a>
					</li>
				   
				</ul>
			</li>
<!-- multy level end --> 	  
			
<!-- multy level -->
			<li>
				<a href="#" class="menu-toggle">
					<i class="material-icons">folder</i>
					<span>Reports</span>
				</a>
				<ul class="ml-menu">
					<li>
						<a href="'.$base.'billwise-sales">
							<span>Billwise Sales</span>
						</a>
					</li>
					<li>
						<a href="'.$base.'itemwise-sales">
							<span>Itemwise Sales</span>
						</a>
					</li>
					 <li>
						<a href="'.$base.'daywise-sales">
							<span>Daywise Sales</span>
						</a>
					</li>
					
					<li>
						<a href="#" class="menu-toggle">
							<span>Analyse Report</span>
						</a>
						<ul class="ml-menu">
							<li>
								<a href="'.$base.'tax-register">
									<span>Tax Register</span>
								</a>
							</li>
							<li>
					<a href="'.$base.'stock-balance">
						<span>Stock Balance</span>
					</a>
					</li>
					<li>
						<a href="'.$base.'goods-register">
							<span>Goods Register</span>
						</a>
					</li>
							 <li>
								<a href="#">
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
					<span>Sync & Backup</span>
				</a>
				<ul class="ml-menu">
					<li>
						<a href="'.$base.'day-open-close">
							<span>Day Open/Close</span>
						</a>
					</li>
					<!--
					<li>
						<a href="'.$base.'backups">
							<span>Backups</span>
						</a>
					</li>
					<li>
						<a href="'.$base.'manual-sync">
							<span>Manual Sync</span>
						</a>
					</li>
					-->
				   
				</ul>
			</li>
<!-- multy level end --> ';
		}
if($user_type=='MANAGER' || $user_type=='ADMIN')
{
echo '<li>
		<a href="'.$base.'settings">
			<i class="material-icons">settings</i>
			<span>Settings</span>
		</a>
	  </li>';

}

if($user_type=='MANAGER' || $user_type=='ADMIN')
{			
echo '<li>
				<a href="'.$base.'powerbooks-subscriptions">
				<i class="material-icons">subscriptions</i>
					<span>Subscriptions</span>
					</a>
			</li>';

}


}


if($user_type=='SUPER ADMIN')
{
echo '<li>
		<a href="'.$base.'options-master">
			<i class="material-icons">list</i>
			<span>Options Master</span>
		</a>
	  </li>';

}
?>	  
			<li>
				<a href="<?=$base?>logout">
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
			&copy; <?php echo date('Y');?> <a href="#">POWERBOOKS</a>.
		</div>
		<div class="version">
			<b>Version: </b> 2.0. <a href="https://helpdesk.thamizhanda.in/">(Helpdesk)</a>
		</div>
		
	</div>
	<!-- #Footer -->
</aside>
<!-- #END# Left Sidebar -->
<!-- Right Sidebar -->
<aside id="rightsidebar" class="right-sidebar">
	<ul class="nav nav-tabs tab-nav-right" role="tablist">
		
		<li role="presentation" class="active"><a href="#settings" data-toggle="tab">User Information</a></li>
		
	</ul>
   
	<div class="tab-content">
	   
		<div role="tabpanel" class="tab-pane fade in active in active" id="settings">
			<div class="demo-settings">
				<ul class="setting-list">
					<li>
						<span>EID: <?php echo$eid; ?></span>
						<br>
						<span>Merchant ID: <?php echo$merchant_id; ?></span>
					</li>
					<li>
						<span>User: <?php echo$name; ?></span>
						<br>
						<span>Type: <?php echo$user_type; ?></span>
					 </li>
				</ul>
				
				
			   
			</div>
			
		</div>
	</div>
</aside>
<!-- #END# Right Sidebar -->
</section>
