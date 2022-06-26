<div align="center">



<?php
$con = mysqli_connect('capstone.cx8j7fkiwfmt.ap-northeast-2.rds.amazonaws.com','Capstone','&ZOQtmxhs12&','inventory','3306');
if (!$con)
  {
  die('Could not connect: ' . mysqli_error($con));
  }

mysqli_select_db($con,"inventory");

$a=$_POST['dayfrom'];
$b=$_POST['dayto'];
$dayf = substr($a, 0, -5);
$dayt = substr($b, 0, -5);
 
$result = mysqli_query($con,"SELECT * FROM customer WHERE birthday BETWEEN '$dayf' AND '$dayt'");
echo 'list of birthday celebrant from <b>'.$a.'</b> to <b>'.$b.'</b><br><br>';
echo '<table width="400" border="1" cellpadding="0" cellspacing="0">
<tr>
<td>Name</td>
<td>Birthday</td>
<td>Contact Number</td>
</tr>';
while($row = mysqli_fetch_array($result))
{
  echo '<tr>';
    echo '<td>'.$row['name'] . ' ' .$row['mname']. ' ' .$row['lname'].'</td>';
    echo '<td>'.$row['bday'].'</td>';
    echo '<td>('.$row['tel'].')or('.$row['mobile'].')</td>';
  echo '</tr>';
  }
echo "</table>";

mysqli_close($con);
?>

</div>
