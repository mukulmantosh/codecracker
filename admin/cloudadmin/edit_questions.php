<?php require 'header.php'; ?>
 <div class="wrapper">
            <div class="container">
 <!-- Modal css(Custom box) -->
        <link href="assets/plugins/custombox/dist/custombox.min.css" rel="stylesheet">
<?php 

$type       =   base64_decode($_GET['type']);
$category   =   base64_decode($_GET['category']);

?>
 <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="btn-group pull-right m-t-15">
                          
                        </div>
                        <h4 class="page-title">Edit Questions || <?php echo $category; ?></h4>
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
                                        <th>Question Number</th>
                                        <th>Question</th>
                                        <th>Action</th>                                       
                                    </tr>
                                </thead>
                                <tbody>

                                <?php 
                                $question= $db->selectCollection('questions');
                                $question_find = $question->find(array("category" =>$category, "type" => $type));
                                foreach($question_find as $ques)
                                {
                                ?>
                               
                                <tr>    
                                <td><?php echo $ques["questionnumber"]; ?></td>
                                <td><?php echo substr($ques["text"], 0,30)."......."; ?></td>
                                <td><a href="edit_ques.php?id=<?php echo base64_encode($ques["_id"]); ?>&category=<?php echo base64_encode($category); ?>&type=<?php echo base64_encode($type); ?>" class="btn btn-primary">Edit</a></td>
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