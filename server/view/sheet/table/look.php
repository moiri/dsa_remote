<table class="table table-condensed">
    <thead>
        <tr>
            <th style="visibility:hidden">Aussehen</th>
            <th class="small" style="visibility:hidden">Beschreibung</th>
        </tr>
    </thead>
    <tbody>
<?php
    $res = $sheet->selectByUid( 'held', $_SESSION['hero_id']);
    print '
        <tr>
            <th>Titel</th>
            <td>'.$res['titel'].'</td>
        </tr>
        <tr>
            <th>Rasse</th>
            <td>'.$res['rasse'].'</td>
        </tr>
        <tr>
            <th>Kultur</th>
            <td>'.$res['kultur'].'</td>
        </tr>
        <tr>
            <th>Profession</th>
            <td>'.$res['profession'].'</td>
        </tr>
        <tr>
            <th>Geburtsdatum</th>
            <td>'.$res['geburtsdatum'].'</td>
        </tr>
        <tr>
            <th>Haarfarbe</th>
            <td>'.$res['haarfarbe'].'</td>
        </tr>
        <tr>
            <th>Augenfarbe</th>
            <td>'.$res['augenfarbe'].'</td>
        </tr>
        <tr>
            <th>Grösse</th>
            <td>'.$res['groesse'].'</td>
        </tr>
        <tr>
            <th>Gewicht</th>
            <td>'.$res['gewicht'].'</td>
        </tr>
        <tr>
            <th>Geschlecht</th>
            <td>'.$res['geschlecht'].'</td>
        </tr>
';
?>
    </tbody>
</table>
