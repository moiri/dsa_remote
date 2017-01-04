<?php
if(!isset($_GET['page'])) $_GET['page'] = 0;
$css=' class="active"';
$args = "";
foreach ($_GET as $arg => $val)
    if ($arg != "logout") $args .= $arg.'='.$val.'&';
if (strlen($args)) $args = "?".$args;
?>

   <div class="row">
      <div class="col-md-12">
         <nav class="navbar navbar-inverse" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
               <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
               <span class="sr-only">Toggle navigation</span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
               </button>
               <a class="navbar-brand" href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span></a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
               <ul class="nav navbar-nav">
                  <li<?php if($_GET['page'] == '4') echo $css;?>>
                     <a href="?page=4">Kampfregeln</a>
                  </li>
                  <li<?php if($_GET['page'] == '3') echo $css;?>>
                     <a href="?page=3">Limbusportal</a>
                  </li>
                  <li<?php if($_GET['page'] == '1') echo $css;?>>
                     <a href="../dsa_map">Karte</a>
                  </li>
                  <li<?php if($_GET['page'] == '2') echo $css;?>>
                     <a href="?page=2">Heldenbrief</a>
                  </li>
                  <li<?php if($_GET['page'] == '5') echo $css;?>>
                     <a href="?page=5">About</a>
                  </li>
               </ul>
               <ul class="nav navbar-nav navbar-right">
<?php
if ($login->isUserLoggedIn()) {
    include("server/view/logged_in.php");
} else {
    include("server/view/not_logged_in.php");
}
?>
               </ul>
            </div>
            <!-- /.navbar-collapse -->
         </nav>
      </div>
   </div>
<?php
// show potential errors / feedback (from login object)
if (isset($login)) {
    $login->printLog( 3 );
}
// show potential errors / feedback (from registration object)
if (isset($registration)) {
    $registration->printLog( 3 );
}
if (isset($sheet)) {
    $sheet->printLog( 4 );
}
if (isset($sheet2)) {
    $sheet2->printLog( 4 );
}
?>
