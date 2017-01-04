<?php
    $id_tg = 11;
    $tg = $sheet->selectByUid( 'talentgruppe', $id_tg );
?>
<table id="sheet-table-zauber" class="table table-condensed">
    <thead>
        <tr>
            <th><?php print $tg['name'];?></th>
            <th class="small field-edit-hide"></th>
            <th class="small">TaW</th>
            <th class="small">Spez</th>
        </tr>
    </thead>
    <tbody>
<?php
    $res = $sheet->getZauberByHeroId( $_SESSION['hero_id'] );
    foreach( $res as $attr ) {
        if( $attr['wert'] == null ) $attr['wert'] = 0;
        if( $attr['hauszauber'] == 1 )
            $attr['name'] = "<em>".$attr['name']."</em>";
        print '
        <tr>
            <th>'.$attr['name'].'</th>
            <td class="text-muted small text-right field-edit-hide">'
                .$attr['es1'].' / '
                .$attr['es2'].' / '
                .$attr['es3'].'</td>
            <td id="held_zauber-wert-'.$attr['id']
                .'" class="field-edit field-lvl">'.$attr['wert'].'</td>
            <td class="field-edit"></td>
        </tr>
';
    }
?>
    </tbody>
</table>
