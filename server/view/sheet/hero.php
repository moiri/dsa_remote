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
    include("table/table-head-e.php");
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
    <div class="row">
        <div class="col-md-6">
    ';
    include("table/table-head-el.php");
    include('table/talent-bkampf.php');
    include("table/table-tail.php");
    $res = $sheet->getTalentByHeroIdGruppeId( $_SESSION['hero_id'], 31 );
    if( count( $res ) > 0 ) {
        include("table/table-head-el.php");
        include('table/talent-akampf.php');
        include("table/table-tail.php");
    }
    print '
        </div>
        <div class="col-md-6">
    ';
    include("table/table-head-el.php");
    include('table/talent-fkampf.php');
    include("table/table-tail.php");
    include("table/table-head-el.php");
    include('table/talent-ukampf.php');
    include("table/table-tail.php");
    print '
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
    ';
    include("table/table-head-el.php");
    include('table/talent-koerper.php');
    include("table/table-tail.php");
    include("table/table-head-el.php");
    include('table/talent-gesellschaft.php');
    include("table/table-tail.php");
    include("table/table-head-el.php");
    include('table/talent-natur.php');
    include("table/table-tail.php");
    print '
        </div>
        <div class="col-md-6">
    ';
    include("table/table-head-el.php");
    include('table/talent-handwerk.php');
    include("table/table-tail.php");
    include("table/table-head-el.php");
    include('table/talent-wissen.php');
    include("table/table-tail.php");
    include("table/table-head-el.php");
    include('table/talent-sprachen.php');
    include("table/table-tail.php");
    print '
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
    ';
    include("table/table-head-el.php");
    include('table/zauber.php');
    include("table/table-tail.php");
    print '
        </div>
    </div>
    ';
?>
</div>
