<?php
							if (isset($_GET['pcode']))
							{
						$con = mysqli_connect('capstone.cx8j7fkiwfmt.ap-northeast-2.rds.amazonaws.com','Capstone','&ZOQtmxhs12&','inventory','3306');
						if (!$con)
						  {
						  die('Could not connect: ' . mysqli_error($con));
						  }
						
						mysqli_select_db($con,"inventory");
						
						$member_pcode = $_GET['pcode'];
						$result = mysqli_query($con,"SELECT * FROM productlist WHERE pcode = $member_pcode");
						
						$row = mysqli_fetch_array($result);
						$pcode=$row["pcode"];
						$pname=$row["pname"];
						$pdesc=$row["pdesc"];
						$pleft=$row["pleft"];
						$pprice=$row["pprice"];
						mysqli_close($con);
						}
						
						?>




<form action="editexec.php" method="post">
바코드숫자:<br />
<input name="a" type="text" /><br />
상품명:<br />
<input name="b" type="text" size="70" />
<br />
상품 설명:<br />
<input name="c" type="text" size="70" />
<br />
수량:<br />
<input name="d" type="text" /><br />
가격:<br />
<input name="e" type="text" /><br />
<input name="submit" type="submit" value="save">
</form>
