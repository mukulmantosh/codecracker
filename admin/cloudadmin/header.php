<?php require 'sess.php'; ?>
<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Welcome Admin</title>
      <!--Morris Chart CSS -->
      <link rel="stylesheet" href="assets/plugins/morris/morris.css">
      <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
      <link href="assets/css/core.css" rel="stylesheet" type="text/css" />
      <link href="assets/css/externalfont.css" rel="stylesheet" type="text/css" />
      <link href="assets/css/components.css" rel="stylesheet" type="text/css" />
      <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
      <link href="assets/css/pages.css" rel="stylesheet" type="text/css" />
      <link href="assets/css/menu.css" rel="stylesheet" type="text/css" />
      <link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />
      <script src="assets/js/jquery.min.js"></script>
      <script src="assets/js/modernizr.min.js"></script>

          <!-- DataTables -->
        <link href="assets/plugins/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/plugins/datatables/buttons.bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/plugins/datatables/fixedHeader.bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/plugins/datatables/responsive.bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/plugins/datatables/scroller.bootstrap.min.css" rel="stylesheet" type="text/css" />

    
      </head>
   <body>
      <!-- Navigation Bar-->
      <header id="topnav">
         <div class="topbar-main">
            <div class="container">
              
               <div class="menu-extras">
                  <ul class="nav navbar-nav navbar-right pull-right">
                     <li class="dropdown">
                        <a href="#" class="dropdown-toggle waves-effect waves-light profile" data-toggle="dropdown" aria-expanded="true"><img src="assets/images/users/avatar-1.jpg" alt="user-img" class="img-circle"> </a>
                        <ul class="dropdown-menu">
                           <li><a href="logout.php"><i class="ti-power-off m-r-5"></i> Logout</a></li>
                        </ul>
                     </li>
                  </ul>
                  <div class="menu-item">
                     <!-- Mobile menu toggle-->
                     <a class="navbar-toggle">
                        <div class="lines">
                           <span></span>
                           <span></span>
                           <span></span>
                        </div>
                     </a>
                     <!-- End mobile menu toggle-->
                  </div>
               </div>
            </div>
         </div>
         <div class="navbar-custom">
            <div class="container">
               <div id="navigation">
                  <!-- Navigation Menu-->
                  <ul class="navigation-menu">
                     <li class="has-submenu">
                        <a href="dashboard.php"><i class="md md-dashboard"></i>Dashboard</a>
                        
                     </li>
                     <li class="has-submenu">
                        <a href="useraccount.php"><i class="md md-dashboard"></i>User Accounts</a>
                       
                     </li>

                     <li class="has-submenu">
                        <a href="examination.php"><i class="md md-dashboard"></i>Examination</a>
                     </li>

                       <li class="has-submenu">
                        <a href="examination_schedule.php"><i class="md md-dashboard"></i>Schedule Tests</a>
                     </li>

                        <li class="has-submenu">
                        <a href="examination_recover.php"><i class="md md-dashboard"></i></i>Recover Tests</a>
                     </li>
                          

                     <li class="has-submenu">
                        <a href="question_bank.php"><i class="md md-dashboard"></i></i>Question Bank</a>
                     </li>

                     <li class="has-submenu">
                        <a href="#"><i class="md md-dashboard"></i>Miscellaneous</a>
                        <ul class="submenu megamenu">
                           <li>
                              <ul>
                                  <li><a href="passkey.php">Generate Passkey</a></li>
                                  <li><a href="certificates.php">Certificates</a></li>
                                  <li><a href="viewfeedbacks.php">Feedbacks</a></li>
                                  <li><a href="bugreports.php">Bug Reports</a></li>
                                
                                                          
                                 
                              </ul>
                           </li>
                           <li>
                              <ul>
                                  
                                 <li><a href="uploadquestions.php">Students Questions</a></li>

                                 <li><a href="practice_test.php">Practice Test Questions</a></li>

                                 <li><a href="reset_leaderboard.php">Reset Leaderboard</a></li>

                                  <li class="has-submenu">
                                 <a href="hackathon.php">Hackathon</a>
                                 </li>
                                 
                                 
                              </ul>
                           </li>
                        </ul>
                     </li>
                     
                    
                     
                    

                    


                  </ul>
                  <!-- End navigation menu        -->
               </div>
            </div>
         </div>
      </header>
      <!-- End Navigation Bar-->