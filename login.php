<?php 
error_reporting(E_ALL);
session_start(); 
?>
<html>
<head>
<title>Job biding System for Ibew 424</title>
<script src="myjs.js"></script>
<script>
window.onload=function(){
var inObj=document.getElementsByClassName("container");
//layerCenterH(inObj[0]);
//layerCenterV(inObj[0]);

}

</script>
<style>

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
      document.getElementById("logincheckdiv").innerHTML = xmlhttp.responseText;
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
<meta charset="utf-8">
    <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css">  
	<script src="https://cdn.bootcss.com/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body   >  
     <center>   <img src="../img/unionexcellence.png" width=60% height="120px"  /> </center>
	  
	  <div class="container">
	   <br /> <br />
	<div class="row clearfix"> 
	     <div class="col-md-4 column">
			 <button type="button" class="btn btn-info btn-lg btn-block" value="Bid a Job" onclick="bidajob()" >Bid a Job</button>
			 <button type="button" class="btn btn-info btn-lg btn-block" value="Maintain"  onclick="location.href='maintain.php';">Maintain</button> 
			 <button type="button" class="btn btn-info btn-lg btn-block" value="Browse bidding" onclick="location.href='browsebiding.php';">Browse bidding</button>
		</div>
		<div class="col-md-8 column">
			<form class="form-horizontal" role="form">
				<div class="form-group">
					 <label for="inputEmail3" class="col-sm-2 control-label" >First Name</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="txt1" name="firstName" value="Robert"  />
					</div>
				</div>
				<div class="form-group">
					 <label for="inputPassword3" class="col-sm-2 control-label">Last Name</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="txt2" name="lastName" value="Song" />
					</div>
				</div>
				<div class="form-group">
					 <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
					<div class="col-sm-10">
						<input type="password" class="form-control" id="txt3" name="password" value="1234" />
					</div>
				</div>
				
				<div class="form-group">
					<div class="col-sm-offset-6 col-sm-8">
						 <button type="submit" class="btn btn-default"  onclick="logincheck()" >Log  In</button>
					</div >
					
				</div>
			</form>
		
	</div>	
	</div>
</div>
	  
	  <!--
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
		
		</div>
		</div>
		<?php //var_dump (gd_info()); ?>

        </form> 
   
      </div> <!-- end of container -->

<div class="col-sm-offset-4 "  id="logincheckdiv" >good morning</div>
</body>

</html>