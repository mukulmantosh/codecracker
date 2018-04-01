<?php require 'header.php'; ?>
<?php

$register= $db->selectCollection('registration');
$register_total= $register->count();
$register_cse = $register->find(array("branch" =>"cse"))->count();
$register_it = $register->find(array("branch" =>"it"))->count();
$register_etc = $register->find(array("branch" =>"etc"))->count();
$register_ee = $register->find(array("branch" =>"ee"))->count();
$register_eee = $register->find(array("branch" =>"eee"))->count();
$register_mech = $register->find(array("branch" =>"mech"))->count();
$register_civil = $register->find(array("branch" =>"civil"))->count();

$total_males = $register->find(array("gender" =>"male"))->count();
$total_females = $register->find(array("gender" =>"female"))->count();

$certificate_status = $register->find(array("certificate_status" =>"yes"))->count();


#### Percentage #########

$cse_percent = intval(($register_cse/$register_total) * 100);
$it_percent = intval(($register_it/$register_total) * 100);
$etc_percent = intval(($register_etc/$register_total) * 100);
$eee_percent = intval(($register_eee/$register_total) * 100);
$ee_percent = intval(($register_ee/$register_total) * 100);
$mech_percent = intval(($register_mech/$register_total) * 100);
$civil_percent = intval(($register_civil/$register_total) * 100);
$male_percent = intval(($total_males/$register_total) * 100);
$female_percent = intval(($total_females/$register_total) * 100);
$certificate_percent = intval(($certificate_status/$register_total)*100);


$testschedule = $db->selectCollection('testschedule');
$practice_schedule = $db->selectCollection('practiceschedule');
$hackathon= $db->selectCollection('hackathon');

$mcq_notify = $testschedule->find(array("testtype" => "mcq"))->count();
$coding_notify = $testschedule->find(array("testtype" => "coding"))->count();
$practice_notify = $practice_schedule->find()->count();
$hackathon_notify = $hackathon->find()->count();


?>
<div class="wrapper">
<div class="container">

<div class="row">
   <div class="col-lg-12">
      <div class="card-box">
           <div class="row">
         
            <div class="col-md-4">
               <p class="font-600">Computer Science <span class="text-primary pull-right"><?php echo $cse_percent; ?>%</span></p>
               <div class="progress m-b-30">
                  <div class="progress-bar progress-bar-primary progress-animated wow animated" role="progressbar" aria-valuenow="<?php echo $cse_percent; ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $cse_percent; ?>%">
                  </div>
                  <!-- /.progress-bar .progress-bar-danger -->
               </div>
               <!-- /.progress .no-rounded -->
               <p class="font-600">Information Technology <span class="text-pink pull-right"><?php echo $it_percent; ?>%</span></p>
               <div class="progress m-b-30">
                  <div class="progress-bar progress-bar-pink progress-animated wow animated" role="progressbar" aria-valuenow="<?php echo $cse_percent; ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $it_percent; ?>%">
                  </div>
                  <!-- /.progress-bar .progress-bar-pink -->
               </div>
               <!-- /.progress .no-rounded -->
               <p class="font-600">Electronics & Telecommunication <span class="text-info pull-right"><?php echo $etc_percent; ?>%</span></p>
               <div class="progress m-b-30">
                  <div class="progress-bar progress-bar-info progress-animated wow animated" role="progressbar" aria-valuenow="<?php echo $etc_percent; ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $etc_percent; ?>%">
                  </div>
                  <!-- /.progress-bar .progress-bar-info -->
               </div>
               <!-- /.progress .no-rounded -->
               <p class="font-600">Electricals And Electronics <span class="text-warning pull-right"><?php echo $eee_percent; ?>%</span></p>
               <div class="progress m-b-30">
                  <div class="progress-bar progress-bar-warning progress-animated wow animated" role="progressbar" aria-valuenow="<?php echo $eee_percent; ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $eee_percent; ?>%">
                  </div>
                  <!-- /.progress-bar .progress-bar-warning -->
               </div>
               <!-- /.progress .no-rounded -->
               <p class="font-600">Electrical <span class="text-success pull-right"><?php echo $ee_percent; ?>%</span></p>
               <div class="progress m-b-30">
                  <div class="progress-bar progress-bar-success progress-animated wow animated" role="progressbar" aria-valuenow="<?php echo $ee_percent; ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $ee_percent; ?>%">
                  </div>
                  <!-- /.progress-bar .progress-bar-success -->
               </div>

               <!-- /.progress .no-rounded -->
               <p class="font-600">Mechanical <span class="text-purple pull-right"><?php echo $mech_percent; ?>%</span></p>
               <div class="progress m-b-30">
                  <div class="progress-bar progress-bar-purple progress-animated wow animated" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $mech_percent; ?>%">
                  </div>
                  <!-- /.progress-bar .progress-bar-success -->
               </div>

               <p class="font-600">Civil <span class="text-inverse pull-right"><?php echo $civil_percent; ?>%</span></p>
               <div class="progress m-b-30">
                  <div class="progress-bar progress-bar-inverse progress-animated wow animated" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $civil_percent; ?>%">
                  </div>
                  <!-- /.progress-bar .progress-bar-success -->
               </div>

               <!-- /.progress .no-rounded -->
            </div>

             <div class="col-md-4">
               <p class="font-600">Male <span class="text-primary pull-right"><?php echo $male_percent; ?>%</span></p>
               <div class="progress m-b-30">
                  <div class="progress-bar progress-bar-male progress-animated wow animated" role="progressbar" aria-valuenow="<?php echo $male_percent; ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $male_percent; ?>%">
                  </div>
                  <!-- /.progress-bar .progress-bar-danger -->
               </div>
               <!-- /.progress .no-rounded -->
               <p class="font-600">Female <span class="text-female pull-right"><?php echo $female_percent; ?>%</span></p>
               <div class="progress m-b-30">
                  <div class="progress-bar progress-bar-female progress-animated wow animated" role="progressbar" aria-valuenow="<?php echo $female_percent; ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $female_percent; ?>%">
                  </div>
                  <!-- /.progress-bar .progress-bar-pink -->
               </div>
               <!-- /.progress .no-rounded -->
               <p class="font-600">Certificates Issued <span class="text-info pull-right"><?php echo $certificate_percent; ?>%</span></p>
               <div class="progress m-b-30">
                  <div class="progress-bar progress-bar-info progress-animated wow animated" role="progressbar" aria-valuenow="<?php echo $certificate_percent; ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $certificate_percent; ?>%">
                  </div>
                  <!-- /.progress-bar .progress-bar-info -->
               </div>
              
                          


             <div class="col-sm-6 col-md-6 col-lg-4">
                            <div class="bg-icon  pull-left">
                              
                            </div>
                            <div class="text-right">
                                <h3 class="text-dark">MCQ</h3>
                                <?php
                                if($mcq_notify > 0){

                               
                                ?>
                                <p class="text-muted" id="blink_me">Running</p>
                                <?php
                              }else{

                                ?>

                                <p class="text-muted">Not Running</p>


                                <?php
                              }

                                ?>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                

            <div class="col-sm-6 col-md-6 col-lg-4">
                            <div class="bg-icon  pull-left">
                              
                            </div>
                            <div class="text-right">
                                <h3 class="text-dark">Coding</h3>


                               <?php
                                if($coding_notify > 0){

                               
                                ?>
                                <p class="text-muted" id="blink_me">Running</p>
                                <?php
                              }else{

                                ?>

                                <p class="text-muted">Not Running</p>


                                <?php
                              }

                                ?>


                            </div>
                            <div class="clearfix"></div>
                        </div>
                  


                          <div class="col-sm-6 col-md-6 col-lg-4">
                            <div class="bg-icon  pull-left">
                              
                            </div>
                            <div class="text-right">
                                <h3 class="text-dark">Hackathon</h3>
                                <?php
                                if($hackathon_notify > 0){

                               
                                ?>
                                <p class="text-muted" id="blink_me">Running</p>
                                <?php
                              }else{

                                ?>

                                <p class="text-muted">Not Running</p>


                                <?php
                              }

                                ?>
                            </div>
                            <div class="clearfix"></div>
                        </div>



                        <div class="col-sm-6 col-md-6 col-lg-4">
                            <div class="bg-icon  pull-left">
                              
                            </div>
                            <div class="text-right">
                                <h3 class="text-dark">Practice</h3>
                                
                                 <?php
                                if($practice_notify > 0){

                               
                                ?>
                                <p class="text-muted" id="blink_me">Running</p>
                                <?php
                              }else{

                                ?>

                                <p class="text-muted">Not Running</p>


                                <?php
                              }

                                ?>


                            </div>
                            <div class="clearfix"></div>
                        </div>



         </div>
         <!-- end row -->
      </div>
   </div>
</div>
<!-- end row -->
<style type="text/css">
  #blink_me{
    font-weight: bold;
    color: #3399ff;
  }

</style>
<script type="text/javascript">

(function blink() { 
    $('#blink_me').fadeOut(500).fadeIn(500, blink); 
})();

</script>
<?php require 'footer.php'; ?>