<?php
  require_once('auth.php');
  $sales_on=$_SESSION['LOGIN_MEMBER_ID'];
?>

<?php
	$con = mysqli_connect('capstone.cx8j7fkiwfmt.ap-northeast-2.rds.amazonaws.com','Capstone','&ZOQtmxhs12&','inventory','3306');
if (!$con)
  {
  die('Could not connect: ' . mysqli_error($con));
  }

mysqli_select_db($con,"inventory");


$pcode=$_POST['a'];
$pname=$_POST['b'];
$pdesc=$_POST['c'];
$pleft=$_POST['d'];
$pprice=$_POST['e'];
$keyword=$_POST['f'];
$g='0';	
$sales_on=$_SESSION['LOGIN_MEMBER_ID'];

$result = mysqli_query($con,"SELECT pcode FROM productlist WHERE pcode = $a");

$sql="INSERT INTO productlist (pcode, pname, pdesc, pleft, pprice, keyword, psold, status,sales_on)
VALUES ($pcode, '$pname', '$pdesc', $pleft, $pprice, '$keyword', $g ,1,'$sales_on')";

//if (!mysqli_query($con,$result)){
  if (!mysqli_query($con,$sql)){
    die('Error: ' . mysqli_error($con));
  }
//}
//else{
  //$adding = $row['pleft'] + $d;
  //$idx = $row['id'];
  //$sql="UPDATE productlist SET `pleft` = $adding  WHERE id = $idx;";
//}
mysqli_close($con)
?>

<?php
/*** check if a file was submitted ***/
if(!isset($_FILES['userfile']))
{
    echo '<p>Please select a file</p>';
}
else
{
    try    {
        upload();
        /*** give praise and thanks to the php gods ***/
        echo '<p>Thank you for submitting</p>';
    }
    catch(Exception $e)
    {
        echo '<h4>'.$e->getMessage().'</h4>';
    }
}

function upload(){
    /*** check if a file was uploaded ***/
    $pcode=$_POST['a'];
    if(is_uploaded_file($_FILES['userfile']['tmp_name']) && getimagesize($_FILES['userfile']['tmp_name']) != false)
    {
        /***  get the image info. ***/
        $size = getimagesize($_FILES['userfile']['tmp_name']);
        /*** assign our variables ***/
        $type = $size['mime'];
        $imgfp = fopen($_FILES['userfile']['tmp_name'], 'rb');
        $size = $size[3];
        $name = $_FILES['userfile']['name'];
        $maxsize = 99999999;


        /***  check the file is less than the maximum file size ***/
        if($_FILES['userfile']['size'] < $maxsize )
        {
            /*** connect to db ***/
            $dbh = new PDO("mysql:host=capstone.cx8j7fkiwfmt.ap-northeast-2.rds.amazonaws.com;dbname=inventory", 'Capstone', '&ZOQtmxhs12&');

            /*** set the error mode ***/
            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            /*** our sql query ***/
            $stmt = $dbh->prepare("UPDATE productlist SET image_type = ?,image = ?, image_size = ?, image_name = ? WHERE pcode = $pcode");

            /*** bind the params ***/
            $stmt->bindParam(1, $type);
            $stmt->bindParam(2, $imgfp, PDO::PARAM_LOB);
            $stmt->bindParam(3, $size);
            $stmt->bindParam(4, $name);

            /*** execute the query ***/
            $stmt->execute();
        }
        else
        {
            /*** throw an exception is image is not of type ***/
            throw new Exception("File Size Error");
        }
    }
    else
    {
        // if the file is not less than the maximum allowed, print an error
        throw new Exception("Unsupported Image Format!");
    }
  header("location: products.php");
  exit();
}
?>