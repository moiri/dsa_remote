<?php 
/**
 * this script gets informaion from the db
 * and returns te results as json string
 */

require_once('../server/class/sheetDbMapper.php');
require_once('../server/class/login.php');
require_once('../server/secure/globals.php');
$login = new Login();
$data = false;
$res = array( 'error' => true, 'data' => $data );
if( !$login->isUserLoggedIn() ) die( json_encode($res) );

header('Content-Type: text/plain');

$sheet = new SheetDbMapper(DBSERVER,DBNAME,DBUSER,DBPASSWORD);

switch( $_GET['j'] ) {
case 'gruppen':
    $res['error'] = false;
    $data = $sheet->getGroupsGyUserId($_SESSION['user_id']);
    break;
case 'calc':
    $res['error'] = false;
    $data = array();
    switch( $_GET['calc'] ) {
        case 'MU':
            $data['AU'] = $sheet->calcValue( $_SESSION['hero_id'], 'AU' );
            $data['AT'] = $sheet->calcValue( $_SESSION['hero_id'], 'AT' );
            $data['INI'] = $sheet->calcValue( $_SESSION['hero_id'], 'INI' );
            $data['MR'] = $sheet->calcValue( $_SESSION['hero_id'], 'MR' );
            $data['AE'] = $sheet->calcValue( $_SESSION['hero_id'], 'AE' );
            break;
        case 'KL':
            $data['AE'] = $sheet->calcValue( $_SESSION['hero_id'], 'AE' );
            break;
        case 'IN':
            $data['FK'] = $sheet->calcValue( $_SESSION['hero_id'], 'FK' );
            $data['PA'] = $sheet->calcValue( $_SESSION['hero_id'], 'PA' );
            $data['INI'] = $sheet->calcValue( $_SESSION['hero_id'], 'INI' );
            $data['AE'] = $sheet->calcValue( $_SESSION['hero_id'], 'AE' );
            break;
        case 'CH':
            $data['AE'] = $sheet->calcValue( $_SESSION['hero_id'], 'AE' );
            break;
        case 'GE':
            $data['AU'] = $sheet->calcValue( $_SESSION['hero_id'], 'AU' );
            $data['AT'] = $sheet->calcValue( $_SESSION['hero_id'], 'AT' );
            $data['PA'] = $sheet->calcValue( $_SESSION['hero_id'], 'PA' );
            $data['INI'] = $sheet->calcValue( $_SESSION['hero_id'], 'INI' );
            break;
        case 'FF':
            $data['FK'] = $sheet->calcValue( $_SESSION['hero_id'], 'FK' );
            break;
        case 'KO':
            $data['LE'] = $sheet->calcValue( $_SESSION['hero_id'], 'LE' );
            $data['AU'] = $sheet->calcValue( $_SESSION['hero_id'], 'AU' );
            $data['MR'] = $sheet->calcValue( $_SESSION['hero_id'], 'MR' );
            break;
        case 'KK':
            $data['LE'] = $sheet->calcValue( $_SESSION['hero_id'], 'LE' );
            $data['AT'] = $sheet->calcValue( $_SESSION['hero_id'], 'AT' );
            $data['PA'] = $sheet->calcValue( $_SESSION['hero_id'], 'PA' );
            $data['FK'] = $sheet->calcValue( $_SESSION['hero_id'], 'FK' );
            break;
    }
    break;
default:
    ;
}

$res['data'] = $data;
print json_encode( $res );

?>
