<?php require 'cloudesession.php'; 


/* NO CACHE */
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
/*NO CACHE */
	

date_default_timezone_set("Asia/Kolkata");

		


		$userid=$profile["_id"];
		$resultcollection= $db->selectCollection('results');
		$testcollection= $db->selectCollection('testschedule');
		$testrescount= $testcollection->find(array("testtype" => "coding"))->count();
		
		if($testrescount==0)
		{
				die("Test has not been scheduled by System Administrator");
				
			
		}
		else
		{
			$testres= $testcollection->find(array("testtype" => "coding"));
			foreach($testres as $test)
			{
				$test["timer"];
				$test["testid"];
				$test["testname"];				
			}
		}
		
		$resfind= $resultcollection->find(array("userid"=>$userid,"testid"=>$test["testid"]))->count();
		if($resfind==0)
		{
			try
			{

				$TimeStart = strtotime(date("H:i:s"));
				$document=array();
				$document["userid"]=$profile["_id"];
				$document["fullname"]=$profile["fullname"];
				$document["testname"]=$test["testname"];
				$document["time_alloted"]= $test["timer"];
				$document["testid"]=$test["testid"];
				$document["resultstatus"]='examstarted';
				$document['starttime']=$TimeStart;
				$resultcollection->insert($document);
				
				
					
			}
			catch(MongoConnectionException $e)
			{
				die("Server not connected....Contact System Administrator");
			}
			catch(MongoException $e)
			{
				die("Contact System Adminstrator... Exception Caught !!!");
				
			}
			
						
		}
		else
		{
				die("No Test scheduled for you.Test Over.");
		}
		
		
			

echo '<div style="text-align: center;" id="student_warning"><strong style="color:#990000;">DO NOT REFRESH/RELOAD PAGE EXAM CANNOT REVERT BACK</strong></div><br>';



?>



<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Coding Challenge</title>
<link href="assets/css/bootstrap.min.css" rel="stylesheet">
<link href="assets/css/autowide.css" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" href="flipclock/compiled/flipclock.css">
<link rel="stylesheet" type="text/css" href="assets/css/montserrat.css">

<script src="assets/js/jquery-1.12.2.min.js"></script>
<script src="flipclock/compiled/flipclock.js"></script>
<script>
	
$(document).ready(function () {
    //Disable cut copy paste
    $('body').bind('cut copy paste', function (e) {
        e.preventDefault();
    });
   
    //Disable mouse right click
    $("body").on("contextmenu",function(e){
        return false;
    });
});
</script>
 <noscript>
 <meta HTTP-EQUIV="REFRESH" content="0; url=nojs.php"> 
 </noscript>

</head>
<body>


<style>

body
{
	background-image:url(images/retina_wood.png);
	overflow-x: hidden;
	-webkit-touch-callout: none; /* iOS Safari */
	-webkit-user-select: none;   /* Chrome/Safari/Opera */
	-khtml-user-select: none;    /* Konqueror */
	-moz-user-select: none;      /* Firefox */
	-ms-user-select: none;       /* IE/Edge */
	user-select: none;           /* non-prefixed version, currently
                                  not supported by any browser */
	::selection {
		color: none;
		background: none;
	}
	/* For Mozilla Firefox */
	::-moz-selection {
		color: none;
		background: none;
	}
}
    
</style>

<style type="text/css" media="screen">
    #editor { 
        width: 500px;
        height: 300px;
        font-size: 15px;
    }
</style>
     

<div class="container">
	<div class="row">
		<div class="col-lg-3"></div>
		<div class="col-lg-7">
			<div class="clock"></div>
			


		</div>
		</div>
</div>


 
					<?php
					
					$questioncoll= $db->selectCollection('questions');
					
					$questioncount= $questioncoll->find(array('category'=>$test["testname"]))->count();

					$random= mt_rand(0,$questioncount-1);

					$res= $questioncoll->find(array(
						'category'=>$test["testname"], 
						'questionnumber' => $random));

					foreach($res as $r){
						$r["text"];
						$r["questionnumber"];

					}

					?>

					
		<div class="container" style="background-color: #fff;-webkit-box-shadow: -2px 2px 140px 22px rgba(110,104,112,0.79);
-moz-box-shadow: -2px 2px 140px 22px rgba(110,104,112,0.79);
box-shadow: -2px 2px 140px 22px rgba(110,104,112,0.79);" id="contain">
		<div class="row">
		<br>
		<div class="col-md-1"></div>
		<div class="col-md-5">
		<div id="question_show" style="font-family: 'Montserrat', sans-serif;"><?php echo nl2br($r['text']); ?></div>
		</div>
		<div class="col-md-4">

				<div id="editor" style="height: 300px; font-size: 18px;"></div>
		
                <form method="post" id="f1" name="f1">

				

				 <textarea id="clikeTextarea" name="clikeTextarea" style="display:none;">#include <iostream>
using namespace std;

int main() {
		// your code goes here
	return 0;
}

				 </textarea>
				
				<br>
				<input type="hidden" name="qno" value="<?php 
				echo base64_encode($r['questionnumber']); ?>">
				<input type="submit" id='submit' style="border-radius: 0px;-webkit-box-shadow: -1px -1px 34px 7px rgba(164,168,161,1);
-moz-box-shadow: -1px -1px 34px 7px rgba(164,168,161,1);
box-shadow: -1px -1px 34px 7px rgba(164,168,161,1);font-family: 'Audiowide', cursive;" class="btn btn-success btn-lg" value="SUBMIT CODE">
				</form>

				</div>
				</div>
				</div>
				


			



				

        

        <div id="ack" style="text-align: center;font-family: 'Audiowide', cursive; font-size: 30px;"></div>

<script src="ace-builds-master/src-noconflict/ace.js" type="text/javascript" charset="utf-8"></script>
<script>

    var editor = ace.edit("editor");
    editor.setTheme("ace/theme/monokai");
    editor.getSession().setMode("ace/mode/c_cpp");

   
var textarea = $('#clikeTextarea').hide();
editor.getSession().setValue(textarea.val());
editor.getSession().on('change', function(){
  textarea.val(editor.getSession().getValue());
});
</script>       

<script type="text/javascript">
	var clock;

	$(document).ready(function() {
		var clock;
			clock = $('.clock').FlipClock({
			clockFace: 'DailyCounter',
			autoStart: false,
			callbacks: {
				stop: function() {				
					$('#submit').click();
					$('#editor').hide();
					$('#question_show').hide();
					$('#f1').hide();
					$('.clock').hide();
					$('#contain').hide();
				}
			}
		});

		clock.setTime(<?php echo $test["timer"]; ?>);
		clock.setCountdown(true);
		clock.start();

	});


 
    $(function () {
    $('#f1').on('submit', function (e) {
        $.ajax({
            type: 'post',
            url: 'codingtestresult.php',
            data: $(this).serialize(),
            success: function (data,status) {
                $('#f1').hide();
                $('.clock').hide();
                $('#student_warning').hide();
                $('#contain').hide();

                if(status=="success"){
                	$('#editor').hide();
					$('#question_show').hide();
					$('#f1').hide();
					$('.clock').hide();
					$('#contain').hide();

                	$('#ack').html("Test Over || Goto Code Builder Section to compile your Code");
                	$('#ack1').html(data);
                }else{
                	
                	$('#editor').hide();
					$('#question_show').hide();
					$('#f1').hide();
					$('.clock').hide();
					$('#contain').hide();
                	$('#ack').html("Something went Wrong || Contact System Administrator");
                }
                
                     
            }
        });
        e.preventDefault();
    });
});


</script>

</body>
</html>