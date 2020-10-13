<?php

	$con = mysqli_connect("localhost","root","123456");
if (!$con)
  {
  die('Could not connect: ' . mysqli_error($con));
  }

mysqli_select_db($con,"inventory");

$a=$_POST['a'];
$c=$_POST['c'];
$d=$_POST['d'];
$e=$_POST['e'];
$m=$_POST['m'];

mysqli_query(mysqli_select_db($con,"inventory"),"UPDATE productlist SET pcode = '$a', pdesc = '$c', pleft = '$d', pprice = '$e'
WHERE id = '$m'");

  header("location: products.php");
		


mysqli_close($con)

	
?>