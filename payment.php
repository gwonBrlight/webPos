<?php
session_start();
$con = mysqli_connect("localhost","root","123456");
if (!$con)
  {
  die('Could not connect: ' . mysqli_error($con));
  }

mysqli_select_db($con,"inventory");
$pitsa=date("m/d/Y");
$amount=$_POST['amount'];
$code=$_POST['code'];
$name=$_POST['name'];

$result = mysqli_query($result,"SELECT * FROM paycode");
while($row = mysqli_fetch_array($result))
  {
        $fefe=$row['code']; 
  }
  $sasa=$fefe+1;

$fgh='P-000'.$sasa;	


mysqli_query($result,"UPDATE paycode SET code = '$sasa'");
mysqli_query($result,"INSERT INTO creditdatails(amount, datepayment, memberid, ornumber)VALUES('$amount', '$pitsa', '$code', '$fgh')");
header("location: individualledger.php?PoNumber=$name&cur_code=$code");
mysqli_close($con);
?>