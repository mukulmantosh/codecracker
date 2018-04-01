<?php require 'header.php'; ?>

  <!-- =======================
             ===== START PAGE ======
             ======================= -->

        <div class="wrapper">
            <div class="container">


 <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                       
                        <h4 class="page-title">Reset Passwords</h4>
                        <ol class="breadcrumb">                           
                        </ol>

                    </div>
                </div>
                <!-- Page-Title -->


                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box table-responsive">
                          

                            <table id="datatable" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>University Registration Number</th>
                                        <th>Reset</th>
                                       
                                    </tr>
                                </thead>


                                <tbody>
                                	<?php 
                                	$registration= $db->selectCollection('registration');
                                	$registration_find= $registration->find();
                                	foreach($registration_find as $reg)
                                	{

                                	?>
                                    <tr>
                                        <td><?php echo $reg["fullname"]; ?></td>
                                        <td><?php echo $reg["regdno"]; ?></td>
                                        <td> 
                                        <form action="reset_password_success.php" method="post">
                                          <input type="hidden" name="id" value="<?php echo $reg["_id"]; ?>">
                                          <input type="hidden" name="regdno" value="<?php echo $reg["regdno"]; ?>"> 
                                          <input type="submit" class="btn btn-info" value="RESET PASSWORD"> 
                                       </form>
                                        </td>
                                                                           
                                    </tr>
                                   <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>




</div><!--end of row-->
</div><!--end of container -->
<?php require 'footer.php'; ?>