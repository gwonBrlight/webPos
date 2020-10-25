<?php
 $con = mysqli_connect('localhost','root','123456','inventory','3307');
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