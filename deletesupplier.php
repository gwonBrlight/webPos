<?php
$con = mysqli_connect("localhost","root","123456");
if (!$con)
  {
  die('Could not connect: ' . mysqli_error($con));
  }

mysqli_select_db($con,"inventory");
$a=$_POST['a'];
mysqli_query($result,"DELETE FROM supplier WHERE id='$a'");
header ("location: supplier.php");
mysqli_close($con);
?>