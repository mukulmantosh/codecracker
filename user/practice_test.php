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
            <h4 class="page-title">Practice Test</h4>
            <p class="text-muted page-title-alt">Practice without improvement is meaningless. - <i>Chuck Knox</i></p>
        </div>
    </div>
<?php
error_reporting(0); // stops error reporting
$testschedule = $db->selectCollection('practiceschedule');
$testlogo = $db->selectCollection('test');
$testres = $testschedule->find(array("testtype" =>"mcq"));
$testcount = $testschedule->find(array("testtype" =>"mcq"))->count();
$result = $db->selectCollection('results_practice');

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
    <div class="row">
    <div class="col-md-6 col-lg-3">
        <div class="widget-bg-color-icon card-box fadeInDown animated">
            <div style="text-align: center;">
                    <h3><?php echo strtoupper($test_logo["testname"]); ?></h3>
            </div>
            <div class="text-right">
                <p class="text-muted">Practice</p>
                <li class="list-group-item">TOTAL QUESTIONS: <strong><span style="color:#FF6600;"><?php echo $test["question"]; ?></span></strong></li>
                <li class="list-group-item">TIME ALLOTED: <strong><span style="color:#3399FF;"><?php echo $test["timer"]." seconds"; ?></span></strong></li>
                <li class="list-group-item">RIGHT ANSWER:<strong><span style="color:#009900;"> +5</span></strong></li>
                <li class="list-group-item">WRONG ANSWER:<strong><span style="color:#ff6666;"> -2</span></strong></li>
                <li class="list-group-item">SKIP ANSWER: <strong><span style="color:#ff6666;"> -2</span></strong></li>
                <br>
                <a class="btn btn-lg btn-block btn-success" id="myButton" href="test_practice.php" target="_blank">PRACTICE TEST</a>
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
                <img src="icons/sad.svg" class="img-responsive">
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
                <img src="icons/sad.svg" class="img-responsive">
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