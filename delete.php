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
$result = mysqli_query($result,"SELECT * FROM sales where id='$messages_id'");
while($row = mysqli_fetch_array($result))
  {
  $code=$row['name'];
  $f=$row['qty'];
  $falagpat=$row['pcode'];
  }
$result1 = mysqli_query($result1,"SELECT * FROM productlist where pcode='$falagpat'");

while($row1 = mysqli_fetch_array($result1))
  {
  $psold=$row1['psold'];
  $pleft=$row1['pleft'];
  }
  
$buwin=$psold-$f;
$dugang=$pleft+$f;

mysqli_query($result1,"UPDATE productlist SET psold = '$buwin', pleft = '$dugang'
WHERE pcode = '$falagpat'");

mysqli_query($result1,"DELETE FROM sales WHERE id='$messages_id'");
header("location: auto.php");
mysqli_close($con);
}
?>