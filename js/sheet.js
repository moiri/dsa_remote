$(document).ready(function() {
    // $('button.btn-lvl').click( function () {
    //     var panel = $(this).parents('div.panel-body').first();
    //     shake( panel.parent() );
    // });
    $('button.btn-lvl').click( function () {
        var panel = $(this).parents('div.panel-body').first();
        var table = panel.children('table.table');
        var button = $(this).parent();
        $.ajax( 'php/get_view.php?path=' + table.attr('id') + '_lvl' )
            .done( function( data ) {
                if( data != "" ) {
                    table.replaceWith( data );
                    toggle_button( button );
                    $('button.btn-plus').click( function () {
                        var $val = $(this).parents('.field-edit').children('.field-val');
                        var val = parseInt( $val.text() );
                        $val.html( val + 1);
                    });
                    $('button.btn-minus').click( function () {
                        var $val = $(this).parents('.field-edit').children('.field-val');
                        var val = parseInt( $val.text() );
                        $val.html( val - 1);
                    });
                }
                else {
                    shake( panel.parent() );
                }
            });
    });
    $('button.btn-edit').click( function () {
        var panel = $(this).parents('div.panel-body').first();
        var table = panel.children('table.table');
        var button = $(this).parent();
        $.ajax( 'php/get_view.php?path=' + table.attr('id') + '_form' )
            .done( function( data ) {
                if( data != "" ) {
                    table.replaceWith( data );
                    toggle_button( button );
                }
                else {
                    shake( panel.parent() );
                }
            });
    });
    $('button.btn-ok').click( function () {
        var panel = $(this).parents('div.panel-body').first();
        shake( panel.parent() );
    });
    $('button.btn-cancel').click( function () {
        var panel = $(this).parents('div.panel-body').first();
        var table = panel.children('table.table');
        var button = $(this).parent();
        $.ajax( 'php/get_view.php?path=' + table.attr('id') )
            .done( function( data ) {
                panel.replaceWith( data );
                button.prev().show();
                button.hide();
            });
    });
});

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
