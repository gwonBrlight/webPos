<div align="center">Purchase Report From:<strong> <?php echo $_POST['dayfrom']; ?></strong>&nbsp;&nbsp;To:<strong> <?php echo $_POST['dayto']; ?>
<br />
    </strong></div>
<table width="900" align="center" cellpadding="0" cellspacing="0" style="font-size:12px; border-color:#000000; border-style:solid; border-width:1px;">
  <tr>
    <td width="85" style="border-color:#000000; border-style:solid; border-width:1px;"><div align="center"><strong>Date</strong></div></td>
    <td width="174" style="border-color:#000000; border-style:solid; border-width:1px;"><div align="center"><strong>Transaction No. </strong></div></td>
    <td width="294" style="border-color:#000000; border-style:solid; border-width:1px;"><div align="center"><strong>Supplier Name </strong></div></td>
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
 
$result1 = mysqli_query($con1,"SELECT * FROM stockinsumarry WHERE pdate BETWEEN '$a' AND '$b'");

while($row = mysqli_fetch_array($result1))
{
  echo '<tr>';
    echo '<td style="border-color:#000000; border-style:solid; border-width:1px;"><div align="center">'.$row['pdate'].'</div></td>';
    echo '<td style="border-color:#000000; border-style:solid; border-width:1px;"><div align="center">'.$row['code'].'</div></td>';
	echo '<td style="border-color:#000000; border-style:solid; border-width:1px;"><div align="center">'.$row['supplier'].'</div></td>';
    echo '<td style="border-color:#000000; border-style:solid; border-width:1px;"><div align="center">';
	$eee=$row['total'];
	echo formatMoney($eee, true);
	
	echo '</div></td>';
    
  echo '</tr>';
 }

mysqli_close($con);
?>  
<tr>
    <td colspan="3" style="border-color:#000000; border-style:solid; border-width:1px;"><div align="right"><strong>Grand Total</strong></div></td>
    <td width="127" style="border-color:#000000; border-style:solid; border-width:1px;">
	
	  <div align="center">
	    <?php
$con = mysqli_connect('49.50.174.201','inventory','inventory','inventory','3306');
if (!$con)
  {
  die('Could not connect: ' . mysqli_error($con));
  }

mysqli_select_db($con,"inventory");		
$a=$_POST['dayfrom'];
$b=$_POST['dayto'];
 
$result1 = mysqli_query($con1,"SELECT sum(total) FROM stockinsumarry WHERE pdate BETWEEN '$a' AND '$b'");
while($row = mysqli_fetch_array($result1))
{
    $rrr=$row['sum(total)'];
	echo formatMoney($rrr, true);
 }

mysqli_close($con);
?> 
      </div></td>
  </tr>
</table><br /><br />
<p><a href="home.php">back to main menu </a></p>
<p><a href="purchases.php">back to Purchases </a></p>
