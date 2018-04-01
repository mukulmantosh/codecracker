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
                        <h4 class="page-title">Certificates</h4>
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
                                        <th>Registration Number</th>
                                        <th>Action</th>
                                       
                                                            
                                    </tr>
                                </thead>


                                <tbody>
                                	
                                   <?php
                                    $registration = $db->selectCollection('registration');
                                    $registration_find = $registration->find();
                                    $registration_count= $registration_find->count();
                                    
                                    if($registration_count > 0){


                                
                                    
                                    foreach($registration_find as $reg)
                                    {
                                   

                                            if($reg["certificate_status"]=="yes")
                                            {

                                    ?>
                                            
                                            <tr>
                                            <td><?php echo $reg["fullname"]; ?></td>
                                            <td><?php echo $reg["regdno"]; ?></td>
                                            <td>
                                            <form action="del_certificate.php" method="post">
                                            <input type="hidden" id="regdno" name="regdno" value="<?php echo $reg["regdno"]; ?>">    
                                            <button class="btn btn-danger" name="upload" type="submit">DELETE CERTIFICATE</button>
                                            </form>
                                            </td>                                            
                                            </tr>
                                            
                                            
                                          
                                    
                                        <?php 

                                           
                                            }
                                            else
                                            {
                                        ?>

                                                
                                                <tr>
                                                <td><?php echo $reg["fullname"]; ?></td>
                                                <td><?php echo $reg["regdno"]; ?></td>
                                                <td>

                                                <form action="create_certificate.php" method="post">   
                                                          
                                                <input type="hidden" name="fullname" value="<?php echo $reg["fullname"]; ?>">                     
                                                <input type="hidden" name="regdno" value="<?php echo $reg["regdno"]; ?>">
                                                <input type="submit" class="btn btn-primary" value="GENERATE CERTIFICATE">
                                                </form>

                                                </td>

                                                </tr>
                                                
                                                

                                            <?php
                                            
                                            }                                       
                                         
                                    } 
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