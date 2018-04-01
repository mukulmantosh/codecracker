<?php require 'header.php'; ?>

<!-- DataTables -->
        <link href="assets/plugins/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/plugins/datatables/buttons.bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/plugins/datatables/fixedHeader.bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/plugins/datatables/responsive.bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/plugins/datatables/scroller.bootstrap.min.css" rel="stylesheet" type="text/css" />

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
                        <h4 class="page-title">Ranking</h4>
                        <p class="text-muted page-title-alt">My objective has always been to get better, no matter where my ranking is. - <i>Luke Donald</i></p>
                        <ol class="breadcrumb">
                         
                        </ol>
                     </div>
                  </div>

                        

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box table-responsive">
                                    

                                    <table id="datatable" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>#RANKING</th>
                                                <th>NAME</th>
                                                <th>SCORE</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php  
                                            $members = $db->selectCollection('leaderboard');
                                            $memres = $members->find()->sort(array("total" => -1));
                                            $i=1;

                                            $memres_count = $memres->count();
                                           
                                           if($memres_count >0){

                                           foreach($memres as $memview)
                                            {
                                            ?>

                                            <tr>
                                                <td><?php echo $i; ?></td>
                                                <td><?php echo $memview["fullname"] ?></td>
                                                <td>
                                                   
                                                <?php 
                                                if(isset($memview["total"])) {

                                                        echo $memview["total"]; 

                                                    }
                                                    
                                                ?>
                                                
                                                </td>
                                              
                                            </tr>

                                            <?php $i++; } } ?>
                                       </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>



 <script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="assets/plugins/datatables/dataTables.bootstrap.js"></script>

        <script src="assets/plugins/datatables/dataTables.buttons.min.js"></script>
        <script src="assets/plugins/datatables/buttons.bootstrap.min.js"></script>
        <script src="assets/plugins/datatables/jszip.min.js"></script>
        <script src="assets/plugins/datatables/pdfmake.min.js"></script>
        <script src="assets/plugins/datatables/vfs_fonts.js"></script>
        <script src="assets/plugins/datatables/buttons.html5.min.js"></script>
        <script src="assets/plugins/datatables/buttons.print.min.js"></script>

        <script src="assets/plugins/datatables/dataTables.fixedHeader.min.js"></script>
        <script src="assets/plugins/datatables/dataTables.keyTable.min.js"></script>
        <script src="assets/plugins/datatables/dataTables.responsive.min.js"></script>
        <script src="assets/plugins/datatables/responsive.bootstrap.min.js"></script>
        <script src="assets/plugins/datatables/dataTables.scroller.min.js"></script>

        <script src="assets/pages/datatables.init.js"></script>
<script type="text/javascript">
            $(document).ready(function() {
                $('#datatable').dataTable();
                $('#datatable-keytable').DataTable( { keys: true } );
                $('#datatable-responsive').DataTable();
                $('#datatable-scroller').DataTable( { ajax: "assets/plugins/datatables/json/scroller-demo.json", deferRender: true, scrollY: 380, scrollCollapse: true, scroller: true } );
                var table = $('#datatable-fixed-header').DataTable( { fixedHeader: true } );
            } );
            TableManageButtons.init();

        </script>



<?php require 'footer.php'; ?>