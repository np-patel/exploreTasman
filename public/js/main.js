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

        //$('#updateEventLocation option[value='+$(this).data('id')+']').attr('selected');
        // $('[name=updateEventLocation]').val(eventLocation);

    });


    // -------


});

// var h = $('#more')[0].scrollHeight;


// $('#load').click(function(e) {
//     e.stopPropagation();
//     $('#more').animate({
//         'height': h
//     })
// });

// $(document).click(function() {
//     $('#more').animate({
//         'height': '150px'
//     })
// })

