$(document).ready(function() {
    var doc = new Doc( $( '#chap' ), 'app-doc/web/index.json' );
    doc.config.doc_path = "app-doc/";
    doc.printDoc( 'chap', 'intro' );
    doc.printToc( $( '#toc-chap' ), 'chap' );
    doc.registerSearch( $( '#query' ) );
    $('#toc-chap-intro').click( function( e ) {
        doc.printDoc( 'chap', 'intro' );
    });
});
