<?php require 'header.php'; ?>
<?php

require_once '../csrf_request_type_functions.php';
require_once '../csrf_token_functions.php';

?>
<style type="text/css">
   textarea {
   resize: none;
   }
</style>
<link href="assets/css/autowide.css" rel="stylesheet" type="text/css"/>


<!-- ============================================================== -->
         <!-- Start right Content here -->
         <!-- ============================================================== -->
         <div class="content-page">
            <!-- Start content -->
            <div class="content">
               <div class="container">

                  <!-- Page-Title -->
                  <div class="row">
                     <div class="col-sm-12">
                        <h4 class="page-title">Bug Report</h4>
                        <p class="text-muted page-title-alt">If you wanna know how not secure you are, just take a look around. Nothing's secure. Nothing's safe. I don't hate technology, I don't hate hackers, because that's just what comes with it, without those hackers we wouldn't solve the problems we need to solve, especially security. - <i> Fred Durst</i>
</p> 
                        <ol class="breadcrumb"></ol>
                     </div>
                  </div>
                <h3 style="text-align: center;color:#ff6600; font-family: 'Audiowide', cursive;">

               If you are a security researcher and come across any vulnerability in our Application then please report to us. We need your support to make this Application more secure and robust.

                </h3>
                <br><br>
               




            <form id="form" class="form-horizontal form-row-separated">
               <div class="form-group">
                  <label for="textarea3" class="col-sm-1 col-lg-1 control-label"></label>
                  <div class="col-sm-9 col-lg-10 controls">
                     <textarea name="bug" id="bug" rows="10" placeholder="Please provide us the details where you have exposed vulnerabilities in the Application"  class="form-control" required></textarea>
                      <?php echo csrf_token_tag(); ?>
                  </div>
               </div>
               <div class="form-group last">
                  <center><button type="submit" id="submit" name="submit"
                   class="btn btn-primary"><i class="fa fa-check"></i> Report Vulnerability</button></center>
               </div>
            </form>
            <center>
               <div id="ack"  style="color:#33ccff; font-size:30px;font-family: 'Audiowide', cursive;"><strong></strong></div>
            </center>



<script>
   function enableTab(id) {
       var el = document.getElementById(id);
       el.onkeydown = function(e) {
           if (e.keyCode === 9) { // tab was pressed
   
               // get caret position/selection
               var val = this.value,
                   start = this.selectionStart,
                   end = this.selectionEnd;
   
               // set textarea value to: text before caret + tab + text after caret
               this.value = val.substring(0, start) + '\t' + val.substring(end);
   
               // put caret at right position again
               this.selectionStart = this.selectionEnd = start + 1;
   
               // prevent the focus lose
               return false;
   
           }
       };
   }
   
   // Enable the tab character onkeypress (onkeydown) inside textarea...
   // ... for a textarea that has an `id="my-textarea"`
   enableTab('feedback');
   
   
</script>
  <script type="text/javascript">

       $('#submit').click(function() {


        
        $.ajax({

            type: "post",
            url: "bugreport_success.php",
            data: $('#form').serialize(),
            cache: false,
            success: function(data) {

                
               $('#form')[0].reset();
                
                $('#ack').html(data);

               
            }
        });
        return false;
    });




</script>  
<?php require 'footer.php'; ?>