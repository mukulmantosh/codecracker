<?php require 'header.php'; ?>
  <div class="wrapper">
            <div class="container">

<?php 

$type		=	base64_decode($_GET['type']);
$category	=	base64_decode($_GET['category']);

if($type==="mcq")
{


?>

   <div class="row">

                    <div class="col-sm-12">
                        <div class="card-box">
                            <div class="row">
                 <center><h3 class="m-t-0 header-title"><b><?php echo $category; ?></b></h3></center>
                            	<div class="col-md-4"></div>

                                <div class="col-md-5">
           

                                    <form role="form" method="post" id="form">
                                        <div class="form-group">
                                             <label class="col-md-4 control-label">Question</label>
                                            <div class="col-md-10">
                                                <textarea cols="35" rows="15" class="form-control" name="question" id="question" required></textarea>
                                            </div>
                                        </div>


                                        <div class="form-group">
                                             <label class="col-md-4 control-label">OPTION 1</label>
                                            <div class="col-md-10">
                                                <input type="text" name="option1" id="option1" class="form-control">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                             <label class="col-md-4 control-label">OPTION 2</label>
                                            <div class="col-md-10">
                                                <input type="text" name="option2" id="option2" class="form-control">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                             <label class="col-md-4 control-label">OPTION 3</label>
                                            <div class="col-md-10">
                                                <input type="text" name="option3" id="option3" class="form-control">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                             <label class="col-md-4 control-label">OPTION 4</label>
                                            <div class="col-md-10">
                                                <input type="text" name="option4" id="option4" class="form-control">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                             <label class="col-md-4 control-label">ANSWER</label>
                                            <div class="col-md-10">
                                            	<input type="hidden" name="category" id="category" value="<?php echo $category; ?>"/>
                                            	<input type="hidden" name="type" id="type" value="<?php echo $type; ?>"/>
                                                <input type="number" min="1" max="4" name="answer" id="answer" class="form-control">
                                            </div>
                                        </div>
                                       
                                             
                                      <label class="col-sm-8 control-label"></label>
                                       <div class="col-sm-10">
                                        <center><button type="submit" id="submit" class="btn btn-purple waves-effect waves-light">ADD QUESTION</button></center>
                                     </div>
                                    </form>

                                     <div class="col-sm-10"></div>

                                    <label class="col-sm-8 control-label"></label>
                                       <div class="col-sm-10"></div>
    <script type="text/javascript">
    $('#submit').click(function() {


	     $.ajax({

            type: "post",
            url: "add_questions_success.php",
            data: $('#form').serialize(),
            cache: false,
           
             success: function(data,status) {
                var msg= data;
                  $('#form')[0].reset();
                if(status!="success") {

                    alert('Something went wrong...Refresh');
                }else{
                    if(msg=="success")
                    {
                        $.Notification.autoHideNotify('success', 'top left', 'Exam Notification', 'Question Added Successfully');
                    }else
                    {
                        $.Notification.autoHideNotify('error', 'top right', 'ERROR', '' + msg + '');
                    }

                }


            }

        });
        return false;
    });



  
</script>
                           
                        </div>
                    </div>
                </div>

<?php
	
}
else if ($type==="coding") 
{
	
 ?>

 <div class="row">

                    <div class="col-sm-12">
                        <div class="card-box">
                            <div class="row">
                 <center><h3 class="m-t-0 header-title"><b><?php echo $category; ?></b></h3></center>
                                <div class="col-md-4"></div>

                                <div class="col-md-5">
           

                                    <form role="form" method="post" id="form">
                                        <div class="form-group">
                                             <label class="col-md-4 control-label">Problem Statement</label>
                                            <div class="col-md-10">
                                                <textarea cols="35" rows="15" class="form-control" name="question" id="question" required></textarea>
                                            </div>
                                        </div>


                                         <div class="form-group">
                                             <label class="col-md-12 control-label">Expected Input (Example ->  48,72,51,36)</label>
                                            <div class="col-md-10">
                                                <textarea cols="25" rows="10" class="form-control" name="input" id="input" required></textarea>
                                            </div>
                                        </div>


                                        <div class="form-group">
                                             <label class="col-md-12 control-label">Expected Output (Example ->  Right,Wrong,Wrong,Right)</label>
                                            <div class="col-md-10">
                                                <textarea cols="25" rows="10" class="form-control" name="output" id="output" required></textarea>
                                                <input type="hidden" name="category" id="category" value="<?php echo $category; ?>"/>
                                                <input type="hidden" name="type" id="type" value="<?php echo $type; ?>"/>
                                               
                                            </div>
                                        </div>


                                    
                                             
                                      <label class="col-sm-8 control-label"></label>
                                       <div class="col-sm-10">
                                        <center><button type="submit" id="submit" class="btn btn-purple waves-effect waves-light">ADD QUESTION</button></center>
                                     </div>
                                    </form>

                                     <div class="col-sm-10"></div>

                                    <label class="col-sm-8 control-label"></label>
                                       <div class="col-sm-10">                                  
                
                                     </div>

                                </div>
    <script type="text/javascript">
    $('#submit').click(function() {



        $.ajax({

            type: "post",
            url: "add_questions_success.php",
            data: $('#form').serialize(),
            cache: false,
            async:true,
            dataType: "html",
            success: function(data,error) {
               
                var msg= data;
                  $('#form')[0].reset();
                
                if(msg=="success"){
                    $.Notification.autoHideNotify('success', 'top left', 'Exam Notification', 'Question Added Successfully');
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


 <?php 

 }
 
else{
	die("<center><h3>SOMETHING WENT WRONG || CATEGORY & TYPE DOESNOT EXISTS</h3></center>");
}


?>
</div><!--end of container -->
</div><!-- end of wrapper -->
<?php require 'footer.php'; ?>