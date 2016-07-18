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
    $res = $sheet->getAttrByHeroId($_SESSION['hero_id']);
    foreach( $res as $attr ) {
        $sign = ( $attr['modifikator'] > 0 ) ? '+' : '';
        print '
        <tr>
            <th>'.$attr['name'].'</th>
            <td class="field-edit">
                <input type="number" class="form-control input-sm" value="'.$attr['wert'].'">
            </td>
            <td class="field-edit">
                <input type="number" class="form-control input-sm" value="'.$attr['modifikator'].'">
            </td>
            <td class="field-edit">
                <input type="number" class="form-control input-sm" value="'.$attr['start'].'">
            </td>
        </tr>
';
    }
?>
    </tbody>
</table>
