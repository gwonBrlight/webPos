<?php
$mysql_host = 'capstone.cx8j7fkiwfmt.ap-northeast-2.rds.amazonaws.com';
$mysql_user = 'Capstone';
$mysql_password = '&ZOQtmxhs12&';
$mysql_database = 'inventory';//원래는 mammamar_marias
$prefix = "";
$bd = mysqli_connect($mysql_hostname, $mysql_user, $mysql_password,$mysql_database,'3306') or die("Could not connect database.");
mysqli_select_db($bd,$mysql_database) or die("Could not select database..");

?>