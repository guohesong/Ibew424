<html>
  <head>
     <script>
	 
	 function show(){
	 var objP=document.getElementById("demo");
	 var s="hello world"
	 var first='';
	 var result = new array;
	 for (var i=0;i<s.length;i++){
	     a=s.charAt(i);
		 result.push ( {a:i});
		 /*
		 if (result["a"]=='') { result["a"]=1;
		 }else{
		 result["a"] ++;
		 if  (first=='') { first=a;}
		 
		 }
		 */
		 for (i=0; i<result.length;i++){
		 if (result[i].>1) {
		    objP.innerHTML += "the letter" + results.charAt(i);
		 }
	   
		
		}
	 }
	 
	 }
	 
	 </script>
  
  
  </head>
   <body>
   <p id="demo"></p>
   <input type="button" value="click" onclick="show()">
   </body>
</html>
<?php
error_reporting(E_ALL);
$s="hello world";
$result = array();
$first = '';
for ($i=0;$i<strlen($s);$i++){
	$a=substr($s,$i,1);
	if (!isset($result[$a])) { 
	    $result[$a]=1;
		}else {
		$result[$a]++;
		if ($first=='') {$first =$a;}
		}
}	
foreach ($result as $key => $value){
	if ($value>1)
	echo "the letter " . $key . " appears " . $value . "times." . "<br />";

	
	
	
}


?>