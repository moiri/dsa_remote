<table id="sheet-table-kampf" class="table table-condensed">
    <thead>
        <tr>
            <th style="visibility:hidden">Kampf Grundwert</th>
            <th class="small field-edit-hide"></th>
            <th class="small">Aktuell</th>
            <th style="display:none" class="small field-edit-show">Mod</th>
        </tr>
    </thead>
    <tbody>
<?php
    $res = $sheet->getCombatByHeroId($_SESSION['hero_id']);
    $eig = $sheet->getAttrShortArrayByHeroId( $_SESSION['hero_id'] );
    foreach( $res as $attr ) {
        $wert = $sheet->parseFormula( $eig, $attr['wert_def'] );
        $wert += $attr['modifikator'];
        print '
        <tr>
            <th>'.$attr['name'].'</th>
            <td class="text-muted small text-right field-edit-hide">'
                .$attr['wert_def'].'</td>
            <td id="field-calc-'.$attr['short_name'].'"class="field-res">'
                .$wert.'</td>
            <td id="held_kampf-modifikator-'.$attr['id']
                .'" style="display:none" class="field-edit field-sum">'
                .$attr['modifikator'].'</td>
        </tr>
';
    }
?>
    </tbody>
</table>
