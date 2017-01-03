
<?php
    $id_tg = 4;
    $tg = $sheet->selectByUid( 'talentgruppe', $id_tg );
?>
<table id="sheet-table-talent_natur" class="table table-condensed">
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
    $res = $sheet->getTalentByHeroIdGruppeId( $_SESSION['hero_id'], $id_tg );
    foreach( $res as $attr ) {
        if( $attr['wert'] == null ) $attr['wert'] = 0;
        print '
        <tr>
            <th>'.$attr['name'].'</th>
            <td class="text-muted small text-right field-edit-hide">'
                .$attr['es1'].' / '
                .$attr['es2'].' / '
                .$attr['es3'].'</td>
            <td class="field-edit field-lvl">'.$attr['wert'].'</td>
            <td class="field-edit"></td>
        </tr>
';
    }
?>
    </tbody>
</table>
