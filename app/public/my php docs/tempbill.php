<?php
require('global_dbconn.php');

			$billno=strtoupper($_POST['billno']);
			$rate=$_POST['rate'];
			$qty=$_POST['qty'];
				$icode=$_POST['icode'];
				if($icode=='NA')
				{}
			else{
		
			$memstat2 = mysqli_query($glcon,"SELECT * FROM `menu_items` WHERE item_code='$icode' ");
				while($row = mysqli_fetch_array($memstat2))
				{
						$iname=$row['item_name'];
				}
				$memstat3 = mysqli_query($glcon,"SELECT Max(sino)as snoid FROM `temp_bill` ");
				while($row = mysqli_fetch_array($memstat3))
				{
						$snoid=$row['snoid'];
						$newsino=$snoid+1;
				}
	
			$amount=$_POST['amount'];
	
	$sqlwiz = "INSERT INTO `temp_bill` (sino,bill_no,item_code,item_desc,qty,rate,amount) VALUES('$newsino','$billno','$icode','$iname','$qty','$rate','$amount')";
					if (!mysqli_query($glcon,$sqlwiz))
					{
						die('Error: ' . mysqli_error($glcon));
					}
			}
   				header('Location:billing.php');
	
?>		
	
