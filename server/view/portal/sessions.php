<div class="container">
    <div class="jumbotron">
        <h1>Portal Sessions</h1>
        <p>Hier werden alle deine Session aufgelistet. Du kannst auch eine neue Session erstellen.</p>
    </div>
<div class="panel panel-default">
  <div class="panel-body">
        <div class="list-group">
            <a href="#" class="list-group-item">
                <h4 class="list-group-item-heading">Session-Name 1</h4>
                <p class="list-group-item-text">Beschreibung</p>
            </a>
            <a href="#" class="list-group-item list-group-item-info">
                <span class="badge">4</span>
                <h4 class="list-group-item-heading">Session-Name 2</h4>
                <p class="list-group-item-text">Beschreibung</p>
            </a>
            <a href="#" class="list-group-item active">
                <span class="badge">3</span>
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
