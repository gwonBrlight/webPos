<?php
	require_once('auth.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<link rel="stylesheet" href="./css/style.css" type="text/css" media="screen" charset="utf-8">
<script language="JavaScript" type="text/javascript" src="cussearch.js"></script>
<style type="text/css">

.mainwraper{
width:80%;
height:auto;
background-color:#00CCFF;
margin:0 auto;

}
.left{
width:80%;
float:left;
}
.right{
width:20%;
float:right;
}
#txt{
color:#FFFFFF;
background-color:#000000;
border-style:solid;
border-color:#ffffff;
border-width: 0px 0px 2px 0px;
}
</style>
<link rel="stylesheet" type="text/css" href="tcal.css" />
	<script type="text/javascript" src="tcal.js"></script> 
</head>

<body>
<a href="home.php"><img src="img/64x64/back.png" alt="back" border="0" /></a>
<div class="mainwraper">

<!--===============================================================================================-->

  <div  class="left">
  						<?php
							if (isset($_GET['id']))
							{
						$con = mysqli_connect('capstone.cx8j7fkiwfmt.ap-northeast-2.rds.amazonaws.com','Capstone','&ZOQtmxhs12&','inventory','3306');
						if (!$con)
						  {
						  die('Could not connect: ' . mysqli_error($con));
						  }
						
						mysqli_select_db($con,"inventory");
						
						$idx = $_GET['id'];
						$result = mysqli_query($result,"SELECjobT * FROM customer WHERE id = $idx");
						
						$row = mysqli_fetch_array($result);
						$id=$row["id"];
						$name=$row["name"];
						$lname=$row["lname"];
						$mname=$row["mname"];
						$job=$row["job"];
						$birthday=$row["birthday"];
						$sighupday=$row["sigh_up_day"];
						$address=$row["address"];
						$tel=$row["tel"];
						$mobile=$row["mobile"];
						$email=$row["email"];
						$mid=$row["member_id"];
						mysqli_close($con);
						}
						
						?>
 <form action="editcustomerprof-exec.php" method="post"> 
 <fieldset style="border-width: 3px;">
 	<legend><b>개인 정보</b></legend>
 	Member ID:<input name="mid" type="text" id="txt" value="<?php echo $mid; ?>" />
 	가입일:<input name="sighupday" type="text" id="txt" class="tcal" value="<?php echo $sighupday; ?>" />
 	<br />
	*성함: <input name="name" type="text" id="txt" value="<?php echo $name; ?>" />&nbsp;&nbsp; 
	생일: <input name="birthday" type="text" id="txt" class="tcal" value="<?php echo $birthday; ?>" />&nbsp;&nbsp; 
	직업:<input name="job" type="text" id="txt" value="<?php echo $job; ?>" /><br />
	*휴대전화번호:<input name="mno" type="text" id="txt" value="<?php echo $mobile; ?>" />
	전화번호:<input name="pno" type="text" id="txt" value="<?php echo $tel; ?>" /><br />
	주소: <input name="address" type="text" size="49" id="txt" value="<?php echo $address; ?>" />&nbsp;&nbsp;
	e-mail: <input name="email" type="text" size="39" id="txt" value="<?php echo $email; ?>"/>&nbsp;&nbsp;
	<input name="id" type="hidden" value="<?php echo $id; ?>" />&nbsp;&nbsp;
	<input name="dayf" type="hidden" id="dayf" value="<?php echo $dayf; ?>" /> 
 </fieldset>

 <fieldset style="border-width: 3px;">
 	<legend><b>저장</b></legend>
 	<input name="save" type="submit" value="SAVE" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
 	<input name="" type="reset" value="RESET" />    
 </fieldset>
  </form>
  
  
  
  
  
  
  </div>
<!--===============================================================================================-->
  
  <div class="right">
 
  Enter Product Code Here:<br />
      <input type="text" id="cus" name="cus" onKeyUp="cuscus();" autocomplete="off"/>
<div id="layer1"></div>
  
  </div>
</div>
</body>
</html>
