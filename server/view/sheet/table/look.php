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
            <td id="held-titel" class="field-edit field-type-text">'.$res['titel'].'</td>
        </tr>
        <tr>
            <th>Rasse</th>
            <td id="held-rasse" class="field-edit field-type-text">'.$res['rasse'].'</td>
        </tr>
        <tr>
            <th>Kultur</th>
            <td id="held-kultur" class="field-edit field-type-text">'.$res['kultur'].'</td>
        </tr>
        <tr>
            <th>Profession</th>
            <td id="held-profession" class="field-edit field-type-text">'.$res['profession'].'</td>
        </tr>
        <tr>
            <th>Geburtsdatum</th>
            <td id="held-geburtsdatum" class="field-edit field-type-text">'.$res['geburtsdatum'].'</td>
        </tr>
        <tr>
            <th>Haarfarbe</th>
            <td id="held-haarfarbe" class="field-edit field-type-text">'.$res['haarfarbe'].'</td>
        </tr>
        <tr>
            <th>Augenfarbe</th>
            <td id="held-augenfarbe" class="field-edit field-type-text">'.$res['augenfarbe'].'</td>
        </tr>
        <tr>
            <th>Grösse</th>
            <td id="held-goesse" class="field-edit field-type-text">'.$res['groesse'].'</td>
        </tr>
        <tr>
            <th>Gewicht</th>
            <td id="held-gewicht" class="field-edit field-type-text">'.$res['gewicht'].'</td>
        </tr>
        <tr>
            <th>Geschlecht</th>
            <td id="held-geschlecht" class="field-edit field-type-text">'.$res['geschlecht'].'</td>
        </tr>
';
?>
    </tbody>
</table>
