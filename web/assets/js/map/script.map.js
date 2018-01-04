(function($) {
    "use strict";

    var theme = {
    	'streets_nap' : 'https://api.mapbox.com/v4/mapbox.streets/{z}/{x}/{y}.png',
        'map_nik' : 'http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',
        'de' : 'http://{s}.tile.openstreetmap.de/tiles/osmde/{z}/{x}/{y}.png',
        'france' : 'http://{s}.tile.openstreetmap.fr/osmfr/{z}/{x}/{y}.png',
        'hot' : 'http://{s}.tile.openstreetmap.fr/hot/{z}/{x}/{y}.png',
        'cycle_map' : 'http://{s}.tile.thunderforest.com/cycle/{z}/{x}/{y}.png',
        'transport' : 'http://{s}.tile.thunderforest.com/transport/{z}/{x}/{y}.png',
        'transport_drank' : 'http://{s}.tile.thunderforest.com/transport-dark/{z}/{x}/{y}.png',
        'landscape' : 'http://{s}.tile.thunderforest.com/landscape/{z}/{x}/{y}.png',
        'outdoor' : 'http://{s}.tile.thunderforest.com/outdoors/{z}/{x}/{y}.png',
        'pioneer' : 'http://{s}.tile.thunderforest.com/pioneer/{z}/{x}/{y}.png',
        'roads' : 'http://korona.geog.uni-heidelberg.de/tiles/roads/x={x}&y={y}&z={z}',
        'grayscale' : 'http://korona.geog.uni-heidelberg.de/tiles/roadsg/x={x}&y={y}&z={z}',
        'full' : 'http://{s}.tile.openstreetmap.se/hydda/full/{z}/{x}/{y}.png',
        'light' : 'https://api.mapbox.com/v4/mapbox.light/{z}/{x}/{y}.png',
        'tile' : 'https://api.mapbox.com/styles/v1/mapbox/emerald-v8/tiles/{z}/{x}/{y}',
        'back_white' : 'http://{s}.tiles.wmflabs.org/bw-mapnik/{z}/{x}/{y}.png'
    };

    var data = [
    	{
    		"latlng": [28.948892, -97.566716],
    		"icon_url": "assets/img/icon-marker-1.png",
    	},
    	{
    		"latlng": [33.457433, -92.600896],
    		"icon_url": "assets/img/icon-marker-2.png",
    		"message": "b"
    	},

    	{
    		"latlng": [27.866616, -106.179998],
    		"icon_url": "assets/img/icon-marker-3.png",
    	},

    	{
    		"latlng": [26.183394, -103.103826],
    		"icon_url": "assets/img/icon-marker-4.png",
    	},

        {
            "latlng": [30.399745, -103.587224],
            "icon_url": "assets/img/icon-marker-5.png",
        },

        {
            "latlng": [32.758040, -108.157537],
            "icon_url": "assets/img/icon-marker-6.png",
        },

        {
            "latlng": [24.874828, -105.301092],
            "icon_url": "assets/img/icon-marker-7.png",
        },

        {
            "latlng": [25.352319, -99.016912],
            "icon_url": "assets/img/icon-marker-7.png",
        },

        {
            "latlng": [31.642488, -87.327458],
            "icon_url": "assets/img/icon-marker-1.png",
        },

        {
            "latlng": [28.021902, -81.219060],
            "icon_url": "assets/img/icon-marker-3.png",
        },

        {
            "latlng": [29.981919, -92.029607],
            "icon_url": "assets/img/icon-marker-4.png",
        },

        {
            "latlng": [21.482057, -98.225896],
            "icon_url": "assets/img/icon-marker-5.png",
        },

        {
            "latlng": [28.215695, -106.619451],
            "icon_url": "assets/img/icon-marker-7.png",
        },

        {
            "latlng": [30.172060, -83.284490],
            "icon_url": "assets/img/icon-marker-7.png",
        },

        {
            "latlng": [34.151229, -101.258123],
            "icon_url": "assets/img/icon-marker-6.png",
        },

        {
            "latlng": [37.673692, -100.686834],
            "icon_url": "assets/img/icon-marker-1.png",
        },

        {
            "latlng": [31.342709, -101.038396],
            "icon_url": "assets/img/icon-marker-2.png",
        },

        {
            "latlng": [38.124491, -110.970037],
            "icon_url": "assets/img/icon-marker-3.png",
        },

        {
            "latlng": [33.859790, -86.975896],
            "icon_url": "assets/img/icon-marker-6.png",
        },

        {
            "latlng": [34.223932, -116.419256],
            "icon_url": "assets/img/icon-marker-7.png",
        },

        {
            "latlng": [30.248014, -85.393865],
            "icon_url": "assets/img/icon-marker-7.png",
        },

        {
            "latlng": [40.737562, -108.948553],
            "icon_url": "assets/img/icon-marker-7.png",
        },

        {
            "latlng": [36.799039, -102.268865],
            "icon_url": "assets/img/icon-marker-3.png",
        },

        {
            "latlng": [37.150118, -109.212224],
            "icon_url": "assets/img/icon-marker-1.png",
        },

        {
            "latlng": [22.622481, -103.323552],
            "icon_url": "assets/img/icon-marker-2.png",
        },

        {
            "latlng": [23.713296, -99.632146],
            "icon_url": "assets/img/icon-marker-1.png",
        },

        {
            "latlng": [22.784642, -102.928045],
            "icon_url": "assets/img/icon-marker-3.png",
        }
    ];

    var map;

    // Access Token Google Map Api
    L.mapbox.accessToken = 'pk.eyJ1IjoicGVydGVydHJhbiIsImEiOiJjaW1wb2pweG4wMDVzdjlra2h5cml0NmRqIn0.fK_WsLpsu0aEJicOrY1xyA';

    // Set Map
	map = L.mapbox.map('listgo-map', 'mapbox.streets', {
		  scrollWheelZoom: false,
		  maxZoom: 18,
	}).setView([26.2819421,-98.8411305], 6);

    //26.2819421,-98.8411305

	// Set Theme
	// L.tileLayer(theme.streets_nap).addTo(map);

	// Set Marker
	data.forEach(function(item) {

		var markerIcon = L.icon({
			iconUrl: item.icon_url,
			iconSize: [36, 40],
			iconAnchor: [17, 50]
		});

		var marker = L.marker(item.latlng, {icon: markerIcon}).addTo(map);

		marker.addEventListener('click', function() {

			$.ajax({
				url: 'ajax/listing-item.html',
				dataType: 'html',
			})
			.done(function(response) {
				var popup = L.popup({
					maxWidth: 400,
					className: 'wo-map-popup',
					closeOnClick: true,
					offset: [0, -50]
				})
		        .setLatLng(item.latlng)
		        .setContent(response)
		        .openOn(map);
			})
			.fail(function() {
				console.log("error");
			})
			.always(function() {
				console.log("complete");
			});
	    });

	});


	$('.searchbox-hamburger').on('click', function(event) {
		event.preventDefault();
		$(this).closest('.listgo-map-wrap').toggleClass('list-map-wrap--setting-active')
	});

})(jQuery);