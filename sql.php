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
    $outp .= '"lastName":"'   . $rs["lastName"]        . '",';
    $outp .= '"bookNumber":"'. $rs["bookNumber"]     . '"}'; 
}
$outp ='{"records":['.$outp.']}';
$conn->close();

echo($outp);
?>