function orderTab(orderNum) {

    //see if pane exists, then generate
    pane = $('#' + orderNum + '.tab-pane');
    if (pane.length == 0) {
        tab  = '<li class="order-tab" data-order_number="' + orderNum + '"><a href="#' + orderNum + '" data-toggle="tab">' + orderNum + '<button class="close" type="button">×</button></a></li>'
        pane = '<div class="tab-pane" id="' + orderNum + '"></div>';
        $('#order-manager-tabs').append(tab);
        $('#order-manager-tab-containers').append(pane);
        $.post('/manage-order/' + orderNum, function(html){
            $('#' + orderNum).append(html);
        })
    }
    //switch to the tab + pane
    $('#order-manager-tabs a[href="#' + orderNum + '"]').tab('show');
}

$('document').ready(function(){

    //on click of order row, open it in a tab.
    $('table.dataTable tbody tr').live('click', function(){
        var num = $(this).find('.order_number').data('order_number');
        orderTab(num);
    });

    //close button removes order tab and pane.
    $('li.order-tab a button.close').live('click', function() {
        tab = $(this).parents('.order-tab').first()
        paneId = $(tab).data('order_number');
        $('#order-manager-tabs a[href="#order-pane"]').tab('show');  //switch to orders tab
        $(tab).remove()             //remove the tab
        $('#' + paneId).remove();   //remove the pane
    })

    $('#orders').dataTable( {
       "sDom": "<'row-fluid'<'span9'l><'span3 right'f>r>t<'row-fluid footer'<'span10'i><'span2'p>>"
    } );
    $.extend( $.fn.dataTableExt.oStdClasses, {
        "sWrapper": "dataTables_wrapper form-inline"
    } );

    //datepickers for date range on search
    $('#order_search_created_time_start').datepicker();
    $('#order_search_created_time_end').datepicker();
})
