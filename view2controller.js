var indexapp = angular.module('indexapp', []);
indexapp.controller('maincontroller', function($scope,$rootScope,$http) {
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
                
				 var lat = e.latLng.lat();
				var lng = e.latLng.lng();
				window.location.href = "view2json.php?lat=" + lat + "&lng="+lng
              $http.get("http://localhost/TravelEasy/view2json.php/lat=" + lat + "&lng="+lng)
  .success(function (data) {
          console.log(data);
     });
                var myCenter=new google.maps.LatLng(e.latLng.lat(),e.latLng.lng());
                var marker=new google.maps.Marker({
                position:myCenter,
                    });

                marker.setMap(map)
                var note=true;
                
            });


      
         
        }

});