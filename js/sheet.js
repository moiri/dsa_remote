$(document).ready(function() {
    var hero_attr = {};
    init_hero_attr( hero_attr, false );
    bind_hero_attr( hero_attr );
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
        if( $panel.find('.field-edit > div.has-error').length > 0 ) {
            shake( $panel.parent() );
            return;
        }
        $.each( $panel.find('.field-edit > div.has-success > input'), function() {
            var id = $(this).parent().parent().attr('id').split('-');
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
                init_hero_attr( hero_attr, true );
                bind_hero_attr( hero_attr );
            });
    });
});

function bind_hero_attr( hero_attr ) {
    // register event when a hero attr is changed
    $('td[id|="hero_attr"]')
        .unbind('attrchanged')
        .bind('attrchanged', function() {
            update_hero_attr( hero_attr, $(this), true );
    });
}

function init_hero_attr( hero_attr, propagate ) {
    $('td[id|="hero_attr"]').each( function() {
        update_hero_attr( hero_attr, $(this), false );
    });
    if( propagate ) post_hero_attr( hero_attr, 'all' );
}

function update_hero_attr( hero_attr, $elem, propagate ) {
    var id = $elem.attr('id').split('-');
    hero_attr[id[1]] = $elem.text();
    if( propagate ) post_hero_attr( hero_attr, id[1] );
}

function post_hero_attr( hero_attr, attr_str ) {
    $.ajax({
        type: "POST",
        url: 'php/update_view.php?short=' + attr_str,
        data: { 'eig': hero_attr },
        dataType: 'json'
    })
    .done( function ( j_data ) {
        $('td[id|="field-calc"').each( function () {
            var $res = null;
            var id = $(this).attr('id').split('-');
            var old_val = 0;
            var calc_val = j_data['data'][id[2]];
            if( calc_val != undefined ) {
                $res = $(this).prevAll('td.field-res').first();
                old_val = parseInt( $(this).text() );
                $(this).text( calc_val );
                $res.text( parseInt( $res.text() ) - old_val + calc_val );
                if( attr_str != 'all' ) {
                    blink( $res );
                    blink( $(this) );
                }
            }
        });
    });
}

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

function blink( $elem ) {
    if( !$elem.data('blink') ) {
        $elem.data( 'blink', true );
        $elem.animate({ backgroundColor: "#dff0d8" }, "fast", function() {
            $elem.animate({ backgroundColor: "transparent" }, "fast", function () {
                $elem.data( 'blink', false );
            });
        });
    }
}

function change_to_lvl( $elem ) {
    var val = $elem.text();
    var $div = $( '<div class="btn-group" role="group" aria-label="Left Align"></div>' );
    var $button = $( '<button type="button" class="btn btn-default btn-xs" aria-label="Left Align"></button>' )
    var $button_plus = $button;
    var $button_minus = $button.clone();
    $button_minus.prop( 'disabled', true );
    $button_minus
        .append( '<span class="glyphicon glyphicon-minus" aria-hidden="true"></span>')
        .click( function () {
            lvl_hero_attr( $(this), -1, parseInt( val ) );
        });
    $button_plus
        .append( '<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>')
        .click( function () {
            lvl_hero_attr( $(this), 1, parseInt( val ) );
        });
    $div.append( $button_plus )
    $div.append( $button_minus );

    $elem.html( $div )
    $elem.prepend( '<div class="field-val">' + val + '</div>' );
}

function lvl_hero_attr( $button, delta, min_val ) {
    var $elem = $button.parents('td.field-edit');
    var $res = $elem.prevAll('td.field-res').first();
    var $val = $elem.children('.field-val');
    var val = parseInt( $val.text() ) + delta;
    if( val <= min_val ) {
        $button.prop('disabled', true );
    }
    else {
        $button.next().prop('disabled', false );
    }
    $val.text( val );
    $res.text( parseInt( $res.text() ) + delta );
    $res.trigger('attrchanged');
    blink( $res );
}

function change_to_input( $elem ) {
    var $div = $('<div class="form-gruop"></div>');
    var $input = $('<input type="number" class="form-control input-sm">');
    if( $elem.hasClass('field-type-text') ) $input.attr('type', 'text');
    $input.val( $elem.text() );
    $input.data( 'old_val', $input.val() );
    if( $elem.hasClass('field-type-checkbox') ) {
        $input.attr('type', 'checkbox');
        if( $input.val() == '1' ) $input.prop('checked', true);
        $input.val( 0 );
    }
    $input.addClass( $elem.attr('class') );
    $div.append( $input );
    $elem.html( $div );
    $input.change( function() {
        var $res = $elem.prevAll('td.field-res').first();
        var old_val = parseInt( $(this).data( 'old_val' ) );
        var sum = 0;
        $(this).data( 'old_val', $(this).val() );
        if( ( $(this).attr('type') === 'number' )
                && isNaN( parseInt( $(this).val() ) ) ) {
            $(this).parent().addClass('has-error');
        }
        else {
            $(this).parent().removeClass('has-error');
        }
        if( $(this).hasClass('field-sum') ) {
            sum = parseInt( $res.text() ) + parseInt( $(this).val() ) - old_val;
            $res.text( sum );
            blink( $res );
            $res.trigger('attrchanged');
        }
        $(this).parent().addClass('has-success');
        // $input.addClass('changed');
    });
}
