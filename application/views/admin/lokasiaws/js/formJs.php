<!-- Make sure you put this AFTER Leaflet's CSS -->
<script src="https://unpkg.com/leaflet@1.3.4/dist/leaflet.js" integrity="sha512-nMMmRyTVoLYqjP9hrbed9S+FzjZHW5gY1TWCHA5ckwXZBadntCNs8kEqAWdrb9O7rxbCaA4lKTIWjDXZxflOcA=="
   crossorigin=""></script>

 <script src="<?=base_url('assets/js/leaflet-panel-layers-master/src/leaflet-panel-layers.js')?>"  ></script>
 <script src="<?=base_url('assets/js/leaflet.ajax.js')?>"></script>

   <script type="text/javascript"> 
	var latInput=document.querySelector("[name=Latitude]");
	var lngInput=document.querySelector("[name=Longitude]");
	var marker;
   	var map = L.map('map').setView([-7.2618983,112.7497418], 12);

       var Layer=L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
	    attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors',
    maxZoom: 18,
    id: 'mapbox.streets',
    accessToken: 'pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw'
});
	map.addLayer(Layer);

	var myStyle2 = {
	    "color": "#ffff00",
	    "weight": 1,
	    "opacity": 0.9
	};
	var CanvasLayer = L.GridLayer.extend({
    
});
	map.on("click",function(e){
		console.log(e.latlng)
		var Latitude=e.latlng.lat;
		var Longitude=e.latlng.lng;
		if(!marker){
			marker=L.marker(e.latlng).addTo(map);
		}
		else{
			marker.setLatLng(e.latlng);
		}
		

		latInput.value=Latitude;
		lngInput.value=Longitude;
	})
   </script>