<?php
try{
  /*** connect to the database ***/
  $dbh = new PDO("mysql:host=49.50.174.201;dbname=inventory", 'Capstone', '&ZOQtmxhs12&');

  /*** set the PDO error mode to exception ***/
  $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  /*** The sql statement ***/
  $sql = "SELECT image FROM image ORDER BY id DESC LIMIT 1";
  /*** prepare the sql ***/
  $stmt = $dbh->prepare($sql);

  /*** exceute the query ***/
  $stmt->execute();

  /*** set the fetch mode to associative array ***/
  $stmt->setFetchMode(PDO::FETCH_ASSOC);

  /*** set the header for the image ***/
  $array = $stmt->fetch();

  /*** check we have a single image and type ***/
  if(sizeof($array) == 1)
  {
      header("Content-type: image/png");
      /*** output the image ***/
      echo $array['image'];
  }
  else
  {
      throw new Exception("Out of bounds Error");
  }
  }
  catch(PDOException $e)
  {
      echo $e->getMessage();
  }
  catch(Exception $e)
  {
      echo $e->getMessage();
  }
?>