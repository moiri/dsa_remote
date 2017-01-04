<?php
    if( isset( $_FILES['uploadfile']['tmp_name'] ) )
        include("parseXml.php");
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
