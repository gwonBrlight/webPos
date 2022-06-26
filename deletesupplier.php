<?php
$con = mysqli_connect('capstone.cx8j7fkiwfmt.ap-northeast-2.rds.amazonaws.com','Capstone','&ZOQtmxhs12&','inventory','3306');
if (!$con)
  {
  die('Could not connect: ' . mysqli_error($con));
  }

mysqli_select_db($con,"inventory");
$a=$_POST['a'];
mysqli_query($con,"DELETE FROM supplier WHERE id='$a'");
header ("location: supplier.php");
mysqli_close($con);
?>