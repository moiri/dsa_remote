<table class="table table-condensed">
    <thead>
        <tr>
            <th style="visibility:hidden">Kampf Grundwert</th>
            <th class="small"></th>
        </tr>
    </thead>
    <tbody>
<?php
    $res = $sheet->getCombatByHeroId($_SESSION['hero_id']);
    foreach( $res as $attr ) {
        $sign = ( $attr['modifikator'] > 0 ) ? '+' : '';
        print '
        <tr>
            <th>'.$attr['name'].'<span class="text-muted small pull-right">'.$attr['wert_def'].'</span></th>
            <td>'.$attr['wert'].'</td>
        </tr>
';
    }
?>
    </tbody>
</table>
