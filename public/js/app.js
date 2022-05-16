$(document).ready(function() {

    "use strict"; // Start of use strict

    // Scroll to top button appear
    $(document).on('scroll', function() {

        var scrollDistance = $(this).scrollTop();
        
        if (scrollDistance > 100) {
            $('.scroll-to-top').fadeIn();
        } else {
            $('.scroll-to-top').fadeOut();
        }
    });

    // Smooth scrolling using jQuery easing
    $(document).on('click', 'a.scroll-to-top', function(e) {
        
        var $anchor = $(this);

        $('html, body').stop().animate({
                scrollTop: ($($anchor.attr('href')).offset().top)
        }, 1000, 'easeInOutExpo');
        
        e.preventDefault();

    });

    //
    $("#moreFilter").on('shown.bs.collapse', function() {
        $('#btn-service-list').text('[-] Exibir menos opções de filtro');
    });

    //
    $("#moreFilter").on('hidden.bs.collapse', function() {
        $('#btn-service-list').text('[+] Exibir mais opções de filtro');
    });

    //
    $("[data-tt=tooltip]").tooltip();

    //
    $('.btn-filter').on('click', function() {
        var $target = $(this).data('ta');
        if ($target != 'all') {
            $('.group-table .content').css('display', 'none');
            $('.group-table tr[data-st="' + $target + '"]').fadeIn('slow');
        } else {
            $('.group-table .content').css('display', 'none').fadeIn('slow');
        }
    });

});