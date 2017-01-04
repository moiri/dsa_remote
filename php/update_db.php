<?php 
/**
 * this script updates db content
 */
require_once('../server/class/sheetDbMapper.php');
require_once('../server/class/login.php');
require_once('../server/secure/globals.php');
$login = new Login();
if( !$login->isUserLoggedIn() ) die( '{ "access": "refused" }' );
$sheet2 = new SheetDbMapper(DBSERVER,DBNAME,DBUSER2,DBPASSWORD2);

foreach( $_POST['db'] as $item ) {
    $data = array( $item['col'] => $item['val'] );
    if( isset( $item['id']) )
        $sheet2->updateByHidFk( $item['table'], $data, $_SESSION['hero_id'],
            $item['id'] );
    else
        $sheet2->updateByUid( $item['table'], $data, $_SESSION['hero_id'] );
}
?>
