<?php


echo $htmlContent = '<style>
.form-newsletter{padding:10px; background-color:red; width:776px; height:auto;}
.table-newsletter{padding:40px; text-align:center; background-color:white; width:100%; height:auto;}
</style>

<CENTER><br>

<form class="form-newsletter">
<table border="1" class="table-newsletter">

<th>header ld brand</th>

<tr>
<td>Hi, User,<br><br>Congratulations! Your Powerbook Account has been Created.<br> Please click the below  link to activate your account.<br>
</td>
</tr>

<tr>
<td style="background-image: url(https://lavishdreamers.com/ispark/ldpromo/templates/uni-imgs/footer-powerbook-mail.png);background-repeat: no-repeat;  background-size: 776px 435px;   width:100%; height:435px;  padding-right:20px;">

Hi, User,<br><br>

<h3 style="padding-right:50px; color:pink;">Congratulations! Your Powerbook Account has been Created.<br> Please click the below  link to activate your account.</h3><br>
</td>
<td>
 <div style="background-image: url(https://lavishdreamers.com/ispark/ldpromo/templates/uni-imgs/activate-button.png); background-color:; float:right; background-repeat: no-repeat;  background-size: 175px 75px;   width:140px; height:40px; padding-top:30px;  padding-right:130px;" >  <a style="color:white; text-decoration:none; " href="https://www.lavishdreamers.com/powerbooks/app/activate/'.$nmerchant_id.'/'.$otp.'"> Activate  </a></div>

</td>
</tr>
<tr>
<td>
You have received this email because you are registered at Lavish Dreamers.<br>

© '.$today=date("Y").' Lavish Dreamers .

Unsubscribe
</td>
</tr>
</table>
</form>


</CENTER>';

echo'<hr>';

?>