<?php
/* require_once('sheetDbMapper.php'); */

/* $sheet = new SheetDbMapper(DBSERVER,DBNAME,DBUSER,DBPASSWORD); */

/* $res = $sheet->queryDb("SELECT * from held WHERE nameId='".$_GET['username']."'"); */
?>

<div class="row loginPage">
    <div class="col-md-4 col-md-offset-4">
        <div class="panel panel-default">
            <div class="panel-heading">Wähle dein Held</div>
            <div class="panel-body">
                <button class="btn btn-default heroInput" type="submit">Yendan</button>
                <button class="btn btn-default heroInput" type="submit">Conar</button>
            </div>
        </div>
    </div>
</div>
<div class="row chatPage" style="display:none">
    <div class="message-wrap col-md-3 col-md-offset-9">
        <div class="msg-wrap well"></div>
        <div class="send-wrap">
            <input type="text" class="form-control inputMessage" placeholder="Type here..."/>
        </div>
    </div>
</div>
