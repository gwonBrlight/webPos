<?php
	$con = mysqli_connect('capstone.cx8j7fkiwfmt.ap-northeast-2.rds.amazonaws.com','Capstone','&ZOQtmxhs12&','inventory','3306');
	if (!$con)
	{
	  die('Could not connect: ' . mysqli_error($con));
	}

	mysqli_select_db($con,"inventory");		
    $member_id = $GET['id'];
    $pppppcode = $_POST["pcode"];
	$result = mysqli_query($con,"SELECT * FROM productlist WHERE pcode LIKE %".$pppppcode."%");
						
	$row = mysqli_fetch_array($result);
    echo $name=$row["pname"];
	echo $qty_left=$row["pleft"];
	echo $price=$row["pprice"];
	echo $id=$row["id"];
	echo $pcoede=$row["pcode"];
	mysqli_close($con);
	header("location: auto.php");
	?>