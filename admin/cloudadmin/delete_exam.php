<?php require'header.php'; ?>
<?php 

$testcollection= $db->selectCollection('test');
$testcollectionfind= $testcollection->find();
$testcollectioncount= $testcollectionfind->count();

?>
  <div class="wrapper">
            <div class="container">
 <!-- Forms -->
                <div class="row">

                    <div class="col-sm-12">
                        <div class="card-box">
                            <div class="row">
                 <center><h3 class="m-t-0 header-title"><b>Delete Examination</b></h3>
                            	<p>WARNING !! ALL QUESTIONS IN PRACTICE AND MAIN QUESTION BANK WILL BE DELETED</p></center>
                              <div class="col-md-4"></div>

                                <div class="col-md-5">
              <script type="text/javascript">

                function chk(){

                  var exam_name=document.getElementById('examname').value;
                  var dataString='examname='+exam_name;
                  $.ajax({

                    type:"post",
                    url:"delete_exam_success.php",
                    data:dataString,
                    cache:false,
                    success:function(html){

                      $('#ack').html(html);
                      var msg=   document.getElementById('ack').innerHTML;
                     $('select').empty();
                     $('#myForm').hide();
                     $.Notification.autoHideNotify('error','top right', 'Exam Notification', ''+msg+'');
                        window.setTimeout(function(){location.reload()},500)
                    
                }


                  });

                    return false;
                }


                </script>  
                    <?php if($testcollectioncount >0)
                    {

                  
                      
                      ?>              <form id="myForm" role="form" method="post">
                                    
                                        <div class="form-group">
                                            <label class="col-sm-4 control-label">Examination Name</label>
                                            <div class="col-sm-10">
                                                <select class="form-control" placeholder="Exam Type" name="examname" id="examname" required>
                                                  
                                                  <?php 
                                                  foreach($testcollectionfind as $test){

                                                  ?>
                                                    <option value="<?php echo $test["testname"] ?>"><?php echo strtoupper($test["testname"]); ?></option>
                                                     
                                                     <?php 

                                                     } 

                                                     ?>                     
                                                

                                                </select>
                                        </div>

                                             
                                      <label class="col-sm-8 control-label"></label>
                                       <div class="col-sm-10">
                                        <center><button type="submit" id="submit" onclick="return chk()" class="btn btn-danger waves-effect waves-light">Submit</button></center>
                                     </div>
                                    </form>
                                    <?php } ?>
                                    <label class="col-sm-8 control-label"></label>
                                       <div class="col-sm-10">
<div id="ack"  style="display:none;"></div>
                                         
 
                                     </div>

                                </div>

                           
                        </div>
                    </div>
                </div>


</div><!--end of row-->
</div><!--end of container -->
<?php require 'footer.php';?>