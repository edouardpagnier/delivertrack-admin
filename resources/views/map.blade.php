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
    <!-- <script src="{{ asset('plugins/bower_components/gmaps/jquery.gmaps.js') }}"></script> -->
    <script type="text/javascript">
        $(document).ready(function(){
            // Adjust map height
            var page_height = $('#page-wrapper').height();

            var map;
            var markers = [];

            $('#gmap').height(page_height);

            /*map = new GMaps({
                el: '#gmap',
                lat: 37.7768539,
                lng: -122.4231705,
                zoom : 13,
                panControl : false,
                streetViewControl : false,
                mapTypeControl: false,
                overviewMapControl: false
            });*/

            initialize_map();
            placeDriversOnMap();


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
                //var haightAshbury = {lat: 37.769, lng: -122.446};

                $.get(api_url, function (data) {
                    //success data
                    data.forEach(function(item, index){
                        var name = '';
                        var status_id = item.status_id;
                        var lat = parseFloat(item.current_lat);
                        var lng = parseFloat(item.current_long);
                        var latlng = {lat: lat, lng: lng};
                        addMarker(latlng, status_id, name);
                    });
                });

                //marker = new google.maps.Marker({position: myLatLng, map: map, icon: image});
                //marker.setMap(map);
            }

            // Adds a marker to the map and push to the array.
            function addMarker(location, status_id, name) {
                if(status_id == 3){
                    var icon = "{{ asset('images/driver_map_icon.png') }}";
                }
                else{
                    var icon = "{{ asset('images/driver_map_icon_inactive.png') }}";
                }
                var marker = new google.maps.Marker({
                    position: location,
                    map: map,
                    icon: icon
                });
                markers.push(marker);
                // add info window
                var content = name;
                var infowindow = new google.maps.InfoWindow({
                    content: content
                });
                marker.addListener('click', function() {
                    infowindow.open(map, marker);
                });
            }

            // create info window content
            //function

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

        });
    </script>
@stop