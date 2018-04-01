<?php
require 'header.php';
?>

<!-- =======================
             ===== START PAGE ======
             ======================= -->

        <div class="wrapper">
            <div class="container">

                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                          <h4 class="page-title">Questions Bank</h4>
                        <br>
                    </div>
                </div>
                <!-- Page-Title -->

              
                <div class="row">

                    <?php 
                    
                    $test= $db->selectCollection('test');
                    $question= $db->selectCollection('questions');
                    $test_find= $test->find();
                    foreach($test_find as $t){

                        $count_questions= $question->find(array("category"=>$t["testname"],"type" =>$t["testtype"]))->count();
                    ?>
                   
                    <div class="col-lg-3 col-sm-6">
                        <div class="widget-panel widget-style-2 bg-white">                           
                           
                            <h3 class="m-0 text-dark  font-600"><?php echo strtoupper($t["testname"]); ?></h3>
                            
                            <div class="text-muted m-t-5"><?php echo strtoupper($t["testtype"]); ?> || Questions: <?php echo $count_questions; ?></div><br>
                            <a class="btn btn-default btn-custom waves-effect waves-light" href="add_questions.php?type=<?php echo base64_encode($t["testtype"]); ?>&category=<?php echo base64_encode($t["testname"]); ?>">ADD</a>
                            <a class="btn btn-primary btn-custom waves-effect waves-light" href="edit_questions.php?type=<?php echo base64_encode($t["testtype"]); ?>&category=<?php echo base64_encode($t["testname"]); ?>">EDIT</a>
                            <a class="btn btn-danger btn-custom waves-effect waves-light" href="delete_questions.php?type=<?php echo base64_encode($t["testtype"]); ?>&category=<?php echo base64_encode($t["testname"]); ?>">DELETE</a>
                        </div>
                    </div>
                
                    <?php

                    }

                    ?>




               </div><!--end of container -->
           </div><!-- end of wrapper -->
                 




<?php
require 'footer.php';

?>