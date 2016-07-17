<table class="table table-condensed">
    <thead>
        <tr>
            <th>Eigenschaft</th>
            <th class="small">Aktuell</th>
            <th class="small">Mod</th>
            <th class="small">Start</th>
        </tr>
    </thead>
    <tbody>
<?php
    $res = $sheet->getAttrByHeroId($_SESSION['hero_id']);
    foreach( $res as $attr ) {
        print '
        <tr>
            <th>'.$attr['name'].'</th>
            <td>'.$attr['wert'].'</td>
            <td>'.$attr['modifikator'].'</td>
            <td>'.$attr['start'].'</td>
        </tr>
';
    }
?>
    </tbody>
</table>
