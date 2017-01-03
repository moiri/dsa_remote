<?php
    $id_tg = 3;
    $tg = $sheet->selectByUid( 'talentgruppe', $id_tg );
?>
<table id="sheet-table-talent-handwerk" class="table table-condensed">
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
    $res = $sheet->getTalentByHeroIdGruppeId( $_SESSION['hero_id'], $id_tg );
    foreach( $res as $attr ) {
        if( $attr['wert'] == null ) $attr['wert'] = 0;
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