<?php
require('global_dbconn.php');
	
		$memstat5 = mysqli_query($glcon,"SELECT * FROM `pos_cal` WHERE flag='Y' ");
				while($row = mysqli_fetch_array($memstat5))
				{
							$posdate=$row['pos_date'];
							$status=$row['status'];
					
								$t=time();
								$v=strtotime("$posdate",$t);
								
									
				}
			
			
					$memstat5 = mysqli_query($glcon,"SELECT * FROM `bill_template` WHERE status='OPENED' ");
				while($row = mysqli_fetch_array($memstat5))
				{
									$sfy=$row['sfy'];
									$nsfy=$sfy+1;
									$msfy=$nsfy+1;
									$nfy='20'.$nsfy.'-20'.$msfy;
								
								$sqlwiz = "INSERT INTO `bill_template` (`status` ,`fy` ,`sfy` ,`store_address` ,`gst_no` ,`phone` ,`cgst_pcnt` ,`sgst_pcnt` ,`sales_pfx` ,`return_pfx`) VALUES ('NA',  '$nfy',  '$nsfy',  'FF01, First Floor, Mall of Travancore, Thiruvananthapuram 24.',  '32COPPM5326Z1',  '+91-7094506390',  '2.5',  '2.5',  'S',  'R')";
								if (!mysqli_query($glcon,$sqlwiz))
								{
									die('Error: ' . mysqli_error($glcon));
								}
								$a=$msfy%4;
						if($a==0)
						{	$b=366;}
						else{$b=365;}
					
						$i=1;			
					
						while($i<=$b)
							
							{
										$caldate=strtotime("+".$i."days",$v);
										$dos=date("d-M-Y ",$caldate);
					
								$sqlwiz = "INSERT INTO pos_cal (pos_date) VALUES('$dos')";
								if (!mysqli_query($glcon,$sqlwiz))
								{
									die('Error: ' . mysqli_error($glcon));
								}
								
							$i=$i+1;
							
							}

				}
		
	
	
   			//	header('Location:billing.php');
	
?>		
	
