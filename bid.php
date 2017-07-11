<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
   "http://www.w3.org/TR/xhtml1/DTD/ xhtml1-transitional.dtd">
   <html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
   <head>
       <meta http-equiv="content-type" content="text/html; charset=utf-8" />
       <title>Bidding the Job!</title>
	   <style>
	   label {
		  color:green;
          font-size:18px;		  
		   
	   }
	   input {
		 color:brown;
         font-size:18px;		 
		   
	   }
	   form {
		  margin:10px 10px 10px 10px;
          padding:10px 10px 10px 10px;	  
		   
	   }
	   span {
		   font-size:150%;
		   color:#FAEBD7;
	   }
	   #result {
		   font-size:20px;
		   color:#6495ED;
		   
	   }
	   </style>
	   <script type="text/javascript">
		function bidjob() {
			var txt1=document.getElementById("txt1");
			var txt2=document.getElementById("txt2");
			var txt3=document.getElementById("txt3");
			var txt4=document.getElementById("txt4");
			var txt5=document.getElementById("txt5");
			var txt6=document.getElementById("txt6");
			var txtq1=document.getElementById("txtq1");
			var txtq2=document.getElementById("txtq2");
			var str=txt1.value + '||' + txt2.value +'||'+txt3.value +'||'+txt4.value +'||'+ 
			        txt5.value + '||' + txt6.value +'||'+ txtq1.value +'||'+ txtq2.value;
			document.getElementById("result").innerHTML=str;
	
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
      document.getElementById("result").innerHTML =xmlhttp.responseText;
    }
  }
  xmlhttp.open("GET","bid_update.php?q="+str,true);
  xmlhttp.send();

		}
		
	</script>

	   <script type="text/javascript">  
	    function clearjob(){
			var txt1=document.getElementById("txt1");
			var txt2=document.getElementById("txt2");
			var txt3=document.getElementById("txt3");
			var txt4=document.getElementById("txt4");
			var txt5=document.getElementById("txt5");
			var txt6=document.getElementById("txt6");
			txt1.value='';
			txt2.value='';
			txt3.value='';
			txt4.value='';
			txt5.value='';
			txt6.value='';
			var txtresult=document.getElementById("result");
			var d= new Date();
			txtresult.innerHTML="good job"+d.toLocaleDateString();
			return;
		}
		</script>
	
		
    </head>
    <body>
    <h2>This is IBEW 424 Job Bidding System!</h2>
	<?php
	session_start();
	//date_default_timezone_set("America/Regina");
	if (!require_once("mysqldata.php")) { die ("Can not open file mysqldata.php"); }
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
	 if (!isset($_SESSION['IBEW424']) || ($_SESSION['IBEW424'] !="member")) { 
	 echo "Please login First.";
	 echo "<a href='login.php'>login</a>";
	 exit;
	 } 
	 $q=$_GET['q'];
	 $q=explode('||',$q);
	 $q1=$q[0];
	 $q2=$q[1];
	 $data = new database;
	 $sql = "select * from bidjob where firstName='" . $q1 . "' and lastName='" . $q2 . "'";
	 $result=$data->query($sql);
	 $row=mysqli_fetch_array($result);
	 //$data->__destruct();
	?>
   <br />
   
	 <label>Address:</label> <label> <?php echo $row['area'] ?> </label> <br />
	 <label>Book Number:</label><label> <?php echo $row['bookNumber'] ?> </label> <br />
	 <label>Title:</label><label> <?php echo $row['degree'] ?> </label> <br />
	 <form  >   <!--action="bid_update.php" method="post"  -->
	 <input type="text" id="txtq1" name="q1" value="<?php echo $q1 ; ?>" hidden >
	 <input type="text" id="txtq2" name="q2" value="<?php echo $q2 ; ?>" hidden > <br />
	 <label>Job One:</label><input type="text" id="txt1" name="jobnumber1">
	 <label>Job Two:</label><input type="text" id="txt2" name="jobnumber2">
	 <label>Job Three:</label><input type="text" id="txt3" name="jobnumber3"> <br /><br />
	 <label>Job Four:</label><input type="text" id="txt4" name="jobnumber4">
	 <label>Job Five:</label><input type="text" id="txt5" name="jobnumber5">
	 <label>Job Six:&nbsp&nbsp&nbsp</label><input type="text" id="txt6" name="jobnumber6"><br /><br />
	 <label>&nbsp&nbsp&nbsp&nbsp&nbsp</label><input type="button" value="Submit" onclick="bidjob();" ><label> &nbsp&nbsp&nbsp&nbsp&nbsp</label>
	 <input type="button" value="Reset" onclick="clearjob();"> 
	 </form>
	 <p id="result"></P>
	 <script>
		
		
	   </script>
	 </body>
	 </html>
	 