<div class="container">
    <div class="jumbotron">
        <h1>Heldenbrief</h1>
        <p>Wähle dein Held.</p>
    </div>
    <div class="row">
        <div class="col-md-3">
            <div class="list-group">
<?php
    $res = $sheet->getHeroesByUserId($_SESSION['user_id']);
    foreach( $res as $held ) {
        print '
                    <a href="?page='.$_GET['page'].'&hero='.$held['id'].'" class="list-group-item">'.$held['name'].'</a>
';
    }
?>
            </div>
        </div>
        <div class="col-md-9">
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
</div>
