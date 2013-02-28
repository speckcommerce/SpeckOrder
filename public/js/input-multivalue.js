$(document).ready(function(){
    $('input.multivalue').each(function() {
        console.log(this);
        $(this)
          .hide()
          .data('values', $(this).data('values').split(','))
          .parent()
          .prepend('<i class="multivalue ' + $(this).val() + '"/>');
    });
    $('label input.multivalue').parent().click(function(){
        input = $(this).find('input.multivalue');
        icon  = $(this).find('i.multivalue');
        values = input.data('values');
        for (i=0; i < values.length; i++) {
            if (values[i] == input.val()) next = (i == values.length-1) ? 0 : i+1;
            icon.removeClass(values[i]);
        }
        input.attr('value', values[next]);
        icon.addClass(values[next]);
    });
    $('label input.multivalue').parent().hover(function(){
        $(this).find('i.multivalue').addClass('hover');
    },function(){
        $(this).find('i.multivalue').removeClass('hover');
    });
})
