<?php
require 'header.php';

?>
    <div class="content-page">
    <!-- Start content -->
    <div class="content">
    <div class="container">
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <h4 class="page-title">Coding Challenge</h4>
            <p class="text-muted page-title-alt">Live as if you were to die tomorrow. Learn as if you were to live forever. -  <i>Mahatma Gandhi</i></p>        </div>
    </div>
<?php
error_reporting(0); // stops error reporting
$testschedule = $db->selectCollection('testschedule');
$testlogo = $db->selectCollection('test');
$testres = $testschedule->find(array("testtype" =>"coding"));
$testcount = $testschedule->find(array("testtype" =>"coding"))->count();
$result = $db->selectCollection('results');

foreach($testres as $test)
{
    $test["testid"];
}

$resfind = $result->find(array(
    "userid" => $profile["_id"],
    "testid" => $test["testid"]
))->count();

if ($testcount > 0)
{
if ($resfind == 0)
{
    ?>
    <?php
    $testlogofind = $testlogo->find(array(
        "testname" => $test["testname"]
    ));
    foreach($testlogofind as $test_logo)
    {
    ?>
    <div class="row" >
    <div class="col-md-6 col-lg-3">
        <div class="widget-bg-color-icon card-box fadeInDown animated" style="background-image:url('images/dark_mosaic.png'); border-color: transparent;">
            <div style="text-align: center;">
                    <h3><?php echo strtoupper($test_logo["testname"]); ?></h3>
            </div>
            <div class="text-right">
                <p class="text-muted">Coding Challenge</p>
                  <li class="list-group-item">TIME ALLOTED: <strong><span style="color:#3399FF;"><?php echo $test["timer"]." seconds"; ?></span></strong></li>
                <li class="list-group-item">RIGHT ANSWER:<strong><span style="color:#99ff33;"> +10</span></strong></li>
                <li class="list-group-item">WRONG ANSWER:<strong><span style="color:#ff6699;"> 0 </span></strong></li>
                 <br>
                <a class="btn btn-lg btn-block btn-info" id="myButton" href="coding_test.php" target="_blank">CODE IT</a>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <?php
    }


    }
    else
    {
    ?>
    <div class="row">
    <div class="col-md-6 col-lg-3">
        <div class="widget-bg-color-icon card-box fadeInDown animated">
            <div>
                <img src="icons/sad.svg" height="250" width="250" class="img-responsive">
            </div>
            <div class="text-right">
                <p class="text-muted">No Test Scheduled</p>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <?php
    }
    }
    else
    {
    ?>
    <div class="row">
    <div class="col-md-6 col-lg-3">
        <div class="widget-bg-color-icon card-box fadeInDown animated">
            <div>
              <img src="icons/sad.svg" height="250" width="250" class="img-responsive">
            </div>
            <div class="text-right">
                <p class="text-muted">No Test Scheduled</p>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <?php
}

?>
    <script>
        $('#myButton').click(function(){


            $(this).attr('disabled',true);
            $(this).hide();

        });
    </script>
<?php
require 'footer.php';
?>