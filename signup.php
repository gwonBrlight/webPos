<?php
	session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>off# sign up</title>
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
<script type="text/javascript">
    function ShowTime()
    {
      var time=new Date()
      var h=time.getHours()
      var m=time.getMinutes()
      var s=time.getSeconds()
      // add a zero in front of numbers<10
      m=checkTime(m)
      s=checkTime(s)
      document.getElementById('txt').value=h+" : "+m+" : "+s
	  t=setTimeout('ShowTime()',1000)
	  function checkTime(i)
    
      if (i<10)
      {
        i="0" + i
      }
      return i
    }
</script>

<link rel="stylesheet" type="text/css" href="tcal.css" />
	<script type="text/javascript" src="tcal.js"></script> 
</head>

<body onLoad="ShowTime()">
<span class="preload1"></span>
<span class="preload2"></span>
<a href="index.php"><img src="img/64x64/back.png" alt="back" border="0" /></a>
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
		$result = mysqli_query($result,"SELEC * FROM user WHERE id = $idx");
		$row = mysqli_fetch_array($result);
		$id=$row["username"];
		$pw=$row["password"];
		$storename=$row["brandname"];
		$sighupday=$row["sighupday"];
		$address=$row["address"];
		$tel=$row["tel"];
		$category=$row["category"];
		$email=$row["email"];
		$newopeningdate=$row["newopeningdate"];
		mysqli_close($con);
	}
	?>
	<div class>
			<?php
			/*$q=20;
			$s=86400;
			$r=$q*$s;*/
			$timestamp=time(); //current timestamp
			/*$tm=$timestamp+$r; // Will add 2 days to the $timestamp*/
			$da=date("m/d/Y", $timestamp);
			?>
	</div>
 <form action="signup-exec.php" method="post">
 <table width="800">
            <tr height="40">
                <td align="center"><b>[????????????]</b></td>
            </tr>
        </table>    
        <table width="700" height="450" cellpadding="0" style="border-collapse:collapse; font-size:9pt;">
            <tr class="register" height="30">
                <td width="5%" align="center">*</td>
                <td width="15%">?????? ID</td>
                <td><input name="id" autocomplete="off" type="text" id="txt" value="<?php echo $id; ?>" />[ID ?????? ??????]</a></td>
            </tr>
            <tr height="7">
                <td colspan="3"><hr /></td>
            </tr>
            <tr class="register" height="30">
                <td width="5%" align="center">*</td>
                <td width="15%">????????????</td>
                <td><input name="pw" type="password" id="txt" onchange="isSame()" value="<?php echo $pw; ?>"/></td>
            </tr>
            <tr class="register" height="30">
                <td width="5%" align="center">*</td>
                <td width="15%">???????????? ??????</td>
                <td><input name="pw" type="password" id="txt" onchange="isSame()" value="<?php echo $pw; ?>"/>&nbsp;&nbsp;<span id="same"></span></td>
            </tr>
            <tr height="7">
                <td colspan="3"><hr /></td>
            </tr>
            <tr class="register" height="30">
                <td width="5%" align="center">*</td>
                <td width="15%">??? ??? ???</td>
				<td><input name="storename" autocomplete="off" type="text" id="txt" value="<?php echo $storename; ?>" /></td>
			</tr>
			<tr height="7">
                <td colspan="3"><hr /></td> 
            </tr>
            <tr class="register" height="30">
				<td width="5%" align="center">*</td>
				<td width="15%">??? ???</td>
				<td><select name="category">
				<option value="null" selected>=== ?????? ===</option>
				<option value="books">????????????</option>
				<option value="electronics">?????????/??????</option>
				<option value="beauty">??????/??????</option>
                <option value="fashion">??????</option>
				<option value="market">????????????</option>
                <option value="access"">????????????</option>
				<option value="home_decor">?????????</option>
				</select>
				</td>
            </tr>
            <tr height="7">
                <td colspan="3"><hr /></td>
            </tr>
            <tr class="register" height="30">
                <td width="5%" align="center">*</td>
                <td width="15%">????????????</td>
                <td><input name="tel" autocomplete="off" type="text" id="txt" value="<?php echo $tel; ?>" /></td>
            </tr>
            <tr height="7">
                <td colspan="3"><hr /></td>
            </tr>
            <tr class="register" height="30">
                <td width="5%" align="center">*</td>
                <td width="15%">??????</td>
                <td><input name="address" autocomplete="off" type="text" size="49" id="txt" value="<?php echo $address; ?>" /></td>
            </tr>
</table>
<br />
        <table>
            <tr height="40">
				<td><input width="120" type="image" src="img/????????????.png" name="save" type="submit" value="SAVE"/>
				<button type="reset" style="background-color:transparent;  border:0px transparent solid;">
    				<img src="img/????????????.png"  width="120" alt="" />
 				</button></td>
            </tr>
        </table>
    </form>
<br/>
</form>
  </div>
<!--===============================================================================================-->
  
  </div>
</div>
</body>
</html>
