<?php 
    session_start();
	 if (!isset($_SESSION['IBEW424']) || ($_SESSION['IBEW424'] !="admin")) { 
	 echo "Please login First.<br />";
	 echo "<a href='login.php'>login</a>";
	 exit;
	 } 
	//date_default_timezone_set("America/Regina");
	//if (!require_once("mysqldata.php")) { die ("Can not open file mysqldata.php"); }
	/*
	$q1=base64_decode($_GET['q1']);
	$q2=base64_decode($_GET['q2']);
	session_start();
	echo "<h3>Welcome:" . "<span>" . $q1 . '&nbsp&nbsp' . $q2  . '!' ." </span></h3> " ; 
	if (isset($_SESSION['lastvisit']))
	{echo "You last bidding is :" . date("l F j,Y H:i:s a", $_SESSION['lastvisit']) . "<br />";
     $_SESSION['lastvisit']=time();
	 }
     else {
		 $_SESSION['lastvisit']=time();
	 }
	 */
	?>
	<html>
	<head>
	     <script>
		function editrecord(){
		var fName=document.getElementById('firstName');
		var lName=document.getElementById('lastName');
		var pw=document.getElementById('password');
		var deg=document.getElementById('degree');
		var area1=document.getElementById('area');
	    var bNumber=document.getElementById('bookNumber');

			if (!fName.value || !lName.value){ alert ("input the name of member.");location.href='maintain.php';return;}
             /*
        		 sql="select * from bidjob where ";			
			    sql += " firstName='" + fName.value + "' and lastName='" + lName.value + "'";
			    location.href="maintain_edit.php?q='" + sql +"'";  */
				/*
				sql="update bidjob set firstName='"+fName.value+"',lastName='"+lName.value+"',password='"+pw.value+"',bookNumber='"+bNumber.value+
		     "',area='"+area1.value+"',degree='"+deg.value+"'" + "where firstName='"+fName.value+"' and lastName='"+lName.value+"'"; 
			 */
			     q=fName.value + "||" + lName.value;
	             document.getElementById('message').innerHTML=q;	
			
				 location.href="maintain_edit.php?q="+q;
				 return; 
			 
			 
		 }
	   function maintain(str){
		var fName=document.getElementById('firstName');
		var lName=document.getElementById('lastName');
		var pw=document.getElementById('password');
		var deg=document.getElementById('degree');
		var area1=document.getElementById('area');
	    var bNumber=document.getElementById('bookNumber');
      switch (str)	{
		  
			case 'Search':
			if (!fName.value || !lName.value){ alert ("input the name of member.");location.href='maintain.php';return;}
             sql="select * from bidjob where ";			
			 sql += " firstName='" + fName.value + "' and lastName='" + lName.value + "'";
			 sql ="select||"+ sql;
			 break;
			  //  location.href="maintain_edit.php?q='" + sql +"'";  */
			
             case 'Update':		
                if (!fName.value || !lName.value){ alert ("input the name of member.");location.href='maintain.php';return;}			 
				sql="update bidjob set firstName='"+fName.value+"',lastName='"+lName.value+"',password='"+pw.value+"',bookNumber='"+bNumber.value+
		     "',area='"+area1.value+"',degree='"+deg.value+"'" + "where firstName='"+fName.value+"' and lastName='"+lName.value+"'"; 
			    sql = "update||" +sql;
				/*
			      q=fName.value + "||" + lName.value;
	             document.getElementById('message').innerHTML=q;	
			     location.href="maintain_edit.php?q="+q;
				 return;
				 */
				break;
				
			case "New":
			
			    if ((!fName.value) || !lName.value || !pw.value || (!deg.value) || (!area1.value) || (!bNumber.value )){
					alert ("Please fill out the texts.");
					location.href="maintain.php" ;
				    return;
				}
				sql="insert into bidjob (firstName,lastName,password,bookNumber,area,degree) values ('"; 
				sql +=fName.value+"','"+lName.value+"','" +pw.value+"','"+bNumber.value+"','"+area1.value+"','"+deg.value+"')";
				sql="insert||" + sql;
				document.getElementById('message').innerHTML=sql+"||"+str;
				
				break;
				
			case 'Delete':
			   if (!fName.value || !lName.value ){
					alert ("Please fill out the name of the member.");
					location.href="maintain.php";
					return;
				}
			  sql="delete from bidjob where firstName='" +fName.value+"' and lastName='"+lName.value+"'";
			  sql = "delete||" + sql;
			  
		  }
			  
		 	 
		    if (window.XMLHttpRequest) {
    // IE7+, Firefox, Chrome, Opera, Safari 执行代码
    xmlhttp=new XMLHttpRequest();
  } else {
    // IE6, IE5 执行代码
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
	  var str_r=xmlhttp.responseText;
	  arr=str_r.split('||');
	  var response=arr[1];
	  if (arr[0]=="select"){
		  fName.value=arr[1];lName.value=arr[2];pw.value=arr[3];
		  bNumber.value=arr[4];deg.value=arr[6];area1.value=arr[5];
		  response="record is searched.";
	  }
      document.getElementById("message").innerHTML=response;   //xmlhttp.responseText;
    }
  }
  xmlhttp.open("GET","maintain_back.php?q="+sql,true);
  xmlhttp.send();
	   
	   }
	   </script>
	</head>
	<body>
	  <p><label>First Name:</label><input type="text" id="firstName" value="Michelle" ></p>
	  <p><label> Last Name:</label><input type="text" id="lastName" value="Feng" ></p>
	  <p><label>  password:</label><input type="text" id="password" value="1234"></p>
	  <p><label>book number:</label><input type="text" id="bookNumber" value="110800"></p>
	  <p><label>      Area:</label><input type="text" id="area" value="Alberta"></p>
	  <p><label>     title:</label><input type="text" id="degree" value="Journey womon"></p>
		<p><input type="button" value="Search" onclick="maintain(this.value)">     <!-- editrecord() -->
		   <input type="button" value="Update" onclick="maintain(this.value)">
		   <input type="button" value="New" onclick="maintain(this.value)">
		<!--   <input type="button" value="Edit" onclick="maintain(this.value)">  -->
		   <input type="button" value="Delete" onclick="maintain(this.value)">
		</P>
       <p id="message"></p>		
	 
	<body>
	
	</html>