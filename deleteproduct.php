<?php
$con = mysqli_connect('localhost','root','123456','inventory','3307');
if (!$con)
  {
  die('Could not connect: ' . mysqli_error($con));
  }

$a=$_POST["a"];
mysqli_query($con,"DELETE FROM productlist WHERE pcode='$a'");
header ("location: products.php");
mysqli_close($con);
?>