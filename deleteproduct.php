<?php
$con = mysqli_connect('capstone.cx8j7fkiwfmt.ap-northeast-2.rds.amazonaws.com','Capstone','&ZOQtmxhs12&','inventory','3306');
if (!$con)
  {
  die('Could not connect: ' . mysqli_error($con));
  }

$a=$_POST["a"];
mysqli_query($con,"DELETE FROM productlist WHERE pcode='$a'");
header ("location: products.php");
mysqli_close($con);
?>