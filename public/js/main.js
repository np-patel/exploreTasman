// $(function() {

//     $('#login-form-link').click(function(e) {
// 		$("#login-form").delay(100).fadeIn(100);
//  		$("#register-form").fadeOut(100);
// 		$('#register-form-link').removeClass('active');
// 		$(this).addClass('active');
// 		e.preventDefault();
// 	});
// 	$('#register-form-link').click(function(e) {
// 		$("#register-form").delay(100).fadeIn(100);
//  		$("#login-form").fadeOut(100);
// 		$('#login-form-link').removeClass('active');
// 		$(this).addClass('active');
// 		e.preventDefault();
// 	});

// });

// <script>
// $(document).ready(function(){
// $("#recentItem").click(function(){
// $(".recentItem").animate({
// left: '0'
// });
// $("body").css('overflow','hidden');
// });

// $("#closX").click(function(){
// $(".recentItem").animate({
// left: '-300px'
// });
// $("body").css('overflow','auto');});
// });

// </script>

$(document).ready(function()
{
    var navItems = $('.admin-menu li > a');
    var navListItems = $('.admin-menu li');
    var allWells = $('.admin-content');
    var allWellsExceptFirst = $('.admin-content:not(:first)');
    
    allWellsExceptFirst.hide();
    navItems.click(function(e)
    {
        e.preventDefault();
        navListItems.removeClass('active');
        $(this).closest('li').addClass('active');
        
        allWells.hide();
        var target = $(this).attr('data-target-id');
        $('#' + target).show();
    });




    // --------

    $('table td a').click(function(){

        var eventName = $(this).data('event-name');

        var eventDesc = $(this).data('event-description');

        var eventId = $(this).data('event-id');

        $('#updateEventTitle').val(eventName);

        $('#updateEventDescription').val(eventDesc);

        $('#updateEventLocation option[value='+$(this).data('location-id')+']').attr('selected', 'selected');

        $("#UpdateEvent").attr("action", "/admin/updateEvent/"+eventId);

        //event delete button
        var deleteEventId = $(this).data('event-delete');
        // console.log(deleteEventId);
        $(".deleteButton").attr("href", "/admin/deleteEvent/"+deleteEventId);

        //post delete button
        var deletePostId = $(this).data('post-delete');
        // console.log(deletePostId);
        $(".deletePostButton").attr("href", "/admin/deletePost/"+deletePostId);

        //userImage delete button
        var deleteUserImageId = $(this).data('userimage-delete');
        // console.log(deleteUserImageId);
        $(".deleteUserImageButton").attr("href", "/admin/deleteUserImage/"+deleteUserImageId);


    });

    $('a').click(function(){

            // var deleteUserPost = $(this).data('userpost-delete');
            console.log('hi');
    });


});



//event collepse js
var collapsedSize = '40px';
$('.item').each(function() {
    var h = this.scrollHeight;
    console.log(h);
    var div = $(this);
    if (h > 30) {
        div.css('height', collapsedSize);
        div.after('<a id="more" class="item" href="#">Read more</a><br/>');
        var link = div.next();
        link.click(function(e) {
            e.stopPropagation();

            if (link.text() != 'Hide Text') {
                link.text('Hide Text');
                div.animate({
                    'height': h
                });

            } else {
                div.animate({
                    'height': collapsedSize
                });
                link.text('Read more');
            }

        });
    }

});

//hide alert modal on admin event page
$('.modal-header1 .close').modal('hide');

  

// $('#deleteMyEvent').click(function(){

//       var deleteEvent = $(this).data('event-id');
//       console.log(deleteEvent);
//   });
      
  // $(function() {
    // $( document ).tooltip();

  // });