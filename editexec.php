<?php

	$con = mysqli_connect('capstone.cx8j7fkiwfmt.ap-northeast-2.rds.amazonaws.com','Capstone','&ZOQtmxhs12&','inventory','3306');
if (!$con)
  {
  die('Could not connect: ' . mysqli_error($con));
  }

mysqli_select_db($con,"inventory");

$a=$_POST["a"];
$b=$_POST['b'];
$c=$_POST['c'];
$d=$_POST['d'];
$e=$_POST['e'];

mysqli_query($con,"UPDATE productlist SET pcode = '$a',pname = '$b', pdesc = '$c', pleft = '$d', pprice = '$e' WHERE pcode = '$a'");

  header("location: products.php");
		


mysqli_close($con)

	
?>