$(document).ready(function() {

    "use strict"; // Start of use strict

    //
    var table = $('.dataTable').DataTable({
        language: {
            url: "//cdn.datatables.net/plug-ins/1.12.0/i18n/pt-BR.json"
        }
    });

    //
    $('.dataTable tbody').on('mouseenter', 'td', function () {

        var colIdx = table.cell(this).index().column;
 
        $(table.cells().nodes()).removeClass('highlight');
        $(table.column(colIdx).nodes()).addClass('highlight');

    });

});