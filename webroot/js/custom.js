var Volcano = {};
jQuery(document).ready(function () {
    var id = jQuery(".main_page_content").attr("id");
    //alert(id);
    if (id && id.length > 0)
        Volcano[id]();
});
Volcano.user_login = function () {

    $('#login-form').validate({
        onkeyup: false,
        onfocusout: false,
        errorElement: 'p',
        rules:
                {
                    email: {required: true, email: true},
                    password: {required: true},
                    //rpassword: {required: true, equalTo: "#password"},
                },
        messages:
                {
                    email: {required: 'Please enter your email address', email: 'Please enter a VALID email address'},
                    password: {required: 'Please enter password'},
                    //rpassword: {required: 'Please enter confirm password'},
                }

    });
}

/*var app = angular.module('myApp', []);
app.controller('usersCtrl', function($scope, $http) {
   $http.get("customers_mysql.php")
   .then(function (response) {$scope.names = response.data.records;});
});*/

var fetch = angular.module('myapp', []);

fetch.controller('usersCtrl', ['$scope', '$http', function ($scope, $http) {
 $http({
  method: 'get',
  url: '/users/index'
 }).then(function successCallback(response) {
  // Store response data
  $scope.users = response.data;
 });
}]);