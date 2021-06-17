<!-- Make sure you put this AFTER Leaflet's CSS -->
<script src="https://unpkg.com/leaflet@1.3.4/dist/leaflet.js" integrity="sha512-nMMmRyTVoLYqjP9hrbed9S+FzjZHW5gY1TWCHA5ckwXZBadntCNs8kEqAWdrb9O7rxbCaA4lKTIWjDXZxflOcA=="
   crossorigin=""></script>

 <script src="<?=base_url('assets/js/leaflet-panel-layers-master/src/leaflet-panel-layers.js')?>"  ></script>
 <script src="<?=base_url('assets/js/leaflet.ajax.js')?>"></script>
 <script src="<?=site_url('api/data/data1/point')?>"></script>
 <script src="<?=site_url('api1/data/data2/point')?>"></script>
 <script src="<?=site_url('api2/data/data3/point')?>"></script>

	<script type="text/javascript"> 
var mbUrl = 'https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw';
var mbAttr = 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
			'<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
			'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>';
var light   = L.tileLayer(mbUrl, {id: 'mapbox/light-v9', tileSize: 512, zoomOffset: -1, attribution: mbAttr});
var dark = L.tileLayer(mbUrl, {id: 'mapbox/dark-v9', tileSize: 512, zoomOffset: -1, attribution: mbAttr});
var markersLayers = new L.LayerGroup();

   	var map = L.map('map',{layers:light}).setView([-7.2758983,112.7497418], 13);
	var myStyle2 = {
	    "color": "#ffff00",
	    "weight": 1,
	    "opacity": 0.9
	};

	var baseLayers = {
	"Light": light,
	"Dark": dark
};

L.control.layers(baseLayers).addTo(map);
var kodeCuaca = {
	'0':['Cerah','clearskies.png'],
	'3':['Berawan ','mostlycloudy.png'],
	'60':['Hujan Ringan','lightrain.png'],
	'61':['Hujan Sedang','rain.png'],
	'63':['Hujan Lebat','heavyrain.png'],

};
	function getColor(d) {
		return d > 1000 ? '#800026' :
				d > 500  ? '#BD0026' :
				d > 200  ? '#E31A1C' :
				d > 100  ? '#FC4E2A' :
				d > 50   ? '#FD8D3C' :
				d > 20   ? '#FEB24C' :
				d > 10   ? '#FED976' :
							'#FFEDA0';
	}
	var iconUrl = 'assets/icons/'+kodeCuaca[63][1];
	var iconUrl1 = 'assets/icons/'+kodeCuaca[63][1];
	var iconUrl2 = 'assets/icons/'+kodeCuaca[63][1];
	var myicon = L.icon ({
		    iconUrl: iconUrl,
		    iconSize: [100, 100],
		    iconAnchor: [50, 50]
	        })
	var myicon1 = L.icon ({
		    iconUrl: iconUrl1,
		    iconSize: [100, 100],
		    iconAnchor: [50, 50]
	        })
	var myicon2= L.icon ({
		    iconUrl: iconUrl2,
		    iconSize: [100, 100],
		    iconAnchor: [50, 50]
	        })
	
	L.geoJSON(data1,{
		pointToLayer: function (feature, latlng) {
	    	console.log(feature)
	        return L.marker(latlng, {icon: myicon
		});
	    },
    	onEachFeature: function(feature,layer){
    		 if (feature.popUp && feature.popUp) {
		        layer.bindPopup(feature.popUp.popUp);
		    }
    	}
	}).addTo(map);

	L.geoJSON(data2,{
		pointToLayer: function (feature, latlng) {
	    	console.log(feature)
	        return L.marker(latlng, {icon: myicon1
	        	
	        });
	    },
    	onEachFeature: function(feature,layer){
    		 if (feature.properties && feature.properties.name) {
		        layer.bindPopup(feature.properties.popUp);
		    }
    	}
	}).addTo(map);

	L.geoJSON(data3,{
		pointToLayer: function (feature, latlng) {
	    	console.log(feature)
	        return L.marker(latlng, {icon: myicon2
	        	
	        });
	    },
    	onEachFeature: function(feature,layer){
    		 if (feature.properties && feature.properties.name) {
		        layer.bindPopup(feature.properties.popUp);
		    }
    	}
	}).addTo(map);

	var legend = L.control({position: 'bottomright'});

legend.onAdd = function (map) {

    var div = L.DomUtil.create('div', 'info legend'),
        grades = ["Cerah", "Berawan","Hujan Ringan","Hujan Sedang","Hujan Lebat"],
        labels = ["assets/icons/clearskies.png","assets/icons/mostlycloudy.png","assets/icons/lightrain.png","assets/icons/rain.png","assets/icons/heavyrain.png"];

    // loop through our density intervals and generate a label with a colored square for each interval
    for (var i = 0; i < grades.length; i++) {
        div.innerHTML +=
            grades[i] + (" <img src="+ labels[i] +" height='50' width='50'>") +'<br>';
    }

    return div;
};

legend.addTo(map);

   </script>