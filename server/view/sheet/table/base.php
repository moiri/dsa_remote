<table class="table table-condensed">
    <thead>
        <tr>
            <th>Basiswert</th>
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
        print '
        <tr>
            <th>'.$attr['name'].'<span class="small pull-right">'.$attr['wert_def'].'</span></th>
            <td>'.$attr['wert'].'</td>
            <td>'.$attr['modifikator'].'</td>
            <td>'.$attr['start'].'</td>
            <td>'.$attr['kauf'].'</td>
            <td>'.$attr['kauf_max'].'<span class="small pull-right">'.$attr['max_kauf_def'].'</span></td>
        </tr>
';
    }
?>
    </tbody>
</table>
