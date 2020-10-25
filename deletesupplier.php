<?php
$con = mysqli_connect('localhost','root','123456','inventory','3307');
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