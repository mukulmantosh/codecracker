<?php require 'cloudesession.php';  ?>
<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>Hackathon</title>
        <link href="assets/css/autowide.css" rel="stylesheet" type="text/css"/>
       <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/core1.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/components.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/pages.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="flipclock/compiled/flipclock.css">
        <script src="assets/js/jquery.min.js"></script>   
        <script src="flipclock/compiled/flipclock.js"></script>  
   </head>
   <body>
   <div id="hackover" style="text-align: center;display:none;"><h1 style='color:#33ccff;text-shadow: 5px 5px 5px #000;'>HACKATHON OVER </h1></div>
      <?php  
         date_default_timezone_set("Asia/Kolkata");
         $current_time 	=  	date('Y-m-d H:i:s');
         
         $hackathon= $db->selectCollection('hackathon');
         $hackathon_count =  $hackathon->find()->count();
         $hackathon_find  = $hackathon->find();
         
      
         
         if($hackathon_count > 0){
         
         foreach($hackathon_find as $hack)
         {
         
         	$time_left = date("g:i a", strtotime($hack["time"]));
         	$end_time = $hack['date'].' '.$hack['time'];
         	
         
         	$timestamp1   	= 	strtotime($current_time);
         	$timestamp2   	= 	strtotime($end_time);
         
          $differenceInSeconds = $timestamp2 - $timestamp1;

         	$expiring_time = ($timestamp2 - $timestamp1)/(60*60);
         	
         	if($expiring_time < 0) 
         	{
         
         	echo "<center><h1 style='color:#0099ff;text-shadow: 5px 5px 5px #000;'>HACKATHON OVER</h1></center>";
         	echo "</body></html>";
         	die();
         
         	}
         	else
         	{
         
         
         
         ?>

      <div class="hackdata">
      <h1 style="color:#99cc00;text-shadow: 3px 3px 3px #000;">
         <center><?php echo $hack["title"]; ?></center>
      </h1>
      <br>
      <center>
         <h1><span style="color:#ffcc66;text-shadow: 2px 2px 2px #000;">Closes on : </span><span style="color:#fff; text-shadow: 2px 2px 2px #000;"><?php echo $time_left.' '.$hack["date"]; ?></span></h1>
      </center>
      </div>
      <center>
          <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
          <div class="clock"></div>
        </div>
        </div>
          <script type="text/javascript">
            var clock;
            
            $(document).ready(function() {
              var clock;

              clock = $('.clock').FlipClock({
                    clockFace: 'DailyCounter',
                    autoStart: false,
                    callbacks: {
                      stop: function() {
                        $('.clock').hide();
                        $('.hackdata').hide();
                        $('#instruction').hide();
                          $('#hackover').show();
                      }
                    }
                });
                    
                clock.setTime(<?php echo $differenceInSeconds ?>);
                clock.setCountdown(true);
                clock.start();

            });
          </script>
      </center>
      <br>
      <center>
      <div class="container" id="instruction">
      <div class="row">
      <div class="col-md-1"></div>
      <div class="col-md-10">
     
      <h3 style="text-align:justify;color:#ffcc00;width:75%;text-shadow: 2px 2px 2px #000;"><?php echo $hack["instruction"]; ?>
        
      </h3>
     
     </div>
     </div>
      </div>
         
      </center>
      
      <?php
            }
         
         }
         }
         else{
         echo "<div style='text-align:center;'><h1 style='color:#0099ff;text-shadow: 5px 5px 5px #000;'>HACKATHON OVER</h1></div>";
         die();
         }
         
         
         ?>
  

    <!-- jQuery  -->
         <script src="assets/js/bootstrap.min.js"></script>
         <script src="assets/js/disable.js"></script>      
       
       