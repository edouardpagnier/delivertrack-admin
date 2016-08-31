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
                    <th>Latitude</th>
                    <th>Longitude</th>
                    <th>Last contact</th>
                    <th>Notification</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td><span class="label driver_status{{$user->driver->status_id }}">{{ $user->driver->status->name }}</span></td>
                        <td> - </td> <!-- TO DO -->
                        <td>{{ $user->driver->current_lat }}</td>
                        <td>{{ $user->driver->current_long }}</td>
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
    <script src="{{ url('js/scripts.js') }}"></script>
    <script src="{{ url('plugins/bower_components/datatables/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('#drivers_table').DataTable();
            $('#drivers_table thead th:last-child').addClass('clear_after');
        });
    </script>
@stop

