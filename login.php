<?php 
error_reporting(E_ALL);
session_start(); 

//This is a simplified HTML Document 
?> 
<html>
<head>
<title>Job biding System for Ibew 424</title>
<script src="myjs.js"></script>
<script>
function center(){
var inObj=document.getElementById("container");
layerCenterH(inObj);
layerCenterV(inObj);
}
</script>
<style>
body {
	background-image:url("images/lrock011.jpg");
	background-repeat:repeat;
	font-family: Times, TimesNR;
	font-variant:small-caps;
	font-weight:900;
}
#container {
	
	display:block;
	position:absolute;
	color:green;
	padding:15px 15px 15px 15px;
}
.logintable {
	color:#f60;
	background:#666;
	font-size:20px;
	padding:10px;
	
}

img {
	float:left;
	
}
h1 {
	outline:#00ff00 dotted thick;
	
}
input  {
	padding:10px;
	color:green;
	background:gray;
	
}
input [type="submit"] {
	text-align:center;
	color:#f60;
	
}
</style>
<script>
function logincheck(){
	var txt1=document.getElementById("txt1");
	var txt2=document.getElementById("txt2");
	var txt3=document.getElementById("txt3");
	var str=txt1.value+'|'+txt2.value+'|'+txt3.value;
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
      document.getElementById("logincheckdiv").innerHTML=xmlhttp.responseText;
    }
  }
  xmlhttp.open("GET","checklogin.php?q="+str,true);
  xmlhttp.send();
	
}
function bidajob(){
	//var txt1=document.getElementById("txt1");
	//var txt2=document.getElementById("txt2");
	q1=txt1.value;
	q2=txt2.value
location.href="bid.php?q="+q1+"||"+q2;	
	
}
function maintain(){
	q1=txt1.value;
	q2=txt2.value
location.href="maintain.php?q="+q1+"||"+q2;	
	
}
function browsebiding(){
	q1=txt1.value;
	q2=txt2.value
location.href="browsebiding.php?q="+q1+"||"+q2;	
	
}
</script>
<link rel="shortcut icon" href="favicon.ico">
</head>
<body  onload="center()" >  
      <div  id="container">
       <form   >  <!--action="checkLogin.php" method="post"-->

		
       <div   >
	   
	    <h1 >IBEW424 Job Bidding</h1> <br />
		<img src="images/ibewlogo.png" width="50px" height="50px" />
	     <table class="logintable">
		 <tr>
		   <td>First Name</td><td><input id="txt1" type="text" name="firstName" value="Robert" /></td>
		 </tr>
		 <tr>
		   <td>Last Name</td><td><input  id="txt2"type="text"  name="lastName" value="Song" /></td>
		 </tr>
		 <tr>
		   <td>Password</td><td><input  id="txt3" type="password"  name="password" value="1234"/></td>
		 </tr>
		 <tr  >
		   <td colspan="2" align="center"><input type="button" value="Log  In"  onclick="logincheck()"   /></td>
		 </tr>
		 <tr>
		   <td colspan="2" align="center">
         <input type="button" value="Bid a Job" onclick="bidajob()">
		 <input type="button" value="Maintain"  onclick="location.href='maintain.php';">
		 <input type="button" value="Browse bidding" onclick="location.href='browsebiding.php';">   </td>
		 </tr>
         </table>
		
		 <div id="logincheckdiv" ></div>
		</div>
		<?php var_dump (gd_info()); ?>

        </form> 
   
      </div> <!-- end of container -->
</body>

</html>