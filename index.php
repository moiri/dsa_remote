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
<link rel="stylesheet" type="text/css" href="chat/chat.css" />
<script src="plugin/jquery/jquery.js" type="text/javascript"></script>
<script src="plugin/bootstrap/js/bootstrap.js" type="text/javascript"></script>
<script src="js/main.js" type="text/javascript"></script>
<script src="js/socket.io.js" type="text/javascript"></script>
<script src="js/chat.js" type="text/javascript"></script>
</head>
<body>
<div class="container-fluid">
<?php
include("php/view/header.php");
$mypage = (isset($_GET['page'])) ? $_GET['page'] : '0';
switch ($mypage) {
    case '0':
        include("php/view/home.php");
        break;

    case '3':
        if($login->isUserLoggedIn())
            include("php/view/portal.php");
        else
            include("php/view/denied.php");
        break;

    default:
        include("php/view/404.php");
}
include("php/view/footer.php");
?>
</div>
</body>
</html>
