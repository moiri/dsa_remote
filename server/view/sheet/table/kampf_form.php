<table id="sheet-table-kampf" class="table table-condensed">
    <thead>
        <tr>
            <th style="visibility:hidden">Kampf Grundwert</th>
            <th class="small"></th>
            <th class="small">Aktuell</th>
            <th class="small">Mod</th>
        </tr>
    </thead>
    <tbody>
<?php
    $res = $sheet->getCombatByHeroId($_SESSION['hero_id']);
    foreach( $res as $attr ) {
        $wert = $sheet->parseFormula( $_SESSION['hero_id'], $attr['wert_def'] );
        $wert += $attr['modifikator'];
        print '
        <tr>
            <th>'.$attr['name'].'</th>
            <td class="text-muted small text-right">'.$attr['wert_def'].'</td>
            <td>'.$wert.'</td>
            <td>
                <input type="number" class="form-control input-sm" value="'.$attr['modifikator'].'">
            </td>
        </tr>
';
    }
?>
    </tbody>
</table>
