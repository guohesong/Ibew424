<?php
  $q=$_GET['q'];
  if (!require_once("mysqldata.php")) { die ("Can not open file mysqldata.php"); }
  $data=new database;
 if( $result=$data->query($q)){
  $response = "record processed successfully.";
  echo $response;
 }
?>