			<?php
			if (isset($_GET['id']))
			{
	
	
			$con = mysqli_connect('localhost','root','123456','inventory','3307');
			if (!$con)
			  {
			  die('Could not connect: ' . mysqli_error($con));
			  }
			
			mysqli_select_db($con,"inventory");
		
			$creditcode=$_GET['id'];
			$mn=$_POST['c'];
			
			$result = mysqli_query($con,"SELECT * FROM credit where p_code = '$creditcode'");
			while($row1 = mysqli_fetch_array($result))
			{
			$cover=$row1['coverage'];
			$nu=$row1['nu_payment'];
			$cp=$row1['creditpayable'];
			$paid=$row1['paid'];
			$totalamount=$cp+$paid;
			$creditpayable=$row1['creditpayable'];
			}
			$ble=$mn+$paid;
			$astig=$cp-$mn; 
			$fop=date("m/d/Y");
			
			
			
			mysqli_query($con,"UPDATE credit SET creditpayable = '$astig', paid='$ble' WHERE p_code = '$creditcode'");
			mysqli_query($con,"INSERT INTO creditdatails (amount, datepayment, creditcode, balance) VALUES ('$mn', '$fop', '$creditcode', '$creditpayable')");
			header("location: credit-exec.php");
			exit();
			}
			?>