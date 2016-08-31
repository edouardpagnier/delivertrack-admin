/*
 *
 * Custom JS script for frontend behavior.
 *
 */


$(document).ready(function(){
    // Get number of active drivers to display it in the left sidebar
    var api_url = site_url+'drivers/active';
    $.get(api_url, function (data) {
        //success data
        //console.log('Active drivers: '+data);
        $('#driver_active_number').html(data[0]);
        $('#driver_inactive_number').html(data[1]);
    })
});
