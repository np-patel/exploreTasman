
var map;

$(document).ready(function(){

    //display default map
    var mapContainer = document.getElementById('display_map');

            // Set up options for the Google map
        var myOptions = {
            zoom: 13,
            center: {lat: -41.293831, lng: 174.784364},
            mapTypeId: google.maps.MapTypeId.ROADMAP,
            zoomControlOptions: true,
            zoomControlOptions: {
                style: google.maps.ZoomControlStyle.LARGE
            }
        };
        // Show the map
        map = new google.maps.Map( mapContainer, myOptions);

        // Resize map responsive
        google.maps.event.addDomListener(window, "resize", function() {
           var center = map.getCenter();
           google.maps.event.trigger(map, "resize");
           map.setCenter(center); 
        });

    
    document.getElementById("submit").onclick = submitPhoto;
    // alert('form submiting');

});


function submitPhoto() {
    // var add = $('#address').val()
// alert('form submiting');
    //prepare the ajax
        $.ajax({

           type: 'post',
           url: 'app/map.php',
           data: {
            address: $('#address').val(),
            suburb: $('#suburb').val(),
            city: $('#city').val(),
            country: $('#country').val(),
            zip: $('#zip').val(),

            },
           success: function(dataFromServer){

            // console.log(dataFromServer);

            
            // console.log(dataFromServer.results[0].geometry.location.lat);
            // console.log(dataFromServer.results[0].geometry.location.lng);

            var latitude = (dataFromServer.results[0].geometry.location.lat);
            var longitude = (dataFromServer.results[0].geometry.location.lng);

            var latlngPos = new google.maps.LatLng(latitude, longitude);// center loctaion on the map

            // Pan to the given location
            map.panTo(latlngPos);

            addMarker(latlngPos, 'Default Marker', map);
        
            },
            error: function(){
                console.log('cannot find php file');
            } 


        });



    
}


function addMarker(latlng,title,map) {

    var marker = new google.maps.Marker({
        position: latlng,
        map: map,
        title: title,
        icon:'img/map-red.png',
        animation: google.maps.Animation.DROP
    });
}













