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
            <td class="field-edit">'.$vt['vorteil'].'</td>
        </tr>
';
    }
?>
    </tbody>
</table>
