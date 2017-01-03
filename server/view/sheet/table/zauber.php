<?php
    $id_tg = 11;
    $tg = $sheet->selectByUid( 'talentgruppe', $id_tg );
?>
<table id="sheet-table-talent-zauber" class="table table-condensed">
    <thead>
        <tr>
            <th><?php print $tg['name'];?></th>
            <th class="small"></th>
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
            <td class="text-muted small text-right">'
                .$attr['es1'].' / '
                .$attr['es2'].' / '
                .$attr['es3'].'</td>
            <td class="field-edit">'.$attr['wert'].'</td>
            <td class="field-edit"></td>
        </tr>
';
    }
?>
    </tbody>
</table>
