<?php
 $con = mysqli_connect('capstone.cx8j7fkiwfmt.ap-northeast-2.rds.amazonaws.com','Capstone','&ZOQtmxhs12&','inventory','3306');
if (!$con)
  {
  die('Could not connect: ' . mysqli_error($con));
  }

mysqli_select_db($con,"inventory");

$sql="SELECT * FROM supplier WHERE company_name = '".$q."'";

$result = mysqli_query(mysqli_select_db($con,"inventory"),$sql);

while($row = mysqli_fetch_array($result))
{
   echo $row['contact_name'];

}


mysqli_close($con);
?> 