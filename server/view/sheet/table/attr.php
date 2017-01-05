<table id="sheet-table-attr" class="table table-condensed">
    <thead>
        <tr>
            <th style="visibility:hidden">Eigenschaft</th>
            <th class="small">Aktuell</th>
            <th style="display:none" class="small field-edit-show field-lvl-show">Wert</th>
            <th style="display:none" class="small field-edit-show">Start</th>
            <th style="display:none" class="small field-edit-show field-lvl-show">Mod</th>
        </tr>
    </thead>
    <tbody>
<?php
    $res = $sheet->getAttrByHeroId( $_SESSION['hero_id'] );
    foreach( $res as $attr ) {
        $start = '
            <td style="display:none" id="held_eigenschaft-start-'.$attr['id']
                .'" class="field-edit field-start">'.$attr['start'].'</td>';
        $css = '';
        if( $attr['meta'] > 1 ) {
            $css = '-show';
            $start = '
            <td style="display:none" class="field-edit-show"></td>';
        }
        $wert = $attr['wert'] + $attr['modifikator'];
        $sign = ( $attr['modifikator'] > 0 ) ? '+' : '';
        print '
        <tr>
            <th>'.$attr['name'].'</th>
            <td id="hero_attr-'.$attr['short_name'].'" class="field-res">'
                .$wert.'</td>
            <td style="display:none" id="held_eigenschaft-wert-'.$attr['id']
                .'" class="field-edit field-lvl'.$css.' field-sum">'
                .$attr['wert'].'</td>'
                .$start.'
            <td style="display:none" id="held_eigenschaft-modifikator-'
                .$attr['id'].'" class="field-edit field-lvl-show field-sum">'
                .$sign.$attr['modifikator'].'</td>
        </tr>
';
    }
?>
    </tbody>
</table>
