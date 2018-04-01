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
                        <h4 class="page-title">Upload Questions</h4>
                        <ol class="breadcrumb">
                          
   <form action="allow_post_access.php" method="post">
                <?php
                $request= $db->selectCollection('stud_access');
                $requestfind= $request->find();
                foreach($requestfind as $req)
                {
                    
                    $req["access"];
                
                }
                if($req["access"]==="ALLOW")
                {
                
                echo '<input type="submit" name="access" class="btn btn-danger btn-lg" value="NOTALLOW">';
                
                }
                else
                {
                    
                echo '<input type="submit" name="access" class="btn btn-primary btn-lg" value="ALLOW">';
                    
                }
                
                ?>
                
                            
                </form>
                           
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
                                        <th>Category</th>
                                        <th>Posted On</th>
                                        <th>Edit</th>
                                        <th>Delete</th>                                       
                                    </tr>
                                </thead>


                                <tbody>
                                	<?php 
                                	 $studentquest= $db->selectCollection('studentquest');
                                	 $question_find= $studentquest->find();

                                	 foreach($question_find as $q)
                                	 {

                                	 

                                	?>
                                
                                    <tr>
                                        <td><?php echo $q["name"]; ?></td>
                                        <td><?php echo $q["regdno"]; ?></td>
                                        <td><?php echo $q["category"]; ?></td>
                                        <td><?php echo $q["createdAt"]; ?></td>
                                        <td><a href="edit_student_question.php?id=<?php echo base64_encode($q["_id"]); ?>&category=<?php echo base64_encode($q["category"]); ?>" class="btn btn-primary">Edit</a></td>
                                       

                                        <td>
                                            <form action="student_quesdelete.php" method="post">
                                            <input type="hidden" name="delete"
                                            value="<?php echo $q['_id']; ?>">
                                            <input type="submit" value="DELETE"
                                            class="btn btn-danger">
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