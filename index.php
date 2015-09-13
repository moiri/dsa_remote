<?php
require_once("php/secure/globals.php");
require_once("php/class/login.php");
require_once("php/class/registration.php");
$login = new Login();
$registration = new Registration();
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
<title>DSA Remote</title>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
<meta name="DC.creator" content="Simon Maurer" />
<meta name="DC.contributor" content="Ulisses Spiele" />
<meta name="DC.title" content="DSA Remote" />
<meta name="DC.date" content="2015-09-12" />
<meta name="DC.language" content="en" />
<link rel="stylesheet" type="text/css" href="plugin/bootstrap/css/bootstrap.css" />
<link rel="stylesheet" type="text/css" href="plugin/bootstrap/css/bootstrap-theme.css" />
<script src="plugin/jquery/jquery.js" type="text/javascript"></script>
<script src="plugin/bootstrap/js/bootstrap.js" type="text/javascript"></script>
</head>
<body>
<div class="container-fluid">
<?php include("php/view/header.php");?>
<div class="container">
    <div class="jumbotron">
        <h1>DSA Remote</h1>
        <p>Eine Kollektion von Tools die zum spielen des Rollenspiels "Das Schwarze Auge" nützlich sein können.</p>
    </div>
    <div class="row">
        <div class="col-sm-6 col-md-4">
            <a href="../dsa_map/" class="thumbnail" style="text-decoration:none">
            <img src="img/map_tmb.jpg" alt="Karte">
            <div class="caption">
                <h3>Karte</h3>
                <p style="text-underlin:none">Entdecke Aventurien auf einer interaktive Karte und lasse dir
                auch die entferntesten Ecken des Kontinents zeigen.</p>
            </div>
            </a>
        </div>
        <div class="col-sm-6 col-md-4">
            <a href="#" class="thumbnail" style="text-decoration:none">
            <img src="img/sheet_tmb.jpg" alt="Heldenbrief">
            <div class="caption">
                <h3>Heldenbrief</h3>
                <p>Hat den Heldenbogen schon Löcher vom ewigen Radieren? Hier ist
                die Lösung: Verwalte deine Helden online.</p>
            </div>
            </a>
        </div>
        <div class="col-sm-6 col-md-4">
            <a href="limbusportal.php" class="thumbnail" style="text-decoration:none">
            <img src="img/chat_tmb.jpg" alt="Limbusportal">
            <div class="caption">
                <h3>Limbusportal</h3>
                <p>Verunmöglicht der Wegzug eines Spielers weitere Erlebnisse am
                Spieltisch? Kein Problem! Erlebe DSA auch über grösste Distanzen
                mit Hilfe des Limbusportals.</p>
            </div>
            </a>
        </div>
    </div>
<?php include("php/view/footer.php");?>
</div>
</div>

</body>
</html>
