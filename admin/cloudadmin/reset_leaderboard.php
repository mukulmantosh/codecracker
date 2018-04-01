<?php require'header.php'; ?>

  <div class="wrapper">
            <div class="container">
 <!-- Forms -->
                <div class="row">

                    <div class="col-sm-12">
                        <div class="card-box">
                            <div class="row">
                      <h4 class="page-title">Reset Leaderboard</h4>
                        <ol class="breadcrumb">
                           <a class="btn btn-warning" href="leaderboard_report.php" target="_blank"><span class="glyphicon glyphicon-cloud-download"></span> DOWNLOAD LEADERBOARD REPORT</a>


                        </ol>
                 <div class="col-md-4"></div>

                 <div class="col-md-4">  
                 <h3 class="m-t-0 header-title"><b>Reset Leaderboard</b></h3>
                            	<p>ALL SCORES WILL BE REMOVED || PLEASE MAKE SURE THAT THERE IS NO TEST SCHEDULED !!!</p></center>
                             

                             
                       <form action="reset_leaderboard_success.php" method="post">
                        <input type="hidden" name="delete_leaderboard"> 
                       <input type="submit" class="btn btn-primary btn-lg" value="RESET LEADERBOARD">
                                    
                         </form>
                         </div>
                         
                         
                             

                                     </div>

                                     </div>

                                </div>

                           
                        </div>
                    </div>
                </div>


</div><!--end of row-->
</div><!--end of container -->
<?php require 'footer.php';?>