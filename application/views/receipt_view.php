
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$base=base_url()."public/";

?>

<html>

<body>

<center>
<table border="0" width="700px" height="auto">
<tr>
<td colspan="2"> <img align="center" border="0" src="<?php echo $base;?>images/logo1.png" alt="Image" title="Image" style="outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;clear: both;display: inline-block !important;border: none;height: auto;float: none;width: 84%;max-width: 151.2px;" width="151.2" class="v-src-width v-src-max-width"/> <br><center><strong>Tax Invoice<strong> <br><br> </center> </td>
</tr>   
<tr>
<td>SELLER DETAILS<br><br>
SKYEENET BROADBAND<br>
#8, Sindhu Street, Mangalakshmi Nagar, <br> Shanmugapuram, Puducherry - 605009.<br>

GSTIN/UIN : 34AGGPP9994C1ZY<br>
Email : info@skyeenet.in <br>
Phone : +91 9629575055 <br><br>
</td>
<td align="right">
IRN : <?php echo$inv_ref_no;?><br><br>
Invoice Number : <?php echo$bill_no;?><br>
Invoice Date : <?php echo$receipt_date;?><br>
Order Number : <?php echo$receipt_no;?><br>
Order Date : <?php echo$receipt_date;?><br><br><br><br>

</td>
</tr>

<tr>
<td>
BUYER DETAILS<br><br>

Customer Name : <?php echo$customer_name;?><br>
Customer Contact : <?php echo$contact_no;?><br>
Customer Email : <br>
Customer Address : <br>
Customer GSTIN :  <br>


</td>
<td align="right"><br><br>
Customer Id : <?php echo$customer_id;?><br>
Service Start Date : <?php echo$plan_start_date;?><br>
Service End Date : <?php echo$plan_end_date;?><br>
Processed By : <?php echo$processed_by;?><br>

</td>
</tr>


</table>
<br>
<table  border="1" cellspacing="0" style=" border: 1px solid black;" width="700px" height="auto">
<tr>
<th>
Description of Goods<br>
</th>
<th>
HSN/SAC<br>
</th>
<th>
Quantity<br>
</th>
<th>
Rate<br>
</th>
<th>
Amount<br>
</th>
</tr>

<tr align="center">
<td>
<br>
Subscription Charges - <?php echo$product_code;?><br>
<small><?php echo$product_descr;?> </small><br><br>

</td>

<td>
998422<br>

</td>
<td>
1<br>

</td>

<td>
<?php echo$price;?><br>

</td>
<td >
<?php echo$price;?><br>

</td>
</tr>

<tr align="center">
<td>
<br>

</td>
<td>

</td>
<td>

</td>
<td>
CGST<br>
SGST<br>
</td>
<td>
<?php echo$cgst;?><br>
<?php echo$sgst;?>
</td>
</tr>


<tr align="center">
<td>
<br>

</td>
<td>

</td>
<td>

</td>
<th>
TOTAL<br>
</th>
<th>
<?php echo$amount;?>
</th>
</tr>

</table>
<br>
<strong style="float:left; ">Amount Chargeable (In Words): Rs. <?php echo$amount;?></strong><br>
<br>

<table  border="1" cellspacing="0" style=" border: 1px solid black;" width="700px" height="auto">
<tr align="center">
<td>
HSN/SAC
</td>
<td>
Taxable Value
</td>
<td colspan="2">
Central Tax
</td>
<td colspan="2">
State Tax
</td>
<td>
Total
</td>
</tr>

<tr align="center">
<td>

</td>
<td>

</td>
<td>
Rate
</td>
<td>
Amount
</td>
<td>
Rate
</td>
<td>
Amount
</td>
<td>
Tax
</td>

</tr>

</tr>
<tr align="center">
<td>
998422<br>
</td>
<td>
<?php echo$price;?>
</td>
<td>
9%
</td>
<td>
<?php echo$cgst;?>
</td>
<td>
9%
</td>
<td>
<?php echo$sgst;?>
</td>
<td>
<?php echo$tax;?>
</td>

</tr>


</table>

<br>
<strong style="float:left; ">Tax Amount (In Words): Rs. <?php echo$tax;?></strong><br>
<br>
<table border="0" width="700px" height="auto">

<tr>
<td colspan="2">

<strong>Terms and Conditions: </strong><br>
1. Cheques to be in favour of SKYEENET BROADBAND.<br>
2. In case of cheque bounce, Rs.100/- + GST penalty will be levied.<br>
3. 18%  interest will be leived on overdue payments.<br>
4. All disputes are subject to PUDUCHERRY jurisdiction.<br>
5. Unless otherwise stated, tax on the invoice is not payable under reverse charge.<br>
6. This invoice is system generated hence signature and stamp is not required.<br>

</td>
</tr>



</table>

<br>
<p style="font-size: 14px; float:left;">&copy; Skyeenet. All Rights Reserved</p>
<p style="font-size: 14px; float:right;">&copy; Lavish Dreamers</p>
</center>
</body>
</html>
