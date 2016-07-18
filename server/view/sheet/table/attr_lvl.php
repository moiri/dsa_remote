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
                <div class="btn-group" role="group" aria-label="Left Align">
                    <button type="button" class="btn btn-default btn-minus btn-xs" aria-label="Left Align">
                        <span class="glyphicon glyphicon-minus" aria-hidden="true"></span>
                    </button>
                    <button type="button" class="btn btn-default btn-plus btn-xs" aria-label="Left Align">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </button>
                </div>
                <span class="field-val">'.$attr['wert'].'</span>
            </td>
            <td class="field-edit">'.$sign.$attr['modifikator'].'</td>
            <td class="field-edit">'.$attr['start'].'</td>
        </tr>
';
    }
?>
    </tbody>
</table>
