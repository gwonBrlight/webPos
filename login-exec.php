<?php
	//Start session
	session_start();
	
$con = mysqli_connect('capstone.cx8j7fkiwfmt.ap-northeast-2.rds.amazonaws.com','Capstone','&ZOQtmxhs12&','inventory','3306');
if (!$con)
  {
  die('Could not connect: ' . mysqli_error($con));
  }

mysqli_select_db($con,"inventory");


$result = mysqli_query($con,"SELECT * FROM socode");
while($row = mysqli_fetch_array($result))
  {
        $fefe=$row['code']; 
  }
  $sasa=$fefe+1;

	
mysqli_query($con,"UPDATE socode SET code = '$sasa'");
$fgh='000'.$sasa;						
$finalcode=date("Y-m-$fgh").'-STO';						

			session_regenerate_id();
			$_SESSION['SESS_MEMBER_ID'] = $finalcode;
			session_write_close();
			header("location: auto.php");
			exit();
		
		
		
mysqli_close($con);		
		
	
?>