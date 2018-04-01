<?php require'header.php'; ?>
    <div class="wrapper">
        <div class="container">
            <!-- Forms -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="card-box">
                        <div class="row" style="text-align: center;">
                            <h3 class="m-t-0 header-title"><b>Schedule Practice Exam</b></h3>
                            <div class="col-md-4"></div>
                            <div class="col-md-5">
                                <?php
                                $test_schedule= $db->selectCollection('practiceschedule');

                                $test_schedule_count= $test_schedule->find()->count();

                                if($test_schedule_count > 0){




                                ?>

                                <form role="form" method="post" action="schedule_practice_exam_delete.php" >

                                        <div class="form-group">
                                             <div class="col-sm-10">
                                               <input type="submit" name="delschedule" class="btn btn-danger" value="DELETE SCHEDULE"/>
                                            </div>

                                </form>
                                <label class="col-sm-8 control-label"></label>
                                <div class="col-sm-10">


                                  <?php
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
                                                $test_find= $test->find(array("testtype" => "mcq"));
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
                                                url: "schedule_practice_exam_success.php",
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