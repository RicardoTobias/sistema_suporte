$(document).ready(function() {

    // ID's - Filtro
    let filtro = "#moreFilter";

    // Funções nativas
    let show = 'shown.bs.collapse';
    let hidden = 'hidden.bs.collapse';

    //
    $(filtro).on(show, function() {
        $('#btn-service-list').text('[-] Exibir menos opções de filtro');
    });

    //
    $(filtro).on(hidden, function() {
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