    


<html>
  <head>
  <meta charset="utf-8">
    <script>
	    function saverecord(){
		var fName=document.getElementById('firstName');
		var lName=document.getElementById('lastName');
		var pw=document.getElementById('password');
		var deg=document.getElementById('degree');
		var area1=document.getElementById('area');
	    var bNumber=document.getElementById('bookNumber');
		sql="update bidjob set firstName='"+fName.value+"',lastName='"+lName.value+"',password='"+pw.value+"',bookNumber='"+bNumber.value+
		     "',area='"+area1.value+"',degree='"+deg.value+"'" + "where firstName='"+fName.value+"' and lastName='"+lName.value+"'"; 
		document.getElementById('editdiv').innerHTML=sql;	
			
		}
	 </script> 
  </head>
  
  <body>
     <p><label>First Name:</label><input type="text" id="firstName" value="Michelle" ></p>
	  <p><label> Last Name:</label><input type="text" id="lastName" value="Feng" ></p>
	  <p><label>  password:</label><input type="text" id="password" value="1234"></p>
	  <p><label>book number:</label><input type="text" id="bookNumber" value="110000"></p>
	  <p><label>      Area:</label><input type="text" id="area" value="Alberta"></p>
	  <p><label>     title:</label><input type="text" id="degree" value="Journey womon"></p>
	 <input type="button" value="Save" onclick='saverecord()'>
	 <input type="button" value="back to update" onclick="location.href='maintain.php';">
	 <div id="editdiv"></div>
     	
<?php
$q=$_GET['q'];
$q=explode("||",$q);
//$q1= $q[0];
//$q2= $q[1];
//$sql="select * from bidjob where firstName='" . $q[0] . "' and lastName='" . $q[1] . "'";
 $sql = "select * from bidjob where firstName='" . $q[0] . "' and lastName='" . $q[1] . "'";
//echo "<script>       document.getElementById('editdiv').innerHTML= $sql ;	   </script> ";
if (!require_once("mysqldata.php")) { die ("Can not open file mysqldata.php"); }
$data = new database;
$result=$data->query($sql);
if($row=mysqli_fetch_assoc($result)){
	echo "<p><label>First Name:</label><input type='text' id='firstName' value='" . $row['firstName'] . "'></p>";
	echo "<p><label>Last Name:</label><input type='text' id='lastName' value='" . $row['lastName'] . "'></p>";
	echo "<p><label>Password:</label><input type='text' id='password' value='" . $row['password'] . "'></p>";
	echo "<p><label>Book Number:</label><input type='text' id='bookNumber' value='" . $row['bookNumber'] . "'></p>";
	echo "<p><label>Area:</label><input type='text' id='area' value='" . $row['area'] . "'></p>";
	echo "<p><label>Title:</label><input type='text' id='degree' value='" . $row['degree'] . "'></p>";
	//echo " editdiv.innerHTML='welcome to china' $response $sql ";
}else{
	echo "cannot find this person.";
}
?>
  </body>


</html>