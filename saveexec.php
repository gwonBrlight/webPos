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
$f='0';	

	
	$sql="INSERT INTO productlist (pcode, pdesc, pleft, pprice, psold)
VALUES ('$a', '$c', '$d', '$e', '$f')";

if (!mysqli_query($sql,$con))
  {
  die('Error: ' . mysqli_error($sql,$con));
  }
  header("location: products.php");
			exit();


mysqli_close($con)

	
?>