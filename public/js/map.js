
// var map;

$(document).ready(function(){


    //display default map
    var mapContainer = document.getElementById('display_map');

            // Set up options for the Google map
        var myOptions = {
            zoom: 12,
            center: {lat: -40.884089, lng: 173.091207},
            mapTypeId: google.maps.MapTypeId.ROADMAP,
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

                for( var i = 0; i < dataFromServer.length; i++ ) {

                    var data = dataFromServer[i];

                //       var islands = [
                //         [ data.locationName, data.latitude, data.longitude]
        
                //     ];
                    console.log(data.locationName, data.latitude, data.longitude);
                }

                // console.log(dataFromServer[0].locationName);

        var islands = [
        [ dataFromServer[0].locationName,  dataFromServer[0].latitude, dataFromServer[0].longitude]
        ]; //loop inside the island array to get all the location
        

        // loop through each island in the colaction and display a marker
    for (var i = 0; i <islands.length; i++) {
        //grab the array containing info abt island
        var island = islands[i];

        //ganerate letlng for the position of this marker using google api
        var position = new google.maps.LatLng( island[1], island[2] );

        // place the marker
        var marker = new google.maps.Marker({
            position: position,
            map: map,
            icon: 'img/map-red.png',
            animation: google.maps.Animation.DROP
        });
    }

            },
            error: function(){
                console.log('cannot find php file');
            } 


        });





    // var islands = [
    //     [ 'somes Island',       -41.258274, 174.865429],
    //     [ 'Taputeranga Island', -41.349634, 174.773346],
    //     [ 'Mana Island',        -41.088960, 174.780231]
    // ];

    // var image = 'flag.png';// adding costome icon image

    // loop through each island in the colaction and display a marker
    // for (var i = 0; i <islands.length; i++) {
    //     //grab the array containing info abt island
    //     var island = islands[i];

    //     //ganerate letlng for the position of this marker using google api
    //     var position = new google.maps.LatLng( island[1], island[2] );

    //     // place the marker
    //     var marker = new google.maps.Marker({
    //         position: position,
    //         map: map,
    //         icon: 'img/map-red.png',
    //         animation: google.maps.Animation.DROP
    //     });
    // }


});














