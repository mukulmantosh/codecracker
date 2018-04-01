<?php require'header.php'; ?>
<div class="wrapper">
<div class="container">
   <?php 
      date_default_timezone_set("Asia/Kolkata");
      $date =date('Y-m-d');
      $time = date('H:i:s'); // Display in 24-Hrs Format
      
      ?>

<!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="btn-group pull-right m-t-15">
                          
                        </div>
                        <h4 class="page-title">Hackathon</h4>
                        <ol class="breadcrumb">

                          
                        </ol>

                    </div>
                </div>
                <!-- Page-Title -->


   <div class="row">
      <div class="col-sm-12">
         <div class="card-box">
            <div class="row">
           
               <div class="col-md-4"></div>
               <div class="col-md-5">
                <?php
                $hackathon_collection = $db->selectCollection('hackathon');
                $hackathon_collection_count= $hackathon_collection->find()->count();
                
                if($hackathon_collection_count >0 ){

                
                  echo "<div class='col-md-12'>";
                  echo "<h3>Hackathon Created || Up and Running</h3><br>";
                  echo "<center><a href='hackathon_delete.php' class='btn btn-primary'>Delete Hackathon</a></center>";
                  echo "</div></div></div></div></div></div>";
                  require 'footer.php'; 
                  die();
                }
                else{



                ?>

  <script type="text/javascript" src="timepicker/jquery.timepicker.min.js"></script>
  <link rel="stylesheet" type="text/css" href="timepicker/jquery.timepicker.css" />

  <script type="text/javascript" src="timepicker/lib/bootstrap-datepicker.js"></script>
  <link rel="stylesheet" type="text/css" href="timepicker/lib/bootstrap-datepicker.css" />


                  <form role="form" method="post" id="form">
                     <div class="form-group">
                        <label class="col-md-4 control-label">Hackathon Title</label>
                        <div class="col-md-10">
                           <input type="text" class="form-control" placeholder="title" id="title" name="title" autocomplete="off" required>
                        </div>
                     </div>
                     <div class="form-group">
                        <label class="col-md-4 control-label">Instructions</label>
                        <div class="col-md-10">
                           <textarea class="form-control" rows="10" id="instruction" name="instruction"></textarea>
                        </div>
                     </div>
                     <div class="form-group">
                        <label class="col-md-7 control-label">Closing Time</label>
                        <div class="col-md-10">
                           <input type="text" class="form-control" class="time"  id="time" name="time"  autocomplete="off" required>
                        </div>
                     </div>
                     
                     <div class="form-group">
                        <label class="col-md-4 control-label">Date</label>
                        <div class="col-md-10">
                           <input type="text" class="form-control" id="date" name="date" value="<?php echo $date; ?>" autocomplete="off" required>
                        </div>
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

                <script>
                $(function() {
                    $('#time').timepicker({ 'minTime': '1:00am',
                      'maxTime': '11:30pm'});
                });
            </script>

               <script type="text/javascript">
                  $('#submit').click(function() {
                  
                  
                      var title = $('#title').val();
                      var instruction = $('#instruction').val();
                      var time = $('#time').val();                    
                      var date = $('#date').val();
                     
                      var dataString = 'title=' + title + '&instruction=' + instruction + '&time=' +
                        time  + '&date=' + date;
                      $.ajax({
                  
                          type: "post",
                          url: "hackathon_success.php",
                          data: dataString,
                          cache: false,
                          success: function(data) {
                  
                              var msg= data;
                             
                           
                               
                              if(msg=="success"){
                                  $.Notification.autoHideNotify('success', 'top left', 'Hackathon Notification', 'Hackathon successfully created');
                                     $('#form').hide();
                                  window.setTimeout(function(){location.reload()},600)

                              }else{
                                   $.Notification.autoHideNotify('error', 'top right', 'ERROR', '' + msg + '');
                                   $('#form')[0].reset();
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
   <!--end of row-->
</div>
<!--end of container -->
<?php require 'footer.php';?>