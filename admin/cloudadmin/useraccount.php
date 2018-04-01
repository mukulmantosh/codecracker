<?php
require 'header.php';
?>

<!-- =======================
             ===== START PAGE ======
             ======================= -->

        <div class="wrapper">
            <div class="container">

                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                          <h4 class="page-title">User Accounts</h4>
                        <br>
                    </div>
                </div>
                <!-- Page-Title -->

              
                <div class="row">
                   
                    <div class="col-lg-3 col-sm-6">
                        <div class="widget-panel widget-style-2 bg-white">
                            <i class="md md-account-child"></i>
                            <a href="user_lists.php"><h2 class="m-0 text-dark  font-600">View</h2>
                            <div class="text-muted m-t-5">Users</div></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="widget-panel widget-style-2 bg-white">
                           <i class="md md-lock-outline"></i>
                            <a href="reset_password_list.php"><h2 class="m-0 text-dark  font-600">Reset</h2>
                            <div class="text-muted m-t-5">Passwords</div></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="widget-panel widget-style-2 bg-white">
                            <i class="md md-assignment-ind"></i>
                            <a href="delete_account.php"><h2 class="m-0 text-dark  font-600">Delete</h2>
                            <div class="text-muted m-t-5">Users</div></a>
                        </div>
                    </div>
                </div>





               </div><!--end of container -->
           </div><!-- end of wrapper -->
                 




<?php
require 'footer.php';

?>