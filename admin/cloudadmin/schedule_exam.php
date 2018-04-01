<?php require'header.php'; ?>
    <div class="wrapper">
        <div class="container">
            <!-- Forms -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="card-box">
                        <div class="row" style="text-align: center;">
                            <h3 class="m-t-0 header-title"><b>Schedule Exam</b></h3>
                            <div class="col-md-4"></div>
                            <div class="col-md-5">
                                <?php
                                $test_schedule= $db->selectCollection('testschedule');

                                 $mcq_answerscript    = $db->selectCollection('answerscript');

                                 $mcq_answerscript_count = $mcq_answerscript->count();
           
                                $coding_answerscript = $db->selectCollection('coding_answerscript');

                                $coding_answerscript_count = $coding_answerscript->count();



                                $test_schedule_count= $test_schedule->find()->count();
                                $testschedule_category = $test_schedule->find();

                               foreach($testschedule_category as $cat)
                               {
                                 $cat['testtype'];
                               }

                                if($test_schedule_count > 0){




                                ?>

             <form role="form" id="del_schedule_form" method="post" action="schedule_exam_delete.php" >

                <div class="form-group">
                        <div class="col-sm-10">
                    <input type="hidden" name="testtype" value="<?php echo $cat['testtype']; ?>">
                               
                 <input type="submit" id="delschedule" name="delschedule" class="btn btn-danger" value="DELETE SCHEDULE"/>

                        </div>

                                </form>
                               






                                <label class="col-sm-8 control-label"></label>
                                <div class="col-sm-10">
                                <?php    
                                if($cat['testtype'] =='coding')
                                {

                                     if($coding_answerscript_count > 0)
                                     {

                                ?>

                                <a class="btn btn-primary btn-lg" href="download_coding_answerscript.php">Download Coding Answerscripts</a><br>
                                <p><strong>* Note: Download Answerscripts before deleting Schedule</strong></p>

                              <?php 
                                    }

                                }

                                else
                                {
                                    if($mcq_answerscript_count > 0)
                                    {

                                ?>

                                <a class="btn btn-primary btn-lg" href="download_answerscript.php">Download MCQ Answerscripts</a><br>
                                <p><strong>* Note: Download Answerscripts before deleting Schedule</strong></p>

                                  <?php
                                    }

                                }
                                    
                                    }
                                  else{
                                   

                                   ?>

                                <form role="form" method="post" id="myform">
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Examination Name</label>
                                        <div class="col-sm-10">
                                            <select class="form-control" placeholder="Exam Type" name="category" id="category" required>
                                                <?php
                                                $test = $db->selectCollection('test');
                                                $test_find= $test->find();
                                                foreach($test_find as $t) {

                                                    ?>

                                                    <option value="<?php echo $t["testname"]; ?>"><?php echo strtoupper($t["testname"]); ?></option>


                                                    <?php
                                                }
                                                ?>

                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-4 control-label">Total Questions</label>
                                            <div class="col-sm-10">
                                                <input type="number" required min="2" max="300" name="question" id="question" class="form-control"/>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-4 control-label">Timer(in Minutes)</label>
                                                <div class="col-sm-10">
                                                    <input type="number" required min="1" name="timer" id="timer" class="form-control"/>
                                                </div>
                                                <label class="col-sm-8 control-label"></label>
                                                <div class="col-sm-10">
                                                    <button type="submit" id="submit" class="btn btn-purple waves-effect waves-light">Submit</button>
                                                </div>
                                            </div>
                                </form>
                                <label class="col-sm-8 control-label"></label>
                                <div class="col-sm-10">
                                    <script type="text/javascript">
                                        $('#submit').click(function() {



                                            var category = $('#category').val();
                                            var question = $('#question').val();
                                            var timer = $('#timer').val();

                                            var dataString = 'category=' + category + '&question=' + question + '&timer=' + timer;
                                            $.ajax({

                                                type: "post",
                                                url: "schedule_exam_success.php",
                                                data: dataString,
                                                cache: false,
                                                success: function(data) {

                                                    var msg= data;

                                                    if(msg=="success"){
                                                        $.Notification.autoHideNotify('success', 'top left', 'Exam Schedule','Test Scheduled Successfully');
                                                        $('#myform').hide();
                                                        window.setTimeout(function(){location.reload()},600)
                                                    }else{
                                                        $.Notification.autoHideNotify('error', 'top right', 'ERROR', '' + msg + '');
                                                        $('#myform')[0].reset();
                                                    }


                                                }
                                            });
                                            return false;
                                        });
                                    </script>

                                    <?php
                                  }
                                    ?>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end of row-->
        </div>
        <!--end of container -->


<?php require 'footer.php';?>