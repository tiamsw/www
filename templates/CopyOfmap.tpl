<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
<style type="text/css">
html {
	height: 100%
}

body {
	height: 100%;
	margin: 0;
	padding: 0
}

#map-canvas {
	height: 100%
}
</style>
<script type="text/javascript"
	src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAWmJ21oU_HjdLgc8ZfPzDn92ziu_yI_bA&sensor=false">
    </script>
<script type="text/javascript">
var key = 'AIzaSyAWmJ21oU_HjdLgc8ZfPzDn92ziu_yI_bA';
    var map;
    var geocoder = new google.maps.Geocoder(); //申明地址解析对象  
      function initialize() {
        var mapOptions = {
          center: new google.maps.LatLng(52.928775,6.249504),
          zoom: 8,
          mapTypeId: google.maps.MapTypeId.ROADMAP
        };
       map = new google.maps.Map(document.getElementById("map-canvas"),
            mapOptions);

    
      }


      var map;
      var markersArray = [];

      function initialize() {
        var haightAshbury = new google.maps.LatLng(52.928775,6.249504);
        var mapOptions = {
          zoom: 12,
          center: haightAshbury,
          mapTypeId: google.maps.MapTypeId.TERRAIN
        };
        map =  new google.maps.Map(document.getElementById("map-canvas"), mapOptions);

        
      }

      function addMarker(location) {
        marker = new google.maps.Marker({
          position: location,
          map: map
        });
        markersArray.push(marker);
      }

      // Removes the overlays from the map, but keeps them in the array
      function clearOverlays() {
        if (markersArray) {
          for (i in markersArray) {
            markersArray[i].setMap(null);
          }
        }
      }

      // Shows any overlays currently in the array
      function showOverlays() {
        if (markersArray) {
          for (i in markersArray) {
            markersArray[i].setMap(map);
          }
        }
      }

      // Deletes all markers in the array by removing references to them
      function deleteOverlays() {
        if (markersArray) {
          for (i in markersArray) {
            markersArray[i].setMap(null);
          }
          markersArray.length = 0;
        }
      }
    //  google.maps.event.addDomListener(window, 'load', initialize);

      /**
      	*渲染图标
      */
      function loadMarkets(sourceArr){
   	   for(var item in sourceArr){
     		var marker = new google.maps.Marker({
        		    map:map,
        		    draggable:true,
        		    animation: google.maps.Animation.DROP,
        		    position: item.geometry.location
        	 });
   	   }
      }
      function mark(map,latLng,title){  
          if(title)  
          return new google.maps.Marker({  
              icon: this.icon,  
              position: latLng,  
              map: map,  
              title:title  
          });  
          else   
          return new google.maps.Marker({  
              //icon: this.icon,  
              position: latLng,  
              map: map  
          });  
      }  

      /**
      设置显示的地址.通过地址,获取google服务,渲染图标
      */
      function searchaddress(address){  
  	    if (geocoder) {  
  	        geocoder.geocode( { 'address': address,}, function(results, status) {  
  	            if (status == google.maps.GeocoderStatus.OK) {  
  	                if(results[0]){  
  	  	                for(var i=0;i<1;i++){
  	                    var point = results[i].geometry.location;  
  	                    map.setCenter(point);  
  	                    var marker =  mark(map,point,results[i].formatted_address);
    	               // google.maps.event.addListener(marker, 'click', toggleBounce);
  	                    }
  	                   
  	                }  
  	            } else {  
  	               // alert("Geocode was not successful for the following reason: " + status);  
  	            }  
  	        });  
  	    }
      }  

 
      /**
      *设置地图的等级
      */ 
      function setRoom(room){
          if(map){
              map.setZoom(room);
            }
      }


      /**
       * data: 传人的集合类型的数据源
      	proty: 选取的一个属性字段作为address的值
       */ 
       function loadDatas(data,proty){
           if(map){
               map.setZoom(room);
             }
       }
    </script>
</head>
<body onload="initialize()">
	<div id="map-canvas" />
</body>
</html>