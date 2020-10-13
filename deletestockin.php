<?php
				  if (isset($_GET['id']))
	{
$con = mysqli_connect("localhost","root","123456");
if (!$con)
  {
  die('Could not connect: ' . mysqli_error($con));
  }

mysqli_select_db($con,"inventory");
$messages_id = $_GET['id'];
$result = mysqli_query($result,"SELECT * FROM stockin where id='$messages_id'");
while($row = mysqli_fetch_array($result))
  {
  $code=$row['CODE'];
  $f=$row['qty'];
  }
$result1 = mysqli_query($result,"SELECT * FROM productlist where pcode='$code'");

while($row1 = mysqli_fetch_array($result1))
  {
  $pleft=$row1['pleft'];
  }
  
$dugang=$pleft-$f;

mysqli_query($result1,"UPDATE productlist SET pleft = '$dugang'
WHERE pcode = '$code'");

mysqli_query($result1,"DELETE FROM stockin WHERE id='$messages_id'");
header("location: stockin.php");
mysqli_close($con);
}
?>