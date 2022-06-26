<?php

	$con = mysqli_connect('capstone.cx8j7fkiwfmt.ap-northeast-2.rds.amazonaws.com','Capstone','&ZOQtmxhs12&','inventory','3306');
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

	
	$sql="INSERT INTO supplier(company_name, contact_name, address, contactno, bday)
VALUES ('$a', '$b', '$c', '$d', '$e')";

if (!mysqli_query($sql,$con))
  {
  die('Error: ' . mysqli_error($sql,$con));
  }
  header("location: supplier.php");
			exit();


mysqli_close($con)

	
?>