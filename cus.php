<?php
include('config.php');
if($_POST)
{

$q=$_POST['ble'];

$sql_res=mysqli_query($sql_res,"select * from customer where name like '%$q%'");
while($row=mysqli_fetch_array($sql_res))
{
$fname=$row['name'];

$id=$row['id'];

$re_fname='<b>'.$q.'</b>';


$final_fname = str_ireplace($q, $re_fname, $fname);



?>
<div class="display_box" align="left">

<?php echo '<a href=auto.php?id=' . $id . '>'.$final_fname; ?>



<?php
}

}
else
{

}


?>
