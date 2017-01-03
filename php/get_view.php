<?php 
/**
 * this script loads a view and returns html code
 */
require_once('../server/class/sheetDbMapper.php');
require_once('../server/class/login.php');
require_once('../server/secure/globals.php');
$login = new Login();
if( !$login->isUserLoggedIn() ) die( '{ "access": "refused" }' );
$sheet = new SheetDbMapper(DBSERVER,DBNAME,DBUSER,DBPASSWORD);

header('Content-Type: text/plain');

$res = false;
$path = '../server/view/'.str_replace( '-', '/', $_GET['path']).'.php';

if( !file_exists( $path ) ) return NULL;
ob_start();
include( $path );
ob_get_contents();
ob_end_flush();

?>
