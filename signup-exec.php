<?php
$con = mysqli_connect('capstone.cx8j7fkiwfmt.ap-northeast-2.rds.amazonaws.com','Capstone','&ZOQtmxhs12&','inventory','3306');
if (!$con)
  {
  die('Could not connect: ' . mysqli_error($con));
  }

mysqli_select_db($con,"inventory");
$id=$_POST['id'];
$pw=$_POST['pw'];
$storename=$_POST['storename'];
$address=$_POST['address'];
$sighupday=$_POST['sighupday'];
$tel=$_POST['tel'];
$category=$_POST['category'];
$email=$_POST['email'];


$sql="INSERT INTO user (username,password,brandname,address, tel, category,email)VALUES ('$id', '$pw', '$storename', '$address', '$tel', '$category', '$email')";

if (!$result1=mysqli_query($con,$sql)){
    die('Error: ' . mysqli_error($con));
}
header("location: signup.php");
mysqli_close($con);

?> 