<?php require 'header.php'; ?>
  <div class="wrapper">
            <div class="container">

<?php 

$category	=	base64_decode($_GET['category']);
$id         =   base64_decode($_GET['id']);

$question_collection= $db->selectCollection('studentquest');

    $question_collection_find= $question_collection->find(array("_id" => new MongoId($id), "category" => $category));

    foreach($question_collection_find as $ques){
?>
   <div class="row">

                    <div class="col-sm-12">
                        <div class="card-box">
                            <div class="row">
                 <center><h3 class="m-t-0 header-title"><b><?php echo $category; ?></b></h3></center>
                            	<div class="col-md-4"></div>

                                <div class="col-md-5">
           

                                    <form role="form" action="questionupdate_student.php" method="post" id="form">
                                        <div class="form-group">
                                             <label class="col-md-4 control-label">Question</label>
                                            <div class="col-md-10">
                                                <textarea cols="35" rows="15" class="form-control" name="question" id="question"> <?php echo $ques["question"]; ?></textarea>
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
                                            	
                                                <input type="number" min="1" max="4" name="answer" id="answer" class="form-control" value="<?php echo $ques["answer"]; ?>">
                                            </div>
                                        </div>
                                       
                                             
                                      <label class="col-sm-8 control-label"></label>
                                       <div class="col-sm-10">
                                        <center><button type="submit" id="submit" class="btn btn-purple waves-effect waves-light">UPLOAD TO DB</button></center>
                                     </div>
                                    </form>

                                     <div class="col-sm-10"></div>

                                    <label class="col-sm-8 control-label"></label>
                                       <div class="col-sm-10"></div>
 
                           
                        </div>
                    </div>
                </div>

<?php } ?>
</div><!--end of container -->
</div><!-- end of wrapper -->
<?php require 'footer.php'; ?>