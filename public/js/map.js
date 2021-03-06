
// var map;

$(document).ready(function(){


    //display default map
    var mapContainer = document.getElementById('display_map');

        // Get the screen dimensions
        if( window.innerWidth <= 320 ) {
            // alert('mobile');

            var zoom = 11;
            var lat = -40.896944;
            var lng = 173.022488;
        } 
        else if( window.innerWidth <= 360 ) {
            // alert('mobile');

            var zoom = 12;
            var lat = -40.934958;
            var lng = 173.037645;
        }
          else if( window.innerWidth <= 800 ) {
            // alert('tablet');
            var zoom = 12;
            var lat = -40.887089;
            var lng = 173.034653;
        }
         else if( window.innerWidth <= 1200 ){
            // alert('desktop');
            var zoom = 12;
            var lat = -40.905166;
            var lng = 173.021351;
        } 

        else{

            var zoom = 12;
            var lat = -40.884089;
            var lng = 173.091207;
        }



            // Set up options for the Google map
        var myOptions = {
            zoom: zoom,
            center: {lat: lat, lng: lng},
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
        // google.maps.event.addDomListener(window, "resize", function() {
        //    var center = map.getCenter();
        //    google.maps.event.trigger(map, "resize");
        //    map.setCenter(center); 
        // });

   
        $.ajax({

           // type: 'post',
           url: 'getMarkers',
           type: 'GET',

           success: function(dataFromServer){

                console.log(dataFromServer);

        

        var arrayLength = dataFromServer.markers.length;


       // var islands[]; saving islands values in this variables array
            for( var i = 0; i < arrayLength; i++ ) {

                //ganerate letlng for the position of this marker using google api
                var position = new google.maps.LatLng( dataFromServer.markers[i].latitude, dataFromServer.markers[i].longitude );

                // place the marker
                var marker = new google.maps.Marker({
                    position: position,
                    map: map,
                    icon: 'img/map-red.png',
                    animation: google.maps.Animation.DROP,
                    markerID: dataFromServer.markers[i].id,
                    locationName: dataFromServer.markers[i].locationName
                });

                google.maps.event.addListener(marker, 'click', function(){
                    
                    // -------
                    // Clear any current images
                    $('#recentItem .photos').html('');
                    $('#recentItem .recentItemTxt').html('');

                    $('#recentItem .recentItemTxt').append(this.locationName);

                    for(var i = 0; i < dataFromServer.images.length; i++) {

                        if( dataFromServer.images[i].markerLocationId == this.markerID ) {
                            //console.log('i: '+i+ ', data: '+dataFromServer.markers[i].locationName);
                            
                            //console.log(dataFromServer.images[i].locationImage);
                            $('#recentItem .photoMap .photos').append('<li><a href="#"><img alt="photo 1" width="100%" class="img-responsive show-in-modal" src="img/PhotoMap/'+dataFromServer.images[i].locationImage+'" data-toggle="modal" data-target="#userImage'+dataFromServer.images[i].photoMapId+'"></a></li>');
                           
                        }
                    }

                    // ------

                    $(".recentItem").animate({
                        right: '0'
                    });
                    $("body").css('overflow','hidden');
                });

                $("#closX").click(function(){
                    $(".recentItem").animate({
                        right: '-500px'
                    });
                    $("body").css('overflow','auto');
                });
            }

            },
            error: function(){
                console.log('cannot find php file');
            } 


        });


});














