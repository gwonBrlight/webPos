<?php
		$con = mysqli_connect('capstone.cx8j7fkiwfmt.ap-northeast-2.rds.amazonaws.com','Capstone','&ZOQtmxhs12&','inventory','3306');
		if (!$con)
		{
		die('Could not connect: ' . mysqli_error($con));
		}

		mysqli_select_db($con,"inventory");		
		$sales_on=$_SESSION['LOGIN_MEMBER_ID'];
		$result = mysqli_query($con,"SELECT brandname FROM user WHERE id = '$sales_on'");
		$row = mysqli_fetch_array($result);
		$name=$row["brandname"];

    $result = mysqli_query($con,"SELECT id,count FROM inventory.graph_test LIMIT 20");

    while($row = mysqli_fetch_array($result))
    {
      $_POST[] =[$row["id"],$row["count"]];
      echo json_encode($_POST, JSON_FORCE_OBJECT);
    }
		mysqli_close($con);
	?>