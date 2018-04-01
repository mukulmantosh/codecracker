<?php require 'header.php'; ?>
<style type="text/css">   
   p{
      font-family: 'Audiowide', cursive;
   }


</style>
<?php
   $feedback_count= $db->selectCollection('feedback');
   $feedcount= $feedback_count->count();
   $question_count=$db->selectCollection('questions');
   $question_bank= $question_count->count();
   
   ?>       
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
       <p class="text-muted page-title-alt">Welcome <?php echo $profile["fullname"]; ?></p>
   </div>
</div>
<div class="row">
<div class="col-md-6 col-lg-3">
   <div class="widget-bg-color-icon card-box fadeInDown animated">
      <div>
           <img src="icons/registered.svg" width="250" height="250" class="img-responsive"/>
      </div>
      <div class="text-right">
         <h3 class=""><b class="counter"><?php echo $registered_all; ?></b></h3>
         <p class="text-muted">Registered</p>
      </div>
      <div class="clearfix"></div>
   </div>
</div>
<div class="col-md-6 col-lg-3">
   <div class="widget-bg-color-icon card-box">
      <div>
          <img src="icons/feedback.svg"  width="250" height="250" class="img-responsive"/>
      </div>
      <div class="text-right">
         <h3 class=""><b class="counter"><?php echo $feedcount; ?></b></h3>
         <p class="text-muted">Feedback</p>
      </div>
      <div class="clearfix"></div>
   </div>
</div>
<div class="col-md-6 col-lg-3">
   <div class="widget-bg-color-icon card-box">
      <div>
         <img src="icons/examination.svg"  width="250" height="250" class="img-responsive"/>
      </div>
      <div class="text-right">
         <h3 class=""><b class="counter"><?php echo $question_bank; ?></b></h3>
         <p class="text-muted">Question Bank</p>
      </div>
      <div class="clearfix"></div>
   </div>
</div>
<div class="col-md-6 col-lg-3">
   <div class="widget-bg-color-icon card-box">
      <div>
          <img src="icons/developer.svg" width="250" height="250" class="img-responsive"/>
      </div>
      <div class="text-right">
         <h3 class=""><b class="counter">1</b></h3>

        <p class="text-muted">Developer</p>

      </div>
      <div class="clearfix"></div>
   </div>
</div>
<!-- end row -->

<?php require 'footer.php'; ?>