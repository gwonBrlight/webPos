<?php
$con = mysqli_connect('localhost','root','123456','inventory','3307');
if (!$con)
  {
  die('Could not connect: ' . mysqli_error($con));
  }

mysqli_select_db($con,"inventory");
$podate=$_POST['date'];
$time=$_POST['time'];
$txtCombo=$_POST['txtCombo'];
$srp=$_POST['srp'];
$qty=$_POST['price'];
$cname=$_POST['cname'];
$total=$_POST['total'];
$mode=$_POST['mode'];
$paymentsched=$_POST['paymentsched'];
$downpayment=$_POST['downpayment'];
$kwarta=$_POST['cash'];
$sukli=$_POST['change'];

$sql="INSERT INTO sales (podate, time, code, qty, price, total, mode, kwarta, sukli, dayspay, downpayment, customer)
VALUES
('$podate','$time','$txtCombo','$qty','$srp','$total','$mode','$kwarta','$sukli','$paymentsched','$downpayment','$cname')";

if (!mysqli_query($sql,$con))
  {
  die('Error: ' . mysqli_error(mysqli_query($sql,$con)));
  }
header("location: auto.php");

mysqli_close($con)
?>