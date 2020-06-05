'use strict';

app.controller('addCtrl', ['$scope', 'memberService', '$location', function($scope, memberService, $location){
	$scope.error = false;
	//add member
	$scope.add = function(){
		var addcustomer = memberService.create($scope.customer);
		addcustomer.then(function(response){
			if(response.data.error){
				$scope.error = true;
				$scope.message = response.data.message;
			}
			else{
				console.log(response);
				$location.path('home');
			}
		});
	}

}]); 

/*var app = angular.module('myApp',[]);
    app.controller('customerController',function($scope,$http){	
    $scope.insertData=function(){		
    $http.post("add.php", {
		'cID':$scope.cID,
		'cpasword':$scope.cpassword,
		'cfullname':$scope.bprice,
		'cphone':$scope.cphone,
		'cemail':$scope.cemail})
    
    .success(function(data,status,headers,config){
    console.log("Data Inserted Successfully");
    });
        }
		 });*/
		 
		