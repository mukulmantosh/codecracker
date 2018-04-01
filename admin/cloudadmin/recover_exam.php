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
                        <h4 class="page-title">Recovery Main Exam</h4>
                        <ol class="breadcrumb">
                         
                        </ol>

                    </div>
                </div>
                <!-- Page-Title -->
<?php


$test_schedule= $db->selectCollection('testschedule');
$result_collection = $db->selectCollection('results');
$test_schedule_find = $test_schedule->find();

foreach($test_schedule_find as $test){
    $testid = $test["testid"];
}



?>


                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box table-responsive">
                          
                            <table id="datatable" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                         <th>Recover</th>                                       
                                    </tr>
                                </thead>


                                <tbody>
                                	<?php 
                                	 
                                	 $result_collection_find = $result_collection->find(array("testid" =>$testid, "resultstatus" => "examstarted"));

                                     foreach($result_collection_find as $res){


                                	?>
                                	
                                    <tr>
                                        
                                        <td><?php echo $res["fullname"]; ?></td>
                                        <td>
                                           <form action="recover_exam_success.php" method="post">
                                           <input type="hidden" value="<?php echo $res["_id"]; ?>" name="recover">
                                        <td><input type="submit" class="btn btn-info" value="RECOVER EXAM"></td>

                                           </form>
                                        </td>
                                                         
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