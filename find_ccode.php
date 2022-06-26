<?php 

$con = mysqli_connect('capstone.cx8j7fkiwfmt.ap-northeast-2.rds.amazonaws.com','Capstone','&ZOQtmxhs12&','inventory','3306');
if (!$con)
  {
  die('Could not connect: ' . mysqli_error($con));
  }

mysqli_select_db($con,"inventory");


$country=$_REQUEST['country'];

$result3 = mysqli_query($con3,"SELECT * FROM supplier where company_name='$country'");
while($row3 = mysqli_fetch_array($result3))
{
echo $row3['contact_name'];	
}

$result4 = mysqli_query($con4,"SELECT * FROM customer where name='$country'");
while($row4 = mysqli_fetch_array($result4))
{
echo $row4['member_id'];	
}

?>
