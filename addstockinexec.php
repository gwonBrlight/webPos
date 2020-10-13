<?php

$con = mysqli_connect("localhost","root","123456");
if (!$con)
  {
  die('Could not connect: ' . mysqli_error($con));
  }

mysqli_select_db($con,"inventory");
$pname=$_POST['PNAME'];
$date=$_POST['date'];
$QTY=$_POST['QTY'];
$time=$_POST['time'];
$TOTAL=$_POST['TOTAL'];
$CODE=$_POST['CODE'];
$PCODES=$_POST['PCODES'];
$PPRICE=$_POST['PPRICE'];
$id=$_POST['id'];
$datetime=$date.' '.$time;
$vatable=$TOTAL*.12;
$net=$TOTAL-$vatable;


$result = mysqli_query($result,"SELECT * FROM productlist where id='$id'");

while($row = mysqli_fetch_array($result))
  {
  $m=$row['pleft'];
  }
  $ab=$m+$QTY;

mysqli_query($result,"INSERT INTO stockin (name, CODE, qty, total, transactioncode, datepurchase, PRICE)
VALUES ('$pname', '$PCODES', '$QTY', '$TOTAL', '$CODE', '$datetime', '$PPRICE')");


mysqli_query($result,"UPDATE productlist SET pleft = '$ab'
WHERE id = '$id'");
header("location: stockin.php");
mysqli_close($con);
?>