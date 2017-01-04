<table id="sheet-table-nt" class="table table-condensed">
    <thead>
        <tr>
            <th>Nachteil</th>
        </tr>
    </thead>
    <tbody>
<?php
    $res = $sheet->selectByFk( 'held_nachteil', 'id_held', $_SESSION['hero_id']);
    /* if( $res == NULL ) $res = array(array( "nachteil" => "keine Nachteile" )); */
    foreach( $res as $nt ) {
    print '
        <tr>
            <td id="held_nachteil-nachteil-'.$nt['id_nachteil']
                .'" class="field-edit field-type-text">'.$nt['nachteil'].'</td>
        </tr>
';
    }
?>
    </tbody>
</table>
