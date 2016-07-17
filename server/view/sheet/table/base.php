<table class="table table-condensed">
    <thead>
        <tr>
            <th style="visibility:hidden">Basiswert</th>
            <th class="small"></th>
            <th class="small">Aktuell</th>
            <th class="small">Mod</th>
            <th class="small">Start</th>
            <th class="small">Kauf</th>
            <th class="small">Max Kauf</th>
        </tr>
    </thead>
    <tbody>
<?php
    $res = $sheet->getBaseByHeroId($_SESSION['hero_id']);
    foreach( $res as $attr ) {
        $sign = ( $attr['modifikator'] > 0 ) ? '+' : '';
        print '
        <tr>
            <th>'.$attr['name'].'</th>
            <td class="text-muted small text-right">'.$attr['wert_def'].'</td>
            <td>'.$attr['wert'].'</td>
            <td>'.$sign.$attr['modifikator'].'</td>
            <td>'.$attr['start'].'</td>
            <td>'.$attr['kauf'].'</td>
            <td>'.$attr['kauf_max'].'<span class="text-muted small pull-right">'.$attr['max_kauf_def'].'</span></td>
        </tr>
';
    }
?>
    </tbody>
</table>
