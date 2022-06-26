<?php
	require_once('auth.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml2/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title> Inventory System </title>
<meta name="Author" content="Stu Nicholls" />
<link rel="stylesheet" href="./css/style.css" type="text/css" media="screen" charset="utf-8">
<link rel="stylesheet" type="text/css" href="pro_dropdown_2/pro_dropdown_2.css" />

<script src="pro_dropdown_2/stuHover.js" type="text/javascript"></script>
<style type="text/css">

.indexwraper{
width:70%;
height:500px;
border-style:solid;
border-width:thin;
margin:0 auto;
border-width: 3px;
}

</style>
<link href="src/facebox.css" media="screen" rel="stylesheet" type="text/css" />
  <script src="lib/jquery.js" type="text/javascript"></script>
  <script src="src/facebox.js" type="text/javascript"></script>
  <script type="text/javascript">
    jQuery(document).ready(function($) {
      $('a[rel*=facebox]').facebox({
        loadingImage : 'src/loading.gif',
        closeImage   : 'src/closelabel.png'
      })
    })
  </script>
</head>

<body>

<span class="preload1"></span>
<span class="preload2"></span>
<div style="width:70%; margin: 50px auto -1px;"><img src="img/Untitled-1.png" alt="logo" /></div>
<div style="width:70%; margin:0 auto; height:185px; border-style:solid; border-color:#FFFFFF;">

<ul id="nav">
	<li class="top"><a href="index.php" class="top_link"><span style="font-size:24px; font-weight:bold;">로그아웃 </span></a></li>
	<li class="top"><a href="#nogo2" id="products" class="top_link"><span class="down" style="font-size:24px; font-weight:bold;">판매 </span></a>
		<ul class="sub">
			<li><a href="login-exec.php"><span style="font-size:18px; font-weight:bold;">Sales</span></a></li>
			<li><a href="stockinloginexec.php"><span style="font-size:18px; font-weight:bold;">Purchases</span></a></li>
			<li><a rel="facebox" href="credit.php"><span style="font-size:18px; font-weight:bold;">Payments</span></a></li>
			<li><a rel="facebox" href="receipt.php"><span style="font-size:18px; font-weight:bold;">Retrieve OR</span></a></li>
		</ul>
	</li>
	<li class="top"><a href="#nogo22" id="services" class="top_link"><span class="down" style="font-size:24px; font-weight:bold;">관리자 </span></a>

		<ul class="sub">
			<li><a href="products.php"><span style="font-size:18px; font-weight:bold;">물품 리스트</span></a></li>
			<li><a href="clients.php"><span style="font-size:18px; font-weight:bold;">고객 리스트</span></a></li>
			<li><a href="supplier.php"><span style="font-size:18px; font-weight:bold;">직원 리스트</span></a></li>
		</ul>
	</li>

	<li class="top"><a href="editcustomerprof.php" class="top_link"><span style="font-size:24px; font-weight:bold;">회원등록 </span></a></li>

	<li class="top"><a href="#" id="shop" class="top_link"><span class="down" style="font-size:24px; font-weight:bold;">보고서 </span></a>
		<ul class="sub">
			<!--<li><a href="#" onclick="location.href='index.html'"><span style="font-size:18px; font-weight:bold;">Sales</span></a></li>
			<li><a href="AI.php"><span style="font-size:18px; font-weight:bold;">Sales</span></a></li>
			<li><a href="#" onclick="location.href='salereportWithAi.html'"><span style="font-size:18px; font-weight:bold;">Sales</span></a></li>-->		
			<li><a href="salereportWithAi.php"><span style="font-size:18px; font-weight:bold;">Sales</span></a></li>
			<li><a href="purchases.php"><span style="font-size:18px; font-weight:bold;">Purchases</span></a></li>
			<li><a href="bdayreport.php"><span style="font-size:18px; font-weight:bold;">Birth Day</span></a></li>
			<li><a href="productprint.php"><span style="font-size:18px; font-weight:bold;">Product</span></a></li>
			<li><a href="SEARCHDUE.php"><span style="font-size:18px; font-weight:bold;">Collection</span></a></li>
			<li><a href="customersearch.php"><span style="font-size:18px; font-weight:bold;">Member</span></a></li>
		</ul>
	</li>
</ul>


<div style="margin: 64px auto 0; font-size: 80px; font-family: fantasy; color:#424242;">
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
		mysqli_close($con);
	?>
	<?php echo $name; ?>
</div>
</div>
</body>
</html>
