<?php

	$con = mysqli_connect('localhost','root','123456','inventory','3307');
if (!$con)
  {
  die('Could not connect: ' . mysqli_error($con));
  }

mysqli_select_db($con,"inventory");

$a=$_POST['a'];
$b=$_POST['b'];
$c=$_POST['c'];
$d=$_POST['d'];
$e=$_POST['e'];
$f='0';	

$sql="INSERT INTO productlist (pcode, pname, pdesc, pleft, pprice, psold)
VALUES ($a, '$b', '$c', $d, $e, $f)";

if (!mysqli_query($con,$sql)){
    die('Error: ' . mysqli_error($con));
  }
header("location: products.php");
exit();


mysqli_close($con)

	
?>