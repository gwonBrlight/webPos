<?php
	require_once('auth.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8">
    <title>Inventory System</title>
    
    <link rel="stylesheet" href="./css/style.css" type="text/css" media="screen" charset="utf-8">
  </head>
  <body id="index">
  <a href="index.php"></a>
    <div id="pagewrap">
	 <div id="body">
<table cellpadding="1" cellspacing="1" id="resultTable">
          <thead>
            <tr bgcolor="#33FF00" style="margin-bottom:10px;">
              <th width="10%">Code</th>
              <th width="63%">Description</th>
              <th width="9%">Qty Sold</th>
			  <th width="9%">Qty Left</th>
              <th width="9%">Price</th>
              
            </tr>
          </thead>
          <tbody>
          <?php
$con = mysqli_connect('localhost','root','123456','inventory','3307');
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
$result = mysqli_query($con,"SELECT * FROM productlist");

while($row = mysqli_fetch_array($result))
  {
    echo '<tr>';
      echo '<td>'.$row['pcode'].'</td>';
      echo '<td>&nbsp;&nbsp;&nbsp;'.$row['pdesc'].'</td>';
      echo '<td><div align="center">'.$row['psold'].'</div></td>';
      echo '<td><div align="center">'.$row['pleft'].'</div></td>';
      echo '<td><div align="center">';
	  $we=$row['pprice'];
	  echo formatMoney($we, true);
	  echo'</div></td>';
    echo '</tr>';
  }

mysqli_close($con);
?> 
          </tbody>
       </table>
      </div>
    </div>
  </body>
</html>



