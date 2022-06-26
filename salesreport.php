<div align="center">Sales Report From:<strong> <?php echo $_POST['dayfrom']; ?></strong>&nbsp;&nbsp;To:<strong> <?php echo $_POST['dayto']; ?>
<br />
    </strong></div>
<table width="900" align="center" cellpadding="0" cellspacing="0" style="font-size:12px; border-color:#000000; border-style:solid; border-width:1px;">
  <tr>
    <td width="85" style="border-color:#000000; border-style:solid; border-width:1px;"><div align="center"><strong>Date</strong></div></td>
    <td width="174" style="border-color:#000000; border-style:solid; border-width:1px;"><div align="center"><strong>Transaction No. </strong></div></td>
    <td width="294" style="border-color:#000000; border-style:solid; border-width:1px;"><div align="center"><strong>Customer Name </strong></div></td>
    <td width="77" style="border-color:#000000; border-style:solid; border-width:1px;"><div align="center"><strong>ID</strong></div></td>
	<td width="129" style="border-color:#000000; border-style:solid; border-width:1px;"><div align="center"><strong>Mode of Payment </strong></div></td>
    <td width="127" style="border-color:#000000; border-style:solid; border-width:1px;"><div align="center"><strong>Total</strong></div></td>
  </tr>
  <?php
$con = mysqli_connect('capstone.cx8j7fkiwfmt.ap-northeast-2.rds.amazonaws.com','Capstone','&ZOQtmxhs12&','inventory','3306');
if (!$con)
  {
  die('Could not connect: ' . mysqli_error($con));
  }

mysqli_select_db($con,"inventory");
function formatMoney($number, $fractional=false) {
    if ($fractional) {
        $number = sprintf('%.2f', $number);
    }
    while (true) {
        $replaced = preg_replace('/(-?\d+)(\d\d\d)/', '$1,$2', $number);
        if ($replaced != $number) {
            $number = $replaced;
        } else {
            break;
        }
    }
    return $number;
}		
$a=$_POST['dayfrom'];
$b=$_POST['dayto'];
 
$result1 = mysqli_query($con1,"SELECT * FROM salessumarry WHERE date BETWEEN '$a' AND '$b'");

while($row = mysqli_fetch_array($result1))
{
  echo '<tr>';
    echo '<td style="border-color:#000000; border-style:solid; border-width:1px;"><div align="center">'.$row['date'].'</div></td>';
    echo '<td style="border-color:#000000; border-style:solid; border-width:1px;"><div align="center">'.$row['transactioncode'].'</div></td>';
 $fgh=$row['transactioncode'];   
$result4 = mysqli_query($con4,"SELECT * FROM customer WHERE code='$fgh'");

$row4 = mysqli_fetch_array($result4);	
	
	echo '<td style="border-color:#000000; border-style:solid; border-width:1px;"><div align="center">';
	echo $row4['name'].' '.$row4['lname'];
	echo '</div></td>';
	
    echo '<td style="border-color:#000000; border-style:solid; border-width:1px;"><div align="center">';
	echo $row4['member_id'];
	echo '</div></td>';

	echo '<td style="border-color:#000000; border-style:solid; border-width:1px;"><div align="center">'.$row['mode'].'</div></td>';
    echo '<td style="border-color:#000000; border-style:solid; border-width:1px;"><div align="center">';
	$eee=$row['total'];
	echo formatMoney($eee, true);
	
	echo '</div></td>';
    
  echo '</tr>';
 }

mysqli_close($con);
?>  
<tr>
    <td colspan="5" style="border-color:#000000; border-style:solid; border-width:1px;"><div align="right"><strong>Grand Total</strong></div></td>
    <td width="127" style="border-color:#000000; border-style:solid; border-width:1px;">
	
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
 
$result1 = mysqli_query($con1,"SELECT sum(total) FROM salessumarry WHERE date BETWEEN '$a' AND '$b'");
while($row = mysqli_fetch_array($result1))
{
    $rrr=$row['sum(total)'];
	echo formatMoney($rrr, true);
 }

mysqli_close($con);
?> 
      </div></td>
  </tr>
</table>
<p><br />
  <br />
  <a href="home.php">back to main menu </a></p>
<p><a href="sales.php">back to sales </a></p>
