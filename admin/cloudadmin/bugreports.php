<?php require 'header.php'; ?>
 <div class="wrapper">
            <div class="container">
 <!-- Modal css(Custom box) -->
        <link href="assets/plugins/custombox/dist/custombox.min.css" rel="stylesheet">

 <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="btn-group pull-right m-t-15">
                          
                        </div>
                        <h4 class="page-title">Bug Reports</h4>
                        <ol class="breadcrumb">
                           <a class="btn btn-primary" href="bug_pdf.php" target="_blank"><span class="glyphicon glyphicon-cloud-download"></span> COMPLETE BUG REPORTS</a>

                           <a class="btn btn-success" href="bug_currentmonth_pdf.php" target="_blank"><span class="glyphicon glyphicon-cloud-download"></span> CURRENT MONTH BUG REPORTS</a>

                           <a class="btn btn-info" href="bug_previousmonth_pdf.php" target="_blank"> <span class="glyphicon glyphicon-cloud-download"></span> PREVIOUS MONTH BUG REPORTS</a>

                          
                           <a class="btn btn-danger" href="delete_bugs_all.php"><span class="glyphicon glyphicon-remove"></span> DROP COMPLETE BUG REPORTS</a>

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
                                        <th>Registration Number</th>
                                        <th>Date</th>
                                        <th>Feedbacks</th>
                                        <th>Action</th>                                       
                                    </tr>
                                </thead>


                                <tbody>
                                	<?php 
                                	 $bug= $db->selectCollection('bug_report');
                                	 $bug_find= $bug->find();

                                	 foreach($bug_find as $bugf)
                                	 {

                                	 

                                	?>
                                	<!-- Modal -->
							        <div id="bugf<?php echo $bugf["_id"]; ?>" class="modal-demo">
							            <button type="button" class="close" onclick="Custombox.close();">
							                <span>&times;</span><span class="sr-only">Close</span>
							            </button>
							            <h4 class="custom-modal-title"><?php echo $bugf["fullname"]; ?></h4>
							            <div class="custom-modal-text">
							              <?php echo $bugf["msg"]; ?>
							            </div>
							        </div>
							        <!--Modal-->
                                    <tr>
                                        <td><?php echo $bugf["fullname"]; ?></td>
                                        <td><?php echo $bugf["regdno"]; ?></td>
                                        <td><?php echo $bugf["posting_date"]; ?></td>
                                        <td><a href="#bugf<?php echo $bugf["_id"]; ?>" class="btn btn-primary waves-effect waves-light" data-animation="fadein" data-plugin="custommodal"                                            data-overlaySpeed="200" data-overlayColor="#36404a">View</a>
                                        </td>                                       
                                        <td><form action="delete_bug.php" method="post"><input type="hidden" name="bug" value="<?php echo $bugf["_id"]; ?>"/><input type="submit" class="btn btn-danger" value="DELETE"/></form></td>                     
                                    </tr>

                                    <?php 

                                     }

                                    ?>
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

 
        

</div><!--end of row-->
</div><!--end of container -->
<?php require 'footer.php'; ?>