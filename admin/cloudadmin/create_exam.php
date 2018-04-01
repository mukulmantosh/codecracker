<?php require'header.php'; ?>

  <div class="wrapper">
            <div class="container">
 <!-- Forms -->
                <div class="row">

                    <div class="col-sm-12">
                        <div class="card-box">
                            <div class="row">
                 <center><h3 class="m-t-0 header-title"><b>New Examination</b></h3></center>
                            	<div class="col-md-4"></div>

                                <div class="col-md-5">
           

                                    <form role="form" method="post">
                                        <div class="form-group">
                                             <label class="col-md-4 control-label">Examination Name</label>
                                            <div class="col-md-10">
                                                <input type="text" class="form-control" placeholder="Exam Name" id="examname" name="examname" autocomplete="off" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-4 control-label">Examination Type</label>
                                            <div class="col-sm-10">
                                                <select class="form-control" placeholder="Exam Type" name="examtype" id="examtype" required>
                                                    <option value="mcq">MCQ</option>
                                                    <option value="coding">Coding</option> 
                                                </select>
                                        </div>

                                             
                                      <label class="col-sm-8 control-label"></label>
                                       <div class="col-sm-10">
                                        <button type="submit" id="submit" class="btn btn-purple waves-effect waves-light">Submit</button>
                                     </div>
                                    </form>

                                    <label class="col-sm-8 control-label"></label>
                                       <div class="col-sm-10">

                                         
 
                                     </div>

                                </div>
    <script type="text/javascript">
    $('#submit').click(function() {



        var exam_name = $('#examname').val();
        var exam_type = $('#examtype').val();
        var dataString = 'examname=' + exam_name + '&examtype=' + exam_type;
        $.ajax({

            type: "post",
            url: "create_exam_success.php",
            data: dataString,
            cache: false,
            success: function(data) {

                var msg= data;
                $('#examname').val('');
                
                if(msg=="success"){
                    $.Notification.autoHideNotify('success', 'top left', 'Exam Notification', '' + exam_name + ' successfully created');
                }else{
                     $.Notification.autoHideNotify('error', 'top right', 'ERROR', '' + msg + '');
                }

               
            }
        });
        return false;
    });
</script>
                           
                        </div>
                    </div>
                </div>


</div><!--end of row-->
</div><!--end of container -->
<?php require 'footer.php';?>