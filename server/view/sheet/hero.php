<div class="container">
<?php
    $hero = $sheet->selectByUid( 'held', $_SESSION['hero_id'] );
    print '
    <h1>'.$hero['name'].'</h1>
    <p>'.$hero['beschrieb'].'</p>
    <div class="row">
        <div class="col-md-6">
    ';
    include("table/table-head-e.php");
    include('table/look.php');
    include("table/table-tail.php");
    print '
        </div>
        <div class="col-md-6">
    ';
    include("table/table-head-el.php");
    include('table/attr.php');
    include("table/table-tail.php");
    print '
        </div>
    </div>
    <div class="row">
        <div class="col-md-8">
    ';
    include("table/table-head-el.php");
    include('table/base.php');
    include("table/table-tail.php");
    print '
        </div>
        <div class="col-md-4">
    ';
    include("table/table-head.php");
    include('table/kampf.php');
    include("table/table-tail.php");
    print '
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
    ';
    include("table/table-head-e.php");
    include('table/vt.php');
    include("table/table-tail.php");
    print '
        </div>
        <div class="col-md-6">
    ';
    include("table/table-head-e.php");
    include('table/nt.php');
    include("table/table-tail.php");
    print '
        </div>
    </div>
    ';
?>
</div>
