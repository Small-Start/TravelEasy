var indexapp = angular.module('indexapp', []);
indexapp.controller('indexcontroller', function($scope,$rootScope,$http) {
      $scope.cordinates=[];
      $scope.hospitaldata=[];
      $scope.Latitude="";
      $scope.Longitude="";
     window.onload = function () {
           $scope.note=false;
            var mapOptions = {
                center: new google.maps.LatLng(28.6139, 77.2090),
                zoom: 14,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };
            var infoWindow = new google.maps.InfoWindow();
            var latlngbounds = new google.maps.LatLngBounds();
            var map = new google.maps.Map(document.getElementById("dvMap"), mapOptions);
            google.maps.event.addListener(map, 'click', function (e) {
                
                alert("Latitude: " + e.latLng.lat() + "\r\nLongitude: " + e.latLng.lng());
                var coordinates={
                    Latitude:e.latLng.lat(),
                    Longitude:e.latLng.lng(),

                    shelternote:prompt("Hi,What are some of shelters available nearby?"),
                    atmnote:prompt("Are,there any ATM nearby?")

                }
				 var lat = e.latLng.lat();
				var lng = e.latLng.lng();
				var shelter=coordinates.shelternote;
				var atmnote=coordinates.atmnote;
				window.location.href = "myphpfile.php?lat=" + lat + "&lng="+lng+ "&shelter="+shelter+ "&atmnote="+atmnote;
                
                $rootScope.$broadcast('note',coordinates);
                $scope.cordinates.push(coordinates);
                console.log($scope.cordinates);
                var myCenter=new google.maps.LatLng(e.latLng.lat(),e.latLng.lng());
                var marker=new google.maps.Marker({
                position:myCenter,
                    });

                marker.setMap(map)
                var note=true;
                
            });
             $http.get("http://localhost/TravelEasy/jsonview1.php")
  .success(function (hospitaldata) {
     
        $scope.hospitaldata = hospitaldata;
  console.log($scope.hospitaldata)
  console.log($scope.hospitaldata.length)
  for(var i=0;i<$scope.hospitaldata.length;i++){
    $scope.Latitude=$scope.hospitaldata[i].lat;
    $scope.Longitude=$scope.hospitaldata[i].lng;
    var myCenter=new google.maps.LatLng($scope.Latitude,$scope.Longitude);
                var marker=new google.maps.Marker({
                position:myCenter,
                    });

                marker.setMap(map)
  }

   });

      
         
        }

});