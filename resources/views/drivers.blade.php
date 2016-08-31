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
                        <td><span class="label driver_status{{$user->driver->status_id }}">{{ $user->driver->status->name }}</span></td>
                        <td class="location">
                            @if($user->driver->current_lat != '')
                                <i class="fa fa-spin fa-cog"></i>
                            @else
                                -
                            @endif
                        </td> <!-- TO DO -->
                        <td class="lat hide">{{ $user->driver->current_lat }}</td>
                        <td class="long hide">{{ $user->driver->current_long }}</td>
                        <td>
                            @if($user->driver->updated_at != $user->driver->created_at)
                                {{ $user->driver->updated_at->format('j M Y - H:i') }}
                            @else
                                -
                            @endif
                        </td>
                        <td> - </td>
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
            // Call google map api to get location from lat and long
            $('#drivers_table tbody tr').each(function(){

                var current_location = $(this).find('.location');
                var lat = $(this).find('.lat').html();
                var long = $(this).find('.long').html();

                if(lat != '') {
                    var api_url = 'http://maps.googleapis.com/maps/api/geocode/json?latlng=' + lat + ',' + long;

                    $.get(api_url, function (data) {
                        //success data
                        //console.log('Google repsonse: '+data.results[0].address_components[2].long_name);
                        var street = data.results[0].address_components[1].long_name;
                        var district = data.results[0].address_components[2].long_name;
                        var city = data.results[0].address_components[3].long_name;
                        current_location.html(street+'<br />'+district+'<br />'+city);
                    })
                }
            });
        });
    </script>
@stop

