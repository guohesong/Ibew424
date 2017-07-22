angular.module('myApp', []).controller('userCtrl', function($scope, $http) {
$scope.fName = '';
$scope.lName = '';
$scope.password = '';
$scope.degree = '';
$scope.area = '';
$scope.bookNumber = '';
$scope.jobnumber1 = '';
$scope.jobnumber2 = '';
$scope.jobnumber3 = '';
$scope.jobnumber4 = '';
$scope.jobnumber5 = '';
$scope.jobnumber6 = '';

$scope.users = [
{id:1, fName:'Hege', lName:"Pege" },
{id:2, fName:'Kim',  lName:"Pim" },
{id:3, fName:'Sal',  lName:"Smith" },
{id:4, fName:'Jack', lName:"Jones" },
{id:5, fName:'John', lName:"Doe" },
{id:6, fName:'Peter',lName:"Pan" }
];
$scope.edit = true;
$scope.error = false;
$scope.incomplete = false; 

$http.get("sqlex.php")
   .success(function (response) {$scope.names = response.records;});

$scope.editUser = function(id) {
  if (id == 'new') {
    $scope.edit = true;
    $scope.incomplete = true;
    $scope.fName = '';
    $scope.lName = '';
    } else {
    $scope.edit = false;
	for (var i=0;i<$scope.names.length;i++){
		if ($scope.names[i].id == id ) {
			$scope.fName = $scope.names[i].firstName;
	        $scope.lName = $scope.names[i].lastName;
            $scope.bookNumber = $scope.names[i].bookNumber;			
			$scope.password = $scope.names[i].password;
	        $scope.degree = $scope.names[i].degree; 
			$scope.area = $scope.names[i].area;
	        $scope.jobnumber1 = $scope.names[i].jobnumber1; 
			$scope.jobnumber2 = $scope.names[i].jobnumber2; 
			$scope.jobnumber3 = $scope.names[i].jobnumber3; 
			$scope.jobnumber4 = $scope.names[i].jobnumber4; 
			$scope.jobnumber5 = $scope.names[i].jobnumber5; 
			$scope.jobnumber6 = $scope.names[i].jobnumber6; 
			break;
		}
	}
	/*
	$scope.fName = $scope.users[id-1].fName;
	$scope.lName = $scope.users[id-1].lName; 
	
	
     */	

  }
};

$scope.$watch('password',function() {$scope.test();});
$scope.$watch('passw2',function() {$scope.test();});
$scope.$watch('fName', function() {$scope.test();});
$scope.$watch('lName', function() {$scope.test();});

$scope.test = function() {
  if ($scope.password !== $scope.passw2) {
    $scope.error = true;
    } else {
    $scope.error = false;
  }
  $scope.incomplete = false;
  if ($scope.edit && (!$scope.fName.length ||
  !$scope.lName.length ||
  !$scope.password.length || !$scope.passw2.length)) {
     $scope.incomplete = true;
  }
};
$scope.updateUser = function(){
	
}

});