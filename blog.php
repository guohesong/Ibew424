<html>
<head>
	<meta charset="utf-8">
	<title>Bootstrap 实例 - 如何使用字形图标（Glyphicons）</title>
	<link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css">  
	<script src="https://cdn.bootcss.com/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
   <div class="tab-content">
                        <div role="tabpanel" class="tab-panel active" id="RCAddClientGeneral">

                            <div class="row">
                                <div class="col-md-3">
                                    <label for="firstname" >昵称</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text"   id="firstname" />
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-3">
                                    <label for="email" >邮箱</label>
                                </div>
                                <div class="col-md-9">
                            <input type="text"  id="email" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="password" >Password</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text"   id="" ="password" />
                                </div>
                            </div>
                           </div>        
                        </div>
                <div class="modal-footer">
                  
 <input type="button"  class="btn btn-success " value="保存" />
 </body>
</html>
 
 <?php
 error_reporting(E_ALL);
 var_dump ($_SERVER['CONTEXT_DOCUMENT_ROOT']);
 var_dump ($_SERVER['PHP_SELF']);
 var_dump ($_SERVER['HTTP_COOKIE']);
 $str="hello world   btn-inverse";
 echo rtrim($str,'world');
 /*
保存需要打开连接/client/AddClient.php?firstname= “firstname的text值” &email= “email的text值”&“password的text值”



$sitepath=rtrim($_SERVER['DOCUMENT_ROOT'],'/');
require_once($sitepath.'/configuration.php');
require_once($sitepath.'/init.php');
$firstname=$_GET['firstname'];
$email=$_GET['email'];
$command = 'AddClient';
$postData = array(
    'firstname' => $firstname,
    'lastname' => 'default',
    'email' => $email,
    'address1' => 'default',
    'city' => 'default',
    'state' => 'default',
    'postcode' => '000000',
    'country' => 'CN',
    'phonenumber' => '000-0000-0000',
    'password2' => $password,
);
$adminUsername = 'admin'; 

$ClientInfo = localAPI($command, $postData, $adminUsername);
$dbconnect=new mysqli($db_host,$db_username,$db_password,$db_name);
if(mysqli_connect_errno()){
    printf("失:%s\n",mysqli_connect_error());
    exit();
}

$sql="insert into Resellers_ResellersClients (client_id,reseller_id,created_at) VALUES('{$ClientInfo[clientid]}','1',now())";
$ResellerAddClient=$dbconnect->query($sql);
while($ResellerAddClient){
    echo "Success";
}

这是php部分代码
*/
?>