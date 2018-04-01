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
            <h4 class="page-title">Assessment</h4>
            <p class="text-muted page-title-alt">The true sign of intelligence is not knowledge but imagination. - <i>Albert Einstein</i></p>
        </div>
    </div>
<?php
$testschedule = $db->selectCollection('testschedule');
$testlogo = $db->selectCollection('test');
$testres = $testschedule->find(array("testtype" =>"mcq"));
$testcount = $testschedule->find(array("testtype" =>"mcq"))->count();
$result = $db->selectCollection('results');
$user_count = $result->find(array("resultstatus" => "examstarted"))->count();

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
    <div class="col-md-6 col-lg-4">
        <div class="widget-bg-color-icon card-box fadeInDown animated">
            <div style="text-align: center;">
                    <h3><?php echo strtoupper($test_logo["testname"]); ?></h3>
            </div>
            <div class="text-right" style="text-align:center;">
                <p class="text-muted">MCQ Assessment</p>

                <li class="list-group-item">TOTAL QUESTIONS: <span style="color:#3399FF;"><?php echo $test["question"]; ?></span></li>
                <li class="list-group-item">TIME ALLOTED: <span style="color:#3399FF;"><?php echo $test["timer"]." seconds"; ?></span></li>
                <li class="list-group-item">RIGHT ANSWER:<span style="color:#3399FF;"> +5</span></li>
                <li class="list-group-item">WRONG ANSWER:<span style="color:#3399FF;"> -2</span></li>
                <li class="list-group-item">SKIP ANSWER: <span style="color:#3399FF;"> -2</span></li>
                <li class="list-group-item"><span style="color:#FF6600;"><?php echo $user_count; ?></span> USERS PARTICIPATING</li>

                <br>
                <a class="btn btn-lg btn-block btn-success" id="myButton" href="test.php" target="_blank">TAKE TEST</a>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>


<div class="container">
<div class="row">

<div class="col-md-1"></div>

 <div class="col-lg-5">
      <div class="panel panel-border panel-primary">
         <div class="panel-heading">
            <center><h3 class="panel-title" style="font-family: 'Audiowide', cursive;">NOTICE</h3></center>
         </div>
         <div class="panel-body">
            <p style="text-align:justify; color:#ff4d4d;"> Our Assessment Challenge is completely different from other kinds of tests and to make it unique we have included negative marking for skipping questions. We understand you don't like it and neither we do. But to make you strong and very strong in Challenges so there is point of making any mistake.
            </p> 
    <br><br>

    <p style="text-align:center;color:#99ccff;"><i>“It Ain’t How Hard You Hit…It’s How Hard You Can Get Hit and Keep Moving Forward. It's About How Much You Can Take And Keep Moving Forward!” </i><br></p>
<p style="text-align:center;color:#fff;">Sylvester Stallone</p>
         </div>
      </div>
   </div>

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