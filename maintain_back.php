<?php
  $q=$_GET['q'];
 /*
  $q="insert||insert into bidjob (firstName,lastName,password,bookNumber,area,degree) values 
  ('Marcial','Armstrong','1234','112033','Alberta','Journey womon')";
  */
  $q=explode("||",$q);
  
  if (!require_once("mysqldata.php")) { die ("Can not open file mysqldata.php"); }
  $data=new database;
  switch ($q[0]){
	case "select":
         if ($result=$data->query($q[1])) {
					
			 if($row=mysqli_fetch_assoc($result)){  //mysqli_fetch_array
			  $response="select";
	    	  $response .= "||" . $row['firstName'] . "||" . $row['lastName'] . "||" . $row['password'] .
			       "||" . $row['bookNumber'] ."||" . $row['area'] ."||" . $row['degree'];
			
			 }else {
			  $response = "Can not find the person.";
			 }
			
		 }
         break;
    case "update":
          if( $result=$data->query($q[1])){
          $response = "update||record updated successfully.";
          break;
		  }
    case "insert":
          if( $result=$data->query($q[1])){
              $response = "insert||record inserted successfully.";
          break;
		  }
    case "delete":
            if( $result=$data->query($q[1])){
             $response = "delete||record deleted successfully.";
           }
  }
  echo $response;
 
?>