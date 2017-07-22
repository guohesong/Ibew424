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
	
	<!DOCTYPE html>

	
	<html>
	<head>
	<meta charset="utf-8">
    <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css">  
	<script src="https://cdn.bootcss.com/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
	
  <center>   <img src="../img/train1.png" width=90% height="120px"  /> </center>
	<div class="container">
	<br/><br/>
	<div class="row clearfix">
		
		<div class="col-md-4 column"><br/><br/>
			 <button type="button" class="btn btn-success btn-lg btn-block" value="Search" onclick="maintain(this.value)" >Search</button> 
			 <button type="button" class="btn btn-success btn-lg btn-block" value="Update" onclick="maintain(this.value)" >Update</button>
			 <button type="button" class="btn btn-success btn-lg btn-block" value="New" onclick="maintain(this.value)" >New</button>
			 <button type="button" class="btn btn-success btn-lg btn-block" value="Delete" onclick="maintain(this.value)" >Delete</button>
		</div>
		<div class="col-md-8 column">
			<form class="form-horizontal" role="form">
				<div class="form-group">
					 <label for="inputtext1" class="col-sm-2 control-label">First Name</label>
					<div class="col-sm-10">
						<input type="Text" class="form-control" id="firstName" value="Michelle" />
					</div>
				</div>
				<div class="form-group">
					 <label for="inputtext1" class="col-sm-2 control-label">Last Name</label>
					<div class="col-sm-10">
						<input type="Text" class="form-control" id="lastName" value="Feng" />
					</div>
				</div>
				<div class="form-group">
					 <label for="inputtext1" class="col-sm-2 control-label">Password</label>
					<div class="col-sm-10">
						<input type="Text" class="form-control" id="password" value="1234" />
					</div>
				</div>
				<div class="form-group">
					 <label for="inputtext1" class="col-sm-2 control-label">Book Number</label>
					<div class="col-sm-10">
						<input type="Text" class="form-control" id="bookNumber" value="110800" />
					</div>
				</div>
				<div class="form-group">
					 <label for="inputtext1" class="col-sm-2 control-label">Address</label>
					<div class="col-sm-10">
						<input type="Text" class="form-control" id="area" value="Alberta" />
					</div>
				</div>
				<div class="form-group">
					 <label for="inputtext1" class="col-sm-2 control-label">Title</label>
					<div class="col-sm-10">
						<input type="Text" class="form-control" id="degree" value="Journey womon" />
					</div>
				</div>
						</form>
			   <p id="message"></p>	
		</div>
		</div>
</div>
	
	<body>
	
	</html>