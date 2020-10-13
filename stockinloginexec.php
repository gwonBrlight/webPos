<?php
	//Start session
	session_start();
	
$con = mysqli_connect("localhost","root","123456");
if (!$con)
  {
  die('Could not connect: ' . mysqli_error($con));
  }

mysqli_select_db($con,"inventory");






$result = mysqli_query($result,"SELECT * FROM code");
while($row = mysqli_fetch_array($result))
  {
        $fefe=$row['code']; 
  }
  $sasa=$fefe+1;

	
mysqli_query($result,"UPDATE code SET code = '$sasa'");
$fgh='000'.$sasa;						
$finalcode=date("Y-m-$fgh").'-STI';						

			session_regenerate_id();
			$_SESSION['SESS_MEMBER_ID'] = $finalcode;
			session_write_close();
			header("location: stockin.php");
			exit();
		
		
		
mysqli_close($con);		
		
	
?>