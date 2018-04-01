<?php require 'header.php'; ?>
<style>
a:link
{
color:#FFF;
 font-family: 'Audiowide', cursive;
 font-size: 15px;
}
a:visited
{
color:#FFF;
}

</style>
<link rel="stylesheet" type="text/css" href="assets/css/spinner.css">
		
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
                                <h4 class="page-title">Code Builder</h4>
                                <p class="text-muted page-title-alt"></p>
                            </div>
                        </div>

 <?php

$userid = $profile['_id'];

$test_collection = $db->selectCollection('testschedule');
$test_collection_find = $test_collection->find(array(
    "testtype" => "coding"
));

foreach($test_collection_find as $t)
    {
    $t["testid"];
    }

$testing_id = $t['testid'];

$coding_collection = $db->selectCollection('coding_answerscript');
$coding_collection_find = $coding_collection->find(array(
    "testid" => $testing_id,
    "userid" => new MongoId($userid)
));
$coding_collection_count = $coding_collection_find->count();

if($coding_collection_count > 0){



?>                     

           <div id="preloader" style="display:none;"> 

           <svg class="spinner-container" viewBox="0 0 44 44">    
            <circle class="path" cx="22" cy="22" r="20" fill="none" stroke-width="4"></circle>   
            </svg>

            </div>
            
            <div id="sa-success"></div>
            <div id="leaderboard" style="display:none;">
            <center>
            <a class="btn btn-warning btn-lg" href="leaderboard_coding.php" >CHECK LEADERBOARD</a>
            </center>
            </div>

           <center>
           <form action="buildprogram.php" method="post" id="form">


           <input type="submit" id="submit" class="btn btn-primary btn-lg" value="BUILD PROGRAM">

           </form>
           </center>

                         <!-- end row -->
                       
  
         

     <script type="text/javascript">

       $('#submit').click(function() {
        $('#submit').hide();
        $('#preloader').show();

        
        $.ajax({

            type: "post",
            url: "buildprogram.php",
            data: $('#form').serialize(),
            cache: false,

            success: function(data,status) {

                $('#preloader').hide();
                
                  var msg= data;
                  $('#form')[0].reset();
                if(status!="success") {

                    alert('Something went wrong.');
                }else{
                    if(msg=="success")
                    {
                        $("#sa-success").click();
                        $('#leaderboard').show();

                    }else
                    {
                        $.Notification.autoHideNotify('error', 'top right', 'ERROR', '' + msg + '');

                        $('#leaderboard').show();
                    }

                }


               
            }
        });
        return false;
    });




</script>        
<!-- Sweet-Alert  -->
        <script src="assets/plugins/sweetalert/dist/sweetalert.min.js"></script>
        <script src="assets/pages/jquery.sweet-alert.init.js"></script>
                            

<?php

}
else{



?>  
<div class="row">
<div class="col-md-4"></div> 

<div class="col-lg-8">
<img src="icons/closed.svg" class="img-responsive"  width="300" height="300">
</div>


<div class="col-md-2"></div> 
<div class="col-md-10">
<h3 style="font-family: 'Audiowide', cursive;">Automatically unlocked after completing Coding Challenge</h3>
</div>


</div>
<?php } ?>
<?php require 'footer.php'; ?>