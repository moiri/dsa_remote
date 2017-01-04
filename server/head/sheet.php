<?php
    require_once('server/class/sheetDbMapper.php');
    require_once('server/secure/globals.php');
    $sheet = new SheetDbMapper(DBSERVER,DBNAME,DBUSER,DBPASSWORD);
    $sheet2 = new SheetDbMapper(DBSERVER,DBNAME,DBUSER2,DBPASSWORD2);
?>
<link rel="stylesheet" type="text/css" href="css/sheet.css" />
<script src="js/sheet.js" type="text/javascript"></script>
