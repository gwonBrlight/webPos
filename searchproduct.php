<?php
include('config.php');
	$con = mysqli_connect('capstone.cx8j7fkiwfmt.ap-northeast-2.rds.amazonaws.com','Capstone','&ZOQtmxhs12&','inventory','3306');
	if (!$con)
	{
	  die('Could not connect: ' . mysqli_error($con));
	}
						
	mysqli_select_db($con,"inventory");
						
    $member_id = $GET['id'];
    $pppppcode = $_POST['pcode'];
	$result = mysqli_query($con,"SELECT * FROM productlist WHERE pcode = $pppppcode");
						
    $row = mysqli_fetch_array($result);
    $name=$row["pname"];
	$qty_left=$row["pleft"];
	$price=$row["pprice"];
	$id=$row["id"];
	$pcoede=$row["pcode"];
	mysqli_close($con);
	?>