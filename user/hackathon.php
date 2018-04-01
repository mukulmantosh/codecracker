<?php
   require 'header.php';
   
   ?>
<div class="content-page">
<!-- Start content -->
<div class="content">
<div class="container">
<!-- Page-Title -->
<div class="row">
   <div class="col-sm-12">
      <h4 class="page-title">Hackathon</h4>
      <p class="text-muted page-title-alt">Today knowledge has power. It controls access to opportunity and advancement. - <i> Peter Drucker </i></p>
   </div>
</div>
<?php  
   $hackathon= $db->selectCollection('hackathon');
   $hackathon_count =  $hackathon->find()->count();
   
   if($hackathon_count > 0){
   
   
   
   ?>
<div class="container">
<div class="row">

<div class="col-md-1"></div>

 <div class="col-lg-5">
      <div class="panel-success">
         <div class="panel-heading">
            <center><h3 class="panel-title" style="font-size:20px;font-family: 'Audiowide', cursive;">WHAT IS HACKATHON ?</h3></center>
         </div>
         <div class="panel-body">
            <p align="center" style="font-family: 'Audiowide', cursive;color:#33ccff;">
            <img src="images/hackathon.jpg" class="img-responsive"><br>
               Hackathon is building things that you always wanted to have but no one has built it yet. It's to come up with an amazing idea and work tirelessly on it. It is to fail, fail again and fail better. Try out new things and learn while doing that. It's to work together, collaborate and build things that are innovative. It is to be a better programmer.<br><br> EAT | SLEEP | HACK 
            </p>
         </div>
      </div>
   </div>

 <div class="col-lg-5">
      <div class="panel-success">
         <div class="panel-heading">
            <center><h3 class="panel-title" style="font-size:20px;font-family: 'Audiowide', cursive;">Benefits of hackathons</h3></center>
         </div>
         <div class="panel-body" style="text-align:center;color:#ff80aa;">
           
         <p>Hackathons are proving grounds for new ideas. They’re especially good tools to stimulate the creative and problem-solving juices of developers. Unlike their day jobs where risk-taking may be frowned upon, in a hackathon there is a low cost of failure.</p><br>

         <p>The time limit in a hackathon forces participants to distil their visionary concepts down to actionable solutions.</p><br>

         <p>Outsiders can bring a fresh perspective to business challenges, as well as give an outside-in view of products and organization. Engaging with participants during the hackathon is an excellent way to get feedback on a recently released API: learn where developers get stuck, what they love and what suggestions for improvement they have.
         </p>
            
         </div>
      </div>
   </div>



<div class="col-lg-4">
      <div class="panel panel-border panel-success">
         <div class="panel-heading">
            <center><h3 class="panel-title" style="font-size:20px;font-family: 'Audiowide', cursive;">Innovation</h3></center>
         </div>
         <div class="panel-body" style="color:#cccc00;">
           
 <p>Hackathons are an innovative proving ground for new ideas.</p><br>

 <p>They stimulate the creative juices of participants and foster problem-solving and risk-taking in a casual environment. The diversity of participants guarantees a multitude of perspectives and the time limit on hackathons creates a uniquely productive atmosphere that forces participants to distil their visionary concepts down to actionable solutions. All this increases the chance of finding innovative fixes to persistent problems.
 </p><br><br>

         
         </div>
      </div>
   </div>


   <div class="col-lg-4">
      <div class="panel panel-border panel-success">
         <div class="panel-heading">
            <center><h3 class="panel-title" style="font-size:20px;font-family: 'Audiowide', cursive;">Community Creation</h3></center>
         </div>
         <div class="panel-body" style="color:#cccc00;">
           
 <p>
 In our technology-centric world, even the industrial landscape – like the Taxi industry – is not exempt of unpredictable disruption by technology startups. To stay current and connected to the makers and entrepreneurs that may be leading these overnight sensations, it has become increasingly important for all businesses to engage with and create an innovation community of their own. Developers, the experts in the universal language of change – code – provide the fuel to generate these innovations and are the center of gravity of such invention-focussed communities.
 </p><br>

         
         </div>
      </div>
   </div>

   <div class="col-lg-4">
      <div class="panel panel-border panel-success">
         <div class="panel-heading">
            <center><h3 class="panel-title" style="font-size:20px;font-family: 'Audiowide', cursive;">Developer Engagement</h3></center>
         </div>
         <div class="panel-body" style="color:#cccc00;">
           
<p> Hackathons build a bridge to the developer community.
 For companies whose competencies lie in providing technology solutions, hackathons help establish two-way conversations between those that develop the technology (APIs, APKs, SDKs, data sets etc) and the people that use them. This feedback loop increases developer adoption, which is crucial if solutions are to proliferate across new channels.<br>

As project-based challenges, it’s hackathons that come closest to testing a candidate's capabilities of handling challenges in the workplace.</p><br>
         
         </div>
      </div>
   </div>



   <div class="col-lg-3">
       <div class="panel panel-border panel-primary">
         <div class="panel-heading">
          
            
                  <img src="images/hackathon1.png" class="img-responsive">
            </div>
            <ul class="list-group list-group-flush text-center">
               <li class="list-group-item"><i class="icon-ok text-danger"></i>MEET PEOPLE</li>
               <li class="list-group-item"><i class="icon-ok text-danger"></i>BUILD STUFF</li>
               <li class="list-group-item"><i class="icon-ok text-danger"></i>LEARN SOMETHING NEW</li>
               <li class="list-group-item"><i class="icon-ok text-danger"></i>COLLABORATE</li>
                <li class="list-group-item"><i class="icon-ok text-danger"></i>LAUNCH</li>
            </ul>
            <div class="panel-footer">
               <a href="hackathon_begin.php" target="_blank" class="btn btn-lg btn-block btn-primary">ENTER HACK ZONE</a>
            </div>
         </div>
      </div>

    

<div class="col-lg-3">
      <div class="panel panel-border panel-danger">
         <div class="panel-heading">
            <center><h3 class="panel-title" style="font-size:20px;font-family: 'Audiowide', cursive;">RULES</h3></center>
         </div>
         <div class="panel-body">
           
          <ul  style="font-size:12px;font-family: 'Audiowide', cursive;color:#ff9900;">
              <li>You are expected to come up with new and innovative ideas, any idea that has been copied from somewhere will be disqualified.</li><br>
              <li>Your hack must be developed entirely during the Hackathon duration. You may use open source libraries and other freely available systems / services such as Google Maps, Facebook Connect, Twitter feeds and any programming language or database etc.</li><br>
             
              <br>
            </ul>
         </div>
      </div>
   </div>



<div class="col-lg-3">
      <div class="panel panel-border panel-danger">
         <div class="panel-heading">
            <center><h3 class="panel-title" style="font-size:20px;font-family: 'Audiowide', cursive;">RULES</h3></center>
         </div>
         <div class="panel-body">
           
          <ul  style="font-size:12px;font-family: 'Audiowide', cursive;color:#ff9900;">
             <li>The intellectual property of your code belongs only to you.</li>
              <li>The file size should not exceed more than 50 MB. You have to share Google Drive files with hackathon host coordinator e-mail which you will find in the Event Page.</li><br>

                 <li>You have to develop the entire software application on your local system and submit it before the time ends in zip file format along with instructions to run the application and source code.</li><br>
           

            </ul>
         </div>
      </div>
   </div>


<div class="col-lg-3">
      <div class="panel panel-border panel-danger">
         <div class="panel-heading">
            <center><h3 class="panel-title" style="font-size:20px;font-family: 'Audiowide', cursive;">RULES</h3></center>
         </div>
         <div class="panel-body">
           
          <ul  style="font-size:12px;font-family: 'Audiowide', cursive;color:#ff9900;">
            <li>This is an individual participation hackathon, you have participate individually. Submit as many as source code during the duration of the hackathon and we will consider the best one.</li><br>
           
              <li> No, one does not need to be logged in or be online for the entire duration. You can develop the application on your local system based on the given themes and then submit it, on the specific challenge page.</li>

               <li>All your source code needs to be uploaded in Google Drive</li>

            </ul>
         </div>
      </div>
   </div>
     
<?php 
   }
   else{
   
   
   ?>
<div class="container">
<div class="row">
   <div class="col-md-4">
      <div>
         <div class="panel-heading">
            <div class="panel-body text-center">
               <p class="lead">
                  <img src="images/hackathon-logo.png" width="318" height="104" class="img-responsive">
            </div>
            <ul class="list-group list-group-flush text-center">
               <li class="list-group-item"><i class="icon-ok text-danger"></i>NOT SCHEDULED</li>
            </ul>
         </div>
      </div>
   </div>
</div>
<?php
   }
   require 'footer.php';
    ?>