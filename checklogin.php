<?php
   session_start(); 
   if (!include_once("mysqldata.php")){
	   die("failed to include_once file database.php");
   }

   $s=htmlspecialchars($_GET['q']);
   $str=explode('|',$s);
   $firstName=$str[0];
   $lastName=$str[1];
   $password=$str[2];
 /*
   $lastName=htmlspecialchars($_POST["lastName"]);
   $firstName=htmlspecialchars($_POST["firstName"]);
   $password=htmlspecialchars($_POST["password"]);	
   */
   date_default_timezone_set("America/Regina");
   if (empty($lastName) || empty($firstName) || empty($password) ) 
   {
		$response = 'member or password can not be empty';
	    //$response .="<a href='login.php'>click to back to login</a>";
		echo $response;
		//header("Location:login.php");
		exit;
	}
 	if (!isset($_SESSION['IBEW'])) { $_SESSION['IBEW']=0; }
	$_SESSION['IBEW'] ++;
	if ($_SESSION['IBEW'] > 3) {
		$response="please contact the adminstor to reset your account!";
		$response .= "you have tried:" . $_SESSION['IBEW'] . "times";
		$response .="<a href='login.php'>click to back to login</a>";
		echo $response;
		exit;
	}
$data = new database;
$sql="select * from bidjob where lastName='" . $lastName . "' and password='" . $password . "' and firstName='" . $firstName . "'";
 $result=$data->query($sql)  ;
	if ($row=mysqli_fetch_array($result)) {
	$_SESSION['IBEW']=0;
	$_SESSION['IBEW424']="member";
	if ($lastName=='admin') {$_SESSION['IBEW424']="admin";}
	$response ="<h3>Welcome:" . "<span>" . $firstName . '&nbsp&nbsp' . $lastName  . '!' ." </span></h3> " ; 
	if (isset($_SESSION['lastvisit']))
	{$response .= "You last bidding is :" . date("l F j,Y H:i:s a", $_SESSION['lastvisit']) . "<br />";
     $_SESSION['lastvisit']=time();
	 }
     else {
		 $_SESSION['lastvisit']=time();
	 }
	 echo $response;
	 exit;
	/*
	$firstName=base64_encode($firstName);
	$lastName=base64_encode($lastName);
	header("Location:bid.php?q1=$firstName&q2=$lastName");	
	*/
	} else {
		$response= "you name or password don't match with our system, please try again.";
		$response .= "you tried " . $_SESSION['IBEW'] . "times";
		//$response .= "<a href='login.php'> click me</a>";
		echo $response;
		//header ("Location:login.php");
	}
	

?>