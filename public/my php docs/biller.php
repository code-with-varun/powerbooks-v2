<?php
require('global_dbconn.php');

				$mobileno=$_POST['mobileno'];
				$custname=strtoupper($_POST['custname']);
				$staff=$_POST['staff'];
				$billamt=$_POST['billamt'];
				$billno=$_POST['billno'];
				$paymode=$_POST['paymode'];
				$cardno=$_POST['cardno'];
				$tcash=$_POST['tcash'];
				$bcash=$_POST['bcash'];
			
		$pfx=substr($billno,0,1);
		$sfy=substr($billno,1,2);
		$billsuf=substr($billno,4);
	
	
	$sqlwiz = "INSERT INTO `billwise_sales` (pfx,sfy,bill_suf,bill_no,qty,bill_amt,paymode,card_no,tcash,bcash,mobileno,custname,staff) VALUES('$pfx','$sfy','$billsuf','$billno','$qty','$billamt','$paymode','$cardno','$tcash','$bcash','$mobileno','$custname','$staff')";
					if (!mysqli_query($glcon,$sqlwiz))
					{
						die('Error: ' . mysqli_error($glcon));
					}
	
	
$sqlwiz2 = "INSERT INTO  `itemwise_sales` SELECT * FROM `temp_bill`";

					if (!mysqli_query($glcon,$sqlwiz2))
					{
						die('Error: ' . mysqli_error($glcon));
					}
$sqlwiz3 = "DELETE  FROM  `temp_bill`";
					if (!mysqli_query($glcon,$sqlwiz3))
					{
						die('Error: ' . mysqli_error($glcon));
					}

	
	
		header('Location:billing.php');
	
?>		
	
