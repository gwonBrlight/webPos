<?php
				  if (isset($_GET['id']))
	{
    $con = mysqli_connect('capstone.cx8j7fkiwfmt.ap-northeast-2.rds.amazonaws.com','Capstone','&ZOQtmxhs12&','inventory','3306');
    if (!$con)
    {
      die('Could not connect: ' . mysqli_error($con));
    }

    mysqli_select_db($con,"inventory");
    $messages_id = $_GET['id'];
    $result = mysqli_query($con,"SELECT * FROM sales where id='$messages_id'");
    while($row = mysqli_fetch_array($result))
    {
      $code=$row['name'];
      $f=$row['qty'];
      $falagpat=$row['pcode'];
    }
    $result1 = mysqli_query($con,"SELECT * FROM productlist where pcode='$falagpat'");

    while($row1 = mysqli_fetch_array($result1))
    {
      $psold=$row1['psold'];
      $pleft=$row1['pleft'];
    }
    $buwin=$psold-$f;
    $dugang=$pleft+$f;

    mysqli_query($con,"UPDATE productlist SET psold = '$buwin', pleft = '$dugang'
    WHERE pcode = '$falagpat'");

    mysqli_query($con,"DELETE FROM sales WHERE id='$messages_id'");
    mysqli_close($con);
    header("location: auto.php");
  }
?>