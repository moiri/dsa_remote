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
                  <li><a href="#">About</a></li>
               </ul>
               <ul class="nav navbar-nav navbar-right">
<?php
if ($login->isUserLoggedIn()) {
    include("php/view/logged_in.php");
} else {
    include("php/view/not_logged_in.php");
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
    if ($login->errors) {
        foreach ($login->errors as $error) {
            echo '
<div class="alert alert-danger alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'.$error.'</div>';
        }
    }
    if ($login->messages) {
        foreach ($login->messages as $message) {
            echo '
<div class="alert alert-success alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'.$message.'</div>';
        }
    }
}
// show potential errors / feedback (from registration object)
if (isset($registration)) {
    if ($registration->errors) {
        foreach ($registration->errors as $error) {
            echo '
<div class="alert alert-danger alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'.$error.'</div>';
        }
    }
    if ($registration->messages) {
        foreach ($registration->messages as $message) {
            echo '
<div class="alert alert-success alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'.$message.'</div>';
        }
    }
}
?>
