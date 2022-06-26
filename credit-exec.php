
<?php
$con = mysqli_connect('capstone.cx8j7fkiwfmt.ap-northeast-2.rds.amazonaws.com','Capstone','&ZOQtmxhs12&','inventory','3306');
if (!$con)
  {
  die('Could not connect: ' . mysqli_error($con));
  }

mysqli_select_db($con,"inventory");
$creditcode=$_POST['code'];
$mn=$_POST['c'];
 
$result = mysqli_query($con,"SELECT * FROM credit where p_code = '$creditcode'");

while($row1 = mysqli_fetch_array($result))
{
$cover=$row1['coverage'];
$nu=$row1['nu_payment'];
$cp=$row1['creditpayable'];
$paid=$row1['paid'];
$totalamount=$cp+$paid;
$creditpayable=$row1['creditpayable'];
}
$resulta = mysqli_query($cona,"SELECT * FROM customer where code = '$creditcode'");

while($rows = mysqli_fetch_array($resulta))
{
$cus=$rows['name'];
$cusl=$rows['lname'];
$cusm=$rows['mname'];

}

$ble=$mn+$paid;
$astig=$cp-$mn; 
$fop=date("m/d/Y");
mysqli_query($cona,"UPDATE credit SET creditpayable = '$astig', paid='$ble'
WHERE p_code = '$creditcode'");
mysqli_query($cona,"INSERT INTO creditdatails (amount, datepayment, creditcode, balance)
VALUES ('$mn', '$fop', '$creditcode', '$creditpayable')");

mysqli_close($con);
?>
<?php
$con = mysqli_connect('capstone.cx8j7fkiwfmt.ap-northeast-2.rds.amazonaws.com','Capstone','&ZOQtmxhs12&','inventory','3306');
if (!$con)
  {
  die('Could not connect: ' . mysqli_error($con));
  }

mysqli_select_db($con,"inventory");
$creditcode=$_POST['code'];
 
$result = mysqli_query($con,"SELECT * FROM credit where p_code = '$creditcode'");

$row1 = mysqli_fetch_array($result);

echo 'Name:'.$cus.' '.$cusm.' '.$cusl.'<br />';
echo 'Date Purchase:'.$row1['datepurchese'].'<br />';
echo 'Total Amount:'.$totalamount.'<br>';
echo 'Schedule of Payments:';
$coverage=$row1['coverage'];
$da1a=$row1['duedate'];
$date=date ($da1a, strtotime("+15 day", strtotime($da1a)));
$q1=($coverage*30);
$s1=86400;
$r1=$q1*$s1;
$timestamp1=time(); //current timestamp
$tm1=$timestamp1+$r1; // Will add 2 days to the $timestamp
$da2=date("m/d/Y", $timestamp1);
$da3=date("m/d/Y", $tm1);
$end_date = $da3;
while (strtotime($date) <= strtotime($end_date)) {
echo "$date".', ';
$date = date ("m/d/Y", strtotime("+15 day", strtotime($date)));
}




mysqli_close($con);
?>
<table width="460" border="1">
  <tr>
    <td><div align="center">Date</div></td>
    <td><div align="center">Payment</div></td>
    <td><div align="center">Balance</div></td>
  </tr>
  <?php
$con = mysqli_connect('capstone.cx8j7fkiwfmt.ap-northeast-2.rds.amazonaws.com','Capstone','&ZOQtmxhs12&','inventory','3306');
if (!$con)
  {
  die('Could not connect: ' . mysqli_error($con));
  }

mysqli_select_db($con,"inventory");
$creditcode=$_POST['code'];
 
$result = mysqli_query($con,"SELECT * FROM creditdatails where creditcode = '$creditcode'");

while($row1 = mysqli_fetch_array($result))
{
  echo '<tr>';
    echo '<td>'.$row1['datepayment'].'</td>';
    echo '<td>'.$row1['amount'].'</td>';
    echo '<td>'.$row1['balance'].'</td>';
  echo '</tr>';
 }




mysqli_close($con);
?>
</table>
