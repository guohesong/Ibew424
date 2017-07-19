<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

$conn = new mysqli("localhost", "root", "root", "ibew424");

$result = $conn->query("SELECT id,firstName, lastName, bookNumber FROM bidjob");

$outp = "";
while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
    if ($outp != "") {$outp .= ",";}
	$outp .= '{"id":"'  . $rs["id"] . '",';
    $outp .= '"firstName":"'  . $rs["firstName"] . '",';
    $outp .= '"lastName":"'   . $rs["lastName"] . '",';
	$outp .= '"bookNumber":"' . $rs["bookNumber"] . '",';
	$outp .= '"jobnumber1":"' . $rs["jobnumber1"] . '"}';
	//$outp .= '"area":"'   . $rs["area"] . '"}';
	
		/*
	$outp .= '{"id":"'  . $rs["id"] . '",';
    $outp .= '"firstName":"'  . $rs["firstName"] . '",';
    $outp .= '"lastName":"'   . $rs["lastName"] . '",';
	$outp .= '"bookNumber":"' . $rs["bookNumber"] . '"}';
	$outp .= '"degree":"' . $rs["degree"] . '",';
	$outp .= '"password":"' . $rs["password"] . '",';
	$outp .= '"area":"'   . $rs["area"] . '"}';

	$outp .= '"jobnumber1":"' . $rs["jobnumber1"] . '",';
	$outp .= '"jobnumber2":"' . $rs["jobnumber2"] . '",';
	$outp .= '"jobnumber3":"' . $rs["jobnumber3"] . '",';
	$outp .= '"jobnumber4":"' . $rs["jobnumber4"] . '",';
	$outp .= '"jobnumber5":"' . $rs["jobnumber5"] . '",';
    $outp .= '"jobnumber6":"' . $rs["jobnumber6"] . '"}'; 
	*/
}
$outp ='{"records":['.$outp.']}';
$conn->close();

echo($outp);
?>