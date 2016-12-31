<?php 
/**
 * this script loads a view and returns html code
 */
session_start();
require_once('../server/class/sheetDbMapper.php');
require_once('../server/secure/globals.php');
$sheet = new SheetDbMapper(DBSERVER,DBNAME,DBUSER,DBPASSWORD);

$xml = simplexml_load_file( $_FILES['uploadfile']['tmp_name'] );

$eigenschaften = array(
    "Mut" => array( "eigenschaft", 1 ),
    "Klugheit" => array( "eigenschaft", 2 ),
    "Charisma" => array( "eigenschaft", 3 ),
    "Intuition" => array( "eigenschaft", 4 ),
    "Fingerfertigkeit" => array( "eigenschaft", 5 ),
    "Gewandtheit" => array( "eigenschaft", 6 ),
    "Körperkraft" => array( "eigenschaft", 7 ),
    "Konstitution" => array( "eigenschaft", 8 ),
    "Sozialstatus" => array( "eigenschaft", 10 ),
    "ini" => array( "kampf", 5 ),
    "at" => array( "kampf", 6 ),
    "pa" => array( "kampf", 7 ),
    "fk" => array( "kampf", 8 ),
    "Lebensenergie" => array( "basis", 1 ),
    "Ausdauer" => array( "basis", 2 ),
    "Astralenergie" => array( "basis", 3 ),
    "Karmaenergie" => array( "basis", 5 ),
    "Magieresistenz" => array( "basis", 4 )
);

if( !isset($xml->held['name']) ) die("OOPS");

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
        $table = $eigenschaften[(string)$eigenschaft['name']][0];
        $wert = "wert";
        if( $table == "basis" ) $wert = "kauf";
        echo "INSERT INTO held_".$table ." (" .$start.$wert
            .", modifikator, id_held, id_".$table.") VALUES(" .$startv
            .$eigenschaft['value'].", ".$eigenschaft['mod'].", ".$hero_id
            .", ".$eigenschaften[(string)$eigenschaft['name']][1].")</br>";
    }
}

?>
