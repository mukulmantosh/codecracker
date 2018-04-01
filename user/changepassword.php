<?php 

require 'header.php'; 

require_once '../csrf_request_type_functions.php';
require_once '../csrf_token_functions.php';

?>

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
                        <h4 class="page-title">Change Password</h4>
                        <p class="text-muted page-title-alt"></p>  
                        <ol class="breadcrumb"></ol>
                     </div>
                  </div>


               <center> 

               <form method="post" id="form">  

               <input type="password" style="width: 25%;" class="form-control" name="current_password" placeholder="Current Password" required>
               <br>

               <input type="password" style="width: 25%;" class="form-control" name="new_password" placeholder="New Password" required>
               <br> 

                <input type="password" style="width: 25%;" class="form-control" name="confirm_new_password" placeholder="Confirm New Password" required>
                 <?php echo csrf_token_tag(); ?>
               <br>    

              <button type="submit" id="submit" class="btn btn-primary"><i class="fa fa-check"></i> Update Password</button>
               </div>
               </form>

               </center>

  
<script type="text/javascript">
    $('#submit').click(function() {

 
        $.ajax({

            type: "post",
            url: "changepass.php",
            data: $('#form').serialize(),
            cache: false,
            success: function(data,status) {
                var msg= data;
                  $('#form')[0].reset();
                if(status!="success") {

                    alert('Something went wrong.');
                }else{
                    if(msg=="success")
                    {
                        $.Notification.autoHideNotify('success', 'top left', 'Password', 'Updated Successfully');
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


<?php require 'footer.php'; ?>