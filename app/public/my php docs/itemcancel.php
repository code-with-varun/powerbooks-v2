<?php
require('global_dbconn.php');

			
				$sino=$_POST['sino'];
			
		
			
			$sqlwiz = "DELETE  FROM `temp_bill` WHERE sino='$sino' ";
					if (!mysqli_query($glcon,$sqlwiz))
					{
						die('Error: ' . mysqli_error($glcon));
					}
			
	
	
   				header('Location:billing.php');
	
?>		
	
