<?php 
/**
 * this script computes all values modified by a specific eigenschaft
 * the eigenschaft in question is identified by its short name (e.g. clac=KK)
 * and transmitted via the url.
 * The eigenschfts values necessery to recompute the dependent values are
 * transmitted by the POST method as a json string { 'eig': { 'KK': 14 }, ... }
 * the result is return as a json string
 *  [ { 'error': false }, { 'data': { 'AU': 32 }, ... } ]
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

$res['error'] = false;
$data = array();
$eig = $_POST['eig'];
switch( $_GET['calc'] ) {
    case 'MU':
        $data['AU'] = $sheet->getCalcValueByHeroId( $_SESSION['hero_id'], 'AU', $eig );
        $data['AT'] = $sheet->getCalcValueByHeroId( $_SESSION['hero_id'], 'AT', $eig );
        $data['INI'] = $sheet->getCalcValueByHeroId( $_SESSION['hero_id'], 'INI', $eig );
        $data['MR'] = $sheet->getCalcValueByHeroId( $_SESSION['hero_id'], 'MR', $eig );
        $data['AE'] = $sheet->getCalcValueByHeroId( $_SESSION['hero_id'], 'AE', $eig );
        break;
    case 'KL':
        $data['AE'] = $sheet->getCalcValueByHeroId( $_SESSION['hero_id'], 'AE', $eig );
        break;
    case 'IN':
        $data['FK'] = $sheet->getCalcValueByHeroId( $_SESSION['hero_id'], 'FK', $eig );
        $data['PA'] = $sheet->getCalcValueByHeroId( $_SESSION['hero_id'], 'PA', $eig );
        $data['INI'] = $sheet->getCalcValueByHeroId( $_SESSION['hero_id'], 'INI', $eig );
        $data['AE'] = $sheet->getCalcValueByHeroId( $_SESSION['hero_id'], 'AE', $eig );
        break;
    case 'CH':
        $data['AE'] = $sheet->getCalcValueByHeroId( $_SESSION['hero_id'], 'AE', $eig );
        break;
    case 'GE':
        $data['AU'] = $sheet->getCalcValueByHeroId( $_SESSION['hero_id'], 'AU', $eig );
        $data['AT'] = $sheet->getCalcValueByHeroId( $_SESSION['hero_id'], 'AT', $eig );
        $data['PA'] = $sheet->getCalcValueByHeroId( $_SESSION['hero_id'], 'PA', $eig );
        $data['INI'] = $sheet->getCalcValueByHeroId( $_SESSION['hero_id'], 'INI', $eig );
        break;
    case 'FF':
        $data['FK'] = $sheet->getCalcValueByHeroId( $_SESSION['hero_id'], 'FK', $eig );
        break;
    case 'KO':
        $data['LE'] = $sheet->getCalcValueByHeroId( $_SESSION['hero_id'], 'LE', $eig );
        $data['AU'] = $sheet->getCalcValueByHeroId( $_SESSION['hero_id'], 'AU', $eig );
        $data['MR'] = $sheet->getCalcValueByHeroId( $_SESSION['hero_id'], 'MR', $eig );
        break;
    case 'KK':
        $data['LE'] = $sheet->getCalcValueByHeroId( $_SESSION['hero_id'], 'LE', $eig );
        $data['AT'] = $sheet->getCalcValueByHeroId( $_SESSION['hero_id'], 'AT', $eig );
        $data['PA'] = $sheet->getCalcValueByHeroId( $_SESSION['hero_id'], 'PA', $eig );
        $data['FK'] = $sheet->getCalcValueByHeroId( $_SESSION['hero_id'], 'FK', $eig );
        break;
}

$res['data'] = $data;
print json_encode( $res );

?>
