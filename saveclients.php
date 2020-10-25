<?php

	$con = mysqli_connect('localhost','root','123456','inventory','3307');
if (!$con)
  {
  die('Could not connect: ' . mysqli_error($con));
  }

mysqli_select_db($con,"inventory");

$a=$_POST['a'];
$c=$_POST['c'];
$d=$_POST['d'];
$e=$_POST['e'];

	
	$sql="INSERT INTO customer(name, address, mobile, bday)
VALUES ('$a', '$c', '$e', '$d')";

if (!mysqli_query($sql,$con))
  {
  die('Error: ' . mysqli_error($sql,$con));
  }
  header("location: clients.php");
			exit();


mysqli_close($con)

	
?>