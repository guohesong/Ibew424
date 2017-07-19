<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="//apps.bdimg.com/libs/bootstrap/3.3.4/css/bootstrap.min.css">
<script src="http://cdn.static.runoob.com/libs/angular.js/1.4.6/angular.min.js"></script>
<script src="mycontrol.js"></script>

<!--
<link rel="stylesheet" href="../css/bootstrap.min.css">
<script src="http://cdn.static.runoob.com/libs/angular.js/1.4.6/angular.min.js"></script>
-->
 <!--   <script src="../js/angular.min.js"></script>  -->
<!-- <script src="http://cdn.static.runoob.com/libs/angular.js/1.4.6/angular.min.js"></script>  -->
</head>
<body ng-app="myApp" ng-controller="userCtrl">

<div class="container">

<h3>Members</h3>

<table class="table table-hover table-striped">
  <thead>
    <tr>
	  
      <th>Edit</th>
	  <th><span class="glyphicon glyphicon-thumbs-up"></span>First Name</th>
      <th><span class="	glyphicon glyphicon-tree-conifer"></span>Last Name</th>
	  <th>booknumber</th>
	  <th>Title</th>
	  <th>Address</th>
	  <th>password</th>
	  <th>Bid one</th>
	  <th>Bid Two</th>
	  <th>Bid Three</th>
	  <th>Bid Four</th>
	  <th>Bid Five</th>
	  <th>Bid Six</th>
    </tr>
  </thead>
  <tbody>
    <tr ng-repeat="name in names ">
      <td>
        <button class="btn" ng-click="editUser(name.id)">  
          <span class="glyphicon glyphicon-pencil"></span>Edit
        </button>
      </td>
	   <td>{{ name.firstName }}</td>
       <td>{{ name.lastName }}</td>
	   <td>{{ name.bookNumber }}</td>
	   
      <!--
	   <td>{{ user.fName }}</td>
       <td>{{ user.lName }}</td>
	   <td>{{ user.id }}</td>
	 
	   <td>{{ name.firstName }}</td>
       <td>{{ name.lastName }}</td>
	   <td>{{ name.bookNumber }}</td>
	   <td>{{ name.degree }}</td>
	   <td>{{ name.area }}</td>
       <td>{{ name.password }}</td>
	   <td>{{ name.jobnumber1 }}</td>
	   <td>{{ name.jobnumber2 }}</td>
	   <td>{{ name.jobnumber3 }}</td>
       <td>{{ name.jobnumber4 }}</td>
	   <td>{{ name.jobnumber5 }}</td>
	   <td>{{ name.jobnumber6 }}</td>
	   -->
	 
	</tr>
  </tbody>
</table>

<hr>
<button class="btn btn-success" ng-click="editUser('new')">
<span class="glyphicon glyphicon-user"></span>Create New Member
</button>
<hr>

<h3 ng-show="edit">>Create New Member:</h3>
<h3 ng-hide="edit">Edit Member:</h3>

<form class="form-horizontal"> <!-- horizontal -->
  <div class="form-group">
    <label class="col-sm-2 control-label">First Name:</label>
    <div class="col-sm-10">
    <input type="text" ng-model="fName" ng-disabled="!edit" placeholder="First Name">
    </div>
  </div> 
  <div class="form-group">
    <label class="col-sm-2 control-label">Last Name:</label>
    <div class="col-sm-10">
    <input type="text" ng-model="lName" ng-disabled="!edit" placeholder="Last Name">
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-2 control-label">Book Number:</label>
    <div class="col-sm-10">
    <input type="password" ng-model="bookNumber" placeholder="Book Number">
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-2 control-label">password:</label>
    <div class="col-sm-10">
    <input type="password" ng-model="password" placeholder="password">
	<div class="form-group">
    <label class="col-sm-2 control-label">confirm:</label>
    <div class="col-sm-10">
    <input type="password" ng-model="passw2" placeholder="confirm">
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-2 control-label">Title:</label>
    <div class="col-sm-10">
    <input type="password" ng-model="degree" placeholder="Title">
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-2 control-label">Area:</label>
    <div class="col-sm-10">
    <input type="password" ng-model="area" placeholder="Address">
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-2 control-label">Bid One:</label>
    <div class="col-sm-10">
    <input type="password" ng-model="jobnumber1" placeholder="Job Number one">
  </div>
    </div>
	<div class="form-group">
    <label class="col-sm-2 control-label">Bid Two:</label>
    <div class="col-sm-10">
    <input type="password" ng-model="jobnumber2" placeholder="Job Number two">
  </div>
    </div>
	<div class="form-group">
    <label class="col-sm-2 control-label">Bid Three:</label>
    <div class="col-sm-10">
    <input type="password" ng-model="jobnumber3" placeholder="Job Number Three">
  </div>
    </div>
	<div class="form-group">
    <label class="col-sm-2 control-label">Bid Four:</label>
    <div class="col-sm-10">
    <input type="password" ng-model="jobnumber4" placeholder="Job Number four">
  </div>
    </div>
	<div class="form-group">
    <label class="col-sm-2 control-label">Bid Five:</label>
    <div class="col-sm-10">
    <input type="password" ng-model="jobnumber5" placeholder="Job Number five">
  </div>
    </div>
	<div class="form-group">
    <label class="col-sm-2 control-label">Bid Six:</label>
    <div class="col-sm-10">
    <input type="password" ng-model="jobnumber6" placeholder="Job Number six">
  </div>
    </div>
  </div>
</form>

<hr>
<button class="btn btn-success" ng-disabled="error || incomplete" ng-click="updateUser()" >
<span class="glyphicon glyphicon-save"></span>修改
</button>

</div>



</body>
</html>
