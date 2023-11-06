<?php
require('global_dbconn.php');
	
		$memstat5 = mysqli_query($glcon,"SELECT * FROM `pos_cal` WHERE flag='Y' ");
				while($row = mysqli_fetch_array($memstat5))
				{
							echo $posdate=$row['pos_date'];
							$tday=substr($posdate,0,6);
							$tyear=substr($posdate,9,2);
						if($tday=='31-Mar')
						{
							echo 'Year end process';
							
						}	
						else
						{
								$t=time();
								$v=strtotime("$posdate",$t);
							$tdate=strtotime("+1 days",$v);
							echo$ndate=date("d-M-Y ",$tdate);
					
							$sqlwiz = "UPDATE pos_cal SET status='CLOSED', flag=' ' WHERE pos_date='$posdate' ";
								if (!mysqli_query($glcon,$sqlwiz))
								{
									die('Error: ' . mysqli_error($glcon));
								}
								
								$sqlwiz = "UPDATE pos_cal SET flag='Y' WHERE pos_date='$ndate' ";
								if (!mysqli_query($glcon,$sqlwiz))
								{
									die('Error: ' . mysqli_error($glcon));
								}
						}
						
						
								
								
									
				}
			?>
