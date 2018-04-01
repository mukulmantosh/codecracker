<?php require 'header.php'; ?>

  <!-- =======================
             ===== START PAGE ======
             ======================= -->

        <div class="wrapper">
            <div class="container">


 <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                       
                        <h4 class="page-title">Hackathon Delete</h4>
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
                                        <th>Hackathon Title</th>
                                        <th>End Time</th>
                                        <th>Date</th>                                       
                                        <th>Action</th>                          
                                    </tr>
                                </thead>


                                <tbody>
                                	<?php 
                                	$hackathon= $db->selectCollection('hackathon');
                                	$hackathon_find= $hackathon->find();
                                	foreach($hackathon_find as $hack)
                                	{

                                                                            
                                        date_default_timezone_set("Asia/Kolkata");


                                                              





                                	?>
                                    <tr>
                                        <td><?php echo $hack["title"]; ?></td>
                                        <td><?php echo $hack["time"]; ?></td>
                                        <td><?php echo $hack["date"]; ?></td>
                                        <td>
                                            <form action="hackathon_delete_success.php" method="post">    
                                            <input type="hidden" name="hackdelete" value="<?php echo $hack["_id"]; ?>" />
                                            <input type="submit" class="btn btn-danger" value="DELETE"/>
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