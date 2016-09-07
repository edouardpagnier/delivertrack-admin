/*
 *
 * Custom JS script for frontend behavior.
 *
 */


$(document).ready(function(){
    getActiveDriversNumber();
});

function getActiveDriversNumber(){
    // Get number of active and inactive drivers to display it in the left sidebar
    var api_url = site_url+'drivers/active';
    $.get(api_url, function (data) {
        //success data
        //console.log('Active drivers: '+data);
        $('#driver_active_number').html(data[0]);
        $('#driver_inactive_number').html(data[1]);
        setTimeout(getActiveDriversNumber, 10000);
    })
}

function getDateFormatted(date){
    var monthNames = [
        "Jan", "Feb", "Mar",
        "Apr", "May", "Jun", "Jul",
        "Aug", "Sep", "Oct",
        "Nov", "Dec"
    ];

    var date = new Date(date);
    var day = date.getDate();
    var monthIndex = date.getMonth();
    var year = date.getFullYear();
    var hours = date.getHours();
    hours = ("0" + hours).slice(-2);
    var minutes = date.getMinutes();

    return day+' '+monthNames[monthIndex]+' '+year+' - '+hours+':'+minutes;
}