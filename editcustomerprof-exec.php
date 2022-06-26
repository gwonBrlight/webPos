<?php
$con = mysqli_connect('capstone.cx8j7fkiwfmt.ap-northeast-2.rds.amazonaws.com','Capstone','&ZOQtmxhs12&','inventory','3306');
if (!$con)
  {
  die('Could not connect: ' . mysqli_error($con));
  }

mysqli_select_db($con,"inventory");
$idx=$_POST['idx'];
$name=$_POST['name'];
$address=$_POST['address'];
$birthday=$_POST['birthday'];
$dayf=$_POST['dayf'];
$job=$_POST['job'];
$sighupday=$_POST['sighupday'];
$email=$_POST['email'];
$pno=$_POST['pno'];
$mno=$_POST['mno'];
$mid=$_POST['mid'];

$sql="INSERT INTO customer (name, job, birthday, address, tel, mobile, email, member_id, sign_up_day)VALUES ('$name', '$job', '$birthday', '$address', '$pno', '$mno', '$email', '$mid', '$sighupday')";

if (!$result1=mysqli_query($con,$sql)){
    die('Error: ' . mysqli_error($con));
}
header("location: editcustomerprof.php");
mysqli_close($con);

?> 