<?php
session_start();
$con = mysqli_connect("localhost","root","123456","inventory",'3307');
if (!$con)
  {
  die('Could not connect: ' . mysqli_error($con));
  }

mysqli_select_db($con,"inventory");
$pitsa=date("m/d/Y");
$amount=$_POST['amount'];
$code=$_POST['code'];
$name=$_POST['name'];

$result = mysqli_query($con,"SELECT * FROM paycode");
while($row = mysqli_fetch_array($result))
  {
        $fefe=$row['code']; 
  }
  $sasa=$fefe+1;

$fgh='P-000'.$sasa;	


mysqli_query($con,"UPDATE paycode SET code = '$sasa'");
mysqli_query($con,"INSERT INTO creditdatails(amount, datepayment, memberid, ornumber)VALUES('$amount', '$pitsa', '$code', '$fgh')");
header("location: individualledger.php?PoNumber=$name&cur_code=$code");
mysqli_close($con);
?>