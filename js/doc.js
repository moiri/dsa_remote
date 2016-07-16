var __PATH = 'app-doc/';

$(document).ready(function() {
    var id = 'chap';
    printDoc( 'chap', 'intro', id );
    $('[id|="toc"]').click( function( e ) {
        var path = $( this ).attr( 'id' ).split( '-' );
        printDoc( path[1], path[2], id );
    });
});
