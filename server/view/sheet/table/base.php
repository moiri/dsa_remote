<table id="sheet-table-base" class="table table-condensed">
    <thead>
        <tr>
            <th style="visibility:hidden">Basiswert</th>
            <th class="small">Aktuell</th>
            <th style="display:none" class="small field-edit-show">Mod</th>
            <th style="display:none" class="small field-edit-show"></th>
            <th style="display:none" class="small field-edit-show">Start</th>
            <th style="display:none" class="small field-edit-show field-lvl-show">Kauf</th>
            <th style="display:none" class="small field-edit-show"></th>
            <th style="display:none" class="small field-edit-show field-lvl-show">Max Kauf</th>
            <th style="display:none" class="small field-edit-show">Aktiv</th>
        </tr>
    </thead>
    <tbody>
<?php
    $res = $sheet->getBaseByHeroId($_SESSION['hero_id']);
    $eig = $sheet->getAttrShortArrayByHeroId( $_SESSION['hero_id'] );
    foreach( $res as $attr ) {
        $hide = 'style="display:none"';
        $css = '';
        $checked = "checked";
        if( $attr['aktiv'] != 1 ) {
            $checked = "";
            $css = $hide.' class="field-edit"';
        }
        $sign = ( $attr['modifikator'] > 0 ) ? '+' : '';
        $start = $sheet->parseFormula( $eig, $attr['wert_def'] );
        $wert = $start + $attr['modifikator'] + $attr['kauf'];
        $kauf_max = $sheet->parseFormula( $eig, $attr['max_kauf_def'] );
        print '
        <tr '.$css.'>
            <th>'.$attr['name'].'</th>
            <td class="field-res">'.$wert.'</td>
            <td id="held_basis-modifikator-'.$attr['id'].'" '.$hide
                .' class="field-edit field-sum">'.$sign.$attr['modifikator']
                .'</td>
            <td '.$hide.' class="field-edit field-type-text">'.$attr['wert_def'].'</td>
            <td id="field-calc-'.$attr['short_name'].'" '.$hide
                .' class="field-sum field-edit-show">'.$start.'</td>
            <td id="held_basis-kauf-'.$attr['id'].'" '.$hide
                .' class="field-edit field-lvl field-sum">'.$attr['kauf']
                .'</td>
            <td '.$hide.' class="field-edit field-type-text">'
                .$attr['max_kauf_def'].'</td>
            <td '.$hide.' class="field-edit-show field-lvl-show">'.$kauf_max.'</td>
            <td id="held_basis-aktiv-'.$attr['id'].'" '.$hide
                .' class="field-edit field-edit-show field-type-checkbox">'
                .$attr['aktiv'].'</td>
        </tr>
';
    }
?>
    </tbody>
</table>
