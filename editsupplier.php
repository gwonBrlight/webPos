						<?php
							if (isset($_GET['id']))
							{
						$con = mysqli_connect('localhost','root','123456','inventory','3307');
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
Company Name:<br />
<input name="a" type="text" size="70" value="<?php echo $company_name; ?>" /><br />
Contact Name:<br />
<input name="b" type="text" size="70" value="<?php echo $contact_name; ?>" />
<br />
Address:<br />
<input name="c" type="text" size="70" value="<?php echo $address; ?>" /><br />
Contact Number:<br />
<input name="d" type="text" size="70" value="<?php echo $contactno; ?>" /><br />
<input name="submit" type="submit" value="save">
</form>
