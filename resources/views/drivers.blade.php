@extends('layouts.default')
@section('title')
    Drivers
@stop
@section('breadcrumb')
    <li>Dashboard</li>
    <li class="active">Drivers</li>
@stop
@section('content')
    <div class="col-md-12">
        <div class="white-box">
            <table class="table dataTable" id="drivers_table">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Status</th>
                    <th>Current location</th>
                    <th class="hide">Latitude</th>
                    <th class="hide">Longitude</th>
                    <th>Last contact</th>
                    <th>Notification</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td id="driver_status_{{$user->driver->id }}"><span class="label driver_status{{$user->driver->status_id }}">{{ $user->driver->status->name }}</span></td>
                        <td id="driver_location_{{$user->driver->id }}" class="location">
                            @if($user->driver->current_lat != '')
                                <i class="fa fa-spin fa-cog"></i>
                            @else
                                -
                            @endif
                        </td> <!-- TO DO -->
                        <td id="driver_lat_{{$user->driver->id }}" class="lat hide">{{ $user->driver->current_lat }}</td>
                        <td id="driver_lng_{{$user->driver->id }}" class="lng hide">{{ $user->driver->current_long }}</td>
                        <td id ="driver_update_{{$user->driver->id }}">
                            @if($user->driver->updated_at != $user->driver->created_at)
                                {{ $user->driver->updated_at->format('j M Y - H:i') }}
                            @else
                                -
                            @endif
                        </td>
                        <td> - </td>
                        <span class="hide" id="driver_update_timestamp_{{$user->driver->id }}">{{ $user->driver->updated_at }}</span>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop
@section('scripts')
    <!--
    <script src="{{ url('plugins/bower_components/sweetalert/sweetalert.min.js') }}"></script>
    <script src="{{ url('plugins/bower_components/sweetalert/jquery.sweet-alert.custom.js') }}"></script>
    -->
    <script src="{{ url('plugins/bower_components/datatables/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('#drivers_table').DataTable();
            $('#drivers_table thead th:last-child').addClass('clear_after');
        });

        $(document).ready(function(){

            var drivers_line = $('#drivers_table tbody tr');
            drivers_line.each(function(){
                var lat = $(this).find('.lat').html();
                var lng = $(this).find('.lng').html();
                var address_item = $(this).find('.location');
                if(lat != '') {
                    getAddressFromLatLng(lat, lng, address_item);
                }
            });

            setTimeout(updateDriversDetails, 10000);
        });

        /*
         * Get driver details using Ajax and update the view
         */
        function updateDriversDetails(){
            // Get drivers details to refresh data on drivers view
            var api_url = site_url+'drivers/details';
            $.get(api_url, function (drivers) {
                //success data
                drivers.forEach(function(driver, index){
                    var previous_timestamp = $('#driver_update_timestamp_' + driver.id).html();
                    var current_timestamp = driver.updated_at;
                    if(previous_timestamp != current_timestamp) {

                        $('#driver_status_' + driver.id).html('<span class="label driver_status' + driver.status_id + '">' + driver.status.name + '</span>');
                        if (driver.created_at != driver.updated_at) {
                            $('#driver_update_' + driver.id).html(getDateFormatted(driver.updated_at));
                        }

                        if (driver.current_lat != null) {
                            var address_item = $('#driver_location_' + driver.id);
                            var address = getAddressFromLatLng(driver.current_lat, driver.current_long, address_item);
                        }
                        else {
                            $('#driver_location_' + driver.id).html('-');
                        }
                    }
                });
                setTimeout(updateDriversDetails, 10000);
            })
        }

        /*
         * Get address from lat and lng using Google Api and display it in the address_item
         */
        function getAddressFromLatLng(lat, lng, address_item){
            var api_url = 'http://maps.googleapis.com/maps/api/geocode/json?latlng=' + lat + ',' + lng;
            var address = '';
            $.get(api_url, function (data) {
                //success data
                //console.log('Google repsonse: '+data.results[0].address_components[2].long_name);
                var number = data.results[0].address_components[0].long_name;
                var street = data.results[0].address_components[1].long_name;
                var district = data.results[0].address_components[2].long_name;
                var city = data.results[0].address_components[3].long_name;
                address = street+'<br />'+district+'<br />'+city;
                address_item.html(number+' '+street+'<br />'+district+'<br />'+city);
                //console.log('Ad: '+address);
            });
        }
    </script>
@stop

