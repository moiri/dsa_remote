<table id="sheet-table-attr" class="table table-condensed">
    <thead>
        <tr>
            <th style="visibility:hidden">Eigenschaft</th>
            <th class="small">Aktuell</th>
            <th class="small">Mod</th>
            <th class="small">Start</th>
        </tr>
    </thead>
    <tbody>
<?php
    $res = $sheet->getAttrByHeroId( $_SESSION['hero_id'] );
    foreach( $res as $attr ) {
        $css = "field-edit field-lvl";
        $wert = $attr['wert'];
        if( $attr['meta'] > 1 ) {
            $css = "";
            $wert = $attr['start'] + $attr['modifikator'];
        }
        $sign = ( $attr['modifikator'] > 0 ) ? '+' : '';
        print '
        <tr>
            <th>'.$attr['name'].'</th>
            <td class="'.$css.'">'.$wert.'</td>
            <td class="field-edit">'.$sign.$attr['modifikator'].'</td>
            <td class="field-edit">'.$attr['start'].'</td>
        </tr>
';
    }
?>
    </tbody>
</table>
