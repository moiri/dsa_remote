<?php 
/**
 * this script loads a view and returns html code
 */
session_start();
require_once('../server/class/sheetDbMapper.php');
require_once('../server/secure/globals.php');
$sheet = new SheetDbMapper(DBSERVER,DBNAME,DBUSER,DBPASSWORD);

$xml = simplexml_load_file( $_FILES['uploadfile']['tmp_name'] );

if( !isset($xml->held['name']) ) die("OOPS");

$json_s = file_get_contents( "../server/db/jar2db.json" );
$json_a = json_decode( $json_s, true );
$db_eigs = $json_a['eigenschaft'];
$db_eig = $json_a['eigenschaft-small'];
$db_ls = $json_a['ls'];
$db_bool = $json_a['bool'];
$db_talent = $json_a['talent'];
$db_zauber = $json_a['zauber'];

foreach( $xml->held as $held ) {
    echo "INSERT INTO held (id_user, name) VALUES(".$_SESSION['user_id'].", '"
        .$held['name']."')</br>";
    $hero_id = 329;
    foreach( $held->basis as $basis ) {
        $aussehen = $basis->rasse->aussehen;
        $geburtstag = $aussehen['gbtag'].". ".$aussehen['gbmonat'].". "
            .$aussehen['gbjahr'];
        $ausbildung = $basis->ausbildungen[0]->ausbildung['string'];
        $count = 0;
        foreach( $basis->ausbildungen->ausbildung as $prof ) {
            if( $count++ == 0 ) continue;
            $ausbildung = $ausbildung.", ".$prof['string'];
        }
        echo "UPDATE held SET geschlecht='".$basis->geschlecht['name']
            ."', rasse='".$basis->rasse['string']
            ."', kultur='".$basis->kultur['string']
            ."', profession='".$ausbildung
            ."', geburtsdatum='".$geburtstag
            ."', haarfarbe='".$aussehen['haarfarbe']
            ."', augenfarbe='".$aussehen['augenfarbe']
            ."', groesse='".$basis->rasse->groesse['value']
            ."', gewicht='".$basis->rasse->groesse['gewicht']
            ."' WHERE id=".$hero_id."</br>";
    }
    foreach( $held->vt->vorteil as $vorteil ) {
        $val = $vorteil['name'];
        if( isset( $vorteil['value'] ) ) $val = $val.": ".$vorteil['value'];
        echo "INSERT INTO held_vorteil (id_held, vorteil) VALUES(".$hero_id
            .", '".$val."')</br>";
    }
    foreach( $held->eigenschaften->eigenschaft as $eigenschaft ) {
        $start = "";
        $startv = "";
        if( isset($eigenschaft['startwert']) ) {
            $start = "start, ";
            $startv = $eigenschaft['startwert'].", ";
        }
        $table = $db_eigs[(string)$eigenschaft['name']][0];
        $wert = "wert";
        if( $table == "basis" ) $wert = "kauf";
        echo "INSERT INTO held_".$table ." (" .$start.$wert
            .", modifikator, id_held, id_".$table.") VALUES(" .$startv
            .$eigenschaft['value'].", ".$eigenschaft['mod'].", ".$hero_id
            .", ".$db_eigs[(string)$eigenschaft['name']][1].")</br>";
    }
    foreach( $held->talentliste->talent as $talent ) {
        echo "INSERT INTO held_talent (id_held, id_talent, wert) VALUES("
            .$hero_id.", ".$db_talent[(string)$talent['name']].", "
            .$talent['value'].");</br>";
    }
    foreach( $held->zauberliste->zauber as $zauber ) {
        echo "INSERT INTO held_zauber (id_held, id_zauber, wert, hauszauber) "
            ."VALUES(" .$hero_id.", ".$db_zauber[(string)$zauber['name']].", "
            .$zauber['value'].", ".$db_bool[(string)$zauber['hauszauber']]
            .");</br>";
    }
}

?>
