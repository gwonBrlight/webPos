<?php
	//Start session
	session_start();

	//Array to store validation errors
	$errmsg_arr = array();
	
	//Validation error flag
	$errflag = false;
	
	$mysql_host = 'capstone.cx8j7fkiwfmt.ap-northeast-2.rds.amazonaws.com';
    $mysql_user = 'Capstone';
    $mysql_password = '&ZOQtmxhs12&';
	$mysql_db = 'inventory';
	
	//Connect to mysql server
	$link = mysqli_connect($mysql_host,$mysql_user,$mysql_password,$mysql_db,'3306');
	if(!$link) {
		die('Failed to connect to server: ' . mysqli_error($link));
	}

	$db = mysqli_select_db($link, $mysql_db);
	if(!$db) {
		die("Unable to select database");
	}
	
	//Function to sanitize values received from the form. Prevents SQL injection
	function clean($str) {
		$str = @trim($str);
		//if(get_magic_quotes_gpc()) {
			$str = stripslashes($str);
		//}	`	q2w3ed4rf5t43e
		//eturn mysqli_real_escape_string($link,$str);
	}
	
	//Sanitize the POST values
	
	
	// Generate Guid 
	$login = $_POST['username'];
	//$login = clean($_POST['username']);
	$password = $_POST['password'];
	//$password = clean($_POST['password']);
	
	
	//Create query
	$qry="SELECT * FROM user WHERE username='$login' AND password='$password'";
	$result=mysqli_query($link,$qry);
	
	//Check whether the query was successful or not
	if($result) {
		if(mysqli_num_rows($result) > 0) {
			//Login Successful
			session_regenerate_id();
			$member = mysqli_fetch_assoc($result);
			$_SESSION['SESS_MEMBER_ID'] = $member['username'];
			$_SESSION['LOGIN_MEMBER_ID'] = $member['id'];
			session_write_close();
			header("location: home.php");
			exit();
		}
		else {
			//Login failed
			header("location: searchname.php");
			exit();
		}
	}else {
		die("Query failed");
	}
?>