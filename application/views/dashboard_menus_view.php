<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$base=base_url();
$sessdata = $this->session->userdata('pbk_sess');
$eid = $sessdata['pbk_eid'];
$name = $sessdata['pbk_name'];
$merchant_id= $sessdata['pbk_merchant_id'];
$user_type= $sessdata['pbk_user_type'];
$onboarding= $sessdata['pbk_onboarding'];

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
				<a href="dashboard">
					<i class="material-icons">dashboard</i>
					<span>Dashboard</span>
				</a>
			</li>
<?php

if($onboarding=='YES')
{echo '<!-- <li>
				<a href="opportunity">
					<i class="material-icons">face</i>
					<span>Opportunity</span>
				</a>
			</li>
			 <li>
				<a href="estimate">
					<i class="material-icons">assignment</i>
					<span>Estimates</span>
				</a>
			</li> -->
		
			<li>
				<a href="billing">
					<i class="material-icons">shopping_cart</i>
					<span>Billing</span>
				</a>
			</li>
			
			<!-- multy level -->
			<li>
				<a href="#" class="menu-toggle">
					<i class="material-icons">layers</i>
					<span>Inventory</span>
				</a>
				<ul class="ml-menu">
					<li>
						<a href="goods-inward">
							<span>Goods Inward</span>
						</a>
					</li>
					<li>
						<a href="stock-register">
							<span>Stock Register</span>
						</a>
					</li>
					<li>
						<a href="staff-catalogue">
							<span>Staff Catalogue</span>
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
						<a href="billwise-sales">
							<span>Billwise Sales</span>
						</a>
					</li>
					<li>
						<a href="itemwise-sales">
							<span>Itemwise Sales</span>
						</a>
					</li>
					 <li>
						<a href="daywise-sales">
							<span>Daywise Sales</span>
						</a>
					</li>
					<li>
						<a href="#" class="menu-toggle">
							<span>Analyse Report</span>
						</a>
						<ul class="ml-menu">
							<li>
								<a href="tax-register">
									<span>Tax Register</span>
								</a>
							</li>
							 <li>
								<a href="report-designer">
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
					<span>Housekeeping</span>
				</a>
				<ul class="ml-menu">
					<li>
						<a href="day-close">
							<span>Day Close</span>
						</a>
					</li>
					<li>
						<a href="day-open">
							<span>Day Open</span>
						</a>
					</li>
					<li>
						<a href="manual-sync">
							<span>Manual Sync</span>
						</a>
					</li>
				   
				</ul>
			</li>
<!-- multy level end --> ';
}
?>	  
			<li>
				<a href="logout">
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
			<b>Version: </b> 2.0.
		</div>
		
	</div>
	<!-- #Footer -->
</aside>
<!-- #END# Left Sidebar -->
<!-- Right Sidebar -->
<aside id="rightsidebar" class="right-sidebar">
	<ul class="nav nav-tabs tab-nav-right" role="tablist">
		
		<li role="presentation" class="active"><a href="#settings" data-toggle="tab">Settings</a></li>
		
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
