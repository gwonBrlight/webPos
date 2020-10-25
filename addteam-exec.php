<?php
$con = mysqli_connect('localhost','root','123456','inventory','3307');
if (!$con)
  {
  die('Could not connect: ' . mysqli_error($con));
  }

mysqli_select_db($con,"inventory");

$podate=$_POST['textfield'];


$result = mysqli_query($con,"SELECT * FROM cuscode");
while($row = mysqli_fetch_array($result))
  {
        $fefe=$row['code']; 
  }
  $sasa=$fefe+1;

$fgh='C000'.$sasa;	
mysqli_query($con,"UPDATE cuscode SET code = '$sasa'");

$sql="INSERT INTO customer (name, member_id)
VALUES
('$podate', '$fgh')";

if (!mysqli_query($sql,$con))
  {
  die('Error: ' . mysqli_error($sql));
  }
header("location: auto.php");

mysqli_close($con)
?>