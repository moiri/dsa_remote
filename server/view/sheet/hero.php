<div class="container">
<?php
    $hero = $sheet->selectByUid( 'held', $_SESSION['hero_id'] );
    print '
    <h1>'.$hero['name'].'</h1>
    <div class="row">
        <div class="col-md-6">
    ';
    include('table/look.php');
    print '
        </div>
        <div class="col-md-6">
    ';
    include('table/attr.php');
    print '
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
    ';
    include('table/base.php');
    print '
        </div>
    </div>
    ';
?>
</div>
