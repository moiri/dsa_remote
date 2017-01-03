<table id="sheet-table-base" class="table table-condensed">
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
        if( $attr['modifikator'] == null and $attr['kauf'] == null ) continue;
        $sign = ( $attr['modifikator'] > 0 ) ? '+' : '';
        $start = $sheet->parseFormula( $_SESSION['hero_id'],
            $attr['wert_def'] );
        $wert = $start + $attr['modifikator'] + $attr['kauf'];
        $kauf_max = $sheet->parseFormula( $_SESSION['hero_id'],
            $attr['max_kauf_def'] );
        print '
        <tr>
            <th>'.$attr['name'].'</th>
            <td class="text-muted small text-right">'.$attr['wert_def'].'</td>
            <td>
                '.$wert.'
            </td>
            <td>
                <input type="number" class="form-control input-sm" value="'.$attr['modifikator'].'">
            </td>
            <td>
                '.$start.'
            </td>
            <td>
                <input type="number" class="form-control input-sm" value="'.$attr['kauf'].'">
            </td>
            <td>
                '.$kauf_max.'
            <span class="text-muted small pull-right">'.$attr['max_kauf_def'].'</span></td>
        </tr>
';
    }
?>
    </tbody>
</table>
