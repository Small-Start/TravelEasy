(function(){
	'use strict';
	var indexapp=angular.module('indexapp')
	indexapp.controller('maincontroller',function($scope){
         
});
		indexapp.directive('map',map);
	/* this directive is used for creation of showcase using chromatic zoom function */
	
	function map(){
		var directive={
			restrict:'EA',
			link:link,
		};
		return directive;
		function link(scope,element,attrs){
			    window.onload = function () {
            var mapOptions = {
                center: new google.maps.LatLng(18.9300, 72.8200),
                zoom: 14,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };
            var infoWindow = new google.maps.InfoWindow();
            var latlngbounds = new google.maps.LatLngBounds();
            var map = new google.maps.Map(document.getElementById("dvMap"), mapOptions);
            google.maps.event.addListener(map, 'click', function (e) {
                alert("Latitude: " + e.latLng.lat() + "\r\nLongitude: " + e.latLng.lng());
            });
        }
		}
	}

})();