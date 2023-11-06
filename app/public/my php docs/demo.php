<script>
$(document).ready(function () {
    $("#vendors").change(function () {
        var val = $(this).val();
        
<?php
$curpath=$_SERVER['DOCUMENT_ROOT'];
$ldroot= substr($curpath,0,28);

require($ldroot.'/Plugins LAB/LIBRARY/IPTRACKER/global_dbconn.php');

	$memstat5 = mysqli_query($pbcon,"SELECT * FROM `multiple_price`WHERE merchant_id='765433' ");
				while($row = mysqli_fetch_array($memstat5))
				{
				    
					$mrp=$row['new_price'];
				    $sku=$row['SKU'];
					$effect_date=$row['effect_date'];	
								
            			//	echo '<option value="'.$mrp.'">Rs.'.$mrp.'/----'.$effect_date.'</option>';
            				
            				
                echo'   if (val == "'.$sku.'")  {  $("#size").php(" ';
                
                 $memstat6 = mysqli_query($pbcon,"SELECT * FROM `multiple_price` WHERE SKU='$sku' AND merchant_id='765433'");
				while($row = mysqli_fetch_array($memstat6))
				{
					$mrp=$row['new_price'];
					$effect_date=$row['effect_date'];	
					
                     echo' <option value="test">'.$mrp.'-----'.$effect_date.'</option>';
                
				}
               
				echo '"); } ';
				
				}
				
				
?>

else (val == "NA") {
            $("#size").php("<option value='test'>select one SKU</option>");
        } 
    });
});
</script> 

           
			
                