<?php
$xml = simplexml_load_file( $_FILES['uploadfile']['tmp_name'] );

if( !isset($xml->held['name']) ) die("OOPS");

$json_s = file_get_contents( "server/db/jar2db.json" );
$json_a = json_decode( $json_s, true );
$db_eigs = $json_a['eigenschaft'];
$db_eig = $json_a['eigenschaft-small'];
$db_ls = $json_a['ls'];
$db_bool = $json_a['bool'];
$db_talent = $json_a['talent'];
$db_zauber = $json_a['zauber'];

foreach( $xml->held as $held ) {
    $aussehen = $held->basis->rasse->aussehen;
    $geburtstag = $aussehen['gbtag'].". ".$aussehen['gbmonat'].". "
        .$aussehen['gbjahr'];
    $ausbildung = $held->basis->ausbildungen[0]->ausbildung['string'];
    $count = 0;
    foreach( $held->basis->ausbildungen->ausbildung as $prof ) {
        if( $count++ == 0 ) continue;
        $ausbildung = $ausbildung.", ".$prof['string'];
    }
    $hero_id = $sheet2->insert( "held", array(
        'id_user' => $_SESSION['user_id'],
        'name' => $held['name'],
        'geschlecht' => $held->basis->geschlecht['name'],
        'rasse' => $held->basis->rasse['string'],
        'kultur' => $held->basis->kultur['string'],
        'profession' => $ausbildung,
        'geburtsdatum' => $geburtstag,
        'haarfarbe' => $aussehen['haarfarbe'],
        'augenfarbe' => $aussehen['augenfarbe'],
        'groesse' => $held->basis->rasse->groesse['value'],
        'gewicht' => $held->basis->rasse->groesse['gewicht']
    ) );
    foreach( $held->vt->vorteil as $vorteil ) {
        $val = $vorteil['name'];
        if( isset( $vorteil['value'] ) ) $val = $val.": ".$vorteil['value'];
        $sheet2->insert( "held_vorteil", array(
            "id_held" => $hero_id,
            "vorteil" => $val
        ) );
    }
    foreach( $held->eigenschaften->eigenschaft as $eigenschaft ) {
        $table = $db_eigs[(string)$eigenschaft['name']][0];
        $data = array(
            'id_held' => $hero_id,
            'id_'.$table => $db_eigs[(string)$eigenschaft['name']][1]
        );
        foreach( $db_eigs[(string)$eigenschaft['name']][2] as $i_db => $o_db ) {
            $data[$o_db] = $eigenschaft[$i_db];
        }
        $sheet2->insert( "held_".$table, $data );
    }
    $data = array(
        'id_held' => $hero_id,
        'id_eigenschaft' => 9,
        'wert' => 8,
        'modifikator' => 0,
        'start' => 8
    );
    $sheet2->insert( "held_eigenschaft", $data );
    foreach( $held->talentliste->talent as $talent ) {
        $sheet2->insert( "held_talent", array(
            'id_held' => $hero_id,
            'id_talent' => $db_talent[(string)$talent['name']],
            'wert' => $talent['value']
        ) );
    }
    foreach( $held->zauberliste->zauber as $zauber ) {
        $sheet2->insert( "held_zauber", array(
            'id_held' => $hero_id,
            'id_zauber' => $db_zauber[(string)$zauber['name']],
            'wert' => $zauber['value'],
            'hauszauber' => $db_bool[(string)$zauber['hauszauber']]
        ) );
    }
}

?>
