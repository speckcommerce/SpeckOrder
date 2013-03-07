function toggleSearch(){
    if ($('#search').hasClass('hidden')) {
        $('#speck-order-layout .layout-inner-wrap').prepend($('#search').removeClass('hidden'));
        $('#speck-order-layout .content').removeClass('span12').addClass('span10');
    } else {
        $('#search-hide').prepend($('#search').addClass('hidden'));
        $('#speck-order-layout .content').removeClass('span10').addClass('span12');
    }
}

function toggleAddressBlockPanes(addressBlockEl) {
    $(addressBlockEl).find('.address').toggle();
    $(addressBlockEl).find('.edit').toggle();
}

function editAddress(addressBlockEl){
    orderId = addressBlockEl.data('order_id')
    data = { 'type' : addressBlockEl.data('address_type') }
    $.post("/admin/manage-order/edit-address/" + orderId, data, function(html) {
        $(addressBlockEl).find('.edit').html(html);
    })
}

$(document).ready(function() {

    $('#search-button').click(function(){
        toggleSearch();
    })

    $('.address-block .address-cancel').live('click', function() {
        block = $(this).parents('.address-block').first();
        toggleAddressBlockPanes(block);
    })

    $('.address-block').find('form').live('submit', function(e) {
        e.preventDefault();
        block = $(this).parents('.address-block').first();
        toggleAddressBlockPanes(block);
    })

    $('.address-block .edit-button').click(function(){
        block = $(this).parents('.address-block').first()
        toggleAddressBlockPanes(block);
        editAddress(block);
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
