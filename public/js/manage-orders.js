function toggleSearch(){
    $('#search').toggleClass('hide');
    $('#search').siblings().toggleClass('span12').toggleClass('span10');
}

$('document').ready(function(){

    $('#search-button').click(function(){
        toggleSearch();
    })

    $('.pane-datatable').dataTable( {
       "sDom": "<'row-fluid'<'span9'l><'span3 right'f>r>t<'row-fluid footer'<'span10'i><'span2'p>>"
    } );
    $.extend( $.fn.dataTableExt.oStdClasses, {
        "sWrapper": "dataTables_wrapper form-inline"
    });

    //datepickers for date range on search
    $('.datepicker').datepicker();

    //switch the parent layout to fluid
    $('body .navbar-inner .container').removeClass('container').addClass('container-fluid');
})
