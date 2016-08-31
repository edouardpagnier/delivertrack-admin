@extends('layouts.default')
@section('title')
    Map
@stop
@section('content')
    <div id="gmaps-simple" class="gmaps"></div>
@stop
@section('scripts')
    <!-- google maps api -->
    <script src="http://maps.google.com/maps/api/js?sensor=true&key=AIzaSyAU7_RRdFFptH5Mfnx1msjffWF6PUKiUeo"></script>
    <script src="{{ asset('plugins/bower_components/gmaps/gmaps.min.js') }}"></script>
    <script src="{{ asset('plugins/bower_components/gmaps/jquery.gmaps.js') }}"></script>
@stop