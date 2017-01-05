<table id="sheet-table-base" class="table table-condensed">
    <thead>
        <tr>
            <th style="visibility:hidden">Basiswert</th>
            <th class="small field-edit-hide"></th>
            <th class="small">Aktuell</th>
            <th class="small">Mod</th>
            <th class="small">Start</th>
            <th class="small">Kauf</th>
            <th class="small">Max Kauf</th>
            <th style="display:none" class="small field-edit-show">Aktiv</th>
        </tr>
    </thead>
    <tbody>
<?php
    $res = $sheet->getBaseByHeroId($_SESSION['hero_id']);
    $eig = $sheet->getAttrShortArrayByHeroId( $_SESSION['hero_id'] );
    foreach( $res as $attr ) {
        $css = "";
        $checked = "checked";
        if( $attr['aktiv'] != 1 ) {
            $checked = "";
            $css = 'style="display:none" class="field-edit-show"';
        }
        $sign = ( $attr['modifikator'] > 0 ) ? '+' : '';
        $start = $sheet->parseFormula( $eig, $attr['wert_def'] );
        $wert = $start + $attr['modifikator'] + $attr['kauf'];
        $kauf_max = $sheet->parseFormula( $eig, $attr['max_kauf_def'] );
        print '
        <tr '.$css.'>
            <th>'.$attr['name'].'</th>
            <td class="text-muted small text-right field-edit-hide">'
                .$attr['wert_def'].'</td>
            <td class="field-res">'.$wert.'</td>
            <td id="held_basis-modifikator-'.$attr['id']
                .'" class="field-edit field-sum">'.$sign.$attr['modifikator'].'</td>
            <td class="field-sum">'.$start.'</td>
            <td id="held_basis-kauf-'.$attr['id']
                .'" class="field-edit field-lvl field-sum">'.$attr['kauf'].'</td>
            <td>'.$kauf_max
                .'<span class="text-muted small pull-right">'
                .$attr['max_kauf_def'].'</span></td>
            <td id="held_basis-aktiv-'.$attr['id'].'" style="display:none" '
                .'class="field-edit field-edit-show field-type-checkbox">'
                .$attr['aktiv'].'</td>
        </tr>
';
    }
?>
    </tbody>
</table>
