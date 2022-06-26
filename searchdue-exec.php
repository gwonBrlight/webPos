<div align="center">
<br /><strong>List of Customer who should pay today</strong><br /><br />
<?php
	$con = mysqli_connect('capstone.cx8j7fkiwfmt.ap-northeast-2.rds.amazonaws.com','Capstone','&ZOQtmxhs12&','inventory','3306');
  if (!$con)
    {
      die('Could not connect: ' . mysqli_error($con));
    }
  
  mysqli_select_db($con,"inventory");
$due=$_POST['due'];
$result = mysqli_query($con,"SELECT * FROM credit where duedate like '%$due%'");
echo '<table width="800" border="1" cellpadding="0" cellspacing="0">
  <tr bgcolor="#66FF00">
    <td width="302"><strong><div align="center">Product Code</div></strong></td>
    <td width="93"><strong><div align="center">Total Paid</div></strong></td>
    <td width="93"><strong><div align="center">Payable</div></strong></td>
    <td width="110"><strong><div align="center">Due Payable</div></strong></td>
    <td width="81"><strong><div align="center">Coverage</div></strong></td>
    <td width="107"><strong><div align="center">Number of Payment</div></strong></td>
  </tr>';
while($row = mysqli_fetch_array($result))
  {
   echo  '<tr>';
     echo  '<td><div align="center">';
	 $ble=$row['p_code'];
	 $results = mysqli_query($cons,"SELECT * FROM customer where code='$ble'");
	 while($rows = mysqli_fetch_array($results))
  		{
		echo $rows['name'].' '.$rows['mname'].' '.$rows['lname'];
		}
	 
	 
	 
	 echo '</div></td>';
     echo  '<td><div align="center">'.$row['paid'].'</div></td>';
     echo  '<td><div align="center">'.$row['creditpayable'].'</div></td>';
     echo  '<td><div align="center">'.$row['duepayable'].'</div></td>';
     echo  '<td><div align="center">'.$row['coverage'].'</div></td>';
     echo  '<td><div align="center">'.$row['nu_payment'].'</div></td>';
   echo  '</tr>';
 
  }
echo '</table>';
mysqli_close($con);
?> 
</div>
