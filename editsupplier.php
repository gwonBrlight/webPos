						<?php
							if (isset($_GET['id']))
							{
						$con = mysqli_connect('capstone.cx8j7fkiwfmt.ap-northeast-2.rds.amazonaws.com','Capstone','&ZOQtmxhs12&','inventory','3306');
						if (!$con)
						  {
						  die('Could not connect: ' . mysqli_error($con));
						  }
						
						mysqli_select_db($con,"inventory");
						
						$member_id = $_GET['id'];
						$result = mysqli_query($con,"SELECT * FROM supplier WHERE id = $member_id");
						
						$row = mysqli_fetch_array($result);
						$id=$row["id"];
						$company_name=$row["company_name"];
						$contact_name=$row["contact_name"];
						$address=$row["address"];
						$contactno=$row["contactno"];
						mysqli_close($con);
						}
						
						?>



<form action="savesupplier.php" method="post">
이름:<br />
<input name="a" type="text" size="70" value="<?php echo $company_name; ?>" /><br />
직급:<br />
<input name="b" type="text" size="70" value="<?php echo $contact_name; ?>" />
<br />
주소:<br />
<input name="c" type="text" size="70" value="<?php echo $address; ?>" /><br />
휴대폰번호:<br />
<input name="d" type="text" size="70" value="<?php echo $contactno; ?>" /><br />
<input name="submit" type="submit" value="save">
</form>
