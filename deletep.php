<?php
							if (isset($_GET['pcode']))
							{
						$con = mysqli_connect('capstone.cx8j7fkiwfmt.ap-northeast-2.rds.amazonaws.com','Capstone','&ZOQtmxhs12&','inventory','3306');
						if (!$con)
						  {
						  die('Could not connect: ' . mysqli_error($con));
						  }
						
						$member_pcode = $_GET['pcode'];
						$result = mysqli_query($con,"SELECT * FROM productlist WHERE pcode = $member_pcode");
						
						$row = mysqli_fetch_array($result);
						$pcode=$row["pcode"];
						mysqli_close($con);
						}
						
						?>

<form action="deleteproduct.php" method="post">
<input name="a" type="hidden" value="<?php echo $pcode; ?>" />
해당 상품을 정말 삭제 하시겠 습니까?<br />
<input name="" type="submit" value="Yes" />
