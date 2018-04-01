<?php require 'header.php'; ?>

  <!-- =======================
             ===== START PAGE ======
             ======================= -->

        <div class="wrapper">
            <div class="container">


 <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                       
                        <h4 class="page-title">Users Lists</h4>
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
                                        <th>Gender</th>
                                        <th>Certificate Issued</th>
                                        <th>Created At</th>   
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
                                        <td><?php echo $reg["gender"]; ?></td> 
                                        <td><?php echo $reg["certificate_status"]; ?></td>
                                        <td><?php echo $reg["createdAt"]; ?></td>                                       
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