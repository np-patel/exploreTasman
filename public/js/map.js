
// var map;

$(document).ready(function(){


    //display default map
    var mapContainer = document.getElementById('display_map');

            // Set up options for the Google map
        var myOptions = {
            zoom: 12,
            center: {lat: -40.884089, lng: 173.091207},
            mapTypeId: google.maps.MapTypeId.SATELLITE, // chang type of map
            mapTypeControl: false, // get rid off extra option for map type
            streetViewControl: false, // hide street view
            zoomControlOptions: true,
            zoomControlOptions: {
                style: google.maps.ZoomControlStyle.LARGE
            }
        };
        // Show the map
       var map = new google.maps.Map( mapContainer, myOptions);

        // Resize map responsive
        google.maps.event.addDomListener(window, "resize", function() {
           var center = map.getCenter();
           google.maps.event.trigger(map, "resize");
           map.setCenter(center); 
        });

   
        $.ajax({

           // type: 'post',
           url: 'getMarkers',
           type: 'GET',

           success: function(dataFromServer){

                console.log(dataFromServer);



                // console.log(dataFromServer[0].locationName);

        // var islands = [
        // [ dataFromServer[0].locationName,  dataFromServer[0].latitude, dataFromServer[0].longitude]
        // ]; //loop inside the island array to get all the location
        

        var arrayLength = dataFromServer.length;
       // var islands[]; saving islands values in this variables array
            for( var i = 0; i < arrayLength; i++ ) {

        //         var islands = [
        // [ dataFromServer[i].locationName,  dataFromServer[i].latitude, dataFromServer[i].longitude]
        // ];
                // var islands = [dataFromServer[i].latitude, dataFromServer[i].longitude];
                // console.log(islands);
            // }




        // loop through each island in the colaction and display a marker
            // for (var i = 0; i <islands.length; i++) {
                //grab the array containing info abt island
                // var island = islands[i];

                //ganerate letlng for the position of this marker using google api
                var position = new google.maps.LatLng( dataFromServer[i].latitude, dataFromServer[i].longitude );

                // place the marker
                var marker = new google.maps.Marker({
                    position: position,
                    map: map,
                    icon: 'img/map-red.png',
                    animation: google.maps.Animation.DROP
                });

                google.maps.event.addListener(marker, 'click', function(){
                    $('#markerModal').modal('show');
                });
            }

            },
            error: function(){
                console.log('cannot find php file');
            } 


        });


});














