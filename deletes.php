
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
						$result = mysqli_query($con,"SELECT * FROM productlist WHERE id = $member_id");
						
						$row = mysqli_fetch_array($result);
						$id=$row["id"];
						mysqli_close($con);
						}
						
						?>

<form action="deletesupplier.php" method="post">
<input name="a" type="hidden" value="<?php echo $id; ?>" />
Are you sure you want to delete this supplier?<br />
<input name="" type="submit" value="Yes" />
