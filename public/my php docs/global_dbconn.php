<?php
//Give your mysql username password and database name
$glcon=mysqli_connect("localhost","root","","idlycorner");
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
?>