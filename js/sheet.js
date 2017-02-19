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
        toggle_button_confirm( $button );
    });
    $('button.btn-edit').click( function () {
        var $panel = $(this).closest('div.panel-body');
        var $button = $(this).parent();
        $panel.find('.field-edit, .field-edit-show').show();
        $panel.find('.field-edit-hide').hide();
        $.each( $panel.find('td.field-edit'), function( idx, value ) {
            change_to_input( $(this) );
        });
        toggle_button_confirm( $button );
    });
    $('button.btn-ok').click( function () {
        var $panel = $(this).closest('div.panel-body');
        var $table = $panel.children('table.table');
        var $button = $(this).parent();
        var j_data = [];
        // refuse if there are errors
        if( $panel.find('.field-edit > div.has-error').length > 0 ) {
            shake( $panel.parent() );
            return;
        }
        // add successfully changed edit fields to the array
        $.each( $panel.find('.field-edit > div.has-success > input'), function() {
            var id = $(this).parent().parent().attr('id').split('-');
            j_data.push( create_hero_attr( id, $(this) ) );
        });
        // add successfully changed lvl fields to the array
        $.each( $panel.find('.field-lvl > div.has-success'), function() {
            var id = $(this).parent().attr('id').split('-');
            j_data.push( create_hero_attr( id, $(this) ) );
        });
        if( j_data.length === 0 ) {
            // nothing to change
            ajax_get_view( $table, $button, hero_attr );
        }
        else {
            // update changes in the db
            $.post( 'php/update_db.php', { 'db': j_data } )
                .done( function( data ) {
                    ajax_get_view( $table, $button, hero_attr );
                });
        }
    });
    $('button.btn-cancel').click( function () {
        var $table = $(this).closest('div.panel-body').children('table.table');
        var $button = $(this).parent();
        ajax_get_view( $table, $button, hero_attr );
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

function create_hero_attr( id, $elem ) {
    var item = {};
    item['table'] = id[0];
    item['col'] = id[1];
    if( id[2] != undefined ) item['id'] = id[2];
    if( $elem.is(':checked' ) ) $elem.val( 1 );
    item['val'] = $elem.val();
    if( item['val'] === '' ) item['val'] = $elem.text();
    return item;
}

function init_hero_attr( hero_attr, propagate ) {
    $('td[id|="hero_attr"]').each( function() {
        update_hero_attr( hero_attr, $(this), false );
    });
    if( propagate ) ajax_get_calc_vals( hero_attr, 'all' );
}

function update_hero_attr( hero_attr, $elem, propagate ) {
    var id = $elem.attr('id').split('-');
    hero_attr[id[1]] = $elem.text();
    if( propagate ) ajax_get_calc_vals( hero_attr, id[1] );
}

function update_field( $elem, s_str, d_str ) {
    var t_int = parseInt( $elem.text() );
    var s_int = parseInt( s_str );
    var d_int = parseInt( d_str );
    if( ( s_int - d_int ) == 0 ) return false;
    $elem.text( t_int + s_int - d_int );
    return true;
}

function ajax_get_calc_vals( hero_attr, attr_str ) {
    $.ajax({
        type: "POST",
        url: 'php/update_view.php?short=' + attr_str,
        data: { 'eig': hero_attr },
        dataType: 'json'
    })
    .done( function ( j_data ) {
        $.each( j_data['data'], function( id, val ) {
            var $field = $( '#field-calc-' + id );
            var $res = $field.prevAll('td.field-res').first();
            if( update_field( $res, val, $field.text() ) ) {
                $field.text( val );
                if( attr_str != 'all' ) {
                    blink( $res );
                    blink( $field );
                }
            }
        })
    });
}

function ajax_get_view( $table, $button, hero_attr ) {
    $.ajax( 'php/get_view.php?path=' + $table.attr('id') )
        .done( function( data ) {
            $table.replaceWith( data );
            toggle_button_view( $button );
            init_hero_attr( hero_attr, true );
            bind_hero_attr( hero_attr );
        });
}

function toggle_button_confirm( $button ) {
    $button.next().show();
    $button.hide();
}
function toggle_button_view( $button ) {
    $button.prev().show();
    $button.hide();
}

function shake( $elem ) {
    var delta = 3;
    var duration = 50;
    $elem.animate(
        { marginLeft: delta + "px", marginRight: -delta + "px" },
        duration,
        function() {
            $elem.animate(
                {marginLeft: -2*delta + "px", marginRight: 2*delta + "px"},
                2*duration,
                function() {
                    $elem.animate(
                        { marginLeft:"0px", marginRight:"0px" },
                        duration
                    );
                }
            );
        }
    );
}

function blink( $elem ) {
    if( !$elem.data('blink') ) {
        $elem.data( 'blink', true );
        $elem.animate(
            { backgroundColor: "#dff0d8" },
            "fast",
            function() {
                $elem.animate( { backgroundColor: "transparent" },
                    "fast",
                    function () { $elem.data( 'blink', false ); }
                );
            }
        );
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
    $val.addClass('has-success');
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
        if( ( $(this).attr('type') === 'number' )
                && isNaN( parseInt( $(this).val() ) ) ) {
            $(this).parent().addClass('has-error');
        }
        else {
            $(this).parent().removeClass('has-error');
        }
        // update final value to get a preview of the results
        if( $(this).hasClass('field-sum') ) {
            if( update_field( $res, $(this).val(), $(this).data('old_val') ) ) {
                blink( $res );
                $res.trigger('attrchanged');
            }
        }
        $(this).data( 'old_val', $(this).val() );
        $(this).parent().addClass('has-success');
    });
}
