<?php
    $id_tg = 9;
    $tg = $sheet->selectByUid( 'talentgruppe', $id_tg );
?>
<table id="sheet-table-talent-bkampf" class="table table-condensed">
    <thead>
        <tr>
            <th><?php print $tg['name'];?></th>
            <th class="small"></th>
            <th class="small">AT</th>
            <th class="small">PA</th>
            <th class="small">eBE</th>
            <th class="small">TaW</th>
            <th class="small">Spez</th>
        </tr>
    </thead>
    <tbody>
<?php
    $res = $sheet->getTalentByHeroIdGruppeId( $_SESSION['hero_id'], $id_tg );
    foreach( $res as $attr ) {
        if( $attr['wert'] == null ) $attr['wert'] = 0;
        $eBE = $attr['eBE'];
        if( $eBE == null ) $eBE = "";
        else if( $eBE == 0 ) $eBE = "BE";
        else if( $eBE > 0 ) $eBE = "x".$eBE;
        print '
        <tr>
            <th>'.$attr['name'].'</th>
            <td class="text-muted small text-right">'
                .$attr['es1'].' / '
                .$attr['es2'].' / '
                .$attr['es3'].'</td>
            <td class="field-edit"></td>
            <td class="field-edit"></td>
            <td class="field-edit">'.$eBE.'</td>
            <td class="field-edit">'.$attr['wert'].'</td>
            <td class="field-edit"></td>
        </tr>
';
    }
?>
    </tbody>
</table>
