<table id="sheet-table-kampf" class="table table-condensed">
    <thead>
        <tr>
            <th style="visibility:hidden">Kampf Grundwert</th>
            <th class="small"></th>
            <th class="small">Aktuell</th>
        </tr>
    </thead>
    <tbody>
<?php
    $res = $sheet->getCombatByHeroId($_SESSION['hero_id']);
    foreach( $res as $attr ) {
        print '
        <tr>
            <th>'.$attr['name'].'</th>
            <td class="text-muted small text-right">'.$attr['wert_def'].'</td>
            <td>'.$attr['wert'].'</td>
        </tr>
';
    }
?>
    </tbody>
</table>
