<?php
    require_once('server/class/sheetDbMapper.php');
    require_once('server/secure/globals.php');
    $sheet = new SheetDbMapper(DBSERVER,DBNAME,DBUSER,DBPASSWORD);
    $res = $sheet->getGroupsByUserId($_SESSION['user_id']);
?>
<div class="row loginPage">
<div class="container">
    <div class="jumbotron">
        <h1>Portal Gruppen</h1>
        <p>Hier werden alle deine Gruppen aufgelistet. Du kannst auch eine neue Gruppe erstellen.</p>
    </div>
<div class="panel panel-default">
  <div class="panel-body">
        <div class="list-group">
<?php
$gruppen = array();
foreach( $res as $value ) {
    if ( !array_key_exists($value['id'], $gruppen ) ) {
        $gruppen[$value['id']] = array(
            'name' => $value['gn'],
            'desc' => $value['description'],
            'helden' => array() );
    }
    $gruppen[$value['id']]['helden'][$value['hi']] = $value['hn'];
}
/* print_r($gruppen); */
foreach( $gruppen as $gkey => $val ) {
    print '
            <div id="gruppe-'.$gkey.'" class="list-group-item">
                <h4 class="list-group-item-heading">'.$val[ 'name' ].'</h4>
                <p class="list-group-item-heading">'.$val[ 'desc' ].'</p>';
/* <div class="btn-group" role="group" aria-label="...">'; */
    foreach( $val['helden'] as $hkey => $held ) {
        print '
                <button id="held-login-'.$gkey.'-'.$hkey.'" type="button" class="btn btn-default">'.$held.'</button>
';
    }
    print '
            </div>
        ';
}
?>
            <a href="#" class="list-group-item active">
                <span class="badge">Shila</span>
                <span class="badge">Murax</span>
                <span class="badge">Valir</span>
                <h4 class="list-group-item-heading">Session-Name 3</h4>
                <p class="list-group-item-text">Beschreibung</p>
            </a>
        </div>
        <div class="input-group">
        <input type="text" class="form-control" placeholder="Name einer neuen Session ...">
        <span class="input-group-btn">
            <button class="btn btn-default" type="button">Erstellen</button>
        </span>
        </div>
    </div>
    </div>
    <div class="well">
        <form method="post" name="loginform" action="index.php<?php echo $args;?>">
            <div class="form-group">
                <label class="sr-only" for="session_input_name">Name</label>
                <input id="session_input_name" class="form-control" type="text" placeholder="Name" name="session_name" required />
            </div>
            <div class="form-group">
                <label class="sr-only" for="session_input_desc">Beschreibung</label>
                <textarea id="session_input_desc" class="form-control" rows="3" placeholder="Beschreibung"></textarea>
            </div>
            <button type="submit" class="btn btn-success btn-block" name="login">Erstellen</button>
        </form>
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
