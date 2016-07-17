<?php
    require_once('server/class/sheetDbMapper.php');
    require_once('server/secure/globals.php');
    $sheet = new SheetDbMapper(DBSERVER,DBNAME,DBUSER,DBPASSWORD);

    if (!isset($_GET['hero'])) include("heroes.php");
    else {
        $_SESSION['hero_id'] = $_GET['hero'];
        $res = $sheet->selectByUid('held', $_SESSION['hero_id']);
        if( $res['id_user'] == $_SESSION['user_id'])
            include("hero.php");
        else
            include("server/view/denied.php");
    }
?>
