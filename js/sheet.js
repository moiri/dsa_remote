$(document).ready(function() {
    var hero_attr = [];
    $('td[id|="hero_attr"]').each( function() {
        var id = $(this).attr('id').split('-');
        hero_attr[id[1]] = $(this).text();
    });
    console.log( hero_attr );
    $('button.btn-lvl').click( function () {
        var $panel = $(this).closest('div.panel-body');
        var $button = $(this).parent();
        $panel.find('.field-lvl, .field-lvl-show').show();
        $panel.find('.field-lvl-hide').hide();
        $.each( $panel.find('td.field-lvl'), function( idx, value ) {
            change_to_lvl( $(this) );
        });
        toggle_button( $button );
    });
    $('button.btn-edit').click( function () {
        var $panel = $(this).closest('div.panel-body');
        var $button = $(this).parent();
        $panel.find('.field-edit, .field-edit-show').show();
        $panel.find('.field-edit-hide').hide();
        $.each( $panel.find('td.field-edit'), function( idx, value ) {
            change_to_input( $(this) );
        });
        toggle_button( $button );
    });
    $('button.btn-ok').click( function () {
        var $panel = $(this).closest('div.panel-body');
        var $table = $panel.children('table.table');
        var $button = $(this).parent();
        var j_data = [];
        $.each( $panel.find('.field-edit > input.changed'), function( idx, value ) {
            var id = $(this).parent().attr('id').split('-');
            var item = {};
            item['table'] = id[0];
            item['col'] = id[1];
            if( id[2] != undefined ) item['id'] = id[2];
            if( $(this).is(':checked' ) ) $(this).val( 1 );
            item['val'] = $(this).val();
            j_data.push( item );
        });
        if( j_data.length === 0 ) {
            getView( $table.attr('id'), function( data ) {
                $table.replaceWith( data );
                $button.prev().show();
                $button.hide();
            });
        }
        else {
            $.post( 'php/update_db.php', { 'db': j_data } )
                .done( getView( $table.attr('id'), function( data ) {
                    $table.replaceWith( data );
                    $button.prev().show();
                    $button.hide();
                }) );
        }

        // shake( $panel.parent() );
    });
    $('button.btn-cancel').click( function () {
        var $panel = $(this).closest('div.panel-body');
        var $table = $panel.children('table.table');
        var $button = $(this).parent();
        $.ajax( 'php/get_view.php?path=' + $table.attr('id') )
            .done( function( data ) {
                $table.replaceWith( data );
                $button.prev().show();
                $button.hide();
            });
    });
});

function getView( id, cb ) {
    $.ajax( 'php/get_view.php?path=' + id ).done( cb );
}

function toggle_button( button ) {
    button.next().show();
    button.hide();
}

function shake( elem ) {
    var delta = 3;
    var duration = 50;
    elem.animate(
        {marginLeft: delta + "px", marginRight: -delta + "px"},
        duration,
        function() {
            elem.animate(
                {marginLeft: -2*delta + "px", marginRight: 2*delta + "px"},
                2*duration,
                function() {
                    elem.animate({marginLeft:"0px", marginRight:"0px"},
                    duration);
                });
    });
}

function change_to_lvl( $elem ) {
    var val = $elem.text();
    var $div = $( '<div class="btn-group" role="group" aria-label="Left Align"></div>' );
    var $button = $( '<button type="button" class="btn btn-default btn-xs" aria-label="Left Align"></button>' )
    var $button_plus = $button;
    var $button_minus = $button.clone();
    $button_minus
        .append( '<span class="glyphicon glyphicon-minus" aria-hidden="true"></span>')
        .click( function () {
            var $val = $(this).parents('.field-edit').children('.field-val');
            var val = parseInt( $val.text() );
            $val.html( val - 1);
        });
    $button_plus
        .append( '<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>')
        .click( function () {
            var $val = $(this).parents('.field-edit').children('.field-val');
            var val = parseInt( $val.text() );
            $val.html( val + 1);
        });
    $div.append( $button_plus )
    $div.append( $button_minus );

    $elem.html( $div )
    $elem.prepend( '<span class="field-val">' + val + '</span> ' );
}

function change_to_input( $elem ) {
    var $input = $('<input type="number" class="form-control input-sm">');
    if( $elem.hasClass('field-type-text') ) $input.attr('type', 'text');
    $input.val( $elem.text() );
    if( $elem.hasClass('field-type-checkbox') ) {
        $input.attr('type', 'checkbox');
        if( $input.val() == '1' ) $input.prop('checked', true);
        $input.val( 0 );
    }
    $elem.html( $input );
    $input.on( 'input', function() {
        $input.addClass('changed');
    });
}
