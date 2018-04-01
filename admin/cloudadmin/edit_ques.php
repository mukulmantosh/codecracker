<?php require 'header.php'; ?>
  <div class="wrapper">
            <div class="container">

<?php 

$type		=	base64_decode($_GET['type']);
$category	=	base64_decode($_GET['category']);
$id         =   base64_decode($_GET['id']);

$question_collection= $db->selectCollection('questions');

if($type==="mcq")
{
    $question_collection_find= $question_collection->find(array("_id" => new MongoId($id), "category" => $category, "type" => $type));

    foreach($question_collection_find as $ques){


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
                                                <textarea cols="35" rows="15" class="form-control" name="question" id="question"> <?php echo $ques["text"]; ?></textarea>
                                            </div>
                                        </div>


                                        <div class="form-group">
                                             <label class="col-md-4 control-label">OPTION 1</label>
                                            <div class="col-md-10">
                                                <input type="text" name="option1" id="option1" class="form-control" value="<?php echo $ques["option1"]; ?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                             <label class="col-md-4 control-label">OPTION 2</label>
                                            <div class="col-md-10">
                                                <input type="text" name="option2" id="option2" class="form-control" value="<?php echo $ques["option2"]; ?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                             <label class="col-md-4 control-label">OPTION 3</label>
                                            <div class="col-md-10">
                                                <input type="text" name="option3" id="option3" class="form-control" value="<?php echo $ques["option3"]; ?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                             <label class="col-md-4 control-label">OPTION 4</label>
                                            <div class="col-md-10">
                                                <input type="text" name="option4" id="option4" class="form-control" value="<?php echo $ques["option4"]; ?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                             <label class="col-md-4 control-label">ANSWER</label>
                                            <div class="col-md-10">
                                                <input type="hidden" name="questionid" id="questionid" value="<?php echo $id; ?>">
                                            	<input type="hidden" name="category" id="category" value="<?php echo $category; ?>"/>
                                            	<input type="hidden" name="type" id="type" value="<?php echo $type; ?>"/>
                                                <input type="number" min="1" max="4" name="answer" id="answer" class="form-control">
                                            </div>
                                        </div>
                                       
                                             
                                      <label class="col-sm-8 control-label"></label>
                                       <div class="col-sm-10">
                                        <center><button type="submit" id="submit" class="btn btn-purple waves-effect waves-light">UPDATE QUESTION</button></center>
                                     </div>
                                    </form>

                                     <div class="col-sm-10"></div>

                                    <label class="col-sm-8 control-label"></label>
                                       <div class="col-sm-10"></div>
    <script type="text/javascript">
    $('#submit').click(function() {


      
        $.ajax({

            type: "post",
            url: "update_questions_success.php",
            data: $('#form').serialize(),
            cache: false,
            success: function(data) {

                var msg= data;
                  
                
                if(msg=="success"){
                    $.Notification.autoHideNotify('success', 'top left', 'UPDATE', 'Question Updated');
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
}
else if ($type==="coding") 
{
	 $question_collection_find= $question_collection->find(array("_id" => new MongoId($id), "category" => $category, "type" => $type));

    foreach($question_collection_find as $ques){
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
                                                <textarea cols="35" rows="15" class="form-control" name="question" id="question" required><?php echo $ques["text"];  ?></textarea>
                                            </div>
                                        </div>


                                         <div class="form-group">
                                             <label class="col-md-4 control-label">Expected Input</label>
                                            <div class="col-md-10">
                                                <textarea cols="25" rows="10" class="form-control" name="input" id="input" ><?php echo  $ques["input"]; ?></textarea>
                                            </div>
                                        </div>


                                        <div class="form-group">
                                             <label class="col-md-4 control-label">Expected Output</label>
                                            <div class="col-md-10">
                                                <textarea cols="25" rows="10" class="form-control" name="output" id="output" required><?php echo  $ques["output"]; ?></textarea>
                                                <input type="hidden" name="category" id="category" value="<?php echo $category; ?>"/>
                                                <input type="hidden" name="type" id="type" value="<?php echo $type; ?>"/>
                                                <input type="hidden" name="questionid" id="questionid" value="<?php echo $id; ?>">
                                               
                                            </div>
                                        </div>


                                    
                                             
                                      <label class="col-sm-8 control-label"></label>
                                       <div class="col-sm-10">
                                        <center><button type="submit" id="submit" class="btn btn-purple waves-effect waves-light">UPDATE QUESTION</button></center>
                                     </div>
                                    </form>

                                     <div class="col-sm-10"></div>

                                    <label class="col-sm-8 control-label"></label>
                                       <div class="col-sm-10">                                  
                
                                     </div>

                                </div>
    <script type="text/javascript">
    $('#submit').click(function() {


        var questionid  = $('#questionid').val();
        var question = $('#question').val();
        var input = $('#input').val();
        var output = $('#output').val();
        var category = $('#category').val();
        var type = $('#type').val();
        
     
        var dataString = 'questionid='+ questionid +  '&question=' + question + '&input=' + input + '&output=' + output + '&category=' + category + '&type=' + type;  
        $.ajax({

            type: "post",
            url: "update_questions_success.php",
            data: dataString,
            cache: false,
            success: function(data) {

                var msg= data;
                  $('#form')[0].reset();
                
                 if(msg=="success"){
                    $.Notification.autoHideNotify('success', 'top left', 'UPDATE', 'Question Updated');
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
 }
 
else{
	die("<center><h3>SOMETHING WENT WRONG || CATEGORY & TYPE DOESNOT EXISTS</h3></center>");
}


?>
</div><!--end of container -->
</div><!-- end of wrapper -->
<?php require 'footer.php'; ?>