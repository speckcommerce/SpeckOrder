function toggleSearch(){
    if ($('#search').hasClass('hidden')) {
        $('#speck-order-layout .layout-inner-wrap').prepend($('#search').removeClass('hidden'));
        $('#speck-order-layout .content').removeClass('span12').addClass('span10');
    } else {
        $('#search-hide').prepend($('#search').addClass('hidden'));
        $('#speck-order-layout .content').removeClass('span10').addClass('span12');
    }
}

$(document).ready(function() {

    $('#search-button').click(function(){
        toggleSearch();
    })

    $('.pane-datatable').dataTable( {
       "sDom": "<'row-fluid'<'span9'l><'span3 right'f>r>t<'row-fluid footer'<'span10'i><'span2'p>>"
    } );
    $.extend( $.fn.dataTableExt.oStdClasses, {
        "sWrapper": "dataTables_wrapper form-inline"
    });

    $('.datepicker').datepicker();

    //switch the parent layout to fluid
    $('body .navbar-inner .container').removeClass('container').addClass('container-fluid');
})
