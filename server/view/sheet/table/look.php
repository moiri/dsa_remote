<table id="sheet-table-look" class="table table-condensed">
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
            <td class="field-edit">'.$res['titel'].'</td>
        </tr>
        <tr>
            <th>Rasse</th>
            <td class="field-edit">'.$res['rasse'].'</td>
        </tr>
        <tr>
            <th>Kultur</th>
            <td class="field-edit">'.$res['kultur'].'</td>
        </tr>
        <tr>
            <th>Profession</th>
            <td class="field-edit">'.$res['profession'].'</td>
        </tr>
        <tr>
            <th>Geburtsdatum</th>
            <td class="field-edit">'.$res['geburtsdatum'].'</td>
        </tr>
        <tr>
            <th>Haarfarbe</th>
            <td class="field-edit">'.$res['haarfarbe'].'</td>
        </tr>
        <tr>
            <th>Augenfarbe</th>
            <td class="field-edit">'.$res['augenfarbe'].'</td>
        </tr>
        <tr>
            <th>Grösse</th>
            <td class="field-edit">'.$res['groesse'].'</td>
        </tr>
        <tr>
            <th>Gewicht</th>
            <td class="field-edit">'.$res['gewicht'].'</td>
        </tr>
        <tr>
            <th>Geschlecht</th>
            <td class="field-edit">'.$res['geschlecht'].'</td>
        </tr>
';
?>
    </tbody>
</table>
