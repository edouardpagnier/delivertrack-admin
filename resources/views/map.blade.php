@extends('layouts.default')
@section('title')
    Map
@stop
@section('content')
    <div id="gmap" class="gmaps"></div>
@stop
@section('scripts')
    <!-- google maps api -->
    <script src="http://maps.google.com/maps/api/js?key=AIzaSyAU7_RRdFFptH5Mfnx1msjffWF6PUKiUeo"></script>
    <script src="{{ asset('plugins/bower_components/gmaps/gmaps.min.js') }}"></script>

    <!-- Libraries for maker animations -->
    <script src="{{ asset('js/jquery.easing.1.3.js') }}"></script>
    <!-- we use markerAnimate to actually animate marker -->
    <script src="{{ asset('js/markerAnimate.js') }}"></script>
    <!-- SlidingMarker hides details from you - your markers are just animated automagically -->
    <script src="{{ asset('js/SlidingMarker.min.js') }}"></script>
    <script type="text/javascript">

        var map;
        var markers = [];
        var infosWindows = new Array();

        $(document).ready(function(){
            // Adjust map height
            var page_height = $('#page-wrapper').height();

            $('#gmap').height(page_height);

            SlidingMarker.initializeGlobally();
            initialize_map();
            placeDriversOnMap();

        });

        function initialize_map() {
            var mapCenter = new google.maps.LatLng(37.7768539,-122.4231705);
            var mapOptions = {
                zoom: 13,
                center: mapCenter,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            }
            map = new google.maps.Map(document.getElementById("gmap"), mapOptions);
        }

        function placeDriversOnMap() {

            var api_url = site_url+'drivers/coordinates';

            $.get(api_url, function (data) {
                //success data
                data.forEach(function(item, index){
                    var driver_id = item.id;
                    var name = item.user.name;
                    var status_id = item.status_id;
                    var status = item.status.name;
                    var lat = parseFloat(item.current_lat);
                    var lng = parseFloat(item.current_long);
                    var latlng = {lat: lat, lng: lng};
                    addMarker(driver_id, latlng, status_id, status, name);
                });
            });
            setTimeout(updateDriversOnMap, 5000);
        }

        function updateDriversOnMap(){

            var api_url = site_url+'drivers/coordinates';

            $.get(api_url, function (data) {
                //success data
                data.forEach(function(item, index){
                    var driver_id = item.id;
                    var name = item.user.name;
                    var status_id = item.status_id;
                    var lat = parseFloat(item.current_lat);
                    var lng = parseFloat(item.current_long);
                    var latlng = {lat: lat, lng: lng};

                    if(status_id == 3){
                        markers[driver_id].setIcon("{{ asset('images/driver_map_icon.png') }}");
                        if(markers[driver_id].getMap() == null){
                            markers[driver_id].setMap(map);
                        }
                        markers[driver_id].setPosition(latlng);
                        updateInfoWindow(driver_id, status_id, name);
                    }else if(status_id == 2){
                        markers[driver_id].setIcon("{{ asset('images/driver_map_icon_inactive.png') }}");
                        if(markers[driver_id].getMap() == null){
                            markers[driver_id].setMap(map);
                        }
                        markers[driver_id].setPosition(latlng);
                        updateInfoWindow(driver_id, status_id, name);
                    }
                    else{
                        markers[driver_id].setMap(null);
                    }
                });
            });
            setTimeout(updateDriversOnMap, 5000);
        }

        // Adds a marker to the map and push to the array.
        function addMarker(driver_id, location, status_id, status, name) {
            if(status_id == 3){
                var icon = "{{ asset('images/driver_map_icon.png') }}";
                var map_add = map;
            }else if(status_id == 2){
                var icon = "{{ asset('images/driver_map_icon_inactive.png') }}";
                var map_add = map;
            }
            else{
                var icon = "{{ asset('images/driver_map_icon_inactive.png') }}";
                var map_add = null;
            }

            var marker = new google.maps.Marker({
                position: location,
                map: map_add,
                icon: icon,
                duration: 5000,
                easing: "linear"
            });

            markers[driver_id] = marker;
            // add info window
            var content = '<span class="map_driver_name">'+name+'</span><br /><span class="label driver_status'+status_id+'">'+status+'</span>';
            var infowindow = new google.maps.InfoWindow({
                content: content
            });
            infosWindows[driver_id] = infowindow;
            marker.addListener('click', function() {
                closeInfoWindows();
                infowindow.open(map, marker);
            });
        }

        function updateInfoWindow(driver_id, status_id, name){
            var content = '<span class="map_driver_name">'+name+'</span><br /><span class="label driver_status'+status_id+'">'+status+'</span>';
            infosWindows[driver_id].setContent(content);
        }

        // Close all infowindows
        function closeInfoWindows(){
            for (var i = 0; i < infosWindows.length; i++) {
                infosWindows[i].close();
            }
        }

        // Sets the map on all markers in the array.
        function setMapOnAll(map) {
            for (var i = 0; i < markers.length; i++) {
                markers[i].setMap(map);
            }
        }

        // Removes the markers from the map, but keeps them in the array.
        function clearMarkers() {
            setMapOnAll(null);
        }

        // Shows any markers currently in the array.
        function showMarkers() {
            setMapOnAll(map);
        }

        // Deletes all markers in the array by removing references to them.
        function deleteMarkers() {
            clearMarkers();
            markers = [];
        }
    </script>
@stop