<?php
if (!require_once("mysqldata.php")) {die ("can not open mysqldata.php");}
/*
 $q1=$_POST['q1'];
 $q2=$_POST['q2'];
 $job1=$_POST['jobnumber1'];
 $job2=$_POST['jobnumber2'];
 $job3=$_POST['jobnumber3'];
 $job4=$_POST['jobnumber4'];
 $job5=$_POST['jobnumber5'];
 $job6=$_POST['jobnumber6'];
 */
 $s=$_GET['q'];
// echo $s;
 $str=explode('||',$s);
 //echo $str[0],$str[1],$str[2],$str[3],$str[4],$str[5],$str[6],$str[7];
 //exit;
 $data = new database;
//$sql="select * from bidjob where firstName='" . $q1 . "'and lastName='" . $q2 . "'";

$sql="update bidjob set jobnumber1='" . $str[0] . "',jobnumber2='" . $str[1] . "',jobnumber3='" .$str[2]. "',jobnumber4='" . $str[3] . "',jobnumber5='" 
       . $str[4] . "',jobnumber6='" . $str[5] . "' where firstName='" .$str[6]. "' and lastName='" .$str[7]. "'";
	$result=$data->query($sql);
	$response= "job posted successfully.<br />" .  "<a href='login.php'>back to home</a>";
echo $response	;

	   


?>