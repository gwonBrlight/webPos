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
						$result = mysqli_query(mysqli_select_db($con,"inventory"),"SELECT * FROM productlist WHERE id = $member_id");
						
						$row = mysqli_fetch_array($result);
						$id=$row["id"];
						$pcode=$row["pcode"];
						$pname=$row["pname"];
						$pdesc=$row["pdesc"];
						$pleft=$row["pleft"];
						$pprice=$row["pprice"];
						mysqli_close($con);
						}
						
						?>




<form action="editexec.php" method="post">
code:<br />
<input name="a" type="text" value="<?php echo $pcode; ?>" /><input name="m" type="hidden" value="<?php echo $id; ?>" /><br />
description:<br />
<input name="c" type="text" value="<?php echo $pdesc; ?>" size="70" />
<br />
quantity:<br />
<input name="d" type="text" value="<?php echo $pleft; ?>" /><br />
price:<br />
<input name="e" type="text" value="<?php echo $pprice; ?>" /><br />
<input name="submit" type="submit" value="save">
</form>
