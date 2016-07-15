<?php 
/**
 * this script gets informaion from the db
 * and returns te results as json string
 */

session_start();
require_once('../server/class/sheetDbMapper.php');
require_once('../server/secure/globals.php');

header('Content-Type: text/plain');

$sheet = new SheetDbMapper(DBSERVER,DBNAME,DBUSER,DBPASSWORD);
$res = false;

switch( $_GET['j'] ) {
case 'gruppen':
    $res = $sheet->getGroupsGyUserId($_SESSION['user_id']);
    break;
default:
    $res['error'] = true;
    $res['val'] = -99;
}

print json_encode($res);

?>
