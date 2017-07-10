/*
	Load more content with jQuery - May 21, 2013
	(c) 2013 @ElmahdiMahmoud
*/   

$(function () {
    $("div.item").slice(0, 4).show(); // Define how many items you want to on show first time loading in slice 2nd parameter e.g '4'
    $("#loadMore").on('click', function (e) {
        e.preventDefault();
        //alert($('div').hasClass('.item').length);
        var total_elements = $('body').find("div.item").length; // gives all elements
        var visible_elements = $('body').find("div.item:visible").length+4; // gives no of visible elements // Plus 4 here to get more elements than total visible ones to hide show more button as all elements gets shown

        $("div:hidden").slice(0, 4).slideDown(); // Define how many items you want to show on loadmore in slice 2nd parameter click e.g '4'
        if ($("div:hidden").length == 0) {
            $("#load").fadeOut('slow');
        }
        $('html,body').animate({
            scrollTop: $(this).offset().top
        }, 1500);
        if (visible_elements >= total_elements)
        {
            $('#loadMore').hide();
        }
    });
});

$('a[href=#top]').click(function () {
    $('body,html').animate({
        scrollTop: 0
    }, 600);
    return false;
});

$(window).scroll(function () {
    if ($(this).scrollTop() > 50) { // Defines here if no of elements height in browser increased than 50, show back to top button
        $('.totop a').fadeIn();
    } else {
        $('.totop a').fadeOut();
    }
});