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
window.onload=function(){
var inObj=document.getElementsByClassName("container");
layerCenterH(inObj[0]);
layerCenterV(inObj[0]);

}

</script>
<style>
.container {
	background-image:url("images/lrock011.jpg");
	background-repeat:repeat;
	font-family: Times, TimesNR;
	font-variant:small-caps;
	font-weight:900;
	width: 500px;
	height:400px;
	position:absolute;
	color:green;
	padding:15px 15px 15px 15px;
}

}
.logintable {
	width:400px;
	//color:green;
	//background:#666;
	font-size:20px;
	padding:10px;
	//border:1;
}

table .ttd {
	color:green;
	//text-align:center;
}
#formdiv {
	float:left;
}
h1 {
	outline:#00ff00 dotted thick;
}
input  {
	padding:10px;
	color:green;
	background:#339999;
	text-align:center;
	width:200px;
}
.btncmd {
	width:150px;
	
}
input [type="button"] {
	text-align:center;
	
}
.responsive {
	display : inline block;
//	height :auto;
	//width: 100%;
	
}
img {
	float:left;
	width:50px;
	height:50px;
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
<body   >  
      <div  class="container">
       <form   > 
       <div   >
	    <br />
		
		  <div id="formdiv" >
	     <table class="logintable" border=1 >
		 <tr colspan=2 align="center">
		   <h1 >IBEW424 Job Bidding</h1>
		 </tr>
		 <tr>
		   <td><span class="ttd" align="center">First Name</span></td><td><input id="txt1" type="text" name="firstName" value="Robert" /></td>
		 </tr>
		 <tr>
		   <td><span class="ttd">Last Name</span></td><td><input  id="txt2"type="text"  name="lastName" value="Song" /></td>
		 </tr>
		 <tr>
		   <td><span class="ttd">Password</span></td><td><input  id="txt3" type="password"  name="password" value="1234"/></td>
		 </tr>
		 <tr  >
		   <td colspan="2" align="center"><img src="images/ibewlogo.png" class="responsive"/><input type="button" class="btncmd" value="Log  In"  onclick="logincheck()"  /></td>
		 </tr>
		 <tr>
		   <td colspan="2" align="center">
         <input type="button" class="btncmd" value="Bid a Job" onclick="bidajob()">
		 <input type="button" class="btncmd" value="Maintain"  onclick="location.href='maintain.php';">
		 <input type="button" class="btncmd" value="Browse bidding" onclick="location.href='browsebiding.php';">   </td>
		 </tr>
         </table>
		
		 <div id="logincheckdiv" ></div></div>
		</div>
		<?php //var_dump (gd_info()); ?>

        </form> 
   
      </div> <!-- end of container -->
<table  cellspacing=1 border=5 >
<tr >
  <th bgcolor="#a69abd">Name</th>
  <th colspan="2">Telephone</th>
</tr>
<tr>
  <td bgcolor="#a69abd" >Bill Gates</td>
  <td width="100" align="center">555 77 854</td>
  <td>555 77 855</td>
</tr>
</table>

<h4>单元格跨两列:</h4>
<table border="1">
<tr>
  <th>First Name:</th>
  <td>Bill Gates</td>
</tr>
<tr>
  <th rowspan="2">Telephone:</th>
  <td>555 77 854</td>
</tr>
<tr>
  <td>555 77 855</td>
</tr>
</table>
</body>

</html>