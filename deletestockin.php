<?php
				  if (isset($_GET['id']))
	{
$con = mysqli_connect('capstone.cx8j7fkiwfmt.ap-northeast-2.rds.amazonaws.com','Capstone','&ZOQtmxhs12&','inventory','3306');
  {
  die('Could not connect: ' . mysqli_error($con));
  }

mysqli_select_db($con,"inventory");
$messages_id = $_GET['id'];
$result = mysqli_query($con,"SELECT * FROM stockin where id='$messages_id'");
while($row = mysqli_fetch_array($result))
  {
  $code=$row['CODE'];
  $f=$row['qty'];
  }
$result1 = mysqli_query($con,"SELECT * FROM productlist where pcode='$code'");

while($row1 = mysqli_fetch_array($result1))
  {
  $pleft=$row1['pleft'];
  }
  
$dugang=$pleft-$f;

mysqli_query($con1,"UPDATE productlist SET pleft = '$dugang'
WHERE pcode = '$code'");

mysqli_query($con1,"DELETE FROM stockin WHERE id='$messages_id'");
header("location: stockin.php");
mysqli_close($con);
}
?>