<?php
  //header('Content-Type: text/html; charset=UTF-8');
  require_once('auth.php');
  $store=$_SESSION['LOGIN_MEMBER_ID'];
  //exec("python3 DB_sales_.py ".$store."", $output);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="./css/style.css" type="text/css" media="screen" charset="utf-8">
  <link rel="stylesheet" type="text/css" href="tcal.css" />
  <script type="text/javascript" src="tcal.js"></script> 
</head>
<body>

  <?php
  exec("test.py");
  $python = 'test.py';
  echo $python;
  ?>

</body>
</html>