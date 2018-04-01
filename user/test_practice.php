<?php require 'cloudesession.php'; 


/* NO CACHE */
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
/*NO CACHE */
	

date_default_timezone_set("Asia/Kolkata");

		


		$userid=$profile["_id"];
		$resultcollection= $db->selectCollection('results_practice');
		$testcollection= $db->selectCollection('practiceschedule');
		$testrescount= $testcollection->find(array("testtype" => "mcq"))->count();
		
		if($testrescount==0)
		{
				die("Test has not been scheduled by System Administrator");
				
			
		}
		else
		{
			$testres= $testcollection->find(array("testtype" => "mcq"));
			foreach($testres as $test)
			{
				$test["timer"];
				$test["question"];
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
				$document["score"]=0;
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
		
		
			

echo '<div style="text-align: center;" id="student_warning"><strong style="color:#990000;">DO NOT REFRESH/RELOAD PAGE EXAM CANNOT REVERT BACK</strong></div><hr>';




############################# UPDATING DB ############################################


	
$rows= $test["question"]; //questions

?>



<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Practice Test</title>
<link href="assets/css/bootstrap.min.css" rel="stylesheet">
<link href="assets/css/autowide.css" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" href="flipclock/compiled/flipclock.css">
<script src="assets/js/jquery.min.js"></script>
<script type="text/javascript" src="assets/js/disable.js"></script>
<script src="flipclock/compiled/flipclock.js"></script>
 <noscript>
 <meta HTTP-EQUIV="REFRESH" content="0; url=nojs.php"> 
 </noscript>
</head>
<body>
<style>

body
{
	background-image:url(images/school.png);
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

<div class="container">
	<div class="row">
		<div class="col-lg-3"></div>
		<div class="col-lg-7">
			<div class="clock"></div>

		</div>
		</div>
</div>




                <form  method="post" id="f1" name="f1">
				

					<?php
					
					$questioncoll= $db->selectCollection('practice_test');
					
					$questioncount= $questioncoll->find(array('category'=>$test["testname"]))->count();
					$res= $questioncoll->find(array('category'=>$test["testname"]));




					$i=1;
              
					
					$k=0;
					$questionnumber= array();
					$text=array();
					$option1= array();
					$option2= array();
					$option3 = array();
					$option4= array();
					$id=array();
					
					 while($res->hasNext())
					 {
						$result= $res->getNext();
				
						 $id[$k]= $result['_id'];
						 $questionnumber[$k]= $result['questionnumber'];
						 $text[$k]=		$result['text'];
						 $option1[$k]=	$result['option1'];
						 $option2[$k]=	$result['option2'];
						 $option3[$k]=	$result['option3'];
						 $option4[$k]=	$result['option4'];
						
						$k++;
						
								
					 }
					 
					
					$numbers= range(0,$questioncount-1);
					shuffle($numbers);
					$question=array_slice($numbers,0,$rows); // range starting and quantity
					?>
                    <hr>
                    <div id="testform" style="display:none;">
                    <div class="row">
                    <div class="col-md-4"></div>
                    <div class="col-lg-5">
					<?php
					for($x=0;$x<$rows;$x++)
					{
					
						$num=$question[$x];
					
						/**echo $id[$num]."<br>";
						echo $questionnumber[$num]."<br>";
						echo $text[$num]."<br>";
						echo $option1[$num]."<br>";
						echo $option2[$num]."<br>";
						echo $option3[$num]."<br>";
						echo $option4[$num]."<br>";
					**/
					
					
					?>
                    
                     <?php if($i==1){?>
                    <div id='question<?php echo $i;?>' class='cont'>
                  <strong><p style="font-size:20px; color:#09F;"><?php echo nl2br($text[$num]);  ?></p></strong>
                    <input type="radio" value="1" id='radio1_<?php echo $id[$num]; ?>' name='<?php echo $questionnumber[$num]; ?>'/><strong style="font-size:20px;"> <?php echo $option1[$num];?></strong>
                   <br/>
                    <input type="radio" value="2" id='radio1_<?php echo $id[$num]; ?>' name='<?php echo $questionnumber[$num]; ?>'/><strong style="font-size:20px;"> <?php echo $option2[$num];?></strong>
                    <br/>
                    <input type="radio" value="3" id='radio1_<?php echo $id[$num]; ?>' name='<?php echo $questionnumber[$num]; ?>'/><strong style="font-size:20px;"> <?php echo $option3[$num];?></strong>
                    <br/>
                    <input type="radio" value="4" id='radio1_<?php echo $id[$num];?>' name='<?php echo $questionnumber[$num]; ?>'/><strong style="font-size:20px;"> <?php echo $option4[$num];?></strong>
                    <br/>
                    <input type="radio" checked='checked' style='display:none' value="0" id='radio1_<?php echo $id[$num];?>' name='<?php echo $questionnumber[$num]; ?>'/>
                     <br/>


                    <button id='<?php echo $i;?>' class='next btn btn-success' type='button'>Next</button>
                    </div>

                     <?php }elseif($i<1 || $i<$rows){?>

                      <div id='question<?php echo $i;?>' class='cont'>
                  <strong><p style="font-size:20px; color:#09F;"><?php echo nl2br($text[$num]);  ?></p></strong>
                    <input type="radio" value="1" id='radio1_<?php echo $id[$num]; ?>' name='<?php echo $questionnumber[$num]; ?>'/><strong style="font-size:20px;"> <?php echo $option1[$num];?></strong>
                   <br/>
                    <input type="radio" value="2" id='radio1_<?php echo $id[$num]; ?>' name='<?php echo $questionnumber[$num]; ?>'/><strong style="font-size:20px;"> <?php echo $option2[$num];?></strong>
                    <br/>
                    <input type="radio" value="3" id='radio1_<?php echo $id[$num]; ?>' name='<?php echo $questionnumber[$num]; ?>'/><strong style="font-size:20px;"> <?php echo $option3[$num];?></strong>
                    <br/>
                    <input type="radio" value="4" id='radio1_<?php echo $id[$num];?>' name='<?php echo $questionnumber[$num]; ?>'/><strong style="font-size:20px;"> <?php echo $option4[$num];?></strong>
                    <br/>
                    <input type="radio" checked='checked' style='display:none' value="0" id='radio1_<?php echo $id[$num];?>' name='<?php echo $questionnumber[$num]; ?>'/>
                     <br/>


                     <button id='<?php echo $i;?>' class='next btn btn-success' type='button' >Next</button>
                    </div>





                   <?php }elseif($i==$rows){?>
                   <div id='question<?php echo $i;?>' class='cont'>
                  <strong><p style="font-size:20px; color:#09F;"><?php echo nl2br($text[$num]);  ?></p></strong>
                    <input type="radio" value="1" id='radio1_<?php echo $id[$num]; ?>' name='<?php echo $questionnumber[$num]; ?>'/><strong style="font-size:20px;"> <?php echo $option1[$num];?></strong>
                   <br/>
                    <input type="radio" value="2" id='radio1_<?php echo $id[$num]; ?>' name='<?php echo $questionnumber[$num]; ?>'/><strong style="font-size:20px;"> <?php echo $option2[$num];?></strong>
                    <br/>
                    <input type="radio" value="3" id='radio1_<?php echo $id[$num]; ?>' name='<?php echo $questionnumber[$num]; ?>'/><strong style="font-size:20px;"> <?php echo $option3[$num];?></strong>
                    <br/>
                    <input type="radio" value="4" id='radio1_<?php echo $id[$num];?>' name='<?php echo $questionnumber[$num]; ?>'/><strong style="font-size:20px;"> <?php echo $option4[$num];?></strong>
                    <br/>
                    <input type="radio" checked='checked' style='display:none' value="0" id='radio1_<?php echo $id[$num];?>' name='<?php echo $questionnumber[$num]; ?>'/>
                     <br/>

                    <button id='btn_submit' class='next btn btn-danger' type='submit'>Finish</button>
                    </div>
					<?php } $i++; } ?>

				</form>
			</div>
		</div>
        </div><!--end of test form--->
        
        </div><!--end of row -->
        </div><!--end of another div -->
      

      <div id="submit_progress" style="text-align: center;font-family: 'Audiowide', cursive; font-size: 30px;"></div>


        <div id="ack" style="text-align: center;font-family: 'Audiowide', cursive; font-size: 30px;"></div>

        <br><br>
         <div id="ack1" style="text-align: center;font-family: 'Audiowide', cursive; font-size: 30px;"></div>

		<script src="assets/js/bootstrap.min.js"></script>
		<script src="assets/js/jquery.validate.min.js"></script>
       
        		
		<script>
		$('.cont').addClass('hide');
		count=$('.questions').length;
		 $('#question'+1).removeClass('hide');

		 $(document).on('click','.next',function(){
		     last=parseInt($(this).attr('id'));
		     nex=last+1;
		     $('#question'+last).addClass('hide');

		     $('#question'+nex).removeClass('hide');
		 });




		</script>

<script type="text/javascript">
	var clock;

	$(document).ready(function() {
		var clock;
		$('#testform').show();
		clock = $('.clock').FlipClock({
			clockFace: 'DailyCounter',
			autoStart: false,
			callbacks: {
				stop: function() {				
					document.f1.btn_submit.click();
					$('#f1').hide();
					$('.clock').hide();
				}
			}
		});

		clock.setTime(<?php echo $test["timer"]; ?>);
		clock.setCountdown(true);
		clock.start();

	});


   $(function () {
    $('#f1').on('submit', function (e) {
    	$('#f1').hide();
    	$('.clock').hide();
        $('#student_warning').hide();
        $('#submit_progress').html("Please Wait...Processing");

        $.ajax({
            type: 'post',
            url: 'testresult_practice.php',
            data: $(this).serialize(),
            success: function (data,status) {
            	$('#submit_progress').hide();
                $('#f1').hide();
                $('.clock').hide();
                $('#student_warning').hide();

                if(status=="success"){
                	$('#ack').html("Test Over || Thank You we have received your submisssion");
                	$('#ack1').html(data);
                }else{
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