<?php
($_SESSION['SESS_MEMBER_ID']);
$mysql_host = 'capstone.cx8j7fkiwfmt.ap-northeast-2.rds.amazonaws.com';
$mysql_user = 'Capstone';
$mysql_password = '&ZOQtmxhs12&';
$mysql_db = 'inventory';


$con = mysqli_connect($mysql_host,$mysql_user,$mysql_password,$mysql_db,'3306');
if (!$con)
  {
  die('Could not connect: ' . mysqli_error($con));
  }

mysqli_select_db($con,'inventory');
$pname=$_POST['PNAME'];
$date=$_POST['date'];
$QTY=$_POST['QTY'];
$time=$_POST['time'];
$TOTAL=$_POST['TOTAL'];
$CODE=$_POST['CODE'];
$PPRICE=$_POST['PPRICE'];
$id=$_POST['id'];
$procode=$_POST['procode'];
$sales_on=$_POST['sales_on'];
/*$aba=$_POST['aba'];
$less=$_POST['less'];
if($aba=='.00'){
$dicount='0%';
}
if($aba=='.05'){
$dicount='5%';
}
if($aba=='.10'){
$dicount='10%';
}
if($aba=='.15'){
$dicount='15%';
}
if($aba=='.20'){
$dicount='20%';
}
if($aba=='.25'){
$dicount='25%';
}
if($aba=='.30'){
$dicount='30%';
}
if($aba=='.35'){
$dicount='35%';
}
if($aba=='.40'){
$dicount='40%';
}
if($aba=='.45'){
$dicount='45%';
}
if($aba=='.50'){
$dicount='50%';
}*/

$result = mysqli_query($con,"SELECT * FROM productlist where id='$id'");

while($row = mysqli_fetch_array($result))
  {
  $f=$row['psold'];
  $m=$row['pleft'];

  }
  $ab=$f+$QTY;
	$ac=$m-$QTY;

mysqli_query($con,"INSERT INTO sales (name, qty, total, code, date,time, PRICE, pcode, sales_at)
VALUES ('$pname', '$QTY', '$TOTAL', '$CODE', '$date', '$time', '$PPRICE', '$procode', '$sales_on')");

mysqli_query($con,"UPDATE productlist SET psold = '$ab', pleft = '$ac'
WHERE id = '$id'");
header("location: auto.php");
mysqli_close($con);
?>