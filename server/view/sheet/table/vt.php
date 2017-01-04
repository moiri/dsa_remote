<table id="sheet-table-vt" class="table table-condensed">
    <thead>
        <tr>
            <th>Vorteil</th>
        </tr>
    </thead>
    <tbody>
<?php
    $res = $sheet->selectByFk( 'held_vorteil', 'id_held', $_SESSION['hero_id']);
    if( $res == NULL ) $res = array(array( "vorteil" => "keine Vorteile" ));
    foreach( $res as $vt ) {
    print '
        <tr>
            <td id="held_vorteil-vorteil-'.$vt['id_vorteil']
                .'" class="field-edit field-type-text">'.$vt['vorteil'].'</td>
        </tr>
';
    }
?>
    </tbody>
</table>
