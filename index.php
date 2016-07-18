<?php
require_once("server/secure/globals.php");
require_once("server/class/login.php");
require_once("server/class/registration.php");
$login = new Login();
$registration = new Registration();
$mypage = (isset($_GET['page'])) ? $_GET['page'] : '0';
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
<link rel="stylesheet" type="text/css" href="plugin/bootstrap/css/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="plugin/bootstrap/css/bootstrap-theme.min.css" />
<script src="plugin/jquery/jquery.js" type="text/javascript"></script>
<script src="plugin/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<?php
switch ($mypage) {
    case '2':
        include("server/head/sheet.php");
        break;
    case '3':
        include("server/head/portal.php");
        break;
    case '4':
        include("server/head/doc.php");
        break;
    default:
        ;
}
?>
</head>
<body>
<div class="container-fluid">
<?php
include("server/view/header.php");
switch ($mypage) {
    case '0':
        include("server/view/home.php");
        break;
    case '2':
        if($login->isUserLoggedIn())
            include("server/view/sheet/index.php");
        else
            include("server/view/denied.php");
        break;
    case '3':
        if($login->isUserLoggedIn())
            include("server/view/portal/index.php");
        else
            include("server/view/denied.php");
        break;
    case '4':
        include("server/view/doc/index.php");
        break;

    default:
        include("server/view/404.php");
}
include("server/view/footer.php");
?>
</div>
</body>
</html>
